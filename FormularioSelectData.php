<?php 
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php");
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Variaveis.php");

$dataSelecionada = '';
unset($_POST["dataSelecionada"]);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="./css/stylecustom.css" rel="stylesheet">
    <title>Seleciona dia | Central Driver</title>
</head>

<body>
    <?php include("./Includes/navbar.php") ?>
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <div class="card">
                    <h5 class="card-header">Seleciona dia de trabalho</h5>
                    <form type="hidden" class="p-4 p-md-5 border rounded-3 needs-validation" method="post" action="./EditaAdicionaDia.php" novalidate>
                        <h5 class="card-title">Selecione o dia que deseja Adicionar ou Editar:</h5>
                        <div class="form-floating mb-3">
                            <input type="date" name="dataSelecionada" id="dataSelecionada" class="form-control" id="validationCustom01" required>
                            <label for="dataSelecionada">Data</label>
                            <div class="invalid-feedback">
                                Prencha o campo.
                            </div>
                        </div>
                        <input type="submit" class=" w-100 btn btn-lg btn-success mb-3" value="Selecionar">
                        <div class="form-floating mb-3">
                            <a href="home.php" class="w-100 btn btn-lg btn-danger stretched-link mb-3">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include("./Includes/Footer.php"); ?>
</body>

</html>