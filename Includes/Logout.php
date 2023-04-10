<?php

if(!isset($_SESSION)) {
    session_start();
}

// Remove as variáveis de sessão
$_SESSION = array();

session_destroy();

header("Location: ../index.php");
exit;

?>