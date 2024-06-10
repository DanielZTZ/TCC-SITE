<?php
session_start();
include_once("conexao.php");

// Função para filtrar produtos por categoria
function filtrarPorCategoria($conn, $categoria_id, $pagina_atual, $por_pagina) {
    $inicio = ($pagina_atual - 1) * $por_pagina;
    $sql = "SELECT p.*, i.imagem 
            FROM produtos p 
            LEFT JOIN imagem_produto i ON p.imagem_id = i.id 
            WHERE p.categoria_id = ? 
            LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $categoria_id, $inicio, $por_pagina);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Função para filtrar produtos por preço
function filtrarPorPreco($conn, $min_preco, $max_preco, $pagina_atual, $por_pagina) {
    $inicio = ($pagina_atual - 1) * $por_pagina;
    $sql = $max_preco === '' ? 
        "SELECT p.*, i.imagem 
         FROM produtos p 
         LEFT JOIN imagem_produto i ON p.imagem_id = i.id 
         WHERE p.preco >= ? 
         LIMIT ?, ?" :
        "SELECT p.*, i.imagem 
         FROM produtos p 
         LEFT JOIN imagem_produto i ON p.imagem_id = i.id 
         WHERE p.preco BETWEEN ? AND ? 
         LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    if ($max_preco === '') {
        $stmt->bind_param("iii", $min_preco, $inicio, $por_pagina);
    } else {
        $stmt->bind_param("ddii", $min_preco, $max_preco, $inicio, $por_pagina);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    if (!$result) {
        die("Erro na consulta: " . $conn->error);
    }
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Lógica de paginação
$por_pagina = 9;
$total_produtos = $conn->query("SELECT COUNT(*) AS total FROM produtos")->fetch_assoc()['total'];
$total_paginas = ceil($total_produtos / $por_pagina);

$pagina_atual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$inicio = ($pagina_atual - 1) * $por_pagina;

$produtos = [];
if (isset($_GET['categoria_id'])) {
    $categoria_id = (int)$_GET['categoria_id'];
    $produtos = filtrarPorCategoria($conn, $categoria_id, $pagina_atual, $por_pagina);
} elseif (isset($_GET['min_preco']) && isset($_GET['max_preco'])) {
    $min_preco = (float)$_GET['min_preco'];
    $max_preco = $_GET['max_preco'] === '' ? '' : (float)$_GET['max_preco'];
    $produtos = filtrarPorPreco($conn, $min_preco, $max_preco, $pagina_atual, $por_pagina);
} else {
    $sql = "SELECT p.*, i.imagem 
            FROM produtos p 
            LEFT JOIN imagem_produto i ON p.imagem_id = i.id 
            LIMIT ?, ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $inicio, $por_pagina);
    $stmt->execute();
    $result = $stmt->get_result();
    $produtos = $result->fetch_all(MYSQLI_ASSOC);
}

// Array com as categorias
$categorias = [
    ["id" => 1, "nome" => "Vitaminas e Minerais"],
    ["id" => 2, "nome" => "Proteínas"],
    ["id" => 3, "nome" => "Pré Treinos"],
    ["id" => 4, "nome" => "Emagrecedores"]
];
?>

<!doctype html>
<html lang="pt-br">
<head>
    <title>Produtos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="stylesproduto.css">
</head>
<body>
    <header class="header bg-light sticky-top border-bottom shadow-sm">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="principal.html">
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
                            <a class="nav-link" href="exercicios_git.html">Exercícios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="noticia22.php">Notícias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login_tcc.php">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Cadastro_cliente_git.php">Cadastre-se</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container-fluid mt-2 col-lg-10">
            <div class="row">
                <div class="col-md-2 p-4">
                    <div class="fw-bold mb-3 display-9">Categorias</div>
                    <?php foreach($categorias as $key => $categoria): ?>
                        <div class="row">
                            <a href="produtos.php?categoria_id=<?= $key + 1 ?>&pagina=<?= $pagina_atual ?>" class="w-100 mb-2 d-block categoria-link"><?= $categoria ?></a>
                        </div>
                    <?php endforeach; ?>

                    <div class="fw-bold mb-3 mt-3 display-9">Filtrar por Preço</div>
                    <!-- Filtro por Preço -->
                    <div class="row">
                        <a href="produtos.php?min_preco=1&max_preco=49.99&pagina=<?= $pagina_atual ?>" class="w-100 mb-2 d-block categoria-link">de R$ 1,00 até R$ 49,99</a>
                    </div>
                    <div class="row">
                        <a href="produtos.php?min_preco=50&max_preco=99.99&pagina=<?= $pagina_atual ?>" class="w-100 mb-2 d-block categoria-link">de R$ 50,00 até R$ 99,99</a>
                    </div>
                    <div class="row">
                        <a href="produtos.php?min_preco=100&max_preco=149.99&pagina=<?= $pagina_atual ?>" class="w-100 mb-2 d-block categoria-link">de R$ 100,00 até R$ 149,99</a>
                    </div>
                    <div class="row">
                        <a href="produtos.php?min_preco=150&pagina=<?= $pagina_atual ?>" class="w-100 mb-2 d-block categoria-link">mais de R$ 149,99</a>
                    </div>
                </div>

                <div class="col-md-10 p-4 mt-4">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="text-start">Produtos</h2>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php foreach($produtos as $produto): ?>
                            <div class="col">
                                <a href="produto.php?produto_id=<?= $produto['produto_id'] ?>" class="card-link">
                                    <div class="card rounded-0 border-0">
                                        <?php
                                            // Consulta para obter o caminho da imagem usando o ID da imagem
                                            $imagem_id = $produto['imagem_id'];
                                            $consulta_imagem = "SELECT imagem FROM imagem_produto WHERE id = $imagem_id";
                                            $resultado_imagem = mysqli_query($conn, $consulta_imagem);
                                            $linha_imagem = mysqli_fetch_assoc($resultado_imagem);
                                            $caminho_imagem = $linha_imagem['imagem'];
                                        ?>
                                        <img src="<?= $caminho_imagem ?>" class="card-img-top rounded-0" alt="...">
                                        <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <h5 class="card-title"><?= $produto['nome'] ?></h5>
                                            <h6 class="card-price text-success">R$ <?= number_format($produto['preco'], 2) ?></h6>
                                            <p class="card-text"><?= $produto['sobre'] ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="row justify-content-center mt-4">
                        <div class="col-md-10">
                            <nav aria-label="Page navigation" class="d-flex justify-content-center">
                                <ul class="pagination">
                                    <li class="page-item <?= $pagina_atual <= 1 ? 'disabled' : '' ?>">
                                        <a class="page-link" href="produtos.php?pagina=<?= $pagina_atual - 1 ?>" tabindex="-1" aria-disabled="true">Anterior</a>
                                    </li>
                                    <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                                        <li class="page-item <?= $i == $pagina_atual ? 'active' : '' ?>">
                                            <a class="page-link" href="produtos.php?pagina=<?= $i ?>"><?= $i ?></a>
                                        </li>
                                    <?php endfor; ?>
                                    <li class="page-item <?= $pagina_atual >= $total_paginas ? 'disabled' : '' ?>">
                                        <a class="page-link" href="produtos.php?pagina=<?= $pagina_atual + 1 ?>">Próximo</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4lJQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
