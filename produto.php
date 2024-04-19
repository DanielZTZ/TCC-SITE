<?php
require_once "conexao.php"; // Inclui o arquivo conexao.php que contém a conexão com o banco de dados

/* //Calcular frete
function calcularFrete($cepDestino) {
    $url = "URL_DA_API_DE_FRETE"; // Substitua pela URL real da API
    $dados = [
        'cep_origem' => 'CEP_DE_ORIGEM',
        'cep_destino' => $cepDestino,
        // Adicione outros parâmetros necessários pela API
    ];

    // Inicia cURL
    $ch = curl_init($url);

    // Configuração do cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dados));

    // Executa a solicitação
    $response = curl_exec($ch);
    curl_close($ch);

    // Converte a resposta
    $resultado = json_decode($response, true);

    return $resultado;
}
//Função que conterá os dados do cálculo, exibir com js
echo json_encode($resultadoFrete);*/

// Pegar o produto_id da URL
$produto_id = isset($_GET['produto_id']) ? (int) $_GET['produto_id'] : 0;

// Pegar o produto_id da URL
$produto_id = isset($_GET['produto_id']) ? (int) $_GET['produto_id'] : 0;

// Preparar e executar a consulta SQL para pegar os detalhes do produto
$stmt = $conn->prepare("SELECT * FROM Produtos WHERE produto_id = ?");
$stmt->bind_param("i", $produto_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    // Variáveis para os detalhes do produto
    $nome = $row['nome'];
    $preco = $row['preco'];
    $imagem = $row['imagem_id'];
    $sobre = $row['sobre'];
    $beneficios = $row['beneficios'];
    $recomendacoes = $row['recomendacoes'];
    $estoque = $row['estoque']; // Adicione esta linha

    // Supondo que o desconto à vista seja sempre 5%
    $desconto = $preco - ($preco * 0.05);
    // Calculando parcelas (ex: 3x sem juros)
    $parcela = $preco / 3;
} else {
    echo "Produto não encontrado.";
    exit;
}
$stmt->close();

// Consulta SQL para pegar outros produtos (exemplo simples)
$stmt2 = $conn->prepare("SELECT produto_id, nome, preco, imagem_id FROM Produtos WHERE produto_id != ? ORDER BY RAND() LIMIT 4");
$stmt2->bind_param("i", $produto_id);
$stmt2->execute();
$result2 = $stmt2->get_result();

$produtosRecomendados = [];
while ($row = $result2->fetch_assoc()) {
    $produtosRecomendados[] = $row;
}
$stmt2->close();

$conn->close();
?>


