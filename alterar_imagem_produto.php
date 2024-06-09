<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'imagem_id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM imagem_produto WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>CRUD - Editar Imagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="principal_crud.php" class="btn btn-primary">Página Inicial</a>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <h1>Editar dados de Imagem</h1>
        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <form method="POST" action="recebe_alterar_imagem_produto.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem:</label>
                <input type="file" class="form-control" name="imagem">
            </div>
            <div class="mb-3">
                <label for="nome_imagem" class="form-label">Nome:</label>
                <input type="text" class="form-control" name="nome_imagem" placeholder="Digite o nome" value="<?php echo $row_usuario['nome']; ?>">
            </div>
            <input name="SendCadImg" type="submit" class="btn btn-success" value="Editar">
        </form>
    </div>
</body>
</html>
