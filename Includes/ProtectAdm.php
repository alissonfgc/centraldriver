<?php
// Inicialize a sessão caso não exista
if(!isset($_SESSION)) {
    session_start();
}
// Verifique se o usuário está logado, se não, redirecione-o para uma página de login
if(!isset($_SESSION["loggedinAdm"]) || $_SESSION["loggedinAdm"] !== true){
    header("location: loginadm.php");
    exit;
}

?>