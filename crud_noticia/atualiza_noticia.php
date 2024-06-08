<?php
session_start();
include_once '../conexao.php';

// Parâmetros da notícia
$id_noticia = $_POST['id_noticia'];
$novo_titulo = isset($_POST['novo_titulo']) ? $_POST['novo_titulo'] : null;
$novo_texto = isset($_POST['novo_texto']) ? $_POST['novo_texto'] : null;
$novo_link = isset($_POST['novo_link']) ? $_POST['novo_link'] : null;
$nova_imagem = isset($_FILES['nova_imagem']['name']) ? $_FILES['nova_imagem']['name'] : null;

// Iniciar transação
$conn->begin_transaction();

try {
    // Atualizar a imagem se uma nova imagem foi enviada
    if ($nova_imagem) {
        $novo_caminho_temp_imagem = $_FILES['nova_imagem']['tmp_name'];
        $diretorio_imagens = "crud_noticia/inserir_not/imagem/";
        $novo_caminho_imagem = $diretorio_imagens . basename($nova_imagem);

        if (!move_uploaded_file($novo_caminho_temp_imagem, $novo_caminho_imagem)) {
            throw new Exception("Erro ao mover o arquivo de imagem para o diretório.");
        }

        $sql_inserir_imagem = "INSERT INTO imagem_noticia (caminho) VALUES ('$novo_caminho_imagem')";
        if (!$conn->query($sql_inserir_imagem)) {
            throw new Exception("Erro ao inserir a nova imagem na tabela imagem_noticia.");
        }
        $novo_id_imagem = $conn->insert_id;

        // Atualizar a notícia com o ID da nova imagem
        $sql_atualizar_imagem = "UPDATE noticia SET imagem_noticia_id = $novo_id_imagem WHERE id = $id_noticia";
        if (!$conn->query($sql_atualizar_imagem)) {
            throw new Exception("Erro ao atualizar a imagem da notícia.");
        }
    }

    // Atualizar os outros campos se foram fornecidos
    if ($novo_titulo) {
        $sql_atualizar_titulo = "UPDATE noticia SET titulo = '$novo_titulo' WHERE id = $id_noticia";
        if (!$conn->query($sql_atualizar_titulo)) {
            throw new Exception("Erro ao atualizar o título da notícia.");
        }
    }

    if ($novo_texto) {
        $sql_atualizar_texto = "UPDATE noticia SET texto = '$novo_texto' WHERE id = $id_noticia";
        if (!$conn->query($sql_atualizar_texto)) {
            throw new Exception("Erro ao atualizar o texto da notícia.");
        }
    }

    if ($novo_link) {
        $sql_atualizar_link = "UPDATE noticia SET link = '$novo_link' WHERE id = $id_noticia";
        if (!$conn->query($sql_atualizar_link)) {
            throw new Exception("Erro ao atualizar o link da notícia.");
        }
    }

    // Commit das alterações
    $conn->commit();
    echo "Notícia atualizada com sucesso!";
} catch (Exception $e) {
    // Rollback em caso de erro
    $conn->rollback();
    echo "Erro ao atualizar notícia: " . $e->getMessage();
}

// Fechar conexão
$conn->close();
?>
