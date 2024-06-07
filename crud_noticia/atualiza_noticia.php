<?php
session_start();
include_once '../conexao.php';

// Parâmetros da notícia
$id_noticia = $_POST['id_noticia'];
$novo_titulo = $_POST['novo_titulo'];
$novo_texto = $_POST['novo_texto'];
$novo_link = $_POST['novo_link'];

// Parâmetros da nova imagem
$novo_nome_imagem = $_FILES['nova_imagem']['name'];
$novo_caminho_temp_imagem = $_FILES['nova_imagem']['tmp_name'];

// Diretório onde as imagens serão armazenadas
$diretorio_imagens = "../crud_noticia/inserir_not/imagem/";

// Move a nova imagem para o diretório de imagens
$novo_caminho_imagem = $diretorio_imagens . $novo_nome_imagem;
if (!move_uploaded_file($novo_caminho_temp_imagem, $novo_caminho_imagem)) {
    echo "Erro ao mover o arquivo de imagem para o diretório.";
    exit;
}

// Iniciar transação
$conn->begin_transaction();

try {
    // Inserir a nova imagem na tabela imagem_noticia
    $sql_inserir_imagem = "INSERT INTO imagem_noticia (caminho) VALUES ('$novo_caminho_imagem')";
    if (!$conn->query($sql_inserir_imagem)) {
        throw new Exception("Erro ao inserir a nova imagem na tabela imagem_noticia.");
    }
    $novo_id_imagem = $conn->insert_id;

    // Atualizar os dados da notícia na tabela noticia
    $sql_atualizar_noticia = "UPDATE noticia SET titulo = '$novo_titulo', texto = '$novo_texto', link = '$novo_link', imagem_noticia_id = '$novo_id_imagem' WHERE id = $id_noticia";
    if (!$conn->query($sql_atualizar_noticia)) {
        throw new Exception("Erro ao atualizar os dados da notícia na tabela noticia.");
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
