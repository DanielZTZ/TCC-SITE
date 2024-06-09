<?php
session_start();
include_once 'conexao.php';

$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    $nome = filter_input(INPUT_POST, 'nome_imagem', FILTER_SANITIZE_STRING);
    $produto_id = filter_input(INPUT_POST, 'produto_id', FILTER_SANITIZE_NUMBER_INT);

    if (isset($_FILES['imagem'])) {
        $nome_imagem = $_FILES['imagem']['name'];
        $nome_tmp = $_FILES['imagem']['tmp_name'];
        $erro = $_FILES['imagem']['error'];

        if ($erro == UPLOAD_ERR_OK) {
            $diretorio = 'imagem_produto/';
            $caminho_completo = $diretorio . $nome_imagem;

            if (move_uploaded_file($nome_tmp, $caminho_completo)) {
                $result_img = "INSERT INTO imagem_produto (nome, imagem, produto_id) VALUES (?, ?, ?)";
                $insert_msg = $conn->prepare($result_img);
                if ($insert_msg === false) {
                    die("Erro na preparação da consulta: " . $conn->error);
                }
                $insert_msg->bind_param('ssi', $nome, $caminho_completo, $produto_id);

                if ($insert_msg->execute()) {
                    $_SESSION['msg'] = "<p style='color:green;'>Dados salvos e imagem enviada com sucesso</p>";
                } else {
                    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados: " . $insert_msg->error . "</p>";
                }
            } else {
                $_SESSION['msg'] = "<p style='color:red;'>Erro ao enviar a imagem</p>";
            }
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro no upload da imagem: $erro</p>";
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Nenhum arquivo enviado</p>";
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Acesso ao formulário não autorizado</p>";
}

header("Location: cadastrar_imagem_produto.php?produto_id=$produto_id");
?>
