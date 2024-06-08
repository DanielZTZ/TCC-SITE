<?php
session_start();
include_once '../conexao.php';

$id_noticia = $_POST['id_noticia'];

// Iniciar transação
$conn->begin_transaction();

try {
    // Obter o caminho da imagem associada à notícia
    $sql_obter_imagem = "SELECT i.caminho FROM noticia n JOIN imagem_noticia i ON n.imagem_noticia_id = i.id WHERE n.id = $id_noticia";
    $resultado = $conn->query($sql_obter_imagem);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $caminho_imagem = $row['caminho'];

        // Excluir a notícia
        $sql_excluir_noticia = "DELETE FROM noticia WHERE id = $id_noticia";
        if (!$conn->query($sql_excluir_noticia)) {
            throw new Exception("Erro ao excluir a notícia.");
        }

        // Excluir a imagem associada
        $sql_excluir_imagem = "DELETE FROM imagem_noticia WHERE id = (SELECT imagem_noticia_id FROM noticia WHERE id = $id_noticia)";
        if (!$conn->query($sql_excluir_imagem)) {
            throw new Exception("Erro ao excluir a imagem associada.");
        }

        // Remover o arquivo de imagem do servidor
        if (!unlink($caminho_imagem)) {
            throw new Exception("Erro ao excluir o arquivo de imagem do servidor.");
        }

        // Commit das alterações
        $conn->commit();
        echo "Notícia e imagem associada excluídas com sucesso!";
    } else {
        throw new Exception("Notícia não encontrada.");
    }
} catch (Exception $e) {
    // Rollback em caso de erro
    $conn->rollback();
    echo "Erro ao excluir notícia: " . $e->getMessage();
}

// Fechar conexão
$conn->close();
?>
