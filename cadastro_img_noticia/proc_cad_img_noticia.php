<?php
session_start();
include_once './conexao_noticia.php';

$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    // Receber os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $nome_imagem = $_FILES['imagem']['name'];

    // Iniciar a inserção na tabela "imagem_noticia"
    $result_img = "INSERT INTO imagem_noticia (nome, img) VALUES (:nome, :imagem)";
    $insert_msg = $conn->prepare($result_img);
    $insert_msg->bindParam(':nome', $nome);
    $insert_msg->bindParam(':imagem', $nome_imagem);

    // Verificar se os dados foram inseridos com sucesso na tabela "imagem_noticia"
    if ($insert_msg->execute()) {
        // Recuperar o último ID inserido na tabela "imagem_noticia"
        $ultimo_id = $conn->lastInsertId();

        // Diretório onde o arquivo será salvo
        $diretorio = 'imagens/' . $ultimo_id.'/';
        mkdir($diretorio, 0755);
        
        // Mover o arquivo enviado para o diretório
        if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nome_imagem)){
            $_SESSION['msg'] = "<p style='color:green;'>Dados salvos com sucesso e upload da imagem realizado com sucesso</p>";
            header("Location: index_noticia.php");
            exit();
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao realizar o upload da imagem</p>";
            header("Location: index_noticia.php");
            exit();
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao inserir dados na tabela 'imagem_noticia'</p>";
        header("Location: index_noticia.php");
        exit();
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
    header("Location: index_noticia.php");
    exit();
}
?>
