<?php
if(!isset($_SESSION)) {
    session_start();
}

if(isset($_SESSION["usuario_id"])){
    $FK_usuario_id = $_SESSION['usuario_id'];
}
?>