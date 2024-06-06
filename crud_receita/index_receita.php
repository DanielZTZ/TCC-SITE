<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Cadastro de Receitas</title>
</head>
<body>
    <div class="container">
        <h1>Cadastrar Receitas</h1>

        <?php
        if (isset($_SESSION['msg']) && isset($_SESSION['msg_type'])) {
            $msg_type = $_SESSION['msg_type'];
            $msg = $_SESSION['msg'];
            echo "<div class='alert alert-{$msg_type}'>{$msg}</div>";
            unset($_SESSION['msg']);
            unset($_SESSION['msg_type']);
        }
        ?>

        <form method="POST" action="proc_cad_img_receita.php" enctype="multipart/form-data">
            <label for="imagem">Imagem:</label>
            <input type="file" name="imagem" id="imagem" required><br><br>

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Digite o título" required><br><br>

            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" placeholder="Digite a descrição" required></textarea><br><br>

            <label for="link">Link:</label>
            <input type="text" name="link" id="link" placeholder="Digite o link"><br><br>

            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria">
                <option value="Categoria 1">Salgado</option>
                <option value="Categoria 2">Doce</option>
                <!-- Adicione mais opções conforme necessário -->
            </select><br><br>

            <input name="SendCadImg" type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>
