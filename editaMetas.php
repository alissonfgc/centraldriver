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
          <h5 class="card-header">Definir metas</h5>
          <div class="card-body">
            <form class="p-4 p-md-5 border rounded-3 needs-validation" novalidate>
              <h5 class="card-title">Farturmento semanal</h5>
              <input type="number" step="0.01" min="0.01" name="MetaSem" class="form-control" id="inputMetaSem" id="validationCustom01" placeholder="Valor" required>
              <br />
              <div class="invalid-feedback">
                Prencha o campo.
              </div>
              <button class=" w-100 btn btn-lg btn-success mb-3" type="submit">Salvar</button>
            </form>
          </div>
          <div class="card-body">
            <form class="p-4 p-md-5 border rounded-3 needs-validation" novalidate>
              <h5 class="card-title">Farturmento mensal</h5>
              <input type="number" step="0.01" min="0.01" name="MetaMen" class="form-control" id="inputMetaMen" id="validationCustom02" placeholder="Valor" required>
              <br />
              <div class="invalid-feedback">
                Prencha o campo.
              </div>
              <button class=" w-100 btn btn-lg btn-success mb-3" type="submit">Salvar</button>
            </form>
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