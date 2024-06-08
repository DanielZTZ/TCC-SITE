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
$nome = $_POST['nome'];

$sql = "UPDATE imagem_receita SET nome='$nome' WHERE id_imgReceita=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: indexUPReceita.php");
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
