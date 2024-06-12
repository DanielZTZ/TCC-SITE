<?php
include_once("conexao.php");
include_once("autenticacao.php");

// Verifica se o usuário está logado
if (!usuarioEstaLogado()) {
    $_SESSION['loginErro'] = "Você precisa estar logado para realizar esta compra.";
    header("Location: login_tcc.php");
    exit();
}

$usuario_email = $_POST['usuario_email'];
$produto_id = $_POST['produto_id'];
$quantidade = $_POST['quantidade'];

// Obter o ID do usuário a partir do email
$sql_id_usuario = "SELECT id_usuario FROM usuario WHERE email = ?";
$stmt_id_usuario = $conn->prepare($sql_id_usuario);
$stmt_id_usuario->bind_param("s", $usuario_email);
$stmt_id_usuario->execute();
$result_id_usuario = $stmt_id_usuario->get_result();

if ($result_id_usuario->num_rows == 0) {
    echo "Usuário não encontrado.";
    exit();
}

$id_usuario = $result_id_usuario->fetch_assoc()['id_usuario'];

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
