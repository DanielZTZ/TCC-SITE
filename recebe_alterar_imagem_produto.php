<?php
session_start();
include_once("conexao.php");

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber o ID e os novos dados do formulário
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $nome_imagem = filter_input(INPUT_POST, 'nome_imagem', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Verificar se foi enviada uma nova imagem
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
        $nome_arquivo = $_FILES['imagem']['name'];
        $nome_temp = $_FILES['imagem']['tmp_name'];

        // Diretório onde o arquivo será salvo (usando caminho relativo)
        $diretorio = 'imagem_produto/';
        $caminho_completo = $diretorio . $nome_arquivo;

        // Tentar mover o arquivo para o diretório de destino
        if (move_uploaded_file($nome_temp, $caminho_completo)) {
            // Atualizar no banco de dados
            $query = "UPDATE imagem_produto SET nome = ?, imagem = ? WHERE id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ssi", $nome_imagem, $caminho_completo, $id);

            if ($stmt->execute()) {
                $_SESSION['msg'] = "<p style='color:green;'>Imagem atualizada com sucesso</p>";
            } else {
                $_SESSION['msg'] = "<p style='color:red;'>Erro ao atualizar a imagem</p>";
            }
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao enviar a imagem</p>";
        }
    } else {
        // Se nenhuma nova imagem foi enviada, atualizar apenas o nome
        $query = "UPDATE imagem_produto SET nome = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $nome_imagem, $id);

        if ($stmt->execute()) {
            $_SESSION['msg'] = "<p style='color:green;'>Nome da imagem atualizado com sucesso</p>";
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro ao atualizar o nome da imagem</p>";
        }
    }

    // Redirecionar de volta para a página de edição
    header("Location: alterar_imagem_produto.php?imagem_id=$id");
    exit(); // Garantir que não há mais saída após o redirecionamento
}
?>
