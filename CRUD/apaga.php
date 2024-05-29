<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM aluno WHERE id='$id'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Aluno excluído com sucesso</p>";
		header("Location: exe_listar3.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro! O aluno não foi excluído</p>";
		header("Location: exe_listar3.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um aluno</p>";
	header("Location: exe_listar3.php");
}
