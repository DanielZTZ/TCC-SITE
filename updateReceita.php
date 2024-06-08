<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "site";

// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$imagem = $_FILES['imagem'];

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($imagem["name"], PATHINFO_EXTENSION));
$target_dir = "image/";
$target_file = $target_dir . basename($imagem["name"]);

// Verifica se é uma imagem real
$check = getimagesize($imagem["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
} else {
    $uploadOk = 0;
}

// Verifica se o arquivo já existe
if (file_exists($target_file)) {
    $uploadOk = 0;
}

// Verifica tamanho do arquivo
if ($imagem["size"] > 500000) {
    $uploadOk = 0;
}

// Permite certos formatos de arquivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    $uploadOk = 0;
}

// Verifica se $uploadOk está definido como 0 por algum erro
if ($uploadOk == 0) {
    echo "Desculpe, seu arquivo não foi enviado.";
// Se tudo estiver ok, tenta fazer o upload do arquivo
} else {
    if (move_uploaded_file($imagem["tmp_name"], $target_file)) {
        $imagem_path = $target_file;
    } else {
        echo "Desculpe, ocorreu um erro ao enviar seu arquivo.";
    }
}

if ($uploadOk == 1) {
    $sql = "UPDATE imagem_receita SET imagem='$imagem_path' WHERE id_imgReceita=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
