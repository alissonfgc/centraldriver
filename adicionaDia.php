<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="css/stylecustom.css" rel="stylesheet">
    <title>Adicionar dia | Central Driver</title>
</head>
<body>
<?php include("Includes/navbar.php") ?>
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <div class="card">
                    <h5 class="card-header">Adicionar dia de trabalho</h5>
                    <div class="card-body">
                        <form class="p-4 p-md-5 border rounded-3 needs-validation" novalidate>
                            <h5 class="card-title">Data</h5>
                            <input type="date" name="DataDia" class="form-control" id="inputDataDia" id="validationCustom01" required>
                            <br/>
                            <div class="invalid-feedback">
                                Prencha o campo.
                            </div>
                            <h5 class="card-title">Farturmento</h5>
                            <input type="number" step="0.01" min="0.01" name="FaturamentoDia" class="form-control" id="inputFaturamentoDia" id="validationCustom02" placeholder="Valor" required>
                            <br/>
                            <div class="invalid-feedback">
                                Prencha o campo.
                            </div>
                            <h5 class="card-title">Despesas</h5>
                            <input type="number" step="0.01" min="0.01" name="DespesasDia" class="form-control" id="inputDespesas" id="validationCustom03" placeholder="Valor" required>
                            <br/>
                            <div class="invalid-feedback">
                                Prencha o campo.
                            </div>
                            <h5 class="card-title">Km's Rodados</h5>
                            <input type="number" step="0.01" min="0.01" name="KmRodado" class="form-control" id="inputKmRodado" id="validationCustom04" placeholder="Km's" required>
                            <br/>
                            <div class="invalid-feedback">
                                Prencha o campo.
                            </div>
                            <h5 class="card-title">Valor por litro abastecido</h5>
                            <input type="number" step="0.01" min="0.01" name="ValorLitro" class="form-control" id="inputValorLitro" id="validationCustom05" placeholder="Valor" required>
                            <br/>
                            <div class="invalid-feedback">
                                Prencha o campo.
                            </div>
                            <h5 class="card-title">Quantidade de horas trabalhadas</h5>
                            <input type="number" min="1" name="QntHoras" class="form-control" id="inputQntHoras" id="validationCustom06" placeholder="Quantidade" required>
                            <br/>
                            <div class="invalid-feedback">
                                Prencha o campo.
                            </div>
                            <h5 class="card-title">Quantidade de corridas</h5>
                            <input type="number" min="1" name="QntCorridas" class="form-control" id="inputQntCorridas" id="validationCustom07" placeholder="Quantidade" required>
                            <br/>
                            <div class="invalid-feedback">
                                Prencha o campo.
                            </div>
                            <br/>
                            <button class=" w-100 btn btn-lg btn-success mb-3" type="submit">Salvar</button>
                        </form>
                    </div>
                </div>
                </br>
                </br>
            </div>
        </div>
    </div>
<?php 
    include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Footer.php");
    include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassConexao.php"); 
?>
</body>
</html>