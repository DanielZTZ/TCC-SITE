<?php
include_once("conexao.php");
include_once("autenticacao.php");

// Função para obter todas as categorias do banco de dados
function obterCategorias($conn) {
    $sql = "SELECT categoria_id, nome FROM categorias";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Função para filtrar produtos
function filtrarProdutos($conn, $categoria_id, $min_preco, $max_preco, $pagina_atual, $por_pagina) {
    $inicio = ($pagina_atual - 1) * $por_pagina;
    $sql = "SELECT p.*, i.imagem 
            FROM produtos p 
            LEFT JOIN imagem_produto i ON p.imagem_id = i.id 
            WHERE 1=1";

    $params = [];
    $types = '';

    // Adicionando filtro de categoria
    if ($categoria_id !== null) {
        $sql .= " AND p.categoria_id = ?";
        $types .= 'i';
        $params[] = $categoria_id;
    }

    // Adicionando filtro de preço
    if ($min_preco !== null && $max_preco !== null) {
        $sql .= " AND p.preco BETWEEN ? AND ?";
        $types .= 'dd';
        $params[] = $min_preco;
        $params[] = $max_preco;
    } elseif ($min_preco !== null) {
        $sql .= " AND p.preco >= ?";
        $types .= 'd';
        $params[] = $min_preco;
    }

    $sql .= " LIMIT ?, ?";
    $types .= 'ii';
    $params[] = $inicio;
    $params[] = $por_pagina;

    $stmt = $conn->prepare($sql);
    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Obtendo categorias do banco de dados
$categorias = obterCategorias($conn);

// Lógica de paginação
$por_pagina = 9;
$total_produtos = $conn->query("SELECT COUNT(*) AS total FROM produtos")->fetch_assoc()['total'];
$total_paginas = ceil($total_produtos / $por_pagina);

$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$categoria_id = isset($_GET['categoria_id']) ? (int)$_GET['categoria_id'] : null;
$min_preco = isset($_GET['min_preco']) ? (float)$_GET['min_preco'] : null;
$max_preco = isset($_GET['max_preco']) && $_GET['max_preco'] !== '' ? (float)$_GET['max_preco'] : null;

$produtos = filtrarProdutos($conn, $categoria_id, $min_preco, $max_preco, $pagina_atual, $por_pagina);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Produtos</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="stylesproduto.css">
</head>
<body>
    <main>
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
        <div class="container-fluid mt-2 col-lg-10">
            <div class="row">
                <div class="col-md-2 p-4">
                    <div class="fw-bold mb-3 display-9">Categorias</div>
                    <?php foreach ($categorias as $categoria): ?>
                        <div class="row">
                            <a href="produtos.php?categoria_id=<?= $categoria['categoria_id'] ?>&pagina=<?= $pagina_atual ?>" class="w-100 mb-2 d-block categoria-link"><?= $categoria['nome'] ?></a>
                        </div>
                    <?php endforeach; ?>

                    <div class="fw-bold mb-3 mt-3 display-9">Filtrar por Preço</div>
                    <!-- Filtro por Preço -->
                    <div class="row">
                        <a href="produtos.php?min_preco=1&max_preco=49.99&categoria_id=<?= $categoria_id ?>&pagina=<?= $pagina_atual ?>" class="w-100 mb-2 d-block categoria-link">de R$ 1,00 até R$ 49,99</a>
                    </div>
                    <div class="row">
                        <a href="produtos.php?min_preco=50&max_preco=99.99&categoria_id=<?= $categoria_id ?>&pagina=<?= $pagina_atual ?>" class="w-100 mb-2 d-block categoria-link">de R$ 50,00 até R$ 99,99</a>
                    </div>
                    <div class="row">
                        <a href="produtos.php?min_preco=100&max_preco=149.99&categoria_id=<?= $categoria_id ?>&pagina=<?= $pagina_atual ?>" class="w-100 mb-2 d-block categoria-link">de R$ 100,00 até R$ 149,99</a>
                    </div>
                    <div class="row">
                        <a href="produtos.php?min_preco=150&categoria_id=<?= $categoria_id ?>&pagina=<?= $pagina_atual ?>" class="w-100 mb-2 d-block categoria-link">mais de R$ 149,99</a>
                    </div>
                </div>

                <div class="col-md-10 p-4 mt-4">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-start">Produtos</h2>
                        </div>
                    </div>

                    <div class="container mt-4">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <?php foreach ($produtos as $produto): ?>
                                <div class="col">
                                    <a href="produto.php?produto_id=<?= $produto['produto_id'] ?>" class="card-link">
                                        <div class="card rounded-0 border-0">
                                            <img src="<?= $produto['imagem'] ?>" class="card-img-top rounded-0" alt="...">
                                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                                <h5 class="card-title"><?= $produto['nome'] ?></h5>
                                                <h6 class="card-price text-success">R$ <?= number_format($produto['preco'], 2) ?></h6>
                                                <div class="scrolling-text">
                                                    <p class="card-text"><?= $produto['sobre'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-md-10">
                <nav aria-label="Page navigation" class="d-flex justify-content-center">
                    <ul class="pagination">
                        <li class="page-item <?= $pagina_atual <= 1 ? 'disabled' : '' ?>">
                            <a class="page-link" href="produtos.php?pagina=<?= $pagina_atual - 1 ?>&categoria_id=<?= $categoria_id ?>&min_preco=<?= $min_preco ?>&max_preco=<?= $max_preco ?>" tabindex="-1" aria-disabled="true">Anterior</a>
                        </li>
                        <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                            <li class="page-item <?= $i == $pagina_atual ? 'active' : '' ?>">
                                <a class="page-link" href="produtos.php?pagina=<?= $i ?>&categoria_id=<?= $categoria_id ?>&min_preco=<?= $min_preco ?>&max_preco=<?= $max_preco ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item <?= $pagina_atual >= $total_paginas ? 'disabled' : '' ?>">
                            <a class="page-link" href="produtos.php?pagina=<?= $pagina_atual + 1 ?>&categoria_id=<?= $categoria_id ?>&min_preco=<?= $min_preco ?>&max_preco=<?= $max_preco ?>">Próximo</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
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
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4lJQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>

