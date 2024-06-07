<?php
session_start();
include_once '../conexao.php';

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
$texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_STRING);
$link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_STRING);

$result_noticia = "UPDATE noticia SET titulo='$titulo', texto='$texto', link='$link' WHERE id='$id'";
$resultado_noticia = mysqli_query($conn, $result_noticia);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<p style='color:green;'>Notícia editada com sucesso</p>";
    header("Location: alterar_noticia.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Notícia não foi editada com sucesso</p>";
    header("Location: alterar_noticia.php?id=$id");
}
