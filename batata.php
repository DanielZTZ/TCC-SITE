<!doctype html>
<html lang="en">
<head>
    <title>Produto</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
          crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="stylesproduto.css">
</head>
<body>
<main>
    <div class="container-fluid col-lg-10">
        <?php
        // Conectar ao banco de dados
        $conn = new mysqli('localhost', 'root', '', 'site');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $produtoId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        $sql = "SELECT * FROM Produtos WHERE produto_id = $produtoId";
        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0) {
            $produto = $resultado->fetch_assoc();
            ?>

            <div class="row justify-content-center">
                <div class="col-lg-5 d-flex justify-content-center max-width-container1">
                    <!-- Container da imagem do produto -->
                    <img src="<?php echo $produto['imagem']; ?>" class="img-fluid" alt="<?php echo $produto['nome']; ?>">
                </div>
                <div class="col-lg-4 d-flex flex-column align-items-center max-width-container2 mt-5">
                    <!-- Tabela de compra -->
                    <h2><?php echo $produto['nome']; ?></h2>

                    <hr class="w-100">

                    <h3 class="preco-produto text-success">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></h3>
                    <!-- Cálculo de parcelas e desconto poderia ser mais complexo, ajuste conforme a necessidade -->
                    <p>Até 3x de R$ <?php echo number_format($produto['preco'] / 3, 2, ',', '.'); ?> sem juros</p>
                    <p>Desconto à vista 5%</p>

                    <!-- Botões de aumentar e diminuir a quantidade e Botão de comprar -->
                    <div class="d-flex align-items-center mb-3 w-100 justify-content-around">
                        <button class="btn btn-outline-secondary" id="btn-decrease">-</button>
                        <input type="text" class="form-control text-center mx-2" value="1" style="max-width: 60px;">
                        <button class="btn btn-outline-secondary" id="btn-increase">+</button>
                        <button class="btn btn-success ms-2" style="flex-grow: 1; max-width: 70%;">Comprar</button>
                    </div>

                    <hr class="w-100">

                    <!-- Área de cálculo do frete (funcionalidade de backend não implementada) -->
                    <div class="text-start w-100">
                        <label for="freteInput" class="form-label">Calcule o frete</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="freteInput" placeholder="Digite seu CEP">
                            <button class="btn btn-outline-secondary" type="button" id="btnCalcFrete">Calcular</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        <h2 class="text-center mb-4">Descrição</h2>
                        <div>
                            <h5><strong>Sobre o produto:</strong></h5>
                            <p><?php echo $produto['sobre']; ?></p>
                        </div>
                        <div>
                            <h5><strong>Benefícios:</strong></h5>
                            <p><?php echo $produto['beneficios']; ?></p>
                        </div>
                        <div>
                            <h5><strong>Recomendações de Uso:</strong></h5>
                            <p><?php echo $produto['recomendacoes']; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <?php
        } else {
            echo "<p>Produto não encontrado.</p>";
        }
        $conn->close();
        ?>
    </div>
</main>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIeT3D1W4BDDZzX4/fbqB4AEowrT5yZ5OWvtJq5Oq00H+zV2x8CzN8Zr"
        crossorigin="anonymous"></script>
</body>
</html>
