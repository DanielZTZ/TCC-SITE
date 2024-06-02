<?php
session_start();
include_once("../conexao.php");
$id = filter_input(INPUT_GET, 'categoria_id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM categorias WHERE categoria_id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Categoria excluída com sucesso</p>";
		header("Location: deletar_categoria.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro! A categoria não foi excluída</p>";
		header("Location: deletar_categoria.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar uma Categoria</p>";
	header("Location: deletar_categoria.php");
}