<?php
session_start();
include_once '../conexao.php'; // Arquivo de conexão com o banco de dados

// Configurações de paginação
$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
$qnt_result_pg = 5; // Quantidade de resultados por página

// Calcular o início da visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

// Consulta para recuperar as notícias da tabela "noticia" com suas imagens associadas
$result_noticias = "SELECT n.titulo, n.texto, n.link, i.caminho AS nome_imagem
                    FROM noticia AS n
                    INNER JOIN imagem_noticia AS i ON n.imagem_noticia_id = i.id
                    LIMIT $inicio, $qnt_result_pg";
$resultado_noticias = mysqli_query($conn, $result_noticias);

if ($resultado_noticias) {
    // Exibir as notícias
    // Exibir as notícias
while($row_noticia = mysqli_fetch_assoc($resultado_noticias)){
    echo "<h2>" . $row_noticia['titulo'] . "</h2>";
    echo "<p>" . $row_noticia['texto'] . "</p>";
    echo "<p>Link: <a href='" . $row_noticia['link'] . "'>" . $row_noticia['link'] . "</a></p>";
    echo "<p>Caminho da imagem: " . $row_noticia['nome_imagem'] . "</p>"; // Adiciona esta linha para depurar o caminho da imagem
    echo "<img src='../crud_noticia/imagem/" . $row_noticia['nome_imagem'] . "' alt='Imagem da Notícia'>";
    echo "<hr>";


    }
} else {
    echo "Erro na consulta SQL: " . mysqli_error($conn);
}

// Paginação
$result_pg = "SELECT COUNT(id) AS num_result FROM noticia";
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
$max_links = 2;

echo "<a href='nome_do_arquivo.php?pagina=1'>Primeira</a> ";

for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
    if($pag_ant >= 1){
        echo "<a href='nome_do_arquivo.php?pagina=$pag_ant'>$pag_ant</a> ";
    }
}

echo "$pagina ";

for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
    if($pag_dep <= $quantidade_pg){
        echo "<a href='nome_do_arquivo.php?pagina=$pag_dep'>$pag_dep</a> ";
    }
}

echo "<a href='nome_do_arquivo.php?pagina=$quantidade_pg'>Última</a>";

?>
