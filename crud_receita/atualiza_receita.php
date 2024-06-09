<?php
session_start();
include_once '../conexao.php';

// Parâmetros da receita
$id_receita = $_POST['id_receita'];
$novo_titulo = isset($_POST['novo_titulo']) ? $_POST['novo_titulo'] : null;
$nova_descricao = isset($_POST['nova_descricao']) ? $_POST['nova_descricao'] : null;
$id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : null;
$nova_imagem = isset($_FILES['nova_imagem']['name']) ? $_FILES['nova_imagem']['name'] : null;
$novo_link = isset($_POST['novo_link']) ? $_POST['novo_link'] : null;

// Iniciar transação
$conn->begin_transaction();

try {
    // Atualizar a imagem se uma nova imagem foi enviada
    if ($nova_imagem) {
        $novo_caminho_temp_imagem = $_FILES['nova_imagem']['tmp_name'];
        $diretorio_imagens = "img/";
        $novo_caminho_imagem = $diretorio_imagens . basename($nova_imagem);

        if (!move_uploaded_file($novo_caminho_temp_imagem, $novo_caminho_imagem)) {
            throw new Exception("Erro ao mover o arquivo de imagem para o diretório.");
        }

        // Inserir nova imagem na tabela imagem_receita
        $sql_inserir_imagem = "INSERT INTO imagem_receita (nome, imagem) VALUES ('$nova_imagem', '$novo_caminho_imagem')";
        if (!$conn->query($sql_inserir_imagem)) {
            throw new Exception("Erro ao inserir a nova imagem na tabela imagem_receita.");
        }
        $novo_id_imagem = $conn->insert_id;

        // Atualizar a receita com o ID da nova imagem
        $sql_atualizar_imagem = "UPDATE receitas SET id_imgReceita = $novo_id_imagem WHERE id_receita = $id_receita";
        if (!$conn->query($sql_atualizar_imagem)) {
            throw new Exception("Erro ao atualizar a imagem da receita.");
        }
    }

    // Atualizar os outros campos se foram fornecidos
    if ($novo_titulo) {
        $sql_atualizar_titulo = "UPDATE receitas SET titulo = '$novo_titulo' WHERE id_receita = $id_receita";
        if (!$conn->query($sql_atualizar_titulo)) {
            throw new Exception("Erro ao atualizar o título da receita.");
        }
    }

    if ($nova_descricao) {
        $sql_atualizar_descricao = "UPDATE receitas SET descricao = '$nova_descricao' WHERE id_receita = $id_receita";
        if (!$conn->query($sql_atualizar_descricao)) {
            throw new Exception("Erro ao atualizar a descrição da receita.");
        }
    }

    if ($id_categoria) {
        $sql_atualizar_categoria = "UPDATE receitas SET id_categoria = $id_categoria WHERE id_receita = $id_receita";
        if (!$conn->query($sql_atualizar_categoria)) {
            throw new Exception("Erro ao atualizar a categoria da receita.");
        }
    }

    if ($novo_link) {
        $sql_atualizar_link = "UPDATE receitas SET link = '$novo_link' WHERE id_receita = $id_receita";
        if (!$conn->query($sql_atualizar_link)) {
            throw new Exception("Erro ao atualizar o link da receita.");
        }
    }

    // Commit das alterações
    $conn->commit();
    echo "Receita atualizada com sucesso!";
} catch (Exception $e) {
    // Rollback em caso de erro
    $conn->rollback();
    echo "Erro ao atualizar receita: " . $e->getMessage();
}

// Fechar conexão
$conn->close();
?>
