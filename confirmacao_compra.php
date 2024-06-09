<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Compra</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Adicione os links para os arquivos CSS necessários, se houver -->
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-3">Confirmação de Compra</h1>
        <!-- Conteúdo da página aqui -->
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
            // Se algum parâmetro estiver faltando, redireciona para a página inicial ou outra página de erro
            window.location.href = 'produtos.php';
        }

        // Adiciona um evento de clique ao botão de confirmar compra
        document.getElementById('confirm-button').addEventListener('click', function() {
            // Verifica se o usuário está logado
            <?php if (!isset($_SESSION['usuario_id'])) : ?>
                // Se não estiver logado, redireciona para a página de login
                window.location.href = 'login_tcc.php';
            <?php else : ?>
                // Se estiver logado, envia o formulário
                document.getElementById('purchase-form').submit();
            <?php endif; ?>
        });
    </script>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
