<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Receitas</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      font-size: 1.2rem; /* Aumenta o tamanho da fonte base */
    }
    h1 {
      font-size: 2.5rem; /* Aumenta o tamanho da fonte do título */
    }
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Adiciona sombra aos cards */
      transition: 0.3s; /* Adiciona uma transição suave de efeito */
      margin-bottom: 20px; /* Adiciona margem inferior para separar os cards */
    }
    .card:hover {
      box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2); /* Aumenta a sombra ao passar o mouse sobre o card */
    }
    .card-title {
      font-size: 1.5rem; /* Aumenta o tamanho da fonte dos títulos dos cards */
    }
    .card-text {
      font-size: 1.3rem; /* Aumenta o tamanho da fonte do texto dos cards */
    }
  </style>
</head>
<body>
<div class="container my-5">
  <h1 class="mb-4">Minhas Receitas</h1>
  <div class="row">
    <?php
    include 'conexao.php';
    $sql = "SELECT * FROM receitas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<div class='col-md-4'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>" . $row["titulo"] . "</h5>";
        echo "<p class='card-text'>" . $row["descricao"] . "</p>";
        echo "<a href='delete_receita.php?id=" . $row["id_receita"] . "' class='btn btn-danger'>Excluir</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
      }
    } else {
      echo "<div class='col-12'>";
      echo "<div class='alert alert-warning' role='alert'>Nenhuma receita encontrada</div>";
      echo "</div>";
    }
    $conn->close();
    ?>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
