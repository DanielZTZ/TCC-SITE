<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicios 2</title>
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
                            <a class="nav-link" href="principal.php">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="receitas.html">Receitas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="produtos.php">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="exercicios_git.html">Exercícios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="noticia22.php">Notícias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login_tcc.php">Entrar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="Cadastro_cliente_git.php">Cadastre-se</a>
                        </li>
                    </ul>
                    
                </div>
            </nav>
        </div>
    </header>

   <div class="container mt-5">
    <h2>Rotina de Exercícios fisioterapeuticos</h2>
    <ol>
        <li>
            <h5>Ao acordar, deitado de barriga para cima, pedalar 120 vezes no ar</h5>
            <p>Este exercício melhora o posicionamento da coluna vertebral e da postura global, diminuindo ou retardando o encurvamento das costas e aliviando as dores na coluna.</p>
        </li>
        <li>
            <h5>Antes do banho, exercitar as pernas (músculos gémeos)</h5>
            <p>Este exercício bombeia o sangue para o coração, melhora os batimentos cardíacos e evita a obstrução das veias, diminuindo o risco de doenças cardíacas.</p>
        </li>
        <li>
            <h5>Saltar à corda</h5>
            <p>É um divertido e eficaz exercício para eliminar o excesso de peso, podendo queimar cerca de 10 calorias por minuto se fizer até 100 saltos por minuto. Além disso, este é um exercício verdadeiramente completo.</p>
        </li>
        <li>
            <h5>Sprints na bicicleta</h5>
            <p>Faça no máximo cinco sequências, alternando velocidade intensa e velocidade menos intensa.</p>
        </li>
        <li>
            <h5>Ao chegar em casa, descanse um pouco e relaxe</h5>
            <p>O importante é criar uma barreira entre o dia de trabalho que terminou e o serão em casa que está a começar.</p>
        </li>
    </ol>
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
