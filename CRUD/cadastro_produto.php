<?php
session_start();
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
        <form method="POST" action="proc_cad_img.php" enctype="multipart/form-data">
            <label>Nome:</label>
            <input type="text" name="nome" placeholder="Digite o nome"><br><br>

            <label>Preço:</label>
            <input type="text" name="preco" placeholder="Informe o preço"><br><br>

            <label>Estoque:</label>
            <input type="text" name="estoque" placeholder="Informe a quantidade"><br><br>

            <label for="categoria">Categoria:</label>
            <select id="categoria_id" name="categoria">
                <option value="1">Vitaminas e Minerais</option>
                <option value="2">Proteínas</option>
                <option value="3">Pré Treinos</option>
                <option value="4">Emagrecedores</option>
            </select><br><br>

            <label>Sobre:</label>
            <input type="text" name="sobre" placeholder="Informe sobre o produto"><br><br>

            <label>Benefícios:</label>
            <input type="text" name="beneficios" placeholder="Informe os benefícios do produto"><br><br>

            <label>Recomendações de Uso:</label>
            <input type="text" name="recomendacoes" placeholder="Recomendações de uso do produto"><br><br>

            <label>Peso:</label>
            <input type="text" name="peso" placeholder="Informe o peso do produto"><br><br>

            <label>Largura:</label>
            <input type="text" name="largura" placeholder="Informe a Largura do produto"><br><br>

            <label>Altura:</label>
            <input type="text" name="altura" placeholder="Informe a altura"><br><br>

            <label>Comprimento:</label>
            <input type="text" name="comprimento" placeholder="Informe o comprimento do produto"><br><br>
            
            <label>Insira uma imagem</label>
            <input type="file" name="imagem"><br><br>

            <label>Nome da Imagem:</label>
            <input type="text" name="nome_imagem" placeholder="Digite o nome da imagem"><br><br>
            
            <input name="SendCadImg" type="submit" value="Cadastrar">
        </form>
    </body>
</html>