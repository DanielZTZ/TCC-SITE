<?php
session_start();
include_once './conexao.php';

// Verificar se o usuário clicou no botão
$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    // Receber os dados do formulário
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_STRING);
    $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING);
    $nome_imagem = $_FILES['imagem']['name'];
    
    // Inserir na tabela 'imagem'
    $result_imagem = "INSERT INTO imagem (nome, imagem) VALUES (:nome, :imagem)";
    $insert_imagem = $conn->prepare($result_imagem);
    
    // Verificar se a preparação da consulta foi bem-sucedida
    if ($insert_imagem) {
        $insert_imagem->bindParam(':nome', $titulo); // Estou assumindo que o nome da notícia será usado como nome da imagem na tabela 'imagem'
        $insert_imagem->bindParam(':imagem', $nome_imagem);

        // Verificar se os dados foram inseridos com sucesso na tabela 'imagem'
        if ($insert_imagem->execute()) {
            // Obter o ID da imagem recém-inserida
            $imagem_id = $conn->lastInsertId();

            // Inserir na tabela 'noticia' com a referência para a imagem recém-inserida
            $result_noticia = "INSERT INTO noticia (titulo, texto, link, imagem_id) VALUES (:titulo, :texto, :link, :imagem_id)";
            $insert_noticia = $conn->prepare($result_noticia);
            $insert_noticia->bindParam(':titulo', $titulo);
            $insert_noticia->bindParam(':texto', $texto);
            $insert_noticia->bindParam(':link', $link);
            $insert_noticia->bindParam(':imagem_id', $imagem_id);

            // Verificar se os dados foram inseridos com sucesso na tabela 'noticia'
            if ($insert_noticia->execute()) {
                $_SESSION['msg'] = "<p style='color:green;'>Dados salvos com sucesso</p>";
                header("Location: index.php");
            } else {
                $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados da notícia</p>";
                header("Location: index.php");
            }
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados da imagem</p>";
            header("Location: index.php");
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao preparar a consulta para inserção de imagem</p>";
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao enviar o formulário</p>";
    header("Location: index.php");
}
?>