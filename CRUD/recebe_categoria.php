<?php
    session_start();
	include_once("../conexao.php");
	
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	
	
	$result_categoria = "INSERT INTO categorias(nome) VALUES ('$nome')";

	$resultado_categoria = mysqli_query($conn, $result_categoria);

	
	
if(mysqli_insert_id($conn))
{
	$_SESSION['msg'] = "<p style='color:green;'>Categoria cadastrado com sucesso</p>";
	header("Location: cadastro_categoria.php");
}
else
{
	$_SESSION['msg'] = "<p style='color:red;'>Categoria não foi cadastrado com sucesso</p>";
	header("Location: cadastro_categoria.php");
}