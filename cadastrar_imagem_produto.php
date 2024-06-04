<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Cadastrar Produto</h1>
        <?php
        if(isset($_SESSION['msg'])){
            echo "<div class='alert alert-info'>" . $_SESSION['msg'] . "</div>";
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" action="recebe_imagem.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="imagem" class="form-label">Insira uma imagem</label>
                <input type="file" class="form-control" id="imagem" name="imagem">
            </div>
            <div class="mb-3">
                <label for="nome_imagem" class="form-label">Nome da Imagem:</label>
                <input type="text" class="form-control" id="nome_imagem" name="nome_imagem" placeholder="Digite o nome da imagem">
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>
