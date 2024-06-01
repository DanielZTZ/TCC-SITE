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
        if (isset($_SESSION['msg'])) {
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" action="recebe_produto.php" enctype="multipart/form-data">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome"><br><br>

            <label>Preço:</label>
            <input type="number" name="preco" placeholder="Informe o preço"><br><br>

            <label>Estoque:</label>
            <input type="number" name="estoque" placeholder="Informe a quantidade"><br><br>

            <label for="categoria">Categoria:</label>
            <select id="categoria_id" name="categoria">
                <option value="1">Vitaminas e Minerais</option>
                <option value="2">Proteínas</option>
                <option value="3">Pré Treinos</option>
                <option value="4">Emagrecedores</option>
            </select><br><br>

            <label>Sobre:</label>
            <textarea name="sobre" placeholder="Informe sobre o produto"></textarea><br><br>

            <label>Benefícios:</label>
            <textarea name="beneficios" placeholder="Informe os benefícios do produto"></textarea><br><br>

            <label>Recomendações de Uso:</label>
            <textarea name="recomendacoes" placeholder="Recomendações de uso do produto"></textarea><br><br>

            <label>Peso:</label>
            <input type="number" name="peso" placeholder="Informe o peso do produto"><br><br>

            <label>Largura:</label>
            <input type="number" name="largura" placeholder="Informe a largura do produto"><br><br>

            <label>Altura:</label>
            <input type="number" name="altura" placeholder="Informe a altura"><br><br>

            <label>Comprimento:</label>
            <input type="number" name="comprimento" placeholder="Informe o comprimento do produto"><br><br>
            
            <input type="submit" value="Cadastrar"><br>
        </form>
    </body>
</html>
