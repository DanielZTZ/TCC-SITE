<?php
// Recupere o nome do arquivo da imagem da query string
$imagem = $_GET['imagem_noticia_id'];

// Defina o caminho da pasta onde as imagens estão armazenadas
$caminho_imagens = '/crud_noticia/inserir_not/imagem//';

// Determine o tipo MIME da imagem
$tipo_mime = mime_content_type($caminho_imagens . $imagem);

// Defina o cabeçalho Content-Type com base no tipo MIME
header("Content-Type: $tipo_mime");

// Leia o conteúdo do arquivo da imagem e exiba-o
readfile($caminho_imagens . $imagem);
?>
