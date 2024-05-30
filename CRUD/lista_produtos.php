<?php
session_start();
include_once("conexao.php");
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
       <a href= "exibir_dados1.php"> <input type="button"  value="Listar Dados Completo"></a> &nbsp
       <a href= "exe_listar2.php"> <input type="button"  value="Listar Professores" ></a> &nbsp
       <a href= "exe_listar3.php"> <input type="button"  value="Listar Disciplinas" ></a> &nbsp 
       <a href= "edit_aluno.php"> <input type="button"  value="Alterar"></a> &nbsp
        <a href="apagar_aluno"><input type="button"  value="Apagar"></a> &nbsp &nbsp
		<p><hr><h1>Listar Alunos</h1> <p> <hr> <h3>
		<?php
		if(isset($_SESSION['msg']))
		{
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
			echo "<br>";
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
		while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
			echo "  ID: " . $row_usuario['id'] . "<br>";
			echo "  Nome: " . $row_usuario['nome'] . "<br>";
			echo "  E-mail: " . $row_usuario['email'] . "<br>";
			echo "<hr> <br>";

		//	echo "<a href='editar_aluno.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
		//	echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";
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
		echo "<a href='exe_listar.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='exe_listar.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='exe_listar.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='exe_listar.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>		
	</body>
</html>