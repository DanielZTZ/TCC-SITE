<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Imagem Notícia - Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .msg {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }

        .msg.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .msg.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cadastrar Imagem</h1>
        <?php
        if(isset($_SESSION['msg'])){
            echo "<div class='msg " . $_SESSION['msg_type'] . "'>" . $_SESSION['msg'] . "</div>";
            unset($_SESSION['msg']);
            unset($_SESSION['msg_type']);
        }
        ?>
        <form method="POST" action="proc_cad_img_noticia.php" enctype="multipart/form-data">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome" required><br><br>
        
            <label>Imagem:</label>
            <input type="file" name="imagem" required><br><br>
<h1>Cadastrar noticia</h1>
            <label>Título:</label>
            <input type="text" name="titulo" placeholder="Digite o título" required><br><br>
            
            <label>Texto:</label>
            <input type="text" name="texto" placeholder="Digite o texto"><br><br>
            
            <label>Link:</label>
            <input type="text" name="link" placeholder="Digite o link"><br><br>
            
            <input name="SendCadImg" type="submit" value="Cadastrar">
        </form>
    </div>
</body>
</html>
