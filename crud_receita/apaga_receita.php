<?php
session_start();
include_once '../conexao.php';

$id_receita = $_POST['id_receita'];

// Iniciar transação
$conn->begin_transaction();

try {
    // Obter o caminho da imagem associada à receita
    $sql_obter_imagem = "SELECT i.imagem FROM imagem_receita i JOIN receitas r ON r.id_imgReceita = i.id_imgReceita WHERE r.id_receita = $id_receita";
    $resultado = $conn->query($sql_obter_imagem);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $caminho_imagem = $row['imagem'];

        // Excluir a receita
        $sql_excluir_receita = "DELETE FROM receitas WHERE id_receita = $id_receita";
        if (!$conn->query($sql_excluir_receita)) {
            throw new Exception("Erro ao excluir a receita.");
        }

        // Excluir a imagem associada
        $sql_excluir_imagem = "DELETE FROM imagem_receita WHERE id_imgReceita = (SELECT id_imgReceita FROM receitas WHERE id_receita = $id_receita)";
        if (!$conn->query($sql_excluir_imagem)) {
            throw new Exception("Erro ao excluir a imagem associada à receita.");
        }

        // Remover o arquivo de imagem do servidor
        if (!unlink($caminho_imagem)) {
            throw new Exception("Erro ao excluir o arquivo de imagem da receita do servidor.");
        }

        // Commit das alterações
        $conn->commit();
        echo "Receita e imagem associada excluídas com sucesso!";
    } else {
        throw new Exception("Receita não encontrada.");
    }
} catch (Exception $e) {
    // Rollback em caso de erro
    $conn->rollback();
    echo "Erro ao excluir receita: " . $e->getMessage();
}

// Fechar conexão
$conn->close();
?>
