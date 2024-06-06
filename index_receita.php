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
            <label>Imagem:</label>
            <input type="file" name="imagem" required><br><br>
            <label>Título:</label>
            <input type="text" name="titulo" placeholder="Digite o título" required><br><br>
            <label>Descrição:</label>
            <input type="text" name="descricao" placeholder="Digite a descrição"><br><br>
            <label>Link:</label>
            <input type="text" name="link" placeholder="Digite o link"><br><br>
                <label>Categoria:</label>
                <select name="categoria">
    <option value="1">Doce</option>
    <option value="2">Salgado</option>
</select>

            </select><br><br>
            <label>Nome da Imagem:</label>
            <input type="text" name="nome_imagem" placeholder="Digite o nome da imagem" required><br><br>
            <input name="SendCadImg" type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>
