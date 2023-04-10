<?php
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php");


$chave = filter_input(INPUT_GET, "chave", FILTER_SANITIZE_STRING);

?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="css/stylecustom.css">
  <title>Cadastro realizado | Central Driver</title>
</head>

<body>
  <div class="container mt-4">
    <div class="row align-items-center">
      <div class="col-md-10 mx-auto col-lg-5">
<!-- fazer validação: se existir chave não disparar o alerta -->      
<?php

if(!empty($chave)){

  $Crud = new ClassCrud();

  unset($DUFetch);
  unset($UFetch);

  $UFetch = $Crud->selectDB(
    "usuario_id",
    "usuario",
    "where chave=?",
    array($chave)
  );

  $DUFetch = $UFetch->fetch(PDO::FETCH_ASSOC);

  if(!empty($DUFetch)){
    #para caso a chave exista na tabela
    $Crud->updateDB(
        "usuario",
        "sit_usuario_id=?",
        "usuario_id=?",
        array(
            1,
            $DUFetch['usuario_id']
        )
    );
    $Crud = new ClassCrud();

    unset($CDUFetch);
    unset($CUFetch);
  
    $CUFetch = $Crud->selectDB(
      "usuario_id, sit_usuario_id",
      "usuario",
      "where chave=? and usuario_id=?",
      array($chave, $DUFetch['usuario_id'])
    );
  
    $CDUFetch = $CUFetch->fetch(PDO::FETCH_ASSOC);

    if($CDUFetch['sit_usuario_id'] == 1){

      $Crud->updateDB(
          "usuario",
          "chave=?",
          "usuario_id=?",
          array(
              NULL,
              $DUFetch['usuario_id']
          )
      );
      $Crud = new ClassCrud();
      echo "<div class='alert alert-success alert-dismissible fade show'>
        <button class='btn-close' data-bs-dismiss='alert'></button>
        E-mail confirmado com sucesso!
      </div>";
    } else{
      echo "<div class='alert alert-danger alert-dismissible fade show'>
        <button class='btn-close' data-bs-dismiss='alert'></button>
        <strong>Erro:</strong>
        E-mail não confirmado.
      </div>";
    }
    
  }else{
    #para caso a chave não exista na tabela
    echo "<div class='alert alert-danger alert-dismissible fade show'>
      <button class='btn-close' data-bs-dismiss='alert'></button>
      <strong>Erro:</strong>
       Endereço inválido.
    </div>";
  }
}else{
  #para não tenha chave na url
  echo"<div class='alert alert-success alert-dismissible fade show'>
        <button class='btn-close' data-bs-dismiss='alert'></button>
        <strong>Cadastro Realizado com Sucesso!</strong>
        <br />
        Agora confirme seu cadastro no E-mail que te enviamos.
      </div>";
}
?> 
        <form id='FormCadastro' name='FormCadastro' method='post' action='Controllers/ControllerCadastro.php'></form> 
        <form class="p-4 p-md-5 border rounded-3 bg-dark needs-validation" novalidate>
          <div class="form-floating mb-3">
            <img src="img/logo-v.png" class="img-fluid col-md-3 mx-auto d-block col-lg-6" alt="logo" id="logo_img">
          </div>
          <div class="form-floating mb-3 text-center">
            <a href="index.php" class="link-light ">Voltar para login</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Footer.php") ?>
</body>

</html>