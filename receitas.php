<?php
require_once "conexao.php"; // Inclui o arquivo de conexão com o banco de dados

// Função para buscar receitas por categoria (doce ou salgado)
function buscarReceitasPorCategoria($conn, $categoria) {
    $sql = "SELECT r.id_receita, r.titulo, r.descricao, img.imagem AS id_ImgReceita, r.link
            FROM receitas AS r
            JOIN categoria_receita AS c ON r.id_categoria = c.id_categoria
            JOIN imagem_receita AS img ON r.id_ImgReceita = img.id_ImgReceita
            WHERE c.nome = '$categoria'";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

$receitas_doces = buscarReceitasPorCategoria($conn, 'Doces');
$receitas_salgadas = buscarReceitasPorCategoria($conn, 'Salgados');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas Saudáveis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="receitas.css">
</head>
<body>

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
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="principal.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#contato">Receitas</a></li>
                    <li class="nav-item"><a class="nav-link" href="produtos.php">Produtos</a></li>
                    <li class="nav-item"><a class="nav-link" href="exercicios_git.html">Exercícios</a></li>
                    <li class="nav-item"><a class="nav-link" href="noticia22.php">Notícias</a></li>
                    <li class="nav-item"><a class="nav-link" href="login_tcc.php">Entrar</a></li>
                    <li class="nav-item"><a class="nav-link" href="Cadastro_cliente_git.php">Cadastre-se</a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div class="container mt-5">
    <h1 class="mb-4">Receitas Saudáveis</h1>

    <h2 class="mb-4">Receitas Doces</h2>
    <div class="row  align-items-stretch">
        <?php foreach ($receitas_doces as $receita): ?>
            <div class="col-md-6">
                <div class="shadow p-4 mb-4 bg-white">
                    <div class="card mb-4">
                        <img src="<?php echo $receita['id_ImgReceita']; ?>" class="card-img-top" alt="Imagem da Receita">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $receita['titulo']; ?></h5>
                            <p class="card-text"><?php echo $receita['descricao']; ?></p>
                            <a href="<?php echo $receita['link']; ?>" class="btn btn-success" target="_blank">Leia mais</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h2 class="mb-4">Receitas Salgadas</h2>
    <div class="row  align-items-stretch">
        <?php foreach ($receitas_salgadas as $receita): ?>
            <div class="col-md-6">
                <div class="shadow p-4 mb-4 bg-white">
                    <div class="card mb-4">
                        <img src="<?php echo $receita['id_ImgReceita']; ?>" class="card-img-top" alt="Imagem da Receita">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $receita['titulo']; ?></h5>
                            <p class="card-text"><?php echo $receita['descricao']; ?></p>
                            <a href="<?php echo $receita['link']; ?>" class="btn btn-success" target="_blank">Leia mais</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer class="site-footer bg-light">
    <div class="container">
        <div class="footer-top text-center mb-3">
            <h4>Vida Saudável</h4>
            <p>Viva melhor, viva mais.</p>
        </div>
        <hr>
        <div class="d-none d-lg-block text-center mb-4">
            <span>Conecte-se conosco nas redes sociais:</span>
        </div>
        <div class="contact-icons text-center mb-3">
            <img src="img/whatsapp.png" alt="Ícone de telefone" class="contact-icon">
            <img src="img/instagram.png" alt="Ícone de e-mail" class="contact-icon">
            <img src="img/email.png" alt="Ícone de localização" class="contact-icon">
        </div>
        <div class="copy-right text-center mt-3">
            © 2024 Direitos Reservados: <a class="text-reset fw-bold" href="https://seusite.com/">seusite.com</a>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>