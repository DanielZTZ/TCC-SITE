<?php
session_start();
include_once("../conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Listar Usuarios</title>		
	</head>
	<body>
		<hr> <p>
		<a href="../principal_crud.php"> <input type="button"  value="Página Inicial"></a> &nbsp
    	
     
       <!-- <a href="exe_listar3.php"><input type="button"  value="Apagar"></a> &nbsp-->
		<p><hr><h1>Listagem de Usuarios</h1> <p> <hr> <h3>
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
		
		$result_usuarios = "SELECT * FROM usuario LIMIT $inicio, $qnt_result_pg";
		$resultado_usuarios = mysqli_query($conn, $result_usuarios);
		while($row_aluno = mysqli_fetch_assoc($resultado_usuarios)){
			echo "ID: " . $row_aluno['id_usuario'] . "<br>";
			echo "Nome: " . $row_aluno['nome'] . "<br>";
			echo "E-mail: " . $row_aluno['email'] . "<br> <br>";
			echo "Telefone: " . $row_aluno['telefone'] . "<br> <br>";
			echo "Senha: " . $row_aluno['senha'] . "<br> <br>";

 			echo "<a href='edit_usuario.php?id_usuario=" . $row_aluno['id_usuario'] . "'>Editar</a><br> <hr>";
			echo "<a href='apaga.php?id_usuario=" . $row_aluno['id_usuario'] . "'>Apagar</a><br><hr>";
		}
		
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id_usuario) AS num_result FROM usuario";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='apaga_usuario.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='apaga_usuario.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='apaga_usuario.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='apaga_php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>		
	</body>
</html>