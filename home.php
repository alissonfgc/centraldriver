<?php
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Variaveis.php");
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php");
?>
<?php
#faz um select db onde o mes do campo data for equivalente ao mes atual
$Crud = new ClassCrud();
$dataAtual = date('Y-m-');

unset($DEAllFetch);
unset($EAllFetch);

$EAllFetch = $Crud->selectDB(
    "data, faturamento, ganho_liquido",
    "dados_expediente",
    "where FK_usuario_id=? and data BETWEEN (?) AND (?) order by data",
    array($FK_usuario_id, $dataAtual . 01, $dataAtual . 31)
);

$DEAllFetch = $EAllFetch->fetchAll(PDO::FETCH_ASSOC);

##fazendo a conversão da string para float e somando PARA FATURAMENTO
unset($ArrayFaturamento);
unset($somaFarturamenturamento);
$i = 0;
$count = count($DEAllFetch);
$somaFarturamenturamento = 0;
while ($i <=  ($count - 1)) {
    $ArrayFaturamento[$i]['faturamento'] = (float)$DEAllFetch[$i]['faturamento'];
    $somaFarturamenturamento = $ArrayFaturamento[$i]['faturamento'] + $somaFarturamenturamento;
    $i = $i + 1;
}
#convertendo valor para a exibição
$Fat = number_format($somaFarturamenturamento, 2, ',', '');

##fazendo a conversão da string para float e somando PARA GANHO LIQUIDO
unset($ArrayLiquido);
unset($somaLiquido);
$i = 0;
$count = count($DEAllFetch);
$somaLiquido = 0;
while ($i <=  ($count - 1)) {
    $ArrayLiquido[$i]['ganho_liquido'] = (float)$DEAllFetch[$i]['ganho_liquido'];
    $somaLiquido = $ArrayLiquido[$i]['ganho_liquido'] + $somaLiquido;
    $i = $i + 1;
}
#convertendo valor para a exibição
$Liq = number_format($somaLiquido, 2, ',', '');

###Faz um select na tabela Dia para validar o primeiro dia 

unset($DEFetch);
unset($EFetch);

$EFetch = $Crud->selectDB(
    "*",
    "dados_expediente",
    "where FK_usuario_id=?",
    array($FK_usuario_id)
);
$DEFetch = $EFetch->fetch(PDO::FETCH_ASSOC);

###Faz um select na tabela Veiculo para validar o primeiro Acesso 

unset($DVFetch);
unset($VFetch);

$VFetch = $Crud->selectDB(
    "*",
    "veiculo",
    "where FK_usuario_id=?",
    array($FK_usuario_id)
);
$DVFetch = $VFetch->fetch(PDO::FETCH_ASSOC);

### faz um select db na tabela meta para compara o quanto faturou com oque falta
$Crud = new ClassCrud();

unset($DMFetch);
unset($MFetch);

$MFetch = $Crud->selectDB(
    "meta_sem, meta_men",
    "metas",
    "where FK_usuario_id=?",
    array($FK_usuario_id)
);
$DMFetch = $MFetch->fetch(PDO::FETCH_ASSOC);

if (!empty($DMFetch)) {
    $meta_men = (float)$DMFetch['meta_men'];
    $meta_sem = (float)$DMFetch['meta_sem'];

    ###fazendo regra de tres para exibir dados na tela
    $PorcentagemFat = ($somaFarturamenturamento * 100) / $meta_men;
    $PorcentagemLiq = ($somaLiquido * 100) / $meta_sem;
    #convertendo valor para a exibição
    $FatP = number_format($PorcentagemFat, 2, '.', '');
    $LiqP = number_format($PorcentagemLiq, 2, '.', '');
}

######################Codigos relativos aos graficos
######## trazer mes corretos para o grafico de faturamento
#faz um select db onde o mes do campo data for equivalente ao ANO atual
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$Crud = new ClassCrud();
$anoAtual = date('Y');

unset($DE_ANO_Fetch);
unset($E_ANO_Fetch);

$E_ANO_Fetch = $Crud->selectDB(
    "DISTINCT MONTH(data)",
    "dados_expediente",
    "where FK_usuario_id=? and YEAR(data) = ? order by data",
    array($FK_usuario_id, $anoAtual)
);

