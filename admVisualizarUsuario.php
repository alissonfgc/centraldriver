<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php"); ?>
<?php
$Crud = new ClassCrud();
$usuario_idUser = filter_input(INPUT_GET, 'usuario_id', FILTER_SANITIZE_SPECIAL_CHARS);

$BFetch = $Crud->selectDB(
    "*",
    "usuario",
    "where usuario_id=?",
    array($usuario_idUser)
);
$Fetch = $BFetch->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/stylecustom.css" rel="stylesheet">
    <title>Central Driver Adm</title>
</head>

<body>
<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/navbarAdm.php"); ?>
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-12 text-center">
                <div class="card">
                    <h5 class="card-header">Vizualizar Usuário</h5>
                    <div class="card-body">
                        <h5 class="card-title">Dados do Usuário</h5>
                        <hr>
                        <div class="table-responsive">
                            <table class="table caption-top align-middle table-bordered border-dark">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nome:</th>
                                        <td><?php echo $Fetch['nome']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Sobrenome:</th>
                                        <td><?php echo $Fetch['sobrenome']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">E-mail:</th>
                                        <td><?php echo $Fetch['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Situação E-mail:</th>
                                        <td><?php if($Fetch['acesso_pag'] == 1){ echo"Ativo"; } else if($Fetch['acesso_pag'] == 2){ echo"Inativo"; }else{ echo"Aguardando Confirmação";} ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Pago:</th>
                                        <td><?php if($Fetch['pago'] == 1){ echo "Sim"; } else { echo "Não"; } ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <a href="./homeADM.php" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Footer.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>