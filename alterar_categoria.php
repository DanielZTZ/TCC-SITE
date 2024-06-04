<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'categoria_id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM categorias WHERE categoria_id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Editar Categoria</title>
		<link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />		
	</head>
	<body>
    <div class="container mt-4">
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="principal_crud.php" class="btn btn-primary me-md-2" type="button">Página Inicial</a>
            <a href="deletar_categoria.php" class="btn btn-danger" type="button">Apagar</a>
        </div>
        <hr>
        <h1 class="my-4">Editar dados de Categoria</h1>
        <hr>

        <?php
        if(isset($_SESSION['msg'])){
            echo "<div class='alert alert-info'>" . $_SESSION['msg'] . "</div>";
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" action="recebe_alterar_categoria.php">
            <input type="hidden" name="categoria_id" value="<?php echo $row_usuario['categoria_id']; ?>">

            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome completo" value="<?php echo $row_usuario['nome']; ?>" required>
            </div>

            <button type="submit" class="btn btn-success">Editar</button>
        </form>
    </div>
</body>
</html>