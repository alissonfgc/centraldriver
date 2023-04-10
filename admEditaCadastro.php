<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylecustom.css">
    <title>Central Driver ADM</title>
</head>

<body>
    <?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/navbarAdm.php"); ?>
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-12">
                <?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/admFormularioCadastro.php"); ?>
            </div>
        </div>
    </div>
    <?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Footer.php"); ?>
</body>

</html>