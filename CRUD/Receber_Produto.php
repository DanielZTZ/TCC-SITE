<?php
session_start();
include_once("../conexao.php");

$SendCadProduto = filter_input(INPUT_POST, 'SendCadProduto', FILTER_SANITIZE_STRING);
if ($SendCadProduto) {
    // Receber os dados do formulário
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
    $estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_STRING);
    $categoria_id = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_STRING);
    $sobre = filter_input(INPUT_POST, 'sobre', FILTER_SANITIZE_STRING);
    $beneficios = filter_input(INPUT_POST, 'beneficios', FILTER_SANITIZE_STRING);
    $recomendacoes = filter_input(INPUT_POST, 'recomendacoes', FILTER_SANITIZE_STRING);
    $peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_STRING);
    $largura = filter_input(INPUT_POST, 'largura', FILTER_SANITIZE_STRING);
    $altura = filter_input(INPUT_POST, 'altura', FILTER_SANITIZE_STRING);
    $comprimento = filter_input(INPUT_POST, 'comprimento', FILTER_SANITIZE_STRING);
    $nome_imagem = $_FILES['imagem']['name'];

    // Inserir no BD
    $result_produto = "INSERT INTO produtos (nome, preco, estoque, categoria_id, sobre, beneficios, recomendacoes, peso, largura, altura, comprimento) 
                        VALUES (:nome, :preco, :estoque, :categoria_id, :sobre, :beneficios, :recomendacoes, :peso, :largura, :altura, :comprimento)";
    $insert_produto = $conn->prepare($result_produto);
    $insert_produto->bindParam(':nome', $nome);
    $insert_produto->bindParam(':preco', $preco);
    $insert_produto->bindParam(':estoque', $estoque);
    $insert_produto->bindParam(':categoria_id', $categoria_id);
    $insert_produto->bindParam(':sobre', $sobre);
    $insert_produto->bindParam(':beneficios', $beneficios);
    $insert_produto->bindParam(':recomendacoes', $recomendacoes);
    $insert_produto->bindParam(':peso', $peso);
    $insert_produto->bindParam(':largura', $largura);
    $insert_produto->bindParam(':altura', $altura);
    $insert_produto->bindParam(':comprimento', $comprimento);

    if ($insert_produto->execute()) {
        $ultimo_id = $conn->lastInsertId();
        $diretorio = 'imagens_produtos/' . $ultimo_id . '/';
        mkdir($diretorio, 0755);

        if (move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio . $nome_imagem)) {
            // Inserir o nome da imagem no banco de dados
            $result_imagem = "INSERT INTO imagem_produto (nome, imagem) VALUES (:nome, :imagem)";
            $insert_imagem = $conn->prepare($result_imagem);
            $insert_imagem->bindParam(':nome', $nome);
            $insert_imagem->bindParam(':imagem', $nome_imagem);
            $insert_imagem->execute();

            $_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso e imagem enviada com sucesso.</p>";
            header("Location: Receber_Produto.php");
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao enviar a imagem.</p>";
            header("Location: Receber_Produto.php");
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Erro ao cadastrar o produto.</p>";
        header("Location: Receber_Produto.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Erro ao cadastrar o produto.</p>";
    header("Location: Receber_Produto.php");
}
?>