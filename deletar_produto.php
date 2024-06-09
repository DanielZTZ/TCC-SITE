<?php
session_start();
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Modificar Produto</title>
		<link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />			
	</head>
	<body>
		<hr> <p>
		<a href="principal_crud.php"> <input type="button"  value="Página Inicial"></a> &nbsp
		<p><hr><h1>Listagem dos Produtos</h1> <p> <hr> <h3>
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
		
		$result_usuarios = "SELECT * FROM produtos LIMIT $inicio, $qnt_result_pg";
		$resultado_usuarios = mysqli_query($conn, $result_usuarios);

		while ($row_produtos = mysqli_fetch_assoc($resultado_usuarios)) {
			echo "ID: " . $row_produtos['produto_id'] . "<br>";
			echo "Nome: " . $row_produtos['nome'] . "<br>";
			echo "Preço: " . $row_produtos['preco'] . "<br>";
			echo "Estoque: " . $row_produtos['estoque'] . "<br>";
			echo "Categoria: " . $row_produtos['categoria_id'] . "<br>";
			echo "Sobre: " . $row_produtos['sobre'] . "<br>";
			echo "Benefícios: " . $row_produtos['beneficios'] . "<br>";
			echo "Recomendações: " . $row_produtos['recomendacoes'] . "<br>";
			echo "Peso: " . $row_produtos['peso'] . "<br>";
			echo "Altura: " . $row_produtos['altura'] . "<br>";
			echo "Largura: " . $row_produtos['largura'] . "<br>";
			echo "Comprimento: " . $row_produtos['comprimento'] . "<br>";

			// Verificar se o produto possui uma imagem associada
			if ($row_produtos['imagem_id']) {
				$imagem_id = $row_produtos['imagem_id'];
				$result_imagem = "SELECT * FROM imagem_produto WHERE id = '$imagem_id'";
				$resultado_imagem = mysqli_query($conn, $result_imagem);
				$row_imagem_produto = mysqli_fetch_assoc($resultado_imagem);

				if ($row_imagem_produto) {
					$imagem_caminho = $row_imagem_produto['imagem']; // Utilizar o caminho completo diretamente do banco de dados
					echo "Imagem: <img src='" . $imagem_caminho . "' alt='" . $row_imagem_produto['nome'] . "' style='width:100px;'><br>";
					echo "<a href='alterar_imagem_produto.php?imagem_id=" . $row_imagem_produto['id'] . "'>Editar Imagem</a><br>";
				} else {
					echo "Erro ao carregar a imagem.<br>";
				}
			} else {
				echo "Sem imagem<br>";
				echo "<a href='cadastrar_imagem_produto.php?produto_id=" . $row_produtos['produto_id'] . "'>Cadastrar Imagem</a><br>";
			}

			echo "<a href='alterar_produto.php?produto_id=" . $row_produtos['produto_id'] . "'>Editar Produto</a><br>";
			echo "<a href='recebe_deletar_produto.php?produto_id=" . $row_produtos['produto_id'] . "'>Apagar</a><br><hr>";
			}
		
		
		//Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(produto_id) AS num_result FROM produtos";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='deletar_produto.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='deletar_produto.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='deletar_produto.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='deletar_produto.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>		
	</body>
</html>