<?php

// Inicialize a sessão caso não exista
if(!isset($_SESSION)) {
  session_start();
}

// Verifique se o email já está logado, se sim, redirecione para a página Home.php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: home.php");
  exit;
}

require_once "./Login/Config.php";

$email = $senha = "";
$email_err = $senha_err = $login_err = "";

// Processando dados do formulário quando o formulário é enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Verifique se o email está vazio
  if (empty(trim($_POST["email"]))) {
    $email_err = "Insira um E-mail valido.";
  } else {
    $email = trim($_POST["email"]);
  }

  // Verifique se a senha está vazia
  if (empty(trim($_POST["senha"]))) {
    $senha_err = "Insira uma senha valida.";
  } else {
    $senha = trim($_POST["senha"]);
  }

  // Validar credenciais
  if (empty($email_err) && empty($senha_err)) {
    // Prepare uma declaração selecionada
    $sql = "SELECT * FROM usuario WHERE email = :email";

    if ($stmt = $pdo->prepare($sql)) {
      // Vincule as variáveis à instrução preparada como parâmetros
      $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

      // Definir parâmetros
      $param_email = trim($_POST["email"]);

      // Tente executar a declaração preparada
      if ($stmt->execute()) {
        // Verifique se o email existe, se sim, verifique a senha
        if ($stmt->rowCount() == 1) {
          if ($row = $stmt->fetch()) {
            $usuario_id = $row["usuario_id"];
            $nome = $row["nome"];
            $sobrenome = $row["sobrenome"];
            $email = $row["email"];
            
            $confirmado = $row["confirmado"];
            $pago = $row["pago"];
            $situacao = $row["sit_usuario_id"];
            $verificasenha = $row["senha"];
            if (($senha == $verificasenha)) {
              if($situacao == 1){
                    if($pago == 1){
                        // A senha está correta e o usuario foi confirmado, então inicie uma nova sessão
                        session_start();
                        // Armazene dados em variáveis de sessão
                        $_SESSION["loggedin"] = true;
                        $_SESSION["usuario_id"] = $usuario_id;
                        $_SESSION["email"] = $email;
                        $_SESSION["nome"] = $nome;
                        $_SESSION["sobrenome"] = $sobrenome;
                        $_SESSION["confirmado"] = $confirmado;
                        $_SESSION["pago"] = $pago;
                        // Redirecionar o Usuário para a página de boas-vindas
                        header("location: home.php");
                    } else {
                        $login_err = "Para acessar o aplicativo você deve primeiro selecionar um <a href='https://alissonfgc.xyz/centraldriver/plano.php'>plano</a>";
                    }
              } else{

                //enviar chave do usuario para caso não haja cadastro

                
                $Acao = "Confirmar Email";
                $login_err = "<form id='FormCadastro' name='FormCadastro' method='post' action='Controllers/ControllerCadastro.php'>
                                <input type='hidden' id='usuario_id' name='usuario_id' value='$usuario_id'>
                                <input type='hidden' id='nome' name='nome' value='$nome'>
                                <input type='hidden' id='email' name='email' value='$email'>
                                <input type='hidden' id='Acao' name='Acao' value='Confirmar Email'>
                                Necessário confirmar o seu email. 
                                <input type='submit' class='btn btn-link mb-3' value='$Acao'>
                              </form>";
            }
            } else {
              // A senha não é válida, exibe uma mensagem de erro
              $login_err = "E-mail ou senha inválidos.";
            }
          }
        } else {
          // O nome de email não existe, exibe uma mensagem de erro
          $login_err = "E-mail ou senha inválidos.";
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
  <title>Login | Central Driver</title>
</head>

<body>
<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/navbarPublic.php"); ?>
  <div class="container mt-4">
    <div class="row align-items-center">
      <div class="col-md-10 mx-auto col-lg-5">
        <?php 
          if(!empty($login_err)){
              echo '<div class="alert alert-danger">' . $login_err . '</div>';
          }        
        ?>
        <form class="p-4 p-md-5 border rounded-3 bg-light needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" novalidate>
          <div class="form-floating mb-3">
            <img src="img/logo-v.png" class="img-fluid col-md-3 mx-auto d-block col-lg-6" alt="logo" id="logo_img">
          </div>
          
          <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" id="validationCustom01" value="<?php echo $email; ?>" placeholder="E-mail" required>
            <label for="email" id="validationCustom01">E-mail</label>
            <span class="invalid-feedback"><?php echo $email_err; ?></span>
            <div class="invalid-feedback">
              Por favor, insira o E-mail.
            </div>
          </div>
          
          <div class="form-floating mb-3">
            <input autocomplete = "false" type="password" name="senha" minlength="8" inputmode="numeric" pattern="([0-9]+)" class="form-control <?php echo (!empty($senha_err)) ? 'is-invalid' : ''; ?>" id="senha" id="validationCustom02" placeholder="Senha" value="<?php echo $email; ?>" required>
            <label for="senha" id="validationCustom02">Senha</label>
            <span class="invalid-feedback"><?php echo $senha_err; ?></span>
            <div class="invalid-feedback">
              Por favor, insira sua senha.
            </div>
          </div>

          <button class=" w-100 btn btn-lg btn-success mb-3" type="submit">Entrar</button>
          <div class="form-floating mb-3 text-center">
            <a href="cadastro.php" class="link-dark">Não tenho cadastro</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include("Includes/Footer.php") ?>
</body>

</html>