<?php
include_once("conexao.php");
include_once("autenticacao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicios 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <link href="principal.css" rel="stylesheet">
</head>
<body>

    <!-- Barra de navegação -->
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
                            <a class="nav-link" href="produtos.php">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="exercicios_git.php">Exercícios</a>
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

   <div class="container mt-5 d-flex justify-content-center">
    <a href="exercicios_fisio_git.php" class="card btn" style="width: 18rem; margin-right: 15px; border: 2px solid green; text-decoration: none; color: black;">
        <div class="card-body">
            <h5 class="card-title text-center" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">Exercicios fisioterapia</h5>
            <p class="card-text text-left" style="overflow: hidden; text-overflow: ellipsis;"></p>
        </div>
        <img class="card-img-bottom" src="img/fisio.jpeg" alt="Card image" style="width:100%">
    </a>

    <a href="exercicios_musculo_git.php" class="card btn" style="width: 18rem; margin-right: 15px; border: 2px solid green; text-decoration: none; color: black;">
        <div class="card-body">
            <h5 class="card-title text-center" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">Exercicios Musculação</h5>
            <p class="card-text text-left" style="overflow: hidden; text-overflow: ellipsis;"></p>
        </div>
        <img class="card-img-bottom" src="img/musculo.jpg" alt="Card image" style="width:100%">
    </a>

    <a href="exercicios_magre_git.php" class="card btn" style="width: 18rem; border: 2px solid green; text-decoration: none; color: black;">
        <div class="card-body">
            <h5 class="card-title text-center" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">Exercicios Emagrecer</h5>
            <p class="card-text text-left" style="overflow: hidden; text-overflow: ellipsis;"></p>
        </div>
        <img class="card-img-bottom" src="img/magre.jpg" alt="Card image" style="width:100%">
    </a>
</div>

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
</body>
</html>
