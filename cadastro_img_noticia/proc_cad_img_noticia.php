<?php
session_start();
include_once '../conexao.php';

// Verificar se o usuário clicou no botão
$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_SPECIAL_CHARS);
if ($SendCadImg) {
    // Receber os dados do formulário
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
    $texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_SPECIAL_CHARS);
    $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_SPECIAL_CHARS);

    // Verificar se foi enviado um arquivo
    if (isset($_FILES['imagem'])) {
        $nome_imagem = $_FILES['imagem']['name'];
        $nome_tmp = $_FILES['imagem']['tmp_name'];
        $erro = $_FILES['imagem']['error'];

        // Verificar se não houve erro no upload
        if ($erro == UPLOAD_ERR_OK) {
            // Diretório onde o arquivo vai ser salvo
            $diretorio =

            $caminho_completo = $diretorio . $nome_imagem;

            // Inserir os dados da imagem na tabela imagem_noticia
            $result_imagem = "INSERT INTO imagem_noticia (caminho) VALUES (?)";
            $insert_imagem = $conn->prepare($result_imagem);
            $insert_imagem->bind_param('s', $caminho_completo);

            // Verificar se os dados foram inseridos com sucesso na tabela imagem_noticia
            if ($insert_imagem->execute()) {
                // Obter o ID da imagem recém-inserida na tabela imagem_noticia
                $imagem_noticia_id = $insert_imagem->insert_id;

                // Inserir os dados da notícia na tabela noticia incluindo o ID da imagem da notícia
                $result_noticia = "INSERT INTO noticia (titulo, texto, link, imagem_noticia_id) VALUES (?, ?, ?, ?)";
                $insert_noticia = $conn->prepare($result_noticia);
                $insert_noticia->bind_param('sssi', $titulo, $texto, $link, $imagem_noticia_id);

                // Verificar se os dados foram inseridos com sucesso na tabela noticia
                if ($insert_noticia->execute()) {
                    $_SESSION['msg'] = "<p style='color:green;'>Dados salvos e imagem enviada com sucesso</p>";
                    $_SESSION['msg_type'] = "success";
                } else {
                    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados na tabela noticia</p>";
                    $_SESSION['msg_type'] = "danger";
                }
            } else {
                $_SESSION['msg'] = "<p style='color:red;'>Erro ao inserir a imagem na tabela imagem_noticia</p>";
                $_SESSION['msg_type'] = "danger";
            }
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro no upload da imagem: $erro</p>";
            $_SESSION['msg_type'] = "danger";
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Nenhum arquivo enviado</p>";
        $_SESSION['msg_type'] = "danger";
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Acesso ao formulário não autorizado</p>";
    $_SESSION['msg_type'] = "danger";
}

// Redirecionar de volta para o formulário
header("Location: index_noticia.php");
exit();
?>
