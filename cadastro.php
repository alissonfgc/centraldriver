<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylesheet.css">
    <title>Cadastro | Central Driver</title>
</head>
<body>
  <div class="container mt-4">
    <div class="row align-items-center">
      <div class="col-md-10 mx-auto col-lg-5">
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