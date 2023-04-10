<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php");
    include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Variaveis.php");

    session_start();

    $Crud=new ClassCrud();

    $emailUser=filter_input(INPUT_GET,'email',FILTER_SANITIZE_SPECIAL_CHARS);
    $senhaUser=filter_input(INPUT_GET,'senha',FILTER_SANITIZE_SPECIAL_CHARS);
                    
    $BFetch=$Crud->selectDB(
        "*",
        "usuario",
        "where email=? AND senha=?",
        array($emailUser, $senhaUser)
    );
    $Fetch=$BFetch->fetch(PDO::FETCH_ASSOC);

?>