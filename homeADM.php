<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/stylecustom.css" rel="stylesheet">
    <script src="scriptAlert.min.js" defer></script>
    <script src="js/zepto.min.js" defer></script>
    <title>Home Adm | Central Driver</title>
</head>
<body>
<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php"); ?>
<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/navbarAdm.php") ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-12">
                <div class="card">
                    <h5 class="card-header">Gerenciar usuários</h5>
                    <div class="card-body">
                        <h5 class="card-title">Usuários cadastrados</h5>
                            <div class="resultadoExclusao row"></div>
                            <table class="TabelaCrud">
                                <tr>
                                    <td>Nome</td>
                                    <td>E-mail</td>
                                    <td>Pago</td>
                                    <td>Situação (E-Mail)</td>
                                    <td>Ações</td>
                                </tr>
                                <!-- Estrutura de loop -->
                                <?php
                                $Crud=new ClassCrud();
                                $BFetch=$Crud->selectDB(
                                    "*",
                                    "usuario",
                                    "",
                                    array()
                                );

                                while($Fetch=$BFetch->fetch(PDO::FETCH_ASSOC)){
                                ?>
                                <tr>
                                    <td><?php echo $Fetch['nome']; ?></td>
                                    <td><?php echo $Fetch['email']; ?></td>
                                    <td><?php if($Fetch['pago'] == 1){ echo "Sim";} else if($Fetch['pago'] == 0){ echo "Não"; } else { echo "Erro"; } ?></td>
                                    <td><?php if($Fetch['sit_usuario_id'] == 1){ echo "Ativo";} else if($Fetch['sit_usuario_id'] == 2){ echo "Inativo"; } else if($Fetch['sit_usuario_id'] == 3){ echo "Aguardando Confirmação"; } else { echo "Erro"; } ?></td>
                                    <td>
                                        <a class="btn btn-dark" href="<?php echo "admVisualizarUsuario.php?usuario_id={$Fetch['usuario_id']}"; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
                                        </a>
                                        <a class="btn btn-dark" href="<?php echo "admEditaCadastro.php?usuario_id={$Fetch['usuario_id']}"; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                                        </a>
                                        <a class="btn btn-danger" onclick="return confirm('Confirma exclusão do registro?')" href="<?php echo "Controllers/ControllerDeletarUsuario.php?usuario_id={$Fetch['usuario_id']}"; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg>
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>   
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("Includes/Footer.php") ?>
</body>
</html>