<?php
include 'conexao.php';

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  
  $sql = "DELETE FROM receitas WHERE id_receita=$id";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Receita excluída com sucesso!'); window.location.href='index.receitasDelete.php';</script>";
  } else {
    echo "Erro ao excluir receita: " . $conn->error;
  }

  $conn->close();
} else {
  echo "<script>alert('ID de receita inválido!'); window.location.href='index.receitasDelete.php';</script>";
}
?>
