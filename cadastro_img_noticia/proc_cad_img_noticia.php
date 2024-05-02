<?php
session_start();
include_once './conexao_noticia.php';

$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_STRING);
if ($SendCadImg) {
    // Receber os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_STRING); // Adicionado para receber o texto
    $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING); // Adicionado para receber o link
    $nome_imagem = $_FILES['imagem']['name'];

    // Iniciar a inserção na tabela "imagem_noticia"
    $result_img = "INSERT INTO imagem_noticia (nome, img) VALUES (:nome, :imagem)";
    $insert_msg = $conn->prepare($result_img);
    $insert_msg->bindParam(':nome', $nome);
    $insert_msg->bindParam(':imagem', $nome_imagem);

    // Iniciar a inserção na tabela "noticias"
    $result_noticias = "INSERT INTO noticia (titulo, texto, link) VALUES ( :titulo, :texto, :link)";
    $insert_noticias = $conn->prepare($result_noticias);
    $insert_noticias->bindParam(':nome', $nome);
    $insert_noticias->bindParam(':texto', $texto);
    $insert_noticias->bindParam(':link', $link);

    // Verificar se os dados foram inseridos com sucesso nas duas tabelas
    $conn->beginTransaction();

    try {
        // Inserir na tabela "imagem_noticia"
        if ($insert_msg->execute()) {
            // Recuperar o último ID inserido na tabela "imagem_noticia"
            $ultimo_id = $conn->lastInsertId();

            // Diretório onde o arquivo será salvo
            $diretorio = 'imagens/' . $ultimo_id.'/';
            mkdir($diretorio, 0755);
            
            // Mover o arquivo enviado para o diretório
            if(move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$nome_imagem)){
                // Se a imagem foi salva com sucesso, continuar com a inserção na tabela "noticias"
                if ($insert_noticias->execute()) {
                    // Confirmar a transação
                    $conn->commit();
                    $_SESSION['msg'] = "<p style='color:green;'>Dados salvos com sucesso e upload da imagem realizado com sucesso</p>";
                    header("Location: index_noticia.php");
                    exit();
                } else {
                    throw new Exception("Erro ao inserir dados na tabela 'noticias'");
                }
            } else {
                throw new Exception("Erro ao realizar o upload da imagem");
            }
        } else {
            throw new Exception("Erro ao inserir dados na tabela 'imagem_noticia'");
        }
    } catch (Exception $e) {
        // Reverter a transação em caso de erro
        $conn->rollback();
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados: " . $e->getMessage() . "</p>";
        header("Location: index_noticia.php");
        exit();
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados</p>";
    header("Location: index_noticia.php");
    exit();
}
?>
