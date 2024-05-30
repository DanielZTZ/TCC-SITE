<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'categoria_id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "UPDATE categorias SET nome='$nome' WHERE id='$categoria_id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Categoria editada com sucesso</p>";
	header("Location: alterar_categoria.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Categoria não foi editada com sucesso</p>";
	header("Location: alterar_categoria.php?categoria_id=$id");
}
