<?php
session_start();
include_once("../conexao.php");
$id = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM usuario WHERE id_usuario='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuario excluído com sucesso</p>";
		header("Location: apaga_usuario.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro! O Usuario não foi excluído</p>";
		header("Location: apaga_usuario.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um Usuario</p>";
	header("Location: apaga_usuario.php");
}
