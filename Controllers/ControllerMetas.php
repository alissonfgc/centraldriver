<?php
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Variaveis.php");
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php");

$Crud=new ClassCrud();

if($Acao=='Cadastrar'){
    $Crud->insertDB(
        "metas",
        "?,?,?,?",
        array(
            $metas_id,
            $meta_sem,
            $meta_men,
            $FK_usuario_id
        )
    );
    #envia para a página home
    header('Location: ../home.php');
}else if($Acao=='Editar'){
    $Crud->updateDB(
        "metas",
        "meta_sem=?,meta_men=?",
        "FK_usuario_id=?",
        array(
            $meta_sem,
            $meta_men,
            $FK_usuario_id
        )
    );
    header('Location: ../home.php');
} else {
    echo "Ocorreu um erro inesperado, tente novamente mais tarde.";
}

?>
