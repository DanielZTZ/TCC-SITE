<?php
// Conecte-se ao banco de dados (se ainda não estiver conectado)
require_once '../conexao.php'; // Certifique-se de substituir "conexao.php" pelo caminho correto do seu arquivo de conexão

// Consulta SQL para selecionar o caminho das imagens
$sql = "SELECT imagem FROM noticia";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Saída dos dados de cada linha
    while($row = $result->fetch_assoc()) {
        echo "Imagem: " . $row["imagem"]. "<br>";
    }
} else {
    echo "0 resultados";
}
$conn->close();
?>
