<?php
// Inicialize a sessão caso não exista
if(!isset($_SESSION)) {
    session_start();
}
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

$FK_usuario_id = $_SESSION['usuario_id'];
?>