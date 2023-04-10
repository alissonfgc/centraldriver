<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylecustom.css">
    <title>Erro | Central Driver</title>
</head>

<body onload="">
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-10 mx-auto col-lg-5">
                <div class="alert alert-danger alert-dismissible fade show">
                    <button class="btn-close" data-bs-dismiss="alert" ></button>
                    <strong>Erro ao realizar ação!</strong>
                    <br/>
                    O E-mail já está em uso.
                    <hr/>
                    Você vai ser redirecionado para tentar novamente com outro e-mail em:  <div id="countloop" style="height: 20px; width: 100%; font-size: 20px; text-align: center; align-items: center;" ></div>
                </div>
                <form class="p-4 p-md-5 border rounded-3 bg-dark needs-validation" novalidate>
                    <div class="form-floating mb-3">
                        <img src="img/logo-v.png" class="img-fluid col-md-3 mx-auto d-block col-lg-6" alt="logo" id="logo_img">
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php include("./Includes/Footer.php") ?>
<script>
    //redirecionar após 5 segundos
    setTimeout(function(){
        window.location.href = "cadastro.php"
    },5400);
</script>
<script>
var div = document.getElementById('countloop');
var textos = ['5', '4', '3', '2', '1', '0'];

function escrever(str, done) {
    var char = str.split('').reverse();
    var typer = setInterval(function() {
        if (!char.length) {
            clearInterval(typer);
            return setTimeout(done, 1000); // só para esperar um bocadinho
        }
        var next = char.pop();
        div.innerHTML += next;
    }, 10);
}

function limpar(done) {
    var char = div.innerHTML;
    var nr = char.length;
    var typer = setInterval(function() {
        if (nr-- == 0) {
            clearInterval(typer);
            return done();
        }
        div.innerHTML = char.slice(0, nr);
    }, 10);
}

function rodape(conteudos, el) {
    var atual = -1;
	function prox(cb){
		if (atual < conteudos.length - 1) atual++;
		else atual = 0;
		var str = conteudos[atual];
		escrever(str, function(){
			limpar(prox);
		});
	}
	prox(prox);
}
rodape(textos);
</script>

</body>

</html>

