<?php
session_start();
include_once './conexao.php';

// Verificar se o usuário clicou no botão
$SendCadImg = filter_input(INPUT_POST, 'SendCadImg', FILTER_SANITIZE_SPECIAL_CHARS);
if ($SendCadImg) {
    // Receber os dados do formulário
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_SPECIAL_CHARS);
    $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
    $link = filter_input(INPUT_POST, 'link', FILTER_SANITIZE_SPECIAL_CHARS);
    $categoria = filter_input(INPUT_POST, 'categoria', FILTER_SANITIZE_SPECIAL_CHARS);

    // Verificar se foi enviado um arquivo
    if (isset($_FILES['imagem'])) {
        $nome_imagem = $_FILES['imagem']['name'];
        $nome_tmp = $_FILES['imagem']['tmp_name'];
        $erro = $_FILES['imagem']['error'];

        // Verificar se não houve erro no upload
        if ($erro == UPLOAD_ERR_OK) {
            // Diretório onde o arquivo vai ser salvo
            $diretorio = __DIR__ . '/imagem/';

            // Verifica se o diretório existe, caso contrário, cria-o
            if (!is_dir($diretorio)) {
                if (!mkdir($diretorio, 0777, true)) {
                    $_SESSION['msg'] = "<p style='color:red;'>Erro ao criar o diretório: $diretorio</p>";
                    $_SESSION['msg_type'] = "danger";
                    header("Location: index_receita.php");
                    exit();
                }
            }

            $caminho_completo = $diretorio . basename($nome_imagem);
            $caminho_relativo = 'crud_receita/imagem/' . basename($nome_imagem);

            // Verificar se o arquivo foi carregado corretamente para o local temporário
            if (is_uploaded_file($nome_tmp)) {
                // Mover o arquivo para o diretório de destino
                if (move_uploaded_file($nome_tmp, $caminho_completo)) {
                    // Inserir os dados da imagem na tabela imagem_receita
                    $result_imagem = "INSERT INTO imagem_receita (imagem) VALUES (?)";
                    $insert_imagem = $conn->prepare($result_imagem);

                    // Verificar se a preparação da declaração SQL foi bem-sucedida
                    if ($insert_imagem) {
                        $insert_imagem->bind_param('s', $caminho_relativo);

                        // Verificar se os dados foram inseridos com sucesso na tabela imagem_receita
                        if ($insert_imagem->execute()) {
                            // Obter o ID da imagem recém-inserida na tabela imagem_receita
                            $imagem_receita_id = $insert_imagem->insert_id;

                            // Inserir os dados da receita na tabela receitas incluindo o ID da imagem e a categoria
                            $result_receita = "INSERT INTO receitas (titulo, descricao, link, categoria, imagem_receita_id) VALUES (?, ?, ?, ?, ?)";
                            $insert_receita = $conn->prepare($result_receita);

                            // Verificar se a preparação da declaração SQL foi bem-sucedida
                            if ($insert_receita) {
                                $insert_receita->bind_param('ssssi', $titulo, $descricao, $link, $categoria, $imagem_receita_id);

                                // Verificar se os dados foram inseridos com sucesso na tabela receitas
                                if ($insert_receita->execute()) {
                                    $_SESSION['msg'] = "<p style='color:green;'>Dados salvos e imagem enviada com sucesso</p>";
                                    $_SESSION['msg_type'] = "success";
                                } else {
                                    $_SESSION['msg'] = "<p style='color:red;'>Erro ao salvar os dados na tabela receitas</p>";
                                    $_SESSION['msg_type'] = "danger";
                                }
                            } else {
                                // Exibir mensagem de erro detalhada ao preparar a declaração SQL para receitas
                                $_SESSION['msg'] = "<p style='color:red;'>Erro ao preparar a declaração SQL para a tabela receitas: " . $conn->error . "</p>";
                                $_SESSION['msg_type'] = "danger";
                            }
                        } else {
                            $_SESSION['msg'] = "<p style='color:red;'>Erro ao inserir a imagem na tabela imagem_receita</p>";
                            $_SESSION['msg_type'] = "danger";
                        }
                    } else {
                        // Exibir mensagem de erro detalhada ao preparar a declaração SQL para imagem_receita
                        $_SESSION['msg'] = "<p style='color:red;'>Erro ao preparar a declaração SQL para a tabela imagem_receita: " . $conn->error . "</p>";
                        $_SESSION['msg_type'] = "danger";
                    }
                } else {
                    $_SESSION['msg'] = "<p style='color:red;'>Erro ao mover o arquivo para o diretório: $caminho_completo</p>";
                    $_SESSION['msg_type'] = "danger";
                }
            } else {
                $_SESSION['msg'] = "<p style='color:red;'>O arquivo não foi carregado corretamente: $nome_tmp</p>";
                $_SESSION['msg_type'] = "danger";
            }
        } else {
            $_SESSION['msg'] = "<p style='color:red;'>Erro no upload da imagem: $erro</p>";
            $_SESSION['msg_type'] = "danger";
        }
    } else {
        $_SESSION['msg'] = "<p style='color:red;'>Nenhum arquivo enviado</p>";
        $_SESSION['msg_type'] = "danger";
    }
} else {
    $_SESSION['msg'] = "<p style='color:red;'>Acesso ao formulário não autorizado</p>";
    $_SESSION['msg_type'] = "danger";
}

// Redirecionar de volta para o formulário
header("Location: index_receita.php");
exit();
?>