$DE_ANO_Fetch = $E_ANO_Fetch->fetchAll(PDO::FETCH_ASSOC);

########################### trazer dados de faturamento dos meses completos do ano

#faz um select db onde o mes do campo data for equivalente ao ANO atual

$Crud = new ClassCrud();
$anoAtual = date('Y');

unset($FE_MES_Fetch);
unset($F_MES_Fetch);

$F_MES_Fetch = $Crud->selectDB(
    "data, Sum(faturamento) as faturamento, Sum(ganho_liquido) as ganho_liquido",
    "dados_expediente",
    "where FK_usuario_id=? and YEAR(data) = ? Group by MONTH(data) order by data",
    array($FK_usuario_id, $anoAtual)
);

$FE_MES_Fetch = $F_MES_Fetch->fetchAll(PDO::FETCH_ASSOC);

#meta_sem = Liquido e meta_men = faturamento

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/stylecustom.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Mês', 'Farturmento'],
                <?php
                #Laço de repetição para escrever o mes
                $i = 0;
                $count = count($DE_ANO_Fetch);
                while ($i <=  ($count - 1)) {
                    $m = $DE_ANO_Fetch[$i]['MONTH(data)'];
                    $dateTime = new DateTime("$anoAtual-00-01 + $m months");
                    $dataEscrito = $dateTime->format("Y-m-d");
                    $f = $FE_MES_Fetch[$i]['faturamento'];
                    $l = $FE_MES_Fetch[$i]['ganho_liquido'];
                    $i = $i + 1;
                ?>

                    ["<?php echo strftime('%b', strtotime($dataEscrito)); ?>", <?php echo $f; ?>],

                <?php } ?>
            ]);

            var options = {
                width: 300,
                legend: {
                    position: 'none'
                },
                chart: {},
                axes: {
                    x: {
                        0: {
                            side: 'down'
                        } // Top x-axis.
                    }
                },
                bar: {
                    groupWidth: "80%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('GraficoFaturamento'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Mês', 'Ganho Liquido'],
                <?php
                #Laço de repetição para escrever o mes
                $i = 0;
                $count = count($DE_ANO_Fetch);
                while ($i <=  ($count - 1)) {
                    $m = $DE_ANO_Fetch[$i]['MONTH(data)'];
                    $dateTime = new DateTime("$anoAtual-00-01 + $m months");
                    $dataEscrito = $dateTime->format("Y-m-d");
                    $f = $FE_MES_Fetch[$i]['faturamento'];
                    $l = $FE_MES_Fetch[$i]['ganho_liquido'];
                    $i = $i + 1;
                ?>

                    ["<?php echo strftime('%b', strtotime($dataEscrito)); ?>", <?php echo $l; ?>],

                <?php } ?>

            ]);

            var options = {
                width: 300,
                legend: {
                    position: 'none'
                },
                chart: {

                },
                axes: {
                    x: {
                        0: {
                            side: 'down'
                        } // Top x-axis.
                    }
                },
                bar: {
                    groupWidth: "80%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('GraficoLiquido'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>
    <title>Home | Central Driver</title>
</head>

<body>
    <?php include("Includes/navbar.php") ?>
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <div class="card">
                    <h5 class="card-header">Ganhos anuais de <?php echo $anoAtual; ?></h5>
                    <?php if (empty($DVFetch)) { echo '<div class="alert alert-danger">' . "Para que as estatisticas sejam exibidas você deve primeiro <a href='cadastraVeiculo.php'>cadastrar o veiculo</a>!" . '</div>'; } ?>
                    <?php if (empty($DEAllFetch)) { echo '<div class="alert alert-danger">' . "Para que as estatisticas sejam exibidas você deve primeiro <a href='cadastraDia.php'>cadastrar expediente</a>!" . '</div>'; } ?>
                    <div class="card-body <?php if (empty($DEAllFetch)) { echo "d-none"; } ?>">
                        <h5 class="card-title">Ganho liquido Por Mês</h5>
                        <div id="GraficoLiquido" style="position: relative; width: 80%; height: 220px;"></div>
                    </div>
                    <div class="card-body <?php if (empty($DEAllFetch)) { echo "d-none"; } ?>">
                        <h5 class="card-title">Farturmento Por Mês</h5>
                        <div id="GraficoFaturamento" style="position: relative; width: 80%; height: 220px;"></div>
                    </div>
                    <hr/>
                    <p class="card-text text-center text-muted">Os calculados são feitos com base em seu faturamento diario.</p>
                </div>
                </br>
                <div class="card">
                    <h5 class="card-header ">Metas do mês de <?php echo strftime('%B', strtotime('today')); ?></h5>
                    <?php if (empty($DMFetch)) { echo '<div class="alert alert-danger">' . "Para que as estatisticas sejam exibidas você deve primeiro <a href='cadastraMetas.php'>cadastrar as meta</a>!" . '</div>'; } ?>
                    
                    
                    <div class="card-body <?php if (empty($DMFetch)) { echo 'd-none'; } ?>">
                        <h5 class="card-title">Meta de ganho liquido Mensal</h5>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-label="Meta ganho liquido" style="width: <?php if (!empty($DMFetch)) { echo $LiqP; } ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php if (!empty($DMFetch)) { echo $LiqP; } ?>%</div>
                        </div>
                        </br>
                        <div class="alert alert-success alert-dismissible fade show <?php if ((!empty($DMFetch)) && ((float)$Liq <= $meta_sem)) { echo "d-none"; } ?>">
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Parabéns!</strong>
                            <br />
                            você já atingiu a sua meta de R$: <?php if (!empty($DMFetch)) { echo $meta_sem; } ?>.
                        </div>
                        <p class="card-text <?php if ((!empty($DMFetch)) && (!((float)$Liq >= $meta_sem))) { echo 'd-none'; } ?>"><strong>Parabéns!</strong> você já atingiu a sua meta, e ultrapassou em R$: <?php if ((!empty($DMFetch)) && ((float)$Liq >= $meta_sem)) { echo (float)$Liq - $meta_sem . '<hr/>'; } ?></p>
                        <p class="card-text">Sua meta de ganho liquido é de R$: <?php if (!empty($DMFetch)) { echo $meta_sem; } ?></p>
                        <p class="card-text">Você já atingiu R$: <?php if (!empty($DMFetch)) { echo $Liq; } ?></p>
                        <p class="card-text">Foram, <?php if (!empty($DMFetch)) { echo $LiqP . "%"; } ?> da meta alcançados.</p>
                        <hr/>
                        <br/>
                        <h5 class="card-title">Meta de faturamento Mensal</h5>
                        <br />
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-label="Meta faturamento" style="width: <?php if (!empty($DMFetch)) { echo $FatP; } ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php if (!empty($DMFetch)) {  echo $FatP; } ?>%</div>
                        </div>
                        </br>
                        <div class="alert alert-success alert-dismissible fade show <?php if ((!empty($DMFetch)) && ((float)$Fat <= $meta_men)) { echo "d-none"; } ?>">
                            <button class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Parabéns!</strong>
                            <br />
                            você já atingiu a sua meta de R$: <?php if (!empty($DMFetch)) { echo $meta_men; } ?>.
                        </div>
                        <p class="card-text <?php if ((!empty($DMFetch)) && (!((float)$Fat >= $meta_men))) { echo 'd-none'; } ?>"><strong>Parabéns!</strong> você já atingiu a sua meta, e ultrapassou em R$: <?php if ((!empty($DMFetch)) && ((float)$Fat >= $meta_men)) { echo (float)$Fat - $meta_men . '<hr/>'; } ?></p>
                        <p class="card-text">Sua meta de Faturamento mensal é de R$: <?php if (!empty($DMFetch)) { echo $meta_men; } ?></p>
                        <p class="card-text">Você já atingiu R$: <?php if (!empty($DMFetch)) { echo $Fat; } ?></p>
                        <p class="card-text">Foram, <?php if (!empty($DMFetch)) { echo $FatP . "%"; } ?> da meta alcançados.</p>
                        <hr/>
                        <p class="card-text text-center text-muted">Os calculados são feitos com base em seu faturamento diário.</p>
                        <a href="cadastraMetas.php" class="btn btn-primary">Editar metas</a>
                    </div>
                </div>
                </br>
            </div>
        </div>
    </div>
    <?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Footer.php") ?>
    <?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Floatbtn.php") ?>
</body>

</html>