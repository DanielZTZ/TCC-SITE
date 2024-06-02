<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "site";
    
    // Criar a conexão
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    // Verificar a conexão
    if (!$conn) {
        die("Falha na conexao: " . mysqli_connect_error());
    } else {
        // Definir a codificação de caracteres da conexão
        mysqli_set_charset($conn, "utf8mb4");
    }
?>