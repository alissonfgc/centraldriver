<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php"); ?>
<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Variaveis.php"); ?>
<?php

    /* Se houver o id: Edição de dados */
    if(isset($_GET['usuario_id'])){
        $Acao="Editar";

        $Crud=new ClassCrud();
        $BFetch=$Crud->selectDB("*","usuario","where usuario_id=?",array($_GET['usuario_id']));
        $Fetch=$BFetch->fetch(PDO::FETCH_ASSOC);
        $usuario_id=$Fetch['usuario_id'];
        $nome=$Fetch['nome'];
        $sobrenome=$Fetch['sobrenome'];
        $email=$Fetch['email'];
        $senha=$Fetch['senha'];
        $chave=$Fetch['chave'];
        $confirmado=$Fetch['confirmado'];
        $pago=$Fetch['pago'];
        $acesso_pag=$Fetch['acesso_pag'];
        $sit_usuario_id=$Fetch['sit_usuario_id'];
    }

    /* Se não: Cadastro novo */
    else{
        $Acao="Cadastrar";

        $usuario_id=0;
        $nome="";
        $sobrenome="";
        $email="";
        $senha="";
        $confirmado="";
        $pago="";
    }
?>  
<form id="FormCadastro" name="FormCadastro" method="post" action="./Controllers/ControllerCadastro.php" class="p-4 p-md-5 border rounded-3 bg-light needs-validation" novalidate>
    <input type="hidden" id="Acao" name="Acao" value="<?php echo $Acao; ?>">
    <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo $usuario_id; ?>">
    <div class="form-floating mb-3">
        <input type="text" name="usuario_id" class="form-control" id="usuario_id" value="<?php echo $usuario_id; ?>" disabled readonly>
        <label for="nome">Id do usuario</label>
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
        <input type="email" name="email" id="email" class="form-control" id="email" id="validationCustom03" placeholder="email@exemplo.com" value="<?php echo $email; ?>" required>
        <label for="email" id="validationCustom03">E-mail</label>
        <div class="invalid-feedback">
        Insira um E-mail valido.
        </div>
    </div>
    <div class="form-floating mb-3">
        <input type="password" name="senha" minlength="8" inputmode="numeric" pattern="([0-9]+)" class="form-control" id="senha" id="validationCustom04" placeholder="Apenas números" value="<?php echo $senha; ?>" required>
        <label for="senha" id="validationCustom04">Senha</label>
        <div class="invalid-feedback">
        A senha deve ser composta apenas por números e ter no minimo 8 números.
        </div>
    </div>
    <input type="hidden" id="chave" name="chave" value="<?php echo $chave; ?>">
    <div class="form-floating mb-3" hidden>
        <select class="form-select" name="confirmado" id="floatingSelect" id="confirmado" class="form-control" id="validationCustom05" aria-label="confirmado" required>
            <option selected value="<?php echo $confirmado; ?>"><?php if ($confirmado=='1'){ echo 'Sim'; }else{ echo 'Não'; }?></option>
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
        <label for="confirmado">Confirmado:</label>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" id="floatingSelect" name="pago" id="pago" id="validationCustom06" aria-label="pago" required>
            <option selected value="<?php echo $pago; ?>"><?php if ($pago=='1'){ echo 'Sim'; }else{ echo 'Não'; }?></option>
            <option value="0">Não</option>
            <option value="1">Sim</option>
        </select>
        <label for="pago">Pago:</label>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    </div>
    <input type="hidden" id="acesso_pag" name="acesso_pag" value="<?php echo $acesso_pag; ?>">
    <input type="hidden" id="sit_usuario_id" name="sit_usuario_id" value="<?php echo $sit_usuario_id; ?>">
    <div class="form-floating mb-3">
        <input type="submit" class=" w-100 btn btn-lg btn-success mb-3" value="<?php echo $Acao; ?>">
    </div>
    <div class="form-floating mb-3">
        <a href="homeADM.php" class="w-100 btn btn-lg btn-danger stretched-link mb-3">Cancelar</a>
    </div>
</form>