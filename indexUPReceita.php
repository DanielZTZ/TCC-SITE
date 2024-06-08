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

$sql = "SELECT * FROM imagem_receita";
$result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Receitas</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Receitas</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id_imgReceita'] . "</td>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td><img src='" . $row['imagem'] . "' width='100' height='100'></td>";
                echo "<td>
                        <a href='edit_receita.php?id=" . $row['id_imgReceita'] . "' class='btn btn-primary'>Editar Receita</a>
                        <a href='editimgReceita.php?id=" . $row['id_imgReceita'] . "' class='btn btn-secondary'>Editar Imagem</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhuma receita encontrada</td></tr>";
        }
        $conn->close();
        ?>
        </tbody>
    </table>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
