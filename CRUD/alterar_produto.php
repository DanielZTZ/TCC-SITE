<?php
session_start();
include_once("../conexao.php");
$id = filter_input(INPUT_GET, 'produto_id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM produtos WHERE id = '$produto_id'";
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
        <a href="deletar_produto.php"><input type="button"  value="Apagar"></a> &nbsp 
		<p><hr><h1>Editar dados de Produto</h1> <p> <hr>
		
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="editar_aluno.php">
			<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
			<label>E-mail: </label>
			<input type="email" name="email" placeholder="Digite o seu melhor e-mail" value="<?php echo $row_usuario['email']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>