<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Cadastrar Produto</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>
    <body>
    <div class="container mt-5">
        <h1 class="mb-4">Cadastrar Produto</h1>
        <?php
        if (isset($_SESSION['msg'])) {
            echo "<div class='alert alert-info'>" . $_SESSION['msg'] . "</div>";
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" action="recebe_produto.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" placeholder="Digite o nome" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Preço:</label>
                <input type="number" class="form-control" name="preco" placeholder="Informe o preço" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Estoque:</label>
                <input type="number" class="form-control" name="estoque" placeholder="Informe a quantidade" required>
            </div>

            <div class="mb-3">
                <label class="form-label" for="categoria">Categoria:</label>
                <select class="form-select" id="categoria_id" name="categoria" required>
                    <option value="1">Vitaminas e Minerais</option>
                    <option value="2">Proteínas</option>
                    <option value="3">Pré Treinos</option>
                    <option value="4">Emagrecedores</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Sobre:</label>
                <textarea class="form-control" name="sobre" placeholder="Informe sobre o produto" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Benefícios:</label>
                <textarea class="form-control" name="beneficios" placeholder="Informe os benefícios do produto" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Recomendações de Uso:</label>
                <textarea class="form-control" name="recomendacoes" placeholder="Recomendações de uso do produto" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Peso:</label>
                <input type="number" class="form-control" name="peso" placeholder="Informe o peso do produto" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Largura:</label>
                <input type="number" class="form-control" name="largura" placeholder="Informe a largura do produto" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Altura:</label>
                <input type="number" class="form-control" name="altura" placeholder="Informe a altura" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Comprimento:</label>
                <input type="number" class="form-control" name="comprimento" placeholder="Informe o comprimento do produto" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>
