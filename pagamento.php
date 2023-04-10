<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stylecustom.css">
    <title>Pagamento | Central Driver</title>
</head>

<body>
<input type="hidden" name="texto" id="chaveQR" id="texto" value="00020126580014BR.GOV.BCB.PIX0136f423a744-afd0-4e98-ab5d-20241168e6cf520400005303986540510.005802BR5925Alisson Fernandes Garcia 6009SAO PAULO61080540900062070503***6304AEBE" />
<input type="hidden" name="texto" id="chavePix" id="texto" value="f423a744-afd0-4e98-ab5d-20241168e6cf" />
    <?php include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/navbarPublic.php"); ?>
    <div class="container mt-4">
        <div class="row align-items-center">
            <div class="col-md-6 mx-auto col-lg-4">
                <div class="card text-center shadow-sm border-primary">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Pagamento via Pix</h4>
                    </div>
                    <div class="card-body text-bg-primary">
                        <br/>
                        <div class="border shadow-sm border-primary bg-white rounded p-2">
                            <img src="img/pix-central-driver.png" class="w-100 img-fluid col-md-3 mx-auto d-block col-lg-6" alt="qr_code_pix" id="qr_code_pix">
                        </div>
                        <br/>
                        <p class="f3"><strong>R$ 10,00</strong></p>
                        <button class="w-100 btn btn-light" onclick="copiarQRCode()"><text id="btnQR" fill="white">
                                Copiar código do QR code </text>
                        </button>
                        <br/>
                    </div>
                    <div class="card-body text-bg-">
                        <p class="lh-copy tc center mb4 db-ns dn f5">Ou use <strong>a chave Pix</strong></p>
                        <p id="retorno"></p>
                        <hr/>
                        <div class="">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th scope="row">Nome:</th>
                                        <td>ALISSON FERNANDES GARCIA CORREA</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">CPF:</th>
                                        <td>•••.787.891-••</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Banco:</th>
                                        <td colspan="2">260 - Nu Pagamentos S.A. - Instituição de Pagamento</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Valor:</th>
                                        <td colspan="2">R$ 10,00 (Dez Reais)</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-floating mb-3">
                            <button class="w-100 btn btn-primary" onclick="copiarChavePix()"><text id="btnPix" fill="white">
                                    Copiar chave pix </text>
                            </button>
                        </div>
                        <div class="form-floating mb-3">
                            <a class="w-100 btn btn-success" onclick="enviaComprovante()" href="https://wa.me/5561981145073">Enviar comprovante
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-text" viewBox="0 0 16 16">
                                    <path d="M5 4a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8a.5.5 0 0 0 0 1h6a.5.5 0 0 0 0-1H5zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1H5z" />
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z" />
                                </svg>
                            </a>
                        </div>
                        <hr/>
                        <p class="card-text text-muted">*Atualmente o pagamento é feito somente via pix.</p>
                        <a class="w-100 btn btn-primary" href="https://wa.me/5561981145073">Suporte
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16">
                                <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("Includes/Footer.php") ?>
    <script type="text/javascript">
        function enviaComprovante() {
            alert("Ao enviar o comprovante, envie também o E-mail em que você realizou o cadastro");
            setTimeout(function() {
                window.location="https://wa.me/5561981145073";
            }, 1500);
        }
    </script>
    <script>
        function copiarQRCode() {
            var copyText = document.getElementById("chaveQR");
            navigator.clipboard.writeText(copyText.value);
            document.getElementById("btnQR").innerHTML = "Copiado!";
            setTimeout(function() {
                document.getElementById("btnQR").innerHTML = "Copiar código do QR code";
            }, 1500);
        }
    </script>
    <script>
        function copiarChavePix() {
            var copyText = document.getElementById("chavePix");
            navigator.clipboard.writeText(copyText.value);
            document.getElementById("btnPix").innerHTML = "Copiado!";
            setTimeout(function() {
                document.getElementById("btnPix").innerHTML = "Copiar chave pix";
            }, 1500);
        }
    </script>
</body>

</html>