<?php
require_once "conexao.php"; // Inclui o arquivo de conexão com o banco de dados

// Função para buscar receitas por categoria (doce ou salgado)
function buscarReceitasPorCategoria($conn, $categoria) {
    $sql = "SELECT r.id_receita, r.titulo, r.descricao, img.imagem AS id_ImgReceita, r.link
            FROM receitas AS r
            JOIN categoria_receita AS c ON r.id_categoria = c.id_categoria
            JOIN imagem_receita AS img ON r.id_ImgReceita = img.id_ImgReceita
            WHERE c.nome = '$categoria'";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

$receitas_doces = buscarReceitasPorCategoria($conn, 'Doces');
$receitas_salgadas = buscarReceitasPorCategoria($conn, 'Salgados');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receitas Saudáveis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="receitas.css">
</head>
<body>

<header class="header bg-light sticky-top border-bottom shadow-sm">
    <!-- Seu código de cabeçalho aqui -->
</header>

<div class="container mt-5">
    <h1 class="mb-4">Receitas Saudáveis</h1>

    <h2 class="mb-4">Receitas Doces</h2>
    <div class="row">
        <?php foreach ($receitas_doces as $receita): ?>
            <div class="col-md-6">
                <div class="shadow p-4 mb-4 bg-white">
                    <div class="card mb-4">
                        <img src="<?php echo $receita['imagem']; ?>" class="card-img-top" alt="Imagem da Receita">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $receita['titulo']; ?></h5>
                            <p class="card-text"><?php echo $receita['descricao']; ?></p>
                            <a href="<?php echo $receita['link']; ?>" class="btn btn-success" target="_blank">Leia mais</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h2 class="mb-4">Receitas Salgadas</h2>
    <div class="row">
        <?php foreach ($receitas_salgadas as $receita): ?>
            <div class="col-md-6">
                <div class="shadow p-4 mb-4 bg-white">
                    <div class="card mb-4">
                        <img src="<?php echo $receita['imagem']; ?>" class="card-img-top" alt="Imagem da Receita">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $receita['titulo']; ?></h5>
                            <p class="card-text"><?php echo $receita['descricao']; ?></p>
                            <a href="<?php echo $receita['link']; ?>" class="btn btn-success" target="_blank">Leia mais</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<footer class="site-footer bg-light">
    <!-- Seu código do rodapé aqui -->
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
