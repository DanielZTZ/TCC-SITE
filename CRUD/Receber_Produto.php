<?php
session_start();
include_once("../conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_NUMBER_INT);
$categoria_id = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_NUMBER_INT);
$sobre = filter_input(INPUT_POST, 'sobre', FILTER_SANITIZE_STRING);
$beneficios = filter_input(INPUT_POST, 'beneficios', FILTER_SANITIZE_STRING);
$recomendacoes = filter_input(INPUT_POST, 'recomendacoes', FILTER_SANITIZE_STRING);
$peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$largura = filter_input(INPUT_POST, 'largura', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$altura = filter_input(INPUT_POST, 'altura', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$comprimento = filter_input(INPUT_POST, 'comprimento', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$nome_imagem = filter_input(INPUT_POST, 'nome_imagem', FILTER_SANITIZE_STRING);

// Processamento da imagem
$diretorio = 'imagem_produto/';

// Verifica se foi enviado um arquivo
if(isset($_FILES['imagem'])) {
    $nome_arquivo = $_FILES['imagem']['name'];
    $nome_temporario = $_FILES['imagem']['tmp_name'];
    
    // Move o arquivo para o diretório desejado
    if(move_uploaded_file($nome_temporario, $diretorio . $nome_arquivo)) {
        // Insere o produto no banco de dados
        $result_produto = "INSERT INTO produtos (nome, preco, estoque, categoria_id, sobre, beneficios, recomendacoes, peso, largura, altura, comprimento) 
        VALUES ('$nome', '$preco', '$estoque', '$categoria_id', '$sobre', '$beneficios', '$recomendacoes', '$peso', '$largura', '$altura', '$comprimento')";
        
        if(mysqli_query($conn, $result_produto)) {
            // Se o produto foi cadastrado com sucesso
            $_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso.</p>";
        } else {
            // Se houve um erro ao cadastrar o produto
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao cadastrar produto.</p>";
        }
    } else {
        // Se houve um erro ao mover o arquivo para o diretório desejado
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao enviar imagem.</p>";
    }
} else {
    // Se não foi enviado um arquivo
    $_SESSION['msg'] = "<p style='color:red;'>Nenhum arquivo enviado.</p>";
}

header("Location: Cadastrar_Produto.php");
?>