<!-- Front End -->
<!doctype html>
<html lang="pt-br">
    <head>
        <title>Produto</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" type="text/css" href="stylesproduto.css">
        <script>
            // Define as variáveis PHP diretamente no script JavaScript
            var maximumQuantity = <?php echo $estoque; ?>;
            var productId = <?php echo $produto_id; ?>;

            function decreaseQuantity() {
                var quantityInput = document.getElementById('quantity');
                var currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            }

            function increaseQuantity() {
                var quantityInput = document.getElementById('quantity');
                var currentValue = parseInt(quantityInput.value);
                if (currentValue < maximumQuantity) {
                    quantityInput.value = currentValue + 1;
                }
            }

            function addToCart() {
                var quantity = parseInt(document.getElementById('quantity').value);
                if (isNaN(quantity) || quantity <= 0) {
                    alert('Por favor, insira uma quantidade válida.');
                    return;
                }

                // Use as variáveis definidas anteriormente
                window.location.href = 'carrinho.php?produto_id=' + productId + '&quantidade=' + quantity;
            }

            /*//Calcular o Frete
            document.getElementById('btnCalcFrete').addEventListener('click', function() {
                // Obter o valor do CEP inserido pelo usuário
                var cep = document.getElementById('freteInput').value;

                // Validar se o CEP foi preenchido
                if (cep.trim() === '') {
                    alert('Por favor, insira um CEP válido.');
                    return;
                }

                // Fazer a solicitação à API de cálculo de frete
                // Aqui você precisa substituir 'URL_DA_API_DE_FRETE' pela URL real da API
                var url = 'URL_DA_API_DE_FRETE?cep=' + cep;

                // Fazer a solicitação usando fetch ou XMLHttpRequest
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        // Exibir o resultado do cálculo de frete na div resultadoFrete
                        document.getElementById('resultadoFrete').innerHTML = 'Frete para ' + cep + ': R$ ' + data.valor;
                    })
                    .catch(error => {
                        console.error('Erro ao calcular frete:', error);
                        alert('Erro ao calcular frete. Por favor, tente novamente mais tarde.');
                    });
            });*/
        </script>
    </head>

    <body>
        <header class="header bg-light sticky-top border-bottom shadow-sm">
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="#">
                        <img src="img/logo.png" alt="Logo" style="height: 50px; width: auto; object-fit: contain;">
                        Vida Saudável
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-auto"> <!-- Alteração na classe para centralizar os links -->
                            <li class="nav-item">
                                <a class="nav-link" href="principal.php">Início</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="receitas.php">Receitas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="produtos.php">Produtos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="exercicios.php">Exercícios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="noticia22.php">Notícias</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cadastro.php">Cadastre-se</a>
                            </li>
                        </ul>
                        
                    </div>
                </nav>
            </div>
        </header>

        <main>
            <div class="container-fluid col-lg-10">
                <?php
                // Seu script de conexão e busca de produto já foram executados aqui.
                if ($produto_id > 0) {
                    ?>

                    <div class="row justify-content-center">
                        <div class="col-lg-5 d-flex justify-content-center max-width-container1">
                            <!-- Container da imagem do produto -->
                            <img src="<?php echo $imagem; ?>" class="img-fluid" alt="<?php echo $nome; ?>">
                        </div>
                        <div class="col-lg-4 d-flex flex-column align-items-center max-width-container2 mt-5">
                            <!-- Tabela de compra -->
                            <h2><?php echo $nome; ?></h2>

                            <hr class="w-100">

                            <h3 class="preco-produto text-success">R$ <?php echo number_format($preco, 2, ',', '.'); ?></h3>
                            <p>Até 3x de R$ <?php echo number_format($parcela, 2, ',', '.'); ?> sem juros</p>
                            <p>Desconto à vista 5%</p>

                            <div class="d-flex align-items-center mb-3 w-100 justify-content-around">
                            <button class="btn btn-outline-secondary" id="btn-decrease" onclick="decreaseQuantity()">-</button>
                            <input type="text" class="form-control text-center mx-2" id="quantity" value="1" style="max-width: 60px;">
                            <button class="btn btn-outline-secondary" id="btn-increase" onclick="increaseQuantity()">+</button>
                            <button class="btn btn-success ms-2" style="flex-grow: 1; max-width: 70%;" onclick="addToCart()">Comprar</button>
                        </div>

                            <hr class="w-100">

                            <div class="text-start w-100">
                                <label for="freteInput" class="form-label">Calcule o frete</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="freteInput" placeholder="Digite seu CEP">
                                    <button class="btn btn-outline-secondary" type="button" id="btnCalcFrete">Calcular</button>
                                </div>
                                <div id="resultadoFrete"></div> <!-- Aqui será exibido o resultado do cálculo de frete -->
                            </div>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center mb-4">Descrição</h2>
                                <!-- Supondo que sobre, beneficios e recomendacoes são detalhes adicionais -->
                                <h5><strong>Sobre o produto:</strong></h5>
                                <p><?php echo $sobre; ?></p>
                                <h5><strong>Benefícios:</strong></h5>
                                <p><?php echo $beneficios; ?></p>
                                <h5><strong>Recomendações de Uso:</strong></h5>
                                <p><?php echo $recomendacoes; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="text-center mb-4">Aproveite e compre também</h2>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            if (!empty($produtosRecomendados)) {
                                foreach ($produtosRecomendados as $produtoRelacionado) {
                                    ?>
                                    <div class="col-sm-6 col-md-3 mb-4">
                                        <a href="produto.php?produto_id=<?= $produtoRelacionado['produto_id'] ?>" class="card-link">
                                            <div class="card rounded-0 border-0">
                                                <img src="<?= $produtoRelacionado['imagem_id'] ?>" class="card-img-top rounded-0" alt="<?= $produtoRelacionado['nome'] ?>">
                                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                                    <h5 class="card-title"><?= $produtoRelacionado['nome'] ?></h5>
                                                    <h6 class="card-price text-success">R$ <?= number_format($produtoRelacionado['preco'], 2, ',', '.') ?></h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "<div class='col-12'><p class='text-center'>Nenhum produto relacionado encontrado.</p></div>";
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                } else {
                    echo "<p>Produto não encontrado.</p>";
                }
                ?>
            </div>
        </main>

        <footer class="site-footer bg-light">
            <div class="container">
                <!-- Parte superior do footer: logotipo e slogan -->
                <div class="footer-top text-center mb-3">
                    <h4>Vida Saudável</h4>
                    <p>Viva melhor, viva mais.</p>
                </div>
                
                <!-- Linha separadora -->
                <hr>
        
                <!-- Ícones de contato -->
                <div class="d-none d-lg-block text-center mb-4">
                    <span>Conecte-se conosco nas redes sociais:</span>
                </div>
                <div class="contact-icons text-center mb-3">
                    <img src="img/whatsapp.png" alt="Ícone de telefone" class="contact-icon">
                    <img src="img/instagram.png" alt="Ícone de e-mail" class="contact-icon">
                    <img src="img/email.png" alt="Ícone de localização" class="contact-icon">
                    <!-- Adicione mais ícones conforme necessário -->
                </div>                
                
        
                <!-- Direitos autorais -->
                <div class="copy-right text-center mt-3">
                    © 2024 Direitos Reservados:
                    <a class="text-reset fw-bold" href="https://seusite.com/">seusite.com</a> 
                </div>
            </div>
        </footer>
        
        
        
        
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>

        

    </body>
</html>