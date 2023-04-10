<?php
#Variavel Ação
if(isset($_POST['Acao'])){ $Acao=filter_input(INPUT_POST,'Acao',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['Acao'])){ $Acao=filter_input(INPUT_GET,'Acao',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $Acao=""; }

#Variavel Ação Metas
if(isset($_POST['Acaometas'])){ $Acao=filter_input(INPUT_POST,'Acaometas',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['Acaometas'])){ $Acaometas=filter_input(INPUT_GET,'Acaometas',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $Acaometas=""; }

#Variavel Ação Veiculos
if(isset($_POST['Acaoveiculo'])){ $Acao=filter_input(INPUT_POST,'Acaoveiculo',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['Acaoveiculo'])){ $Acaoveiculo=filter_input(INPUT_GET,'Acaoveiculo',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $Acaoveiculo=""; }


#Variaver para erros no cadastro do e-mail ($email_err)

if(isset($_POST['email_err'])){ $email_err=filter_input(INPUT_POST,'email_err',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['email_err'])){ $email_err=filter_input(INPUT_GET,'email_err',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $email_err=""; }


#variaveis Cadastro
if(isset($_POST['usuario_id'])){ $usuario_id=filter_input(INPUT_POST,'usuario_id',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['usuario_id'])){ $usuario_id=filter_input(INPUT_GET,'usuario_id',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $usuario_id=0; }
if(isset($_POST['nome'])){ $nome=filter_input(INPUT_POST,'nome',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['nome'])){ $nome=filter_input(INPUT_GET,'nome',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $nome=""; }
if(isset($_POST['sobrenome'])){ $sobrenome=filter_input(INPUT_POST,'sobrenome',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['sobrenome'])){ $sobrenome=filter_input(INPUT_GET,'sobrenome',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $sobrenome=""; }
if(isset($_POST['email'])){ $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['email'])){ $email=filter_input(INPUT_GET,'email',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $email=""; }
if(isset($_POST['senha'])){ $senha=filter_input(INPUT_POST,'senha',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['senha'])){ $senha=filter_input(INPUT_GET,'senha',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $senha=""; }
    #campo de confirmação de email
    if(isset($_POST['confirmado'])){ $confirmado=filter_input(INPUT_POST,'confirmado',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['confirmado'])){ $confirmado=filter_input(INPUT_GET,'confirmado',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $confirmado=0; }
    #campo de confirmação de pagamento
    if(isset($_POST['pago'])){ $pago=filter_input(INPUT_POST,'pago',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['pago'])){ $pago=filter_input(INPUT_GET,'pago',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $pago=0; }
    #outras
    if(isset($_POST['chave'])){ $chave=filter_input(INPUT_POST,'chave',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['chave'])){ $chave=filter_input(INPUT_GET,'chave',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $chave=NULL; }
    if(isset($_POST['acesso_pag '])){ $acesso_pag =filter_input(INPUT_POST,'acesso_pag ',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['acesso_pag '])){ $acesso_pag =filter_input(INPUT_GET,'acesso_pag ',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $acesso_pag =0; }
    if(isset($_POST['sit_usuario_id'])){ $sit_usuario_id=filter_input(INPUT_POST,'sit_usuario_id',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['sit_usuario_id'])){ $sit_usuario_id=filter_input(INPUT_GET,'sit_usuario_id',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $sit_usuario_id=0; }

    
#Variaveis metas
if(isset($_POST['metas_id'])){ $metas_id=filter_input(INPUT_POST,'metas_id',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_ramentoGET['metas_id'])){ $metas_id=filter_input(INPUT_GET,'metas_id',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $metas_id=0; }
if(isset($_POST['meta_sem'])){ $meta_sem=filter_input(INPUT_POST,'meta_sem',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['meta_sem'])){ $meta_sem=filter_input(INPUT_GET,'meta_sem',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $meta_sem=""; }
if(isset($_POST['meta_men'])){ $meta_men=filter_input(INPUT_POST,'meta_men',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['meta_men'])){ $meta_men=filter_input(INPUT_GET,'meta_men',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $meta_sem=""; }
    #Chave estrangeira da tabela metas que referencia 'usuario_id' da tabela Usuario
    if(isset($_POST['FK_usuario_id'])){ $FK_usuario_id=filter_input(INPUT_POST,'FK_usuario_id',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['FK_usuario_id'])){ $FK_usuario_id=filter_input(INPUT_GET,'FK_usuario_id',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $FK_usuario_id=""; }


#Variaveis veiculo
if(isset($_POST['veiculo_id'])){ $veiculo_id=filter_input(INPUT_POST,'veiculo_id',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['veiculo_id'])){ $veiculo_id=filter_input(INPUT_GET,'veiculo_id',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $veiculo_id=0; }
if(isset($_POST['modelo'])){ $modelo=filter_input(INPUT_POST,'modelo',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['modelo'])){ $modelo=filter_input(INPUT_GET,'modelo',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $modelo=""; }
if(isset($_POST['marca'])){ $marca=filter_input(INPUT_POST,'marca',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['marca'])){ $marca=filter_input(INPUT_GET,'marca',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $marca=""; }
if(isset($_POST['consumo'])){ $consumo=filter_input(INPUT_POST,'consumo',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['consumo'])){ $consumo=filter_input(INPUT_GET,'consumo',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $consumo=""; }
    #Chave estrangeira da tabela metas que referencia 'usuario_id' da tabela Usuario (corrigir)
    if(isset($_POST['FK_usuario_id'])){ $FK_usuario_id=filter_input(INPUT_POST,'FK_usuario_id',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['FK_usuario_id'])){ $FK_usuario_id=filter_input(INPUT_GET,'FK_usuario_id',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $FK_usuario_id=""; }


#Variaveis Dia
if(isset($_POST['expediente_id'])){ $expediente_id=filter_input(INPUT_POST,'expediente_id',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['expediente_id'])){ $expediente_id=filter_input(INPUT_GET,'expediente_id',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $expediente_id=0; }
if(isset($_POST['data'])){ $data=filter_input(INPUT_POST,'data',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['data'])){ $data=filter_input(INPUT_GET,'data',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $data=""; }
if(isset($_POST['faturamento'])){ $faturamento=filter_input(INPUT_POST,'faturamento',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['faturamento'])){ $faturamento=filter_input(INPUT_GET,'faturamento',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $faturamento=""; }
if(isset($_POST['despesas'])){ $despesas=filter_input(INPUT_POST,'despesas',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['despesas'])){ $despesas=filter_input(INPUT_GET,'despesas',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $despesas=""; }
if(isset($_POST['km_rodados'])){ $km_rodados=filter_input(INPUT_POST,'km_rodados',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['km_rodados'])){ $km_rodados=filter_input(INPUT_GET,'km_rodados',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $km_rodados=""; }
if(isset($_POST['valor_abastecido'])){ $valor_abastecido=filter_input(INPUT_POST,'valor_abastecido',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['valor_abastecido'])){ $valor_abastecido=filter_input(INPUT_GET,'valor_abastecido',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $valor_abastecido=""; }
if(isset($_POST['horas_trabalhadas'])){ $horas_trabalhadas=filter_input(INPUT_POST,'horas_trabalhadas',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['horas_trabalhadas'])){ $horas_trabalhadas=filter_input(INPUT_GET,'horas_trabalhadas',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $horas_trabalhadas=""; }
if(isset($_POST['qnt_corridas'])){ $qnt_corridas=filter_input(INPUT_POST,'qnt_corridas',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['qnt_corridas'])){ $qnt_corridas=filter_input(INPUT_GET,'qnt_corridas',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $qnt_corridas=""; }
    #variaveis calculadas automaticamente
    if(isset($_POST['valor_km'])){ $valor_km=filter_input(INPUT_POST,'valor_km',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['valor_km'])){ $valor_km=filter_input(INPUT_GET,'valor_km',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $valor_km=""; }
    if(isset($_POST['gasto_combustivel'])){ $gasto_combustivel=filter_input(INPUT_POST,'gasto_combustivel',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['gasto_combustivel'])){ $gasto_combustivel=filter_input(INPUT_GET,'gasto_combustivel',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $gasto_combustivel=""; }
    if(isset($_POST['ganho_liquido'])){ $ganho_liquido=filter_input(INPUT_POST,'ganho_liquido',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['ganho_liquido'])){ $ganho_liquido=filter_input(INPUT_GET,'ganho_liquido',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $ganho_liquido=""; }
        #Chave estrangeira da tabela metas que referencia 'veiculo_id' da tabela veiculo (corrigir)
        if(isset($_POST['FK_veiculo_id'])){ $FK_veiculo_id=filter_input(INPUT_POST,'FK_veiculo_id',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['FK_veiculo_id'])){ $FK_veiculo_id=filter_input(INPUT_GET,'FK_veiculo_id',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $FK_veiculo_id=0; }
        #Chave estrangeira da tabela metas que referencia 'usuario_id' da tabela Usuario (corrigir)
        if(isset($_POST['FK_usuario_id'])){ $FK_usuario_id=filter_input(INPUT_POST,'FK_usuario_id',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['FK_usuario_id'])){ $FK_usuario_id=filter_input(INPUT_GET,'FK_usuario_id',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $FK_usuario_id=0; }


#Variaveis Adm
if(isset($_POST['adm_id'])){ $adm_id=filter_input(INPUT_POST,'adm_id',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['adm_id'])){ $adm_id=filter_input(INPUT_GET,'adm_id',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $adm_id=0; }
if(isset($_POST['adm_email'])){ $adm_email=filter_input(INPUT_POST,'adm_email',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['adm_email'])){ $adm_email=filter_input(INPUT_GET,'adm_email',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $adm_email=""; }
if(isset($_POST['adm_senha'])){ $adm_senha=filter_input(INPUT_POST,'adm_senha',FILTER_SANITIZE_SPECIAL_CHARS); }elseif(isset($_GET['adm_senha'])){ $adm_senha=filter_input(INPUT_GET,'adm_senha',FILTER_SANITIZE_SPECIAL_CHARS); }else{ $adm_senha=""; }

?>