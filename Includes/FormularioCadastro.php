<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php"); ?>
<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Variaveis.php"); ?>
<?php

// Se houver o id: Edição de dados
if (isset($_SESSION['usuario_id'])) {
    $Acao = "Editar";

    $Crud = new ClassCrud();
    $BFetch = $Crud->selectDB("*", "usuario", "where usuario_id=?", array($_SESSION['usuario_id']));
    $Fetch = $BFetch->fetch(PDO::FETCH_ASSOC);
    $usuario_id = $Fetch['usuario_id'];
    $nome = $Fetch['nome'];
    $sobrenome = $Fetch['sobrenome'];
    $email = $Fetch['email'];
    $senha = $Fetch['senha'];
    $confirmado = $Fetch['confirmado'];
    $pago = $Fetch['pago'];
}
// Se não: Cadastro novo
else {
    $Acao = "Cadastrar";
    $usuario_id = 0;
    $nome = "";
    $sobrenome = "";
    $email = "";
    $senha = "";
    $confirmado = "";
    $pago = "";
}
?>
<form id="FormCadastro" name="FormCadastro" method="post" action="Controllers/ControllerCadastro.php" class="p-4 p-md-5 border rounded-3 bg-light needs-validation" novalidate>
    <input type="hidden" id="Acao" name="Acao" value="<?php echo $Acao; ?>">
    <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo $usuario_id; ?>">
    <div class="form-floating mb-3">
        <img src="img/logo-v.png" class="img-fluid col-md-3 mx-auto d-block col-lg-6" alt="logo" id="logo_img">
    </div>
    <div class="form-floating mb-3">
        <input type="name" name="nome" class="form-control" id="nome" id="validationCustom01" placeholder="Nome" value="<?php echo $nome; ?>" required>
        <label for="nome" id="validationCustom01">Nome</label>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    </div>
    <div class="form-floating mb-3">
        <input type="name" name="sobrenome" class="form-control" id="sobrenome" id="validationCustom02" placeholder="Sobrenome" value="<?php echo $sobrenome; ?>" required>
        <label for="sobrenome" id="validationCustom02">Sobrenome</label>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    </div>
    <div class="form-floating mb-3">
        <input type="email" name="email" id="email" class="form-control" id="email" id="validationCustom03" <?php echo (empty($email_err)) ? 'is-invalid' : ''; ?> value="<?php echo $email; ?>" required>
        <label for="email" id="validationCustom03">E-mail</label>
        <span class="invalid-feedback"><?php echo $email_err; ?></span>
        <div class="invalid-feedback">
            Insira um E-mail valido.
        </div>
    </div>
    <div class="form-floating mb-3">
        <input type="password" name="senha" minlength="8" inputmode="numeric" pattern="([0-9]+)" class="form-control" id="senha" id="validationCustom04" value="<?php echo $senha; ?>" required>
        <label for="senha" id="validationCustom04">Senha</label>
        <div class="invalid-feedback">
            A senha deve ser composta apenas por números e ter no minimo 8 números.
        </div>
    </div>
    <input type="submit" class=" w-100 btn btn-lg btn-success mb-3" value="<?php echo $Acao; ?>">
    <div class="form-floating mb-3 text-center">
        <a href="index.php" class="link-dark">Voltar para login</a>
    </div>
</form>