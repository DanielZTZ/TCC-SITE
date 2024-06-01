<?php
session_start();
include_once("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
      <meta charset="UTF-8">
  </head>
  <body> <p><hr> <p>
      <center> <h1> Cadastro de Categorias de Produtos </h1> <br> 
    <?php
        if(isset($_SESSION['msg']))
        {
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
        }
    ?>    
      <h2>
      <form method="POST" action="recebe2.php">
      <!--  <label>Código:
        <input type="text" name="codigo" placeholder="Digite o código"><br><br>
        -->   
        <label>Nome: </label>
      <input type="text" name="nome" placeholder="Insira o nome da categoria de produtos"><br><br>

      <input type="submit"  value="Cadastrar"> <br> <br> <br> <br> <br> <br>
    </form> 
      
    <hr> <p> 
    <a href="Principal.php"> <input type="button"  value="Página Inicial"></a> &nbsp
  <!--  <a href="cadastro.php"> <input type="button"  value= "Cadastrar"></a> &nbsp --> 
    <a href= "exe_listar2.php"> <input type="button"  value="Listar" ></a> &nbsp
    <!-- <a href= "exe_listar.php"> <input type="button"  value="Listar Dados Completo"></a> &nbsp
    <a href= "exe_listar2.php"> <input type="button"  value="Alterar"></a> &nbsp
    <a href="apaga.php"><input type="button"  value="Apagar"></a> &nbsp <br> --> 

  </body>
  </html>