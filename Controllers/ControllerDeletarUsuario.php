<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php");

    $Crud=new ClassCrud();
    $usuario_idUser=filter_input(INPUT_GET,'usuario_id',FILTER_SANITIZE_SPECIAL_CHARS);
    
    $Crud->deleteDB(
        "usuario",
        "usuario_id=?",
        array(
           $usuario_idUser
        )
    );

    header('Location: ../homeADM.php');
?>