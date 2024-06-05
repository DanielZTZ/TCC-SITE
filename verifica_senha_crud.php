<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
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

    <?php


  if((isset($_POST['email'])) && (isset($_POST['senha'])))
	{
		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
		$senha = mysqli_real_escape_string($conn, $_POST['senha']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
			
		$result_usuario = "SELECT * FROM adm WHERE email = '$email' && senha = '$senha' LIMIT 1";
		$resultado_usuario = mysqli_query($conn, $result_usuario);
		$resultado = mysqli_fetch_assoc($resultado_usuario);
		
		if(isset($resultado))
		{
		
			$_SESSION['usuarioNome'] = $resultado['nome'];
		    $_SESSION['usuarioEmail'] = $resultado['email'];
		    $_SESSION['usuarioSenha'] = $resultado['senha'];
	
		//  aqui abaixo carregar a página de Principal
			header("Location: principal_crud.php");
	  
		}
		
		else
		{	
			$_SESSION['loginErro'] = "Usuário ou senha Inválido";
			header("Location: senha_crud.php");
		}
	}
	else
	{
		$_SESSION['loginErro'] = "Usuário ou senha inválido";
		header("Location: senha_crud.php");
	}
	?>





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