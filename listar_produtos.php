<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>CRUD - Modificar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .read-more {
            color: blue;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Listagem dos Produtos</h1>
            <a href="principal_crud.php" class="btn btn-light">Página Inicial</a>
        </div>
        <?php
        if (isset($_SESSION['msg'])) {
            echo "<div class='alert alert-info'>" . $_SESSION['msg'] . "</div>";
            unset($_SESSION['msg']);
        }

        // Receber o número da página
        $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

        // Setar a quantidade de itens por página
        $qnt_result_pg = 3;

        // Calcular o início da visualização
        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

        $result_produtos = "SELECT * FROM produtos LIMIT $inicio, $qnt_result_pg";
        $resultado_produtos = mysqli_query($conn, $result_produtos);

        while ($row_produtos = mysqli_fetch_assoc($resultado_produtos)) {
            ?>
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row_produtos['nome']; ?></h5>
                    <p class="card-text"><strong>ID:</strong> <?php echo $row_produtos['produto_id']; ?></p>
                    <p class="card-text"><strong>Preço:</strong> <?php echo $row_produtos['preco']; ?></p>
                    <p class="card-text"><strong>Estoque:</strong> <?php echo $row_produtos['estoque']; ?></p>
                    <p class="card-text"><strong>Categoria:</strong> <?php echo $row_produtos['categoria_id']; ?></p>
                    <p class="card-text"><strong>Peso:</strong> <?php echo $row_produtos['peso']; ?></p>
                    <p class="card-text"><strong>Altura:</strong> <?php echo $row_produtos['altura']; ?></p>
                    <p class="card-text"><strong>Largura:</strong> <?php echo $row_produtos['largura']; ?></p>
                    <p class="card-text"><strong>Comprimento:</strong> <?php echo $row_produtos['comprimento']; ?></p>
                    <p class="card-text"><strong>Sobre:</strong> <span class="text-truncate"><?php echo $row_produtos['sobre']; ?></span></p>
                    <p class="card-text"><strong>Benefícios:</strong> <span class="text-truncate"><?php echo $row_produtos['beneficios']; ?></span></p>
                    <p class="card-text"><strong>Recomendações:</strong> <span class="text-truncate"><?php echo $row_produtos['recomendacoes']; ?></span></p>
                    <?php
                    if ($row_produtos['imagem_id']) {
                        $imagem_id = $row_produtos['imagem_id'];
                        $result_imagem = "SELECT * FROM imagem_produto WHERE id = '$imagem_id'";
                        $resultado_imagem = mysqli_query($conn, $result_imagem);
                        $row_imagem_produto = mysqli_fetch_assoc($resultado_imagem);

                        if ($row_imagem_produto) {
                            $imagem_caminho = $row_imagem_produto['imagem'];
                            echo "<p><img src='$imagem_caminho' alt='" . $row_imagem_produto['nome'] . "' style='width:100px;'></p>";
                            echo "<a href='alterar_imagem_produto.php?imagem_id=" . $row_imagem_produto['id'] . "' class='btn btn-light'>Editar Imagem</a>";
                        } else {
                            echo "<p>Erro ao carregar a imagem.</p>";
                        }
                    } else {
                        echo "<p>Sem imagem</p>";
                        echo "<a href='cadastrar_imagem_produto.php?produto_id=" . $row_produtos['produto_id'] . "' class='btn btn-light'>Cadastrar Imagem</a>";
                    }
                    ?>
                    <a href='alterar_produto.php?produto_id=<?php echo $row_produtos['produto_id']; ?>' class='btn btn-light'>Editar Produto</a>
                    <a href='recebe_deletar_produto.php?produto_id=<?php echo $row_produtos['produto_id']; ?>' class='btn btn-light'>Apagar</a>
                </div>
            </div>
            <?php
        }

        // Paginação - Somar a quantidade de produtos
        $result_pg = "SELECT COUNT(produto_id) AS num_result FROM produtos";
        $resultado_pg = mysqli_query($conn, $result_pg);
        $row_pg = mysqli_fetch_assoc($resultado_pg);
        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

        $max_links = 2;
        echo "<nav aria-label='Page navigation example'><ul class='pagination justify-content-center'>";
        echo "<li class='page-item'><a class='page-link' href='listar_produtos.php?pagina=1'>Primeira</a></li>";

        for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {
            if ($pag_ant >= 1) {
                echo "<li class='page-item'><a class='page-link' href='listar_produtos.php?pagina=$pag_ant'>$pag_ant</a></li>";
            }
        }

        echo "<li class='page-item active'><a class='page-link' href='#'>$pagina</a></li>";

        for ($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
            if ($pag_dep <= $quantidade_pg) {
                echo "<li class='page-item'><a class='page-link' href='listar_produtos.php?pagina=$pag_dep'>$pag_dep</a></li>";
            }
        }

        echo "<li class='page-item'><a class='page-link' href='listar_produtos.php?pagina=$quantidade_pg'>Última</a></li>";
        echo "</ul></nav>";
        ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('.read-more').forEach(item => {
                item.addEventListener('click', event => {
                    const cardText = event.target.previousElementSibling;
                    cardText.style.display = 'block';
                    event.target.style.display = 'none';
                });
            });
        });
    </script>
</body>
</html>
	