<?php
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Variaveis.php");
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php");

$Crud=new ClassCrud();

if($Acao=='Cadastrar'){
    $Crud->insertDB(
    "veiculo",
    "?,?,?,?,?",
        array(
            $veiculo_id,
            $modelo,
            $marca,
            $consumo,
            $FK_usuario_id
        )
    );
    header('Location: ../home.php');
}else if($Acao=='Editar'){
    $Crud->updateDB(
        "veiculo",
        "modelo=?,marca=?,consumo=?",
        "FK_usuario_id=?",
        array(
            $modelo,
            $marca,
            $consumo,
            $FK_usuario_id
        )
    );
    header('Location: ../home.php');
} else {
    echo "Ocorreu um erro inesperado, tente novamente mais tarde.";
}

?>