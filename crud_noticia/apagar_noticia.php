<?php
session_start();
include_once'../conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>CRUD - Listar</title>
</head>
<body>
<hr> <p>
<a href="Principal.php"> <input type="button"  value="Página Inicial"></a> &nbsp
<a href="cadastro.php"> <input type="button"  value= "Cadastrar"></a> &nbsp 
<a href= "exibir_dados1.php"> <input type="button"  value="Listar" ></a> &nbsp
<a href= "exe_listar.php"> <input type="button"  value="Listar Dados Completo"></a> &nbsp
<a href= "exe_listar2.php"> <input type="button"  value="Alterar"></a> &nbsp
<!-- <a href="exe_listar3.php"><input type="button"  value="Apagar"></a> &nbsp-->
<p><hr><h1>Listagem dos Alunos</h1> <p> <hr> <h3>
<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

//Receber o número da página
$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);      
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

//Setar a quantidade de itens por pagina
$qnt_result_pg = 3;

//calcular o inicio visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

$result_usuarios = "SELECT * FROM aluno LIMIT $inicio, $qnt_result_pg";
$resultado_usuarios = mysqli_query($conn, $result_usuarios);
while($row_aluno = mysqli_fetch_assoc($resultado_usuarios)){
    echo "ID: " . $row_aluno['id'] . "<br>";
    echo "Nome: " . $row_aluno['nome'] . "<br>";
    echo "E-mail: " . $row_aluno['email'] . "<br> <br>";

    echo "<a href='apaga.php?id=" . $row_aluno['id'] . "'>Apagar</a><br><hr>";
}

//Paginção - Somar a quantidade de usuários
$result_pg = "SELECT COUNT(id) AS num_result FROM aluno";
$resultado_pg = mysqli_query($conn, $result_pg);
$row_pg = mysqli_fetch_assoc($resultado_pg);
//echo $row_pg['num_result'];
//Quantidade de pagina 
$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

//Limitar os link antes depois
$max_links = 2;
echo "<a href='apagar_aluno.php?pagina=1'>Primeira</a> ";

for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
    if($pag_ant >= 1){
        echo "<a href='apagar_aluno.php?pagina=$pag_ant'>$pag_ant</a> ";
    }
}

echo "$pagina ";

for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
    if($pag_dep <= $quantidade_pg){
        echo "<a href='apagar_aluno.php?pagina=$pag_dep'>$pag_dep</a> ";
    }
}

echo "<a href='apagar_aluno.php?pagina=$quantidade_pg'>Ultima</a>";

?>      
</body>
</html>
