<?php
session_start();
include_once("../conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM imagem_produto WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Editar Imagem</title>		
	</head>
	<body>
		<hr> <p>
		<a href="Principal.php"> <input type="button"  value="Página Inicial"></a> &nbsp 
		<p><hr><h1>Editar dados de Imagem</h1> <p> <hr>
		
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="recebe_alterar_imagem_produto.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

                <label>Imagem:</label>
                <input type="file" name="imagem"><br><br>
                
                <label>Nome: </label>
                <input type="text" name="nome_imagem" placeholder="Digite o nome" value="<?php echo $row_usuario['nome']; ?>"><br><br>

            <input name="SendCadImg" type="submit" value="Editar">
        </form>

	</body>
</html>