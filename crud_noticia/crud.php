<?php
session_start();
include_once'../conexao.php';

// Função para mostrar mensagens
function showMessage() {
    if(isset($_SESSION['msg'])){
        echo "<div class='msg " . $_SESSION['msg_type'] . "'>" . $_SESSION['msg'] . "</div>";
        unset($_SESSION['msg']);
        unset($_SESSION['msg_type']);
    }
}

// Função para listar as notícias
function listNews() {
    global $conn;
    $sql = "SELECT * FROM noticia";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<div>";
            echo "<h2>" . $row['titulo'] . "</h2>";
            echo "<p>" . $row['texto'] . "</p>";
            echo "<img src='crud_noticia/imagem/".$row['caminho_imagem']."' alt='Imagem da Notícia'>";
            echo "<a href='?action=editar&id=" . $row['id'] . "'>Editar</a>";
            echo "<a href='?action=excluir&id=" . $row['id'] . "'>Excluir</a>";
            echo "</div>";
        }
    } else {
        echo "<p>Nenhuma notícia encontrada.</p>";
    }
}

// Lidar com ações (cadastro, exclusão, atualização)
if(isset($_POST['SendCadImg'])) { // Se o formulário de cadastro for submetido
    // Lógica para cadastro de notícia e upload de imagem
} elseif(isset($_GET['action']) && $_GET['action'] == "excluir" && isset($_GET['id'])) { // Se a ação for de exclusão
    // Lógica para exclusão de notícia
} elseif(isset($_GET['action']) && $_GET['action'] == "editar" && isset($_GET['id'])) { // Se a ação for de edição
    $id = $_GET['id'];

    // Recuperar os dados da notícia do banco de dados
    $sql = "SELECT * FROM noticia WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $titulo = $row['titulo'];
        $texto = $row['texto'];
        $link = $row['link'];
    } else {
        $_SESSION['msg'] = "Notícia não encontrada!";
        $_SESSION['msg_type'] = "error";
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }

    // Exibir o formulário de edição
    echo "<form method='POST' action='".$_SERVER['PHP_SELF']."' enctype='multipart/form-data'>";
    echo "<input type='hidden' name='id' value='".$id."'>";
    echo "<label>Título:</label>";
    echo "<input type='text' name='titulo' value='".$titulo."'><br>";
    echo "<label>Texto:</label>";
    echo "<input type='text' name='texto' value='".$texto."'><br>";
    echo "<label>Link:</label>";
    echo "<input type='text' name='link' value='".$link."'><br>";
    echo "<label>Imagem:</label>";
    echo "<input type='file' name='imagem'><br>";
    echo "<input type='submit' name='atualizar' value='Atualizar'>";
    echo "</form>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Notícias</title>
    <style>
        /* Estilos CSS */
    </style>
</head>
<body>

    <div class="container">
        <h1>Cadastrar Notícia</h1>
        <?php showMessage(); ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <label>Título:</label>
            <input type="text" name="titulo" placeholder="Digite o título" required><br>
            <label>Texto:</label>
            <input type="text" name="texto" placeholder="Digite o texto"><br>
            <label>Link:</label>
            <input type="text" name="link" placeholder="Digite o link"><br>
            <label>Imagem:</label>
            <input type="file" name="imagem"><br>
            <input name="SendCadImg" type="submit" value="Cadastrar">
        </form>
    </div>

    <div class="container">
        <h1>Listagem de Notícias</h1>
        <?php listNews(); ?>
    </div>

</body>
</html>
