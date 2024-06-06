<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id_usuario', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Editar</title>		
	</head>
	<body>
		<hr> <p>
		<a href="Principal.php"> <input type="button"  value="Página Inicial"></a> &nbsp
    	<a href="cadastro.php"> <input type="button"  value= "Cadastrar"></a> &nbsp 
        <a href= "exibir_dados1.php"> <input type="button"  value="Listar" ></a> &nbsp
      <!--  <a href= "exe_listar.php"> <input type="button"  value="Listar Dados Completo"></a> &nbsp
       <!--  <a href= "exe_listar2.php"> <input type="button"  value="Alterar"></a> &nbsp-->
        <a href="apaga.php"><input type="button"  value="Apagar"></a> &nbsp 
		<p><hr><h1>Editar dados do Aluno</h1> <p> <hr>
		
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="editar_aluno.php">
			<input type="hidden" name="id_usuario" value="<?php echo $row_usuario['id_usuario']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email" placeholder="Digite o seu e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>

			<label>Telefone: </label>
			<input type="text" name="telefone" placeholder="Digite o telefone" value="<?php echo $row_usuario['telefone']; ?>"><br><br>

			<label>Senha: </label>
			<input type="text" name="senha" placeholder="Digite a Senha" value="<?php echo $row_usuario['senha']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>