<?php
session_start();
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'produto_id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM produtos WHERE produto_id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>CRUD - Editar Produto</title>
</head>
<body>
    <hr>
    <p>
        <a href="principal_crud.php"><input type="button" value="Página Inicial"></a> &nbsp
        <a href="deletar_produto.php"><input type="button" value="Apagar"></a> &nbsp
    </p>
    <hr>
    <h1>Editar dados de Produto</h1>
    <p><hr>
    
    <?php
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <form method="POST" action="recebe_alterar_produto.php">
        <input type="hidden" name="produto_id" value="<?php echo $row_usuario['produto_id']; ?>">
        
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="" value="<?php echo $row_usuario['nome']; ?>"><br><br>
        <label>preco: </label>
        <input type="number" name="preco" placeholder="" value="<?php echo $row_usuario['preco']; ?>"><br><br>
        <label>Estoque: </label>
        <input type="number" name="estoque" placeholder="" value="<?php echo $row_usuario['estoque']; ?>"><br><br>
        <label>Categoria: </label>
        <input type="number" name="categoria_id" placeholder="" value="<?php echo $row_usuario['categoria_id']; ?>"><br><br>
        <label>Sobre: </label>
        <input type="text" name="sobre" placeholder="" value="<?php echo $row_usuario['sobre']; ?>"><br><br>
        <label>Beneficios: </label>
        <input type="text" name="beneficios" placeholder="" value="<?php echo $row_usuario['beneficios']; ?>"><br><br>
        <label>Recomendações: </label>
        <input type="text" name="recomendacoes" placeholder="" value="<?php echo $row_usuario['recomendacoes']; ?>"><br><br>
        <label>Peso: </label>
        <input type="number" name="peso" placeholder="" value="<?php echo $row_usuario['peso']; ?>"><br><br>
        <label>Largura: </label>
        <input type="number" name="largura" placeholder="" value="<?php echo $row_usuario['largura']; ?>"><br><br>
        <label>Altura: </label>
        <input type="number" name="altura" placeholder="" value="<?php echo $row_usuario['altura']; ?>"><br><br>
        <label>Comprimento: </label>
        <input type="number" name="comprimento" placeholder="" value="<?php echo $row_usuario['comprimento']; ?>"><br><br>
        
        <input type="submit" value="Editar">
    </form>
</body>
</html>
