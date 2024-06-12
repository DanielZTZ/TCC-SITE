<?php
session_start();

// Função para verificar o login e retornar o JSON
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'verificar_login') {
    $response = [
        'logged_in' => isset($_SESSION['usuario_id'])
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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-3">Confirmação de Compra</h1>
        <p>Você está prestes a comprar o produto com o ID: <strong id="product-id"></strong>, na quantidade de: <strong id="product-quantity"></strong>.</p>
        <form action="processar_compra.php" method="post" id="purchase-form">
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
