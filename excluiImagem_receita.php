<?php
include 'conexao.php';


// Excluir imagem
if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM imagem_receita WHERE id_imgReceita = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<div class='alert alert-success'>Imagem excluída com sucesso.</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao excluir a imagem.</div>";
    }
    $stmt->close();
}

// Selecionar imagens
$sql = "SELECT * FROM imagem_receita";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excluir Imagens da Receita</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Excluir Imagens da Receita</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Imagem</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id_imgReceita']; ?></td>
                        <td><?php echo $row['nome']; ?></td>
                        <td><img src="<?php echo $row['imagem']; ?>" alt="<?php echo $row['nome']; ?>" width="100"></td>
                        <td>
                            <form method="POST" action="">
                                <input type="hidden" name="id" value="<?php echo $row['id_imgReceita']; ?>">
                                <button type="submit" name="delete" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Nenhuma imagem encontrada</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
