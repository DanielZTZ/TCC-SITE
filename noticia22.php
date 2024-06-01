<<?php require_once "conexao.php" ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Notícias</title>
  <!-- Inclua os arquivos CSS do Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="noticias.css" rel="stylesheet">
  <style>
    .card-img {
        width: 100%;
        height: 200px; /* Defina a altura desejada para todas as imagens */
        object-fit: cover; /* Isso garante que a imagem preencha todo o espaço da caixa mantendo a proporção */
    }

    .card:hover {
        transform: translateY(-5px); /* Move o card para cima 5px quando o mouse passa por cima */
        transition: transform 0.3s ease; /* Adiciona uma transição suave */
        box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3); /* Adiciona uma sombra suave */
    }
</style>

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
                        <a class="nav-link" href="pricipal.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contato">Receitas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produtos.html">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#servicos">Exercícios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="noticia22.php">Notícias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contato">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contato">Cadastre-se</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div class="container mt-5">
    <div class="row">
        <?php


// Consulta SQL para buscar as notícias
// Consulta SQL para buscar as notícias
$sql = "SELECT n.titulo, n.texto, n.link, img.caminho AS caminho_imagem
        FROM noticia AS n
        INNER JOIN imagem_noticia AS img ON n.imagem_noticia_id = img.id
        ORDER BY RAND() LIMIT 7";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Variável para controlar o número de iterações
    $count = 0;
    
    // Exibe as notícias
    while($row = $result->fetch_assoc()) {
        // Incrementa o contador
        $count++;
        
        // Define a classe do card com base no contador
        $card_class = ($count == 1) ? 'col-lg-15 mb-4' : 'col-lg-4 mb-4';

        // Define a classe do texto com base no contador
        $text_class = ($count == 1) ? 'card-text text-start' : 'card-text';

        // Abre a div do card
        echo '<div class="' . $card_class . '">';
        echo '<div class="card bg-light">';

        // Verifica se é a primeira notícia (notícia principal)
        if ($count == 1) {
            echo '<div class="card-header"></div>';
        }

        // Imagem do card
        $caminho_imagem = $row["caminho_imagem"]; // caminho da imagem da notícia
        echo '<img src="' . $caminho_imagem . '" class="card-img card-img-top" alt="Imagem da notícia">';

        // Corpo do card
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $row["titulo"] . '</h5>';
        $texto = $row["texto"];
        if (strlen($texto) > 140 && $count != 1) {
            $texto = substr($texto, 0, 140) . '...';
        }
        echo '<p class="' . $text_class . '">' . $texto . '</p>';
        echo '<a href="' . $row["link"] . '" class="btn btn-success" target="_blank">Ler mais</a>';
        echo '</div>'; // Fecha o corpo do card
        echo '</div>'; // Fecha o card
        echo '</div>'; // Fecha a div do card
    }
} else {
    echo "0 resultados";
}
$conn->close();



?>

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

<!-- Inclua o arquivo JavaScript do Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
