<?php
include_once("conexao.php");
include_once("autenticacao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercicios</title>
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

   <div class="container mt-5">
    <h2>Exercícios para Emagrecimento</h2>
    <ol>
        <li>
            <h5>Agachamento com salto</h5>
            <p>O agachamento com salto é um exercício que envolve o corpo inteiro, o que ajuda a queimar calorias de forma eficiente...</p>
        </li>
        <li>
            <h5>Corrida parada</h5>
            <p>Os exercícios aeróbicos são muito importantes para o bom funcionamento físico e para a queima de gordura corporal...</p>
        </li>
        <li>
            <h5>Caminhada na esteira</h5>
            <p>Uma atividade simples e uma grande aliada do dia a dia, a caminhada faz parte do grupo de exercícios que não precisam de muitos elementos para serem praticados...</p>
        </li>
        <li>
            <h5>Polichinelo</h5>
            <p>Um exercício aeróbico que, assim como o agachamento com salto, envolve o corpo inteiro, é o polichinelo...</p>
        </li>
        <li>
            <h5>Pular corda</h5>
            <p>Na infância, pular corda é uma brincadeira muito comum para se divertir entre amigos, mas a atividade também pode, e deve, ser realizada na fase adulta...</p>
        </li>
        <li>
            <h5>Dança</h5>
            <p>Uma forma divertida e eficaz de perder peso, a dança traz diversos benefícios para o emagrecimento, bem como para a saúde do corpo...</p>
        </li>
        <li>
            <h5>HIIT</h5>
            <p>Conhecido por ser um exercício que envolve alternar períodos de descanso com alta intensidade ou baixa intensidade...</p>
        </li>
        <li>
            <h5>Flexão de braços</h5>
            <p>A flexão de braço é um exercício de força que, quando combinado com uma dieta saudável, pode ser muito benéfico para a perda de peso...</p>
        </li>
        <li>
            <h5>Subir e descer escadas</h5>
            <p>Subir e descer escadas é uma forma de atividade física muito eficiente na perda de peso, além de acessível, pois pode ser realizada em diversos lugares...</p>
        </li>
        <li>
            <h5>Burpees</h5>
            <p>O burpees é um exercício corporal completo que utiliza o treinamento de força e exercícios aeróbicos para obter um alto gasto calórico em um curto período...</p>
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