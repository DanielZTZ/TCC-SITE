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
    <title>Editar Receita</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Editar Receita</h2>
    <form action="update_receita.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id_imgReceita']; ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Receita</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row['nome']; ?>" required>
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
