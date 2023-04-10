<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php"); ?>
<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Variaveis.php"); ?>
<?php

$usuario_idUser = $_SESSION['usuario_id'];

#Faz um select na tabela metas para vevificar se existem dados cadastrados
$Crud = new ClassCrud();
$MFetch = $Crud->selectDB(
    "*",
    "metas",
    "where FK_usuario_id=?",
    array($usuario_idUser)
);
$DMFetch = $MFetch->fetch(PDO::FETCH_ASSOC);

#Valida se o arrey DMFetch de Metas está vazio para cadastrar ou editar.
if (empty($DMFetch)) {
    #cadastra
    $Acao = "Cadastrar";
    $metas_id = 0;
    $meta_sem = "";
    $meta_men = "";
    $FK_usuario_id = $_SESSION['usuario_id'];
} else if (!empty($DMFetch)) {
    #edita
    $Acao = "Editar";
    $Crud = new ClassCrud();
    $BFetch = $Crud->selectDB("*", "metas", "where FK_usuario_id=?", array($_SESSION['usuario_id']));
    $Fetch = $BFetch->fetch(PDO::FETCH_ASSOC);
    $metas_id = $Fetch['metas_id'];
    $meta_sem = $Fetch['meta_sem'];
    $meta_men = $Fetch['meta_men'];
    $FK_usuario_id = $Fetch['FK_usuario_id'];
} else {
    echo "Ocorreu um erro inesperado, tente novamente mais tarde.";
}

?>
<form id="FormMetas" name="FormMetas" class="p-4 p-md-5 border rounded-3 needs-validation" method="post" action="Controllers/ControllerMetas.php" novalidate>
    <input type="hidden" id="Acao" name="Acao" value="<?php echo $Acao; ?>">
    <input type="hidden" id="metas_id" name="metas_id" value="<?php echo $metas_id; ?>">
    <h5 class="card-title">Meta de Ganho Liquido</h5>
    <input type="number" step="0.01" min="0.01" name="meta_sem" class="form-control" id="meta_sem" id="validationCustom01" placeholder="Valor" value="<?php echo $meta_sem; ?>" required>
    <div class="invalid-feedback">
        Prencha o campo.
    </div>
    <br/>
    <h5 class="card-title">Meta de Faturamento</h5>
    <input type="number" step="0.01" min="0.01" name="meta_men" class="form-control" id="meta_men" id="validationCustom02" placeholder="Valor" value="<?php echo $meta_men; ?>" required>
    <br />
    <div class="invalid-feedback">
        Prencha o campo.
    </div>
    <input type="hidden" id="FK_usuario_id" name="FK_usuario_id" value="<?php echo $usuario_idUser; ?>">
    <input type="submit" class=" w-100 btn btn-lg btn-success mb-3" value="<?php echo $Acao; ?>">
    <div class="form-floating mb-3">
        <a href="home.php" class="w-100 btn btn-lg btn-danger stretched-link mb-3">Cancelar</a>
    </div>
</form>