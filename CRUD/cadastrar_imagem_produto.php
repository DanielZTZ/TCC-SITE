<?php
session_start();
include_once("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Produto</title>
    </head>
    <body>
        <h1>Cadastrar Produto</h1>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" action="recebe_imagem.php" enctype="multipart/form-data">
            <label>Insira uma imagem</label>
            <input type="file" name="imagem"><br><br>

            <label>Nome da Imagem:</label>
            <input type="text" name="nome_imagem" placeholder="Digite o nome da imagem"><br><br>
            
            <input name="SendCadImg" type="submit" value="Cadastrar">
        </form>
    </body>
</html>