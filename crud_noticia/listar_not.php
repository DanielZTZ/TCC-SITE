<?php
session_start();
include_once '../conexao.php'; // Arquivo de conexão com o banco de dados
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <?php
        // Configurações de paginação
        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
        $qnt_result_pg = 5; // Quantidade de resultados por página

        // Calcular o início da visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        // Consulta para recuperar as notícias da tabela "noticia" com suas imagens associadas
        $result_noticias = "SELECT n.titulo, n.texto, n.link, i.caminho AS caminho_imagem
                            FROM noticia AS n
                            INNER JOIN imagem_noticia AS i ON n.imagem_noticia_id = i.id
                            LIMIT $inicio, $qnt_result_pg";
        $resultado_noticias = mysqli_query($conn, $result_noticias);

        if ($resultado_noticias && mysqli_num_rows($resultado_noticias) > 0) {
            while($row_noticia = mysqli_fetch_assoc($resultado_noticias)){
                ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <?php if (!empty($row_noticia['caminho_imagem']) && file_exists($row_noticia['caminho_imagem'])) { ?>
                            <img src="<?php echo $row_noticia['caminho_imagem']; ?>" class="card-img-top" alt="Imagem da Notícia">
                        <?php } else { ?>
                            <div class="alert alert-warning m-0">
                                Imagem não encontrada
                            </div>
                        <?php } ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row_noticia['titulo']; ?></h5>
                            <p class="card-text"><?php echo $row_noticia['texto']; ?></p>
                            <a href="<?php echo $row_noticia['link']; ?>" class="btn btn-primary">Ver mais</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<div class='col'><div class='alert alert-warning'>Nenhuma notícia encontrada.</div></div>";
        }
        ?>
    </div>
</div>

<?php
// Paginação
$result_pg = "SELECT COUNT(id) AS num_result FROM noticia";
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
$max_links = 2;
?>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center mt-4">
        <li class="page-item <?php echo ($pagina <= 1) ? 'disabled' : ''; ?>">
            <a class="page-link" href="nome_do_arquivo.php?pagina=1" aria-label="Primeira">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <?php
        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
            if($pag_ant >= 1){
                echo "<li class='page-item'><a class='page-link' href='nome_do_arquivo.php?pagina=$pag_ant'>$pag_ant</a></li>";
            }
        }

        echo "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
            if($pag_dep <= $quantidade_pg){
                echo "<li class='page-item'><a class='page-link' href='nome_do_arquivo.php?pagina=$pag_dep'>$pag_dep</a></li>";
            }
        }

        ?>
        <li class="page-item <?php echo ($pagina >= $quantidade_pg) ? 'disabled' : ''; ?>">
            <a class="page-link" href="nome_do_arquivo.php?pagina=<?php echo $quantidade_pg; ?>" aria-label="Última">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
