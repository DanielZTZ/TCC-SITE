<?php
include_once("conexao.php");
include_once("autenticacao.php");

// Função para verificar o login e retornar o JSON
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'verificar_login') {
    $response = [
        'logged_in' => isset($_SESSION['usuarioEmail'])
    ];

    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Compra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="stylesproduto.css">
</head>
<body>
    <header class="header bg-light sticky-top border-bottom shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="principal.php">
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
                            <a class="nav-link" href="exercicios_git.php">Exercícios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="noticia22.php">Notícias</a>
                        </li>
                        <?php if (usuarioEstaLogado()): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="logout.php">Sair</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login_tcc.php">Entrar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="Cadastro_cliente_git.php">Cadastre-se</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="container mt-5">
        <h1 class="mb-3">Confirmação de Compra</h1>
        <p>Você está prestes a comprar o produto com o ID: <strong id="product-id"></strong>, na quantidade de: <strong id="product-quantity"></strong>.</p>
        <form action="processar_compra.php" method="post" id="purchase-form">
            <input type="hidden" name="usuario_email" value="<?php echo isset($_SESSION['usuarioEmail']) ? $_SESSION['usuarioEmail'] : ''; ?>">
            <input type="hidden" name="produto_id" id="hidden-product-id">
            <input type="hidden" name="quantidade" id="hidden-quantity">
            <button type="button" class="btn btn-success" id="confirm-button">Confirmar Compra</button>
        </form>
    </div>
    <script>
        // Recupera os parâmetros da URL
        const urlParams = new URLSearchParams(window.location.search);
        const produtoId = urlParams.get('produto_id');
        const quantidade = urlParams.get('quantidade');

        // Exibe as informações no HTML
        document.getElementById('product-id').textContent = produtoId;
        document.getElementById('product-quantity').textContent = quantidade;
        document.getElementById('hidden-product-id').value = produtoId;
        document.getElementById('hidden-quantity').value = quantidade;

        // Verifica se os parâmetros foram passados
        if (!produtoId || !quantidade) {
            window.location.href = 'produtos.php';
        }

        // Adiciona um evento de clique ao botão de confirmar compra
        document.getElementById('confirm-button').addEventListener('click', function() {
            fetch('?action=verificar_login')
                .then(response => response.json())
                .then(data => {
                    if (data.logged_in) {
                        document.getElementById('purchase-form').submit();
                    } else {
                        window.location.href = 'login_tcc.php';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Ocorreu um erro ao verificar o login.');
                });
        });
    </script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
