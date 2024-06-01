<?php
session_start();
include_once("../conexao.php");

$id = filter_input(INPUT_POST, 'produto_id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_NUMBER_INT);
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_NUMBER_INT);
$categoria_id = filter_input(INPUT_POST, 'categoria_id', FILTER_SANITIZE_NUMBER_INT);
$sobre = filter_input(INPUT_POST, 'sobre', FILTER_SANITIZE_STRING);
$beneficios = filter_input(INPUT_POST, 'beneficios', FILTER_SANITIZE_STRING);
$recomendacoes = filter_input(INPUT_POST, 'recomendacoes', FILTER_SANITIZE_STRING);
$peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_NUMBER_INT);
$largura = filter_input(INPUT_POST, 'largura', FILTER_SANITIZE_NUMBER_INT);
$altura = filter_input(INPUT_POST, 'altura', FILTER_SANITIZE_NUMBER_INT);
$comprimento = filter_input(INPUT_POST, 'comprimento', FILTER_SANITIZE_NUMBER_INT);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE produtos SET nome='$nome', preco='$preco', estoque='$estoque', categoria_id='$categoria_id', sobre='$sobre', beneficios='$beneficios', recomendacoes='$recomendacoes', peso='$peso', largura='$largura', altura='$altura', comprimento='$comprimento' WHERE produto_id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Produto editado com sucesso</p>";
	header("Location: alterar_produto.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Produto não foi editado com sucesso</p>";
	header("Location: alterar_produto.php?id=$id");
}
