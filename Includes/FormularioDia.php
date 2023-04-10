<?php

#define as variaveis a serem usadas
$FK_usuario_id = $_SESSION['usuario_id'];
$dia_err = $Acao = "";

####Traz a FK_veiculo_id caso exista, caso contrario, exibe alerta e redirecionar para pagina de cadastro de veiculo.
#Faz um select na tabela veiculo para validar se existem dados cadastrados
$Crud = new ClassCrud();
$VFetch = $Crud->selectDB(
    "*",
    "veiculo",
    "where FK_usuario_id=?",
    array($FK_usuario_id)
);
$DVFetch = $VFetch->fetch(PDO::FETCH_ASSOC);

$VFetch = $Crud->selectDB(
    "consumo, veiculo_id",
    "veiculo",
    "where FK_usuario_id=?",
    array($FK_usuario_id)
);

$DVFetch = $VFetch->fetch(PDO::FETCH_ASSOC);

if (!empty($DVFetch)) {
    $consumo = $DVFetch['consumo'];
    $FK_veiculo_id = $DVFetch['veiculo_id'];
}


if ($Titulo == "Editar ou Adicionar") {
    $dataSelecionada = $_POST["dataSelecionada"];
}

$Crud=new ClassCrud();

unset($DEFetch);

$FK_usuario_id = $_SESSION['usuario_id'];

$EFetch = $Crud->selectDB(
    "data",
    "dados_expediente",
    "where FK_usuario_id=?",
    array($FK_usuario_id)
);

$DEFetch = $EFetch->fetch(PDO::FETCH_ASSOC);

#verifica se já existe dados na tabela dado_expediente
if (empty($DEFetch)) {
    #se não existir vai para o formulario do primeiro cadastro de dia.
    $Acao='Cadastrar';
} else if (!empty($DEFetch)) {
    #esvazia a variavel novamente
    unset($DEFetch);
    $FK_usuario_id = $_SESSION['usuario_id'];

    $EFetch = $Crud->selectDB(
        "data",
        "dados_expediente",
        "where FK_usuario_id=? and data=?",
        array($FK_usuario_id, $dataSelecionada)
    );

    $DEFetch = $EFetch->fetch(PDO::FETCH_ASSOC);

    #caso exista vai para o formulario de seleção de dia, para cadastrar ou editar dia existente.
    if ((!empty($DEFetch)) && ($dataSelecionada == $DEFetch['data'])){
        $Acao = 'Editar';
    }else if(empty($DEFetch)){
        $Acao = 'Adicionar';
    }
} else {
    echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
}

#Valida se o arrey DVFetch de veiculo está vazio para cadastrar ou editar.
if (empty($DVFetch)) {
    $dia_err = "Para que você possa acessar esta pagina você deve primeiro <a href='cadastraVeiculo.php'>cadastrar o seu veículo</a>!";
} else if (!empty($DVFetch)) {
    ### caso passe pela validação de veiculo cadastrado -->
    #para o caso de ser o primeiro cadastro -->
    #Faz um select na tabela dados_expediente para vevificar se já existem dados cadastrados
    $Crud = new ClassCrud();
    $EFetch = $Crud->selectDB(
        "*",
        "dados_expediente",
        "where FK_usuario_id=?",
        array($FK_usuario_id)
    );
    $DEFetch = $EFetch->fetch(PDO::FETCH_ASSOC);

    #Valida se o arrey DEFetch (Dados Expediente) de dados_expediente está vazio para cadastrar ou editar.
    if (empty($DEFetch)) {
        #para cadastrar o PRIMEIRO dia vinculado a FK_usuario_id
        $Acao = "Cadastrar";
        $expediente_id = 0;
        $data = "";
        $faturamento = "";
        $despesas = "";
        $km_rodados = "";
        $valor_abastecido = "";
        $horas_trabalhadas = "";
        $qnt_corridas = "";
        $valor_km = "";
        $gasto_combustivel = "";
        $ganho_liquido = "";
        $FK_veiculo_id = $DVFetch['veiculo_id'];
        $FK_usuario_id = $_SESSION['usuario_id'];
    } else if ($Acao == 'Editar') {
        #para editar um dia especifico vinculado a FK_usuario_id
        $Acao = "Editar";
        $Crud = new ClassCrud();
        $dataSelecionada = $_POST["dataSelecionada"];
        $BFetch = $Crud->selectDB("*", "dados_expediente", "where FK_usuario_id=? and data=?", array($_SESSION['usuario_id'], $dataSelecionada));
        $Fetch = $BFetch->fetch(PDO::FETCH_ASSOC);
        $expediente_id = $Fetch['expediente_id'];
        $data = $Fetch['data'];
        $faturamento = $Fetch['faturamento'];
        $despesas = $Fetch['despesas'];
        $km_rodados = $Fetch['km_rodados'];
        $valor_abastecido = $Fetch['valor_abastecido'];
        $horas_trabalhadas = $Fetch['horas_trabalhadas'];
        $qnt_corridas = $Fetch['qnt_corridas'];
        $valor_km = $Fetch['valor_km'];
        $gasto_combustivel = $Fetch['gasto_combustivel'];
        $ganho_liquido = $Fetch['ganho_liquido'];
        $FK_veiculo_id = $Fetch['FK_veiculo_id'];
        $FK_usuario_id = $Fetch['FK_usuario_id'];
    } else if ($Acao == 'Adicionar') {
        $Acao = "Adicionar";
        $expediente_id = 0;
        $data = $dataSelecionada;
        $faturamento = "";
        $despesas = "";
        $km_rodados = "";
        $valor_abastecido = "";
        $horas_trabalhadas = "";
        $qnt_corridas = "";
        $valor_km = "";
        $gasto_combustivel = "";
        $ganho_liquido = "";
        $FK_usuario_id = $_SESSION['usuario_id'];
    } else {
        echo "Ocorreu um erro inesperado, tente novamente mais tarde.";
    }
} else {
    echo "Ocorreu um erro inesperado, tente novamente mais tarde.";
}

?>
<?php
if (!empty($dia_err)) {
    echo '<div class="alert alert-danger">' . $dia_err . '</div>';
}
?>
<form method="post" <?php if (!empty($dia_err)) { echo "style='display:none;'"; } ?> class="p-4 p-md-5 border rounded-3 needs-validation" action="./Controllers/ControllerDia.php" novalidate>
    <h5 class="card-title text-center"><?php echo $Acao; ?></h5>
    <br/>
    <input type="hidden" id="Acao" name="Acao" value="<?php echo $Acao; ?>">
    <input type="hidden" id="expediente_id" name="expediente_id" value="<?php echo $expediente_id; ?>">
    <div class="form-floating mb-3">
        <input type="<?php if(($Acao == "Editar") || ($Acao == "Adicionar")){ echo "date";}else{echo "hidden";} ?>" name="data" class="form-control" id="data" id="validationCustom01" <?php if(($Acao == "Editar") || ($Acao == "Adicionar")){ echo 'disabled';} ?> value="<?php echo $data; ?>" required>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    </div>
    <div class="form-floating mb-3">
        <input name="data" type="<?php if($Acao == "Cadastrar"){ echo 'date';}else{echo 'hidden';} ?>" value="<?php echo $data; ?>" class="form-control" id="data" id="validationCustom01" value="<?php echo $data; ?>" required>
        <label for="data" id="validationCustom06">Data</label>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    </div>
    <div class="form-floating mb-3">
        <input type="number" step="0.01" min="0.01" name="faturamento" class="form-control" value="<?php echo $faturamento; ?>" id="faturamento" id="validationCustom02" placeholder="Valor" required>
        <label for="email" id="validationCustom02">Farturmento</label>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    </div>
    <div class="form-floating mb-3">
        <input type="number" step="0.01" min="0.01" name="despesas" class="form-control" value="<?php echo $despesas; ?>" id="despesas" id="validationCustom03" placeholder="Valor" required>
        <label for="despesas" id="validationCustom03">Despesas</label>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    </div>
    <div class="form-floating mb-3">
        <input type="number" step="0.01" min="0.01" name="km_rodados" class="form-control" value="<?php echo $km_rodados; ?>" id="km_rodados" id="validationCustom04" placeholder="Km's" required>
        <label for="km_rodados" id="validationCustom04">Km's Rodados</label>
        <div id="validationCustom04" class="invalid-feedback">
            Prencha o campo.
        </div>
    </div>        
    <div class="form-floating mb-3">
        <input type="number" step="0.01" min="0.01" name="valor_abastecido" class="form-control" value="<?php echo $valor_abastecido; ?>" id="valor_abastecido" id="validationCustom05" placeholder="Valor" required>
        <label for="valor_abastecido" id="validationCustom05">Valor por litro abastecido</label>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    </div>
    <div class="form-floating mb-3">
        <input type="number" min="1" name="horas_trabalhadas" class="form-control" id="horas_trabalhadas" value="<?php echo $horas_trabalhadas; ?>" id="validationCustom06" placeholder="Quantidade" required>
        <label for="horas_trabalhadas" id="validationCustom06">Quantidade de horas trabalhadas</label>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    </div>
    <div class="form-floating mb-3">
        <input type="number" min="1" name="qnt_corridas" class="form-control" id="qnt_corridas" value="<?php echo $qnt_corridas; ?>" id="validationCustom07" placeholder="Quantidade" required>
        <label for="qnt_corridas" id="validationCustom07">Quantidade de corridas</label>
        <div class="invalid-feedback">
            Prencha o campo.
        </div>
    </div>

    <input type="hidden" id="valor_km" name="valor_km" value="<?php echo $valor_km; ?>">
    <input type="hidden" id="gasto_combustivel" name="gasto_combustivel" value="<?php echo $gasto_combustivel; ?>">
    <input type="hidden" id="ganho_liquido" name="ganho_liquido" value="<?php echo $ganho_liquido; ?>">
    <input type="hidden" id="FK_veiculo_id" name="FK_veiculo_id" value="<?php echo $FK_veiculo_id; ?>">
    <input type="hidden" id="FK_usuario_id" name="FK_usuario_id" value="<?php echo $FK_usuario_id; ?>">
    <input type="submit" class=" w-100 btn btn-lg btn-success mb-3" value="<?php echo $Acao; ?>">
    <div class="form-floating mb-3">
        <a href="home.php" class="w-100 btn btn-lg btn-danger stretched-link mb-3">Cancelar</a>
    </div>
</form>