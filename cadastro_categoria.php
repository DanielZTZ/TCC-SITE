<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>CRUD - Cadastrar Categoria</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <hr>
  <div class="text-center">
    <h1>Cadastro de Categorias de Produtos</h1>
    <?php
    if(isset($_SESSION['msg']))
    {
      echo $_SESSION['msg'];
      unset($_SESSION['msg']);
    }
    ?>
  </div>
  <form method="POST" action="recebe_categoria.php">
    <div class="mb-3">
      <label for="nome" class="form-label">Nome:</label>
      <input type="text" class="form-control" name="nome" placeholder="Insira o nome da categoria de produtos">
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
  </form>
  <hr>
  <div class="text-center">
    <a href="principal_crud.php" class="btn btn-secondary">Página Inicial</a>
  </div>
</div>
</body>
</html>
