<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Imagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Cadastrar Imagem</h1>
        <?php
        if(isset($_SESSION['msg'])){
            echo "<div class='alert alert-info'>" . $_SESSION['msg'] . "</div>";
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" action="recebe_imagem.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="imagem" class="form-label">Insira uma imagem</label>
                <input type="file" class="form-control" name="imagem">
            </div>
            <div class="mb-3">
                <label for="nome_imagem" class="form-label">Nome da Imagem:</label>
                <input type="text" name="nome_imagem" class="form-control" placeholder="Digite o nome da imagem">
            </div>
            <input name="SendCadImg" type="submit" class="btn btn-primary"></input>
        </form>
    </div>
</body>
</html>
