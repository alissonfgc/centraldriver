<?php
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Variaveis.php");
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php");
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Protect.php");

$Crud=new ClassCrud();

$FK_usuario_id = $_SESSION['usuario_id'];

$EFetch = $Crud->selectDB(
    "data",
    "dados_expediente",
    "where FK_usuario_id=?",
    array($FK_usuario_id)
);

$DEFetch = $EFetch->fetch(PDO::FETCH_ASSOC);

if($Acao=='Cadastrar'){
    ###fazer a declaração das variaveis cadastradas altomaticamente
    /* 
    Valor do quilômetro: VA / Au = VK, onde VA é o valor abastecido, Au a autonomia e VK o valor do quilômetro;
    Para Gasto com combustível: Km * VK = GC, onde Km são os quilômetros rodados, VK o valor do quilômetro e GC o gasto com combustível relativo ao dia.
    Para ganhos líquidos: Rc – Dp = Li, onde R são os dados de receita, D são os dados de despesa e L o resultado dos ganhos líquidos;
    */

    #trazer variavel autonomia e a chave estrangeira FK_veiculo_id da tabela Veiculos
    $Crud = new ClassCrud();

    $FK_usuario_id = $_SESSION['usuario_id'];

    $VFetch = $Crud->selectDB(
        "consumo, veiculo_id",
        "veiculo",
        "where FK_usuario_id=?",
        array($FK_usuario_id)
    );

    $DVFetch = $VFetch->fetch(PDO::FETCH_ASSOC);

    $consumo = $DVFetch['consumo'];
    $FK_veiculo_id = $DVFetch['veiculo_id'];

    $valor_km = $valor_abastecido / $consumo;
    $gasto_combustivel = $km_rodados * $valor_km;
    $ganho_liquido = $faturamento - ($gasto_combustivel + $despesas);

    $Crud->insertDB(
        "dados_expediente",
        "?,?,?,?,?,?,?,?,?,?,?,?,?",
        array(
            $expediente_id,
            $data,
            $faturamento,
            $despesas,
            $km_rodados,
            $valor_abastecido,
            $horas_trabalhadas,
            $qnt_corridas,
            $valor_km,
            $gasto_combustivel,
            $ganho_liquido,
            $FK_veiculo_id,
            $FK_usuario_id
        )
    );
    #envia para a página de home
    header('Location: ../cadastraDia.php');
}else if($Acao=='Editar'){
    #tras a variavel consumo da tabela veiculo
    $Crud = new ClassCrud();

    $FK_usuario_id = $_SESSION['usuario_id'];

    $VFetch = $Crud->selectDB(
        "consumo",
        "veiculo",
        "where FK_usuario_id=?",
        array($FK_usuario_id)
    );

    $DVFetch = $VFetch->fetch(PDO::FETCH_ASSOC);

    $consumo = $DVFetch['consumo'];

    $valor_km = $valor_abastecido / $consumo;
    $gasto_combustivel = $km_rodados * $valor_km;
    $ganho_liquido = $faturamento - ($gasto_combustivel + $despesas);

    $Crud->updateDB(
        "dados_expediente",
        "data=?,faturamento=?,despesas=?,km_rodados=?,valor_abastecido=?,horas_trabalhadas=?,
        qnt_corridas=?,valor_km=?,gasto_combustivel=?,ganho_liquido=?,
        FK_veiculo_id=?,FK_usuario_id=?",
        "expediente_id=?",
        array(
            $data,
            $faturamento,
            $despesas,
            $km_rodados,
            $valor_abastecido,
            $horas_trabalhadas,
            $qnt_corridas,
            $valor_km,
            $gasto_combustivel,
            $ganho_liquido,
            $FK_veiculo_id,
            $FK_usuario_id,
            $expediente_id
        )
    );
    header('Location: ../EditaAdicionaDia.php');
}else if(($Acao=='Adicionar')){
    #traz o campo data da tabela para poder validar e verificar se 

    #tras a variavel caonsumo da tabela vaiculo
    $Crud = new ClassCrud();

    $FK_usuario_id = $_SESSION['usuario_id'];

    $VFetch = $Crud->selectDB(
        "consumo",
        "veiculo",
        "where FK_usuario_id=?",
        array($FK_usuario_id)
    );

    $DVFetch = $VFetch->fetch(PDO::FETCH_ASSOC);

    $consumo = $DVFetch['consumo'];

    $valor_km = $valor_abastecido / $consumo;
    $gasto_combustivel = $km_rodados * $valor_km;
    $ganho_liquido = $faturamento - ($gasto_combustivel + $despesas);
    $Crud->insertDB(
        "dados_expediente",
        "?,?,?,?,?,?,?,?,?,?,?,?,?",
        array(
            $expediente_id,
            $data,
            $faturamento,
            $despesas,
            $km_rodados,
            $valor_abastecido,
            $horas_trabalhadas,
            $qnt_corridas,
            $valor_km,
            $gasto_combustivel,
            $ganho_liquido,
            $FK_veiculo_id,
            $FK_usuario_id
        )
    );
    header('Location: ../EditaAdicionaDia.php');
}else{
    echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
}

?>