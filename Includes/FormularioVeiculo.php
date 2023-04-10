<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php"); ?>
<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Variaveis.php"); ?>
<?php

$usuario_idUser = $_SESSION['usuario_id'];

#Faz um select na tabela veiculo para vevificar se existem dados cadastrados
$Crud = new ClassCrud();
$VFetch = $Crud->selectDB(
    "*",
    "veiculo",
    "where FK_usuario_id=?",
    array($usuario_idUser)
);
$DVFetch = $VFetch->fetch(PDO::FETCH_ASSOC);

#Valida se o arrey DVFetch de veiculo está vazio para cadastrar ou editar.
if (empty($DVFetch)) {
    #cadastra
    $Acao = "Cadastrar";
    $veiculo_id = 0;
    $modelo = "";
    $marca = "";
    $consumo = "";
    $FK_usuario_id = $_SESSION['usuario_id'];
} else if (!empty($DVFetch)) {
    #edita
    $Acao = "Editar";
    $Crud = new ClassCrud();
    $BFetch = $Crud->selectDB("*", "veiculo", "where FK_usuario_id=?", array($_SESSION['usuario_id']));
    $Fetch = $BFetch->fetch(PDO::FETCH_ASSOC);
    $veiculo_id = $Fetch['veiculo_id'];
    $modelo = $Fetch['modelo'];
    $marca = $Fetch['marca'];
    $consumo = $Fetch['consumo'];
    $FK_usuario_id = $Fetch['FK_usuario_id'];
} else {
    echo "Ocorreu um erro inesperado, tente novamente mais tarde.";
}

?>
<?php 
if(!empty($login_err)){
    echo '<div class="alert alert-danger">' . $login_err . '</div>';
}        
?>
<form id="FormVeiculo" name="FormVeiculo" class="p-4 p-md-5 border rounded-3 needs-validation" method="post" action="Controllers/ControllerVeiculo.php" novalidate>
    <input type="hidden" id="Acao" name="Acao" value="<?php echo $Acao; ?>">
    <input type="hidden" id="veiculo_id" name="veiculo_id" value="<?php echo $veiculo_id; ?>">
    <h5 class="card-title">Modelo</h5>
        <input type="name" class="form-control" name="modelo" id="modelo" id="validationCustom02" placeholder="Modelo" value="<?php echo $modelo; ?>" required>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    <h5 class="card-title">Marca</h5>
        <input type="name" class="form-control" name="marca" id="marca" id="validationCustom01" placeholder="Marca" value="<?php echo $marca; ?>" required>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    <h5 class="card-title">Média de Consumo</h5>
        <input type="number" min="1" class="form-control" name="consumo" id="consumo" id="validationCustom03" placeholder="Consumo" value="<?php echo $consumo; ?>" required>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
        <br/>
    <input type="hidden" id="FK_usuario_id" name="FK_usuario_id" value="<?php echo $usuario_idUser; ?>">
    <input type="submit" class=" w-100 btn btn-lg btn-success mb-3" value="<?php echo $Acao; ?>">
    <div class="form-floating mb-3">
        <a href="home.php" class="w-100 btn btn-lg btn-danger stretched-link mb-3">Cancelar</a>
    </div>
</form>