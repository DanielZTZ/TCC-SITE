<?php
require_once "conexao.php" ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias e Produtos Saudáveis</title>
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
                            <a class="nav-link active" href="principal.php">Início</a>
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
                            <a class="nav-link" href="noticia22.php">Notícias</a>
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

    <!-- Carrossel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="image/creatina3.webp" class="d-block w-100" style="height: 300px; object-fit: cover;" alt="...">
              <div class="carousel-caption d-none d-md-block">
                  <h5>Compre suplementos!</h5>
                  <p>Ajudam a ter uma vida melhor</p>
              </div>
          </div>
          <div class="carousel-item">
              <img src="image/whey.webp" class="d-block w-100" style="height: 300px; object-fit: cover;" alt="...">
              <div class="carousel-caption d-none d-md-block">
                  <h5>Veja receitas</h5>
                  <p>Varias ideias para te ajudar na dieta</p>
              </div>
          </div>
          <div class="carousel-item">
              <img src="image/cafe.webp" class="d-block w-100" style="height: 300px; object-fit: cover;" alt="...">
              <div class="carousel-caption d-none d-md-block">
                  <h5>Veja Notícias!</h5>
                  <p>Para ter mais conhecimento sobre habitos Saudáveis</p>
              </div>
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Próximo</span>
      </button>
  </div>

  <div class="container mt-5">
  <div class="container mt-5">
        <h2 class="mb-4">Principais Notícias</h2>
        <div class="row">
        
          <?php

            // Consulta para buscar as notícias
            $sql = "SELECT id, titulo, texto, link, imagem FROM noticia ORDER BY RAND() DESC LIMIT 2";
            $resultado = $conn->query($sql);

            // Verifica se encontrou alguma notícia
            if ($resultado->num_rows > 0) {
                // Saída de dados de cada linha
                while($row = $resultado->fetch_assoc()) {
                    echo '<div class="col-md-6">';
                    echo '<div class="shadow p-4 mb-4 bg-white">';
                    echo '<div class="card mb-4">';
                    echo '<img src="'. $row["imagem"] .'" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">'. $row["titulo"] .'</h5>';
                    echo '<p class="card-text">'. $row["texto"] .'</p>';
                    echo '<a href="'. $row["link"] .'" class="btn btn-success" target="_blank">Leia mais</a>';
                    echo '</div></div></div></div>';
                }
            } else {
                echo "0 resultados";
            }
            //$conn->close();
            ?>
        </div>
    </div>
<div class="container mt-5">
    <h2 class="mb-4"> Principais Produtos</h2>
      
    <div class="row">
<?php

            // Consulta para buscar os produtos
            $sql = "SELECT produto_id, nome, imagem_id, preco, sobre FROM produtos ORDER BY RAND() DESC LIMIT 2";
            $resultado = $conn->query($sql);

            // Verifica se encontrou algum produto
            if ($resultado->num_rows > 0) {
                // Saída de dados de cada linha
                while($row = $resultado->fetch_assoc()) {
                    echo '<div class="col-md-6">';
                    echo '<div class="shadow p-4 mb-4 bg-white">';
                    echo '<div class="card mb-4">';
                    echo '<img src="/img'. $row["imagem_id"] .'" class="card-img-top" alt="...">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">'. $row["nome"] .'</h5>';
                    echo '<p class="card-text">'. $row["sobre"] .'</p>';
                    echo '<a href="produto.php?produto_id=' . $row["produto_id"] . '" class="btn btn-success" target="_blank">Leia mais</a>';

                    echo '</div></div></div></div>';
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
   

</body>
</html>
