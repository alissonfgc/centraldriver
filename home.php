<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/stylecustom.css" rel="stylesheet">
    <title>Home | Central Driver</title>
</head>
<body>
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
            <img src="img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            Central Driver
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Estatisticas
                        </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Editar ganhos e gastos</a></li>
                        <li><a class="dropdown-item" href="#">Editar metas</a></li>
                        <li><a class="dropdown-item" href="#">Configurar veiculo</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Conta
                        </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Dados de cadastro</a></li>
                        <li><a class="dropdown-item" href="#">Sair</a></li>
                    </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <div class="card">
                    <h5 class="card-header">Farturmento</h5>
                    <div class="card-body">
                        <h5 class="card-title">Farturmento semanal</h5>
                          
                            <canvas class="line-chart"></canvas>
                          
                          <script>
                            const labels = [
                              'January',
                              'February',
                              'March',
                              'April',
                              'May',
                              'June',
                            ];

                            const data = {
                              labels: labels,
                              datasets: [{
                                label: 'My First dataset',
                                backgroundColor: 'rgb(255, 99, 132)',
                                borderColor: 'rgb(255, 99, 132)',
                                data: [0, 10, 5, 2, 20, 30, 45],
                              }]
                            };

                            const config = {
                              type: 'line',
                              data: data,
                              options: {}
                            };
                          </script>
                          <script>
                            const myChart = new Chart(
                              document.getElementById('myChart'),
                              config
                            );
                          </script>


                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Farturmento mensal</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                </br>
                <div class="card">
                    <h5 class="card-header">Metas</h5>
                    <div class="card-body">
                        <h5 class="card-title">Meta mensal</h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <h5 class="card-title">Meta semanal</h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-label="Example with label" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                        </div>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Editar metas</a>
                    </div>
                </div>
                </br>



                <form class="p-4 p-md-5 border rounded-3 bg-dark needs-validation" novalidate>
                <div class="form-floating mb-3">
            <img src="img/logo-v.png" class="img-fluid col-md-3 mx-auto d-block col-lg-6" alt="logo" id="logo_img">
          </div>
          <div class="form-floating mb-3">
            <input type="name" class="form-control" id="inputNome" id="validationCustom01" placeholder="Nome" required>
            <label for="inputNome" id="validationCustom01">Nome</label>
              <div class="invalid-feedback">
                Prencha o campo.
              </div>
          </div>
          <div class="form-floating mb-3">
            <input type="name" class="form-control" id="inputSobrenome" id="validationCustom01" placeholder="Sobrenome" required>
            <label for="inputSobrenome" id="validationCustom01">Sobrenome</label>
              <div class="invalid-feedback">
                Prencha o campo.
              </div>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="inputEmail" id="validationCustom02" placeholder="email@exemplo.com" required>
            <label for="inputEmail" id="validationCustom02">E-mail</label>
            <div class="invalid-feedback">
              Insira um E-mail valido.
            </div>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="inputPassword" id="validationCustom03" placeholder="Senha" required>
            <label for="inputPassword" id="validationCustom03">Senha</label>
            <div class="invalid-feedback">
              Insira uma senha valida.
            </div>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="inputPassword" id="validationCustom04" placeholder="Repita a senha" required>
            <label for="inputPassword" id="validationCustom04">Repita a senha</label>
            <div class="invalid-feedback">
              Insira uma senha valida.
            </div>
          </div>
          <button class=" w-100 btn btn-lg btn-success mb-3" type="submit">Cadastrar</button>
          <div class="form-floating mb-3">
            <a href="index.php" class="link-light">Voltar para login</a>
          </div>
      </form>




      
            </div>
        </div>
    </div>
    </br>
    </br>
    </br>
    </br>
    <div class="position-fixed top-1 bottom-0 start-50 translate-middle-x">
        <button id="fixed-btn">
        <a href="home.php">+</a>
        </button>
    </div>
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