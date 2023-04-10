<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Protect.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link href="css/stylecustom.css" rel="stylesheet">
  <title>Metas | Central Driver</title>
</head>

<body>
  <?php include("Includes/navbar.php") ?>
  <div class="container mt-4">
    <div class="row align-items-center">
      <div class="col-md-10 mx-auto col-lg-5">
        <div class="card">
          <h5 class="card-header">Definir metas Mensais</h5>
          <div class="card-body">
          <?php include("Includes/FormularioMetas.php"); ?>
          </div>
        </div>
        </br>
        </br>
      </div>
    </div>
  </div>
  <?php include("Includes/Footer.php") ?>
</body>

</html>