<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>Lista de Vendas</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 20px;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="principal_crud.php" class="btn btn-primary mb-3">Página Inicial</a>
                <h1 class="mb-4">Lista de Vendas</h1>
                <?php
                if(isset($_SESSION['msg'])) {
                    echo '<div class="alert alert-info" role="alert">' . $_SESSION['msg'] . '</div>';
                    unset($_SESSION['msg']);
                }
                
                // Receber o número da página
                $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);		
                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
                
                // Setar a quantidade de itens por página
                $qnt_result_pg = 3;
                
                // Calcular o início da visualização
                $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
                
                // Consulta SQL com JOIN para obter nome do usuário
                $query = "SELECT v.id_venda, u.nome AS nome_usuario, v.id_produto, v.quantidade, v.preco_unitario, v.data_venda 
                          FROM vendas v
                          INNER JOIN usuario u ON v.id_usuario = u.id_usuario
                          ORDER BY v.id_venda DESC
                          LIMIT $inicio, $qnt_result_pg";

                $resultado_usuarios = mysqli_query($conn, $query);

                while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">ID da venda: <?php echo $row_usuario['id_venda']; ?></h5>
                            <p class="card-text">Nome do usuário: <?php echo $row_usuario['nome_usuario']; ?></p>
                            <p class="card-text">ID Produto: <?php echo $row_usuario['id_produto']; ?></p>
                            <p class="card-text">Quantidade: <?php echo $row_usuario['quantidade']; ?></p>
                            <p class="card-text">Preço: R$ <?php echo number_format($row_usuario['preco_unitario'], 2, ',', '.'); ?></p>
                            <p class="card-text">Data da venda: <?php echo date('d/m/Y H:i:s', strtotime($row_usuario['data_venda'])); ?></p>
                        </div>
                    </div>
                    <?php
                }
                
                // Paginação - Somar a quantidade de vendas
                $result_pg = "SELECT COUNT(id_venda) AS num_result FROM vendas";
                $resultado_pg = mysqli_query($conn, $result_pg);
                $row_pg = mysqli_fetch_assoc($resultado_pg);
                
                // Quantidade de páginas
                $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
                
                // Limitar os links antes e depois
                $max_links = 2;
                echo '<nav aria-label="Page navigation example">';
                echo '<ul class="pagination">';
                echo '<li class="page-item"><a class="page-link" href="vendas_listar.php?pagina=1">Primeira</a></li>';
                
                for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                    if($pag_ant >= 1){
                        echo '<li class="page-item"><a class="page-link" href="vendas_listar.php?pagina='.$pag_ant.'">'.$pag_ant.'</a></li>';
                    }
                }
                    
                echo '<li class="page-item active"><a class="page-link" href="#">'.$pagina.'</a></li>';
                
                for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                    if($pag_dep <= $quantidade_pg){
                        echo '<li class="page-item"><a class="page-link" href="vendas_listar.php?pagina='.$pag_dep.'">'.$pag_dep.'</a></li>';
                    }
                }
                
                echo '<li class="page-item"><a class="page-link" href="vendas_listar.php?pagina='.$quantidade_pg.'">Última</a></li>';
                echo '</ul>';
                echo '</nav>';
                ?>		
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
</body>
</html>
