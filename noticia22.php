<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Notícias</title>
  <!-- Inclua os arquivos CSS do Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="noticias.css" rel="stylesheet">
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
                        <a class="nav-link active" href="noticia22.html">Notícias</a>
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
        // Conexão com o banco de dados (substitua essas informações pelas suas)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "site";

        // Cria a conexão
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifica a conexão
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        // Consulta SQL para buscar as notícias
        $sql = "SELECT * FROM noticia ORDER BY RAND() LIMIT 6";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Exibe as notícias
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-lg-4 mb-4">';
                echo '<div class="card bg-light">';
                echo '<img src="' . $row["imagem"] . '" class="card-img-top" alt="Imagem da notícia">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["titulo"] . '</h5>';
                echo '<p class="card-text">' . $row["texto"] . '</p>';
                echo '<a href="' . $row["link"] . '" class="btn btn-success" target="_blank">Ler mais</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
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
