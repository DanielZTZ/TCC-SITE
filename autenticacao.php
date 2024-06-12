<?php
session_start();

function usuarioEstaLogado() {
    return isset($_SESSION['usuarioEmail']);
}
?>
