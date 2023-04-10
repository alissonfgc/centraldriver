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
                    <form class="p-4 p-md-5 border rounded-3 needs-validation" novalidate>
                        <h5 class="card-header">Editar veiculo</h5>
                        <div class="card-body">
                            <h5 class="card-title">Marca</h5>
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="inputMarca" id="validationCustom01" placeholder="Marca" required>
                                <label for="inputMarca" id="validationCustom01">Marca</label>
                                <div class="invalid-feedback">
                                    Prencha o campo.
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Modelo</h5>
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="inputModelo" id="validationCustom02" placeholder="Modelo" required>
                                <label for="inputModelo" id="validationCustom02">Modelo</label>
                                <div class="invalid-feedback">
                                    Prencha o campo.
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Consumo</h5>
                            <div class="form-floating mb-3">
                                <input type="number" min="1" class="form-control" id="inputConsumo" id="validationCustom03" placeholder="Consumo" required>
                                <label for="inputConsumo" id="validationCustom03">Consumo</label>
                                <div class="invalid-feedback">
                                    Prencha o campo.
                                </div>
                            </div>
                            <button class=" w-100 btn btn-lg btn-success mb-3" type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
                </br>
                </br>
            </div>
        </div>
    </div>
  <?php include("Includes/Footer.php") ?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script>
      (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
          form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
      })()
  </script>
</body>
</html>