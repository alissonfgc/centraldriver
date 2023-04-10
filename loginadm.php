<?php

// Inicialize a sessão caso não exista
if(!isset($_SESSION)) {
  session_start();
}

// Verifique se o adm_email já está logado, se sim, redirecione para a página homeADM.php
if (isset($_SESSION["loggedinAdm"]) && $_SESSION["loggedinAdm"] === true) {
  header("location: homeADM.php");
  exit;
}

require_once "./Login/Config.php";

$adm_email = $adm_senha = "";
$adm_email_err = $adm_senha_err = $login_err = "";

// Processando dados do formulário quando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Verifique se o adm_email está vazio
  if (empty(trim($_POST["adm_email"]))) {
    $adm_email_err = "Insira um E-mail valido.";
  } else {
    $adm_email = trim($_POST["adm_email"]);
  }

  // Verifique se a adm_senha está vazia
  if (empty(trim($_POST["adm_senha"]))) {
    $adm_senha_err = "Insira uma senha valida.";
  } else {
    $adm_senha = trim($_POST["adm_senha"]);
  }

  // Validar credenciais
  if (empty($adm_email_err) && empty($adm_senha_err)) {
    // Prepare uma declaração selecionada
    $sql = "SELECT * FROM administradores WHERE adm_email = :adm_email";

    if ($stmt = $pdo->prepare($sql)) {
      // Vincule as variáveis à instrução preparada como parâmetros
      $stmt->bindParam(":adm_email", $param_adm_email, PDO::PARAM_STR);

      // Definir parâmetros
      $param_adm_email = trim($_POST["adm_email"]);

      // Tente executar a declaração preparada
      if ($stmt->execute()) {
        // Verifique se o adm_email existe, se sim, verifique a adm_senha
        if ($stmt->rowCount() == 1) {
          if ($row = $stmt->fetch()) {
            $adm_id = $row["adm_id"];
            $adm_email = $row["adm_email"];
            $verificaadm_senha = $row["adm_senha"];
            if (($adm_senha == $verificaadm_senha)) {
                session_start();
                // Armazene dados em variáveis de sessão
                $_SESSION["loggedinAdm"] = true;
                $_SESSION["adm_id"] = $adm_id;
                $_SESSION["adm_email"] = $adm_email;

                // Redirecionar o Usuário para a página homeADM.php
                header("location: homeADM.php");
            } else {
              // A adm_senha não é válida, exibe uma mensagem de erro
              $login_err = "Email ou senha inválidos.";
            }
          }
        } else {
          // O nome de adm_email não existe, exibe uma mensagem de erro
          $login_err = "Email ou senha inválidos.";
        }
      } else {
        echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
      }
      // Fechar declaração
      unset($stmt);
    }
  }
  // Fechar conexão
  unset($pdo);
}
?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/stylecustom.css">
  <title>Login ADM | Central Driver</title>
</head>

<body class="adm">
  <nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <img src="img/logo.png" class="nav-item" alt="Logo" width="60" height="45">
        <div class="nav-item">
            <a class="btn btn-secondary" href="https://wa.me/5561981145073">Suporte
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16">
                    <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                </svg>
            </a>
            <a class="btn btn-success class="nav-item" href="index.php">Login
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
            </a>
        </div>
    </div>
</nav>
  <div class="container mt-4">
    <div class="row align-items-center">
      <div class="col-md-10 mx-auto col-lg-5">
          
        <?php 
          if(!empty($login_err)){
              echo '<div class="alert alert-danger">' . $login_err . '</div>';
          }        
        ?>
        <form class="p-4 p-md-5 border rounded-3 bg-dark needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" novalidate>
            <h5 class="text-light text-center">Login Adiministrador</h5>
          <div class="form-floating mb-3">
            <img src="img/logo-v.png" class="img-fluid col-md-3 mx-auto d-block col-lg-6" alt="logo" id="logo_img">
          </div>
          
          <div class="form-floating mb-3">
            <input type="adm_email" name="adm_email" class="form-control <?php echo (!empty($adm_email_err)) ? 'is-invalid' : ''; ?>" id="validationCustom01" value="<?php echo $adm_email; ?>" placeholder="E-mail" required>
            <label for="adm_email" id="validationCustom01">E-mail</label>
            <span class="invalid-feedback"><?php echo $adm_email_err; ?></span>
            <div class="invalid-feedback">
              Por favor, insira o E-mail.
            </div>
          </div>
          
          <div class="form-floating mb-3">
            <input autocomplete = "false" type="password" name="adm_senha" minlength="8" class="form-control <?php echo (!empty($adm_senha_err)) ? 'is-invalid' : ''; ?>" id="adm_senha" id="validationCustom02" placeholder="Senha" value="<?php echo $adm_email; ?>" required>
            <label for="adm_senha" id="validationCustom02">Senha</label>
            <span class="invalid-feedback"><?php echo $adm_senha_err; ?></span>
            <div class="invalid-feedback">
              Por favor, insira sua senha.
            </div>
          </div>
          <div class="form-floating mb-3 text-center">
            <a href="https://wa.me/5561981145073" class="link-light">Esqueceu sua senha?</a>
          </div>
          <button class=" w-100 btn btn-lg btn-success mb-3" type="submit">Entrar</button>
        </form>
      </div>
    </div>
  </div>
  <?php include("Includes/Footer.php") ?>
</body>

</html>