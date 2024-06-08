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

$id = $_GET['id'];
$sql = "SELECT * FROM imagem_receita WHERE id_imgReceita = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Imagem</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Editar Imagem da Receita</h2>
    <form action="update_receita.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $row['id_imgReceita']; ?>">
        <div class="mb-3">
            <label for="imagem" class="form-label">Imagem da Receita</label>
            <input type="file" class="form-control" id="imagem" name="imagem">
            <img src="<?php echo $row['imagem']; ?>" width="100" height="100" class="mt-2">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
