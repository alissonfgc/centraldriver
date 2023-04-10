<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Protect.php"); ?>
<?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php"); ?>
<?php

###REVISAR UTILIZAÇÃO

$Crud = new ClassCrud();

$usuario_idUser = $_SESSION['usuario_id'];

$UFetch = $Crud->selectDB(
    "*",
    "usuario",
    "where usuario_id=?",
    array($usuario_idUser)
);
$DUFetch = $UFetch->fetch(PDO::FETCH_ASSOC);

#Nesta tabela a variavel $usuario_Id é uma cheve estrangeira
$MFetch = $Crud->selectDB(
    "*",
    "metas",
    "where FK_usuario_id=?",
    array($usuario_idUser)
);
$DMFetch = $MFetch->fetch(PDO::FETCH_ASSOC);

#Nesta tabela a variavel $usuario_Id é uma cheve estrangeira
$VFetch = $Crud->selectDB(
    "*",
    "veiculo",
    "where FK_usuario_id=?",
    array($usuario_idUser)
);
$DVFetch = $VFetch->fetch(PDO::FETCH_ASSOC);

#Nesta tabela a variavel $usuario_Id é uma cheve estrangeira
$EFetch = $Crud->selectDB(
    "*",
    "dados_expediente",
    "where FK_usuario_id=?",
    array($usuario_idUser)
);
$DEFetch = $EFetch->fetch(PDO::FETCH_ASSOC);


?>

<?php print_r($_SESSION); ?>
<br>
<br>
<?php print_r($UFetch); ?>
<br>
<br>
<?php print_r($DUFetch); ?>
<br>
<br>
<?php print_r($MFetch); ?>
<br>
<br>
<?php print_r($DMFetch); ?>
<br>
<br>
<?php print_r($VFetch); ?>
<br>
<br>
<?php print_r($DVFetch); ?>
<br>
<br>
<?php print_r($EFetch); ?>
<br>
<br>
<?php print_r($DEFetch); ?>
<br>
<br>
<h2>Tabela usuario</h2>
<strong>Id:</strong> <?php echo $_SESSION['usuario_id']; ?><br>
<strong>Nome:</strong> <?php echo $DUFetch['nome']; ?><br>
<strong>Sobrenome:</strong> <?php echo $DUFetch['sobrenome']; ?><br>
<strong>E-mail:</strong> <?php echo $DUFetch['email']; ?><br>
<strong>Senha:</strong> <?php echo $DUFetch['senha']; ?><br>
<strong>Confirmado:</strong> <?php echo $DUFetch['confirmado']; ?><br>
<strong>Pago:</strong> <?php echo $DUFetch['pago']; ?><br>
<br>
<h2>Tabela metas</h2>
<strong>metas_id:</strong> <?php echo $DMFetch['metas_id']; ?><br>
<strong>meta_sem:</strong> <?php echo $DMFetch['meta_sem']; ?><br>
<strong>meta_men:</strong> <?php echo $DMFetch['meta_men']; ?><br>
<strong>FK_usuario_id:</strong> <?php echo $DMFetch['FK_usuario_id']; ?><br>
<br>
<h1>Tabela veiculo</h1>
<strong>veiculo_id:</strong> <?php echo $DVFetch['veiculo_id']; ?><br>
<strong>modelo:</strong> <?php echo $DVFetch['modelo']; ?><br>
<strong>marca:</strong> <?php echo $DVFetch['marca']; ?><br>
<strong>consumo:</strong> <?php echo $DVFetch['consumo']; ?><br>
<strong>FK_usuario_id:</strong> <?php echo $DVFetch['FK_usuario_id']; ?><br>
<br>

<?php 
    if(empty($DEFetch)){
        echo "O Arrey DEFetch está vazio";
        #Neste caso os dados não irão para a pagina.
        
    }else if(!empty($DEFetch)){
        echo "Este Arrey não está vazio";
    }else{
        echo "Ocorreu um erro inesperado, tente novamente mais tarde.";
    }
?>
<h1>Tabela dados_expediente</h1>
<strong>expediente_id :</strong> <?php echo $DEFetch['expediente_id']; ?><br>
<strong>data:</strong> <?php echo $DEFetch['data']; ?><br>
<strong>faturamento:</strong> <?php echo $DEFetch['faturamento']; ?><br>
<strong>despesas:</strong> <?php echo $DEFetch['despesas']; ?><br>
<strong>km_rodados:</strong> <?php echo $DEFetch['km_rodados']; ?><br>
<strong>valor_abastecido:</strong> <?php echo $DEFetch['valor_abastecido']; ?><br>
<strong>horas_trabalhadas:</strong> <?php echo $DEFetch['horas_trabalhadas']; ?><br>
<strong>qnt_corridas:</strong> <?php echo $DEFetch['qnt_corridas']; ?><br>
<strong>valor_km:</strong> <?php echo $DEFetch['valor_km']; ?><br>
<strong>gasto_combustivel:</strong> <?php echo $DEFetch['gasto_combustivel']; ?><br>
<strong>ganho_liquido:</strong> <?php echo $DEFetch['ganho_liquido']; ?><br>
<strong>FK_veiculo_id :</strong> <?php echo $DEFetch['FK_veiculo_id ']; ?><br>
<strong>FK_usuario_id :</strong> <?php echo $DEFetch['FK_usuario_id ']; ?><br>
<br>