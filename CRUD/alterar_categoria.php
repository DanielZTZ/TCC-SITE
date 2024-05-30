<?php
session_start();
include_once("../conexao.php");
$id = filter_input(INPUT_GET, 'categoria_id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM categorias WHERE id = '$categoria_id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Editar Categoria</title>		
	</head>
	<body>
		<hr> <p>
		<a href="Principal.php"> <input type="button"  value="Página Inicial"></a> &nbsp 
        <a href="deletar_categoria.php"><input type="button"  value="Apagar"></a> &nbsp 
		<p><hr><h1>Editar dados de Categoria</h1> <p> <hr>
		
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="recebe_alterar_categoria.php">
			<input type="hidden" name="id" value="<?php echo $row_usuario['categoria_id']; ?>">
			
			<label>Nome: </label>
			<input type="text" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>"><br><br>
			
			<input type="submit" value="Editar">
		</form>
	</body>
</html>