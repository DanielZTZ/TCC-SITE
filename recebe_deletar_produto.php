<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'produto_id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM produtos WHERE produto_id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Produto excluído com sucesso</p>";
		header("Location: listar_produtos.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro! O produto não foi excluído</p>";
		header("Location: listar_produtos.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um produto</p>";
	header("Location: listar_produtos.php");
}