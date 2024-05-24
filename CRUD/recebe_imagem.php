<?php
session_start();
include_once '../conexao.php';

// Verificar se o usuário clicou no botão
$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    // Receber os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome_imagem', FILTER_SANITIZE_STRING);

    // Verificar se foi enviado um arquivo
    if (isset($_FILES['imagem'])) {
        $nome_imagem = $_FILES['imagem']['name'];
        $nome_tmp = $_FILES['imagem']['tmp_name'];
        $erro = $_FILES['imagem']['error'];

        // Verificar se não houve erro no upload
        if ($erro == UPLOAD_ERR_OK) {
            // Diretório onde o arquivo vai ser salvo
            $diretorio = 'imagem_produto/';
            $caminho_completo = $diretorio . $nome_imagem;

            // Mover o arquivo para o diretório
            if (move_uploaded_file($nome_tmp, $caminho_completo)) {
                // Inserir no BD apenas o caminho para a imagem
                $result_img = "INSERT INTO imagem_produto (nome, imagem) VALUES (?, ?)";

                // Preparação da consulta SQL
                $insert_msg = $conn->prepare($result_img);
                if ($insert_msg === false) {
                    die("Erro na preparação da consulta: " . $conn->error);
                }

                // Vinculação dos parâmetros da consulta
                $insert_msg->bind_param('ss', $nome, $caminho_completo);

                // Verificar se os dados foram inseridos com sucesso
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

// Redirecionar de volta para o formulário
header("Location: cadastrar_imagem_produto.php");
?>
