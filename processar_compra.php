<?php
session_start();
include_once("conexao.php");

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login_tcc.php');
    exit();
}

$id_usuario = $_SESSION['usuario_id'];
$produto_id = $_POST['produto_id'];
$quantidade = $_POST['quantidade'];

// Verificar se o produto existe e obter o preço
$sql_produto = "SELECT preco, estoque FROM produtos WHERE produto_id = ?";
$stmt_produto = $conn->prepare($sql_produto);
$stmt_produto->bind_param("i", $produto_id);
$stmt_produto->execute();
$result_produto = $stmt_produto->get_result();

if ($result_produto->num_rows == 0) {
    echo "Produto não encontrado.";
    exit();
}

$produto = $result_produto->fetch_assoc();
$preco_unitario = $produto['preco'];
$estoque_atual = $produto['estoque'];

if ($quantidade > $estoque_atual) {
    echo "Quantidade solicitada não disponível em estoque.";
    exit();
}

// Registrar a venda
$sql_venda = "INSERT INTO vendas (id_usuario, id_produto, quantidade, preco_unitario) VALUES (?, ?, ?, ?)";
$stmt_venda = $conn->prepare($sql_venda);
$stmt_venda->bind_param("iiid", $id_usuario, $produto_id, $quantidade, $preco_unitario);

if ($stmt_venda->execute()) {
    // Atualizar o estoque
    $novo_estoque = $estoque_atual - $quantidade;
    $sql_update_estoque = "UPDATE produtos SET estoque = ? WHERE produto_id = ?";
    $stmt_update_estoque = $conn->prepare($sql_update_estoque);
    $stmt_update_estoque->bind_param("ii", $novo_estoque, $produto_id);
    $stmt_update_estoque->execute();

    echo "Compra registrada com sucesso!";
} else {
    echo "Erro ao registrar a compra.";
}
?>
