<?php
    session_start();
    include_once("conexao.php");
    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_NUMBER_INT);
    $categoria_id = filter_input(INPUT_POST, 'categoria_id', FILTER_SANITIZE_NUMBER_INT);
    $sobre = filter_input(INPUT_POST, 'sobre', FILTER_SANITIZE_STRING);
    $beneficios = filter_input(INPUT_POST, 'beneficios', FILTER_SANITIZE_STRING);
    $recomendacoes = filter_input(INPUT_POST, 'recomendacoes', FILTER_SANITIZE_STRING);
    $peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $largura = filter_input(INPUT_POST, 'largura', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $altura = filter_input(INPUT_POST, 'altura', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $comprimento = filter_input(INPUT_POST, 'comprimento', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    
    
    $result_produto = "INSERT INTO produtos(nome, preco,estoque,categoria_id,sobre,beneficios,recomendacoes,peso,largura,altura,comprimento) VALUES ('$nome','$preco','$estoque','$categoria_id','$sobre','$beneficios','$recomendacoes','$peso','$largura','$altura','$comprimento')";

    $resultado_produto = mysqli_query($conn, $result_produto);

    
    
if(mysqli_insert_id($conn))
{
    $_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso</p>";
    header("Location: cadastro_produto.php");
}
else
{
    $_SESSION['msg'] = "<p style='color:red;'>Produto não foi cadastrado com sucesso</p>";
    header("Location: cadastro_produto.php");
}