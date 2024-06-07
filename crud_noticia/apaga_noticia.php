<?php
session_start();
include_once '../conexao.php';

try {
    
    // ID da notícia a ser atualizada
    $noticiaId = isset($_POST['noticiaId']) ? intval($_POST['noticiaId']) : null;
    $novoTitulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
    $novoTexto = isset($_POST['texto']) ? $_POST['texto'] : null;
    $novoLink = isset($_POST['link']) ? $_POST['link'] : null;
    $novaImagemNoticiaId = isset($_POST['imagem_noticia_id']) ? intval($_POST['imagem_noticia_id']) : null;
    $novoCaminhoImagem = isset($_POST['caminho']) ? $_POST['caminho'] : null;

    if ($noticiaId === null) {
        throw new Exception("ID da notícia é obrigatório.");
    }

    // Construir a query dinamicamente para a tabela noticia
    $fields = [];
    $params = [];

    if ($novoTitulo !== null) {
        $fields[] = "titulo = :novoTitulo";
        $params[':novoTitulo'] = $novoTitulo;
    }

    if ($novoTexto !== null) {
        $fields[] = "texto = :novoTexto";
        $params[':novoTexto'] = $novoTexto;
    }

    if ($novoLink !== null) {
        $fields[] = "link = :novoLink";
        $params[':novoLink'] = $novoLink;
    }

    if ($novaImagemNoticiaId !== null) {
        $fields[] = "imagem_noticia_id = :novaImagemNoticiaId";
        $params[':novaImagemNoticiaId'] = $novaImagemNoticiaId;
    }

    if (count($fields) > 0) {
        $sql = "UPDATE noticia SET " . implode(", ", $fields) . " WHERE id = :noticiaId";
        $stmt = $conn->prepare($sql);
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value, PDO::PARAM_STR);
        }
        $stmt->bindValue(':noticiaId', $noticiaId, PDO::PARAM_INT);
        $stmt->execute();

        echo "Notícia atualizada com sucesso.";
    } else {
        echo "Nenhum dado para atualizar na tabela noticia.";
    }

    // Atualizar o caminho da imagem na tabela imagem_noticia se fornecido
    if ($novoCaminhoImagem !== null && $novaImagemNoticiaId !== null) {
        $sql = "UPDATE imagem_noticia SET caminho = :novoCaminho WHERE id = :imagemId";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':novoCaminho', $novoCaminhoImagem, PDO::PARAM_STR);
        $stmt->bindParam(':imagemId', $novaImagemNoticiaId, PDO::PARAM_INT);
        $stmt->execute();

        echo " Caminho da imagem atualizado com sucesso.";
    } elseif ($novoCaminhoImagem !== null) {
        echo " ID da imagem é necessário para atualizar o caminho.";
    }

} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
} catch(Exception $e) {
    echo "Erro: " . $e->getMessage();
}

$conn = null;
?>
