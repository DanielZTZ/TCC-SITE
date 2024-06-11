<?php
  session_start();
  include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<title>Página Principal</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
  font-family: Arial, Helvetica, sans-serif;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover .dropdown:hover .dropbtn {
  background-color: #ddd;
  color: black;
}
.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
/* Style the content */
.content {
  background-color: #ddd;
  padding: 10px;
  height: 650px; /* Should be removed. Only for demonstration */
}

.button-link {
    display: inline-block;
    padding: 10px 20px;
    color: #fff;
    background-color: #007bff;
    text-align: center;
    border-radius: 5px;
    text-decoration: none;
}




</style>
</head>
<body>

<div class="topnav">
  <div class="dropdown">
    <button class="dropbtn">Produtos
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="cadastro_produto.php">Cadastrar Produto</a>
      <a href="listar_produtos.php">Lista de Produtos</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Categorias
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="cadastro_categoria.php">Cadastrar Categoria</a>
      <a href="deletar_categoria.php">Lista de Categorias</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Usuarios
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">

      <a href="Cadastro_cliente_git.php">Cadastrar Usuarios</a>
      <a href="/TCC-SITE/crud_usuario/apaga_usuario">Apagar/ Editar Usuario</a>
  </div>
</div>
  
  <div class="dropdown">
    <button class="dropbtn">Noticias
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">

      <a href="/TCC-SITE/crud_noticia/index_noticia.php">Cadastrar Noticia</a>
      <a href="/TCC-SITE/crud_noticia/form_apaga.html">Apaga/Deleta Noticia</a>
  </div>
</div>

<div class="dropdown">
    <button class="dropbtn">Receitas
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">

      <a href="/TCC-SITE/index_receita.php">Cadastrar Receitas</a>
      <a href="/TCC-SITE/crud_receita/form_atualiza.html">Apaga/Deleta Receitas</a>
  </div>
</div>

  <div>
    <a href="principal.php" class="button-link">
        Voltar à Página Inicial do Site
    </a>
</div>

</div>

<div class="content"> <center> 
  <h2><p> CRUD - PÁGINA INICIAL </p>
     ETEC AMIM JUNDI  <p> <h3> CURSO TÉCNICO EM DESENVOLVIMENTO DE SISTEMAS
</div>

<p> <center> <h2> <font color = "#8B008B">
<?php
          if(isset($_SESSION['usuarioNome']))
          {
            echo "<br><br> Olá, ";
            echo  $_SESSION['usuarioNome'];
            unset($_SESSION['usuarioNome']);
          }
      ?>    

</body>
</html>
