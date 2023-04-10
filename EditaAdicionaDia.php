<?php
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php");
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Variaveis.php");
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Protect.php");

$Titulo = $Fluxo = "";

$FK_usuario_id = $_SESSION['usuario_id'];

$Crud = new ClassCrud();
$EFetch = $Crud->selectDB(
    "*",
    "dados_expediente",
    "where FK_usuario_id=?",
    array($FK_usuario_id)
);
$DEFetch = $EFetch->fetch(PDO::FETCH_ASSOC);

#verifica se já existe dados na tabela dado_expediente
if (empty($DEFetch)) {
    #se não existir vai para o formulario do primeiro cadastro de dia. 
    $Titulo = "Cadastrar";
    $Fluxo = "Includes/FormularioDia.php";
} else if (!empty($DEFetch)) {
    #caso exista vai para o formulario de seleção de dia, para cadastrar ou editar dia existente.
    $Titulo = "Editar ou Adicionar";
    $Fluxo = "Includes/FormularioSelectData.php";
} else {
    echo "Ocorreu um erro inesperado, tente novamente mais tarde.";
}

$dataSelecionada = trim($_POST["dataSelecionada"]);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/stylecustom.css" rel="stylesheet">
    <title><?php echo $Titulo; ?> dia | Central Driver</title>
</head>

<body>
    <?php include("Includes/navbar.php") ?>
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <div class="card">
                    <h5 class="card-header"><?php echo $Titulo; ?> dia de trabalho</h5>
                    <?php
                    if (($Titulo == "Editar ou Adicionar") && (empty($dataSelecionada))) {
                        header(("location: ./FormularioSelectData.php"));
                    } else if(($Titulo == "Editar ou Adicionar") && (!empty($dataSelecionada))){
                        include("Includes/FormularioDia.php");
                    }else{
                        header("location: ./cadastraDia.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php include("Includes/Footer.php"); ?>
</body>

</html>