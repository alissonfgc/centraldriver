<?php
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Includes/Variaveis.php");
include("{$_SERVER['DOCUMENT_ROOT']}/centraldriver/Class/ClassCrud.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../lib/vendor/autoload.php';

$Crud = new ClassCrud();

if ($Acao == 'Cadastrar') {

    #verifica se já existe o email no banco de dados
    $Crud = new ClassCrud();
    $emailUser = trim($_POST["email"]);

    $BFetch = $Crud->selectDB(
        "*",
        "usuario",
        "where email=?",
        array($emailUser)
    );
    $Fetch = $BFetch->fetch(PDO::FETCH_ASSOC);

    if ($BFetch->rowCount() > 0) {
        $email_err = "O E-mail: $email já está em uso.";
    }

    if (!$email_err == "") {
        //pausa para exibição da mensagem
        header('Location: ../avisoErro.php');
    }

    #Se não ouver duplicidade de email insere os dados inseridos no banco de dados
    if ($email_err == "") {
        $chave = password_hash($email . date('Y-m-d H:i:s'), PASSWORD_DEFAULT);
        $sit_usuario = 3;
        $acesso_pag = 3;
        #confirmação de email
        $mail = new PHPMailer(true);

        try {  
            $Crud->insertDB(
                "usuario",
                "?,?,?,?,?,?,?,?,?,?",
                array(
                    $usuario_id,
                    $nome,
                    $sobrenome,
                    $email,
                    $senha,
                    $chave,
                    $confirmado,
                    $pago,
                    $acesso_pag,
                    $sit_usuario_id
                )
            );
                #hostinger
            #$mail->SMTPDebug = SMTP::DEBUG_SERVER;

            $mail->CharSet = "UTF-8";
            $mail = new PHPMailer;
            $mail = new PHPMailer;
            $mail->SMTPDebug = 2;
            $mail->Host = 'smtp.hostinger.com';
            $mail->Port = 587;
            $mail->SMTPAuth = true;
            $mail->Username = 'contato@alissonfgc.xyz';
            $mail->Password = 'ADM@centraldriver23';

            //Recipients
            $mail->setFrom('contato@alissonfgc.xyz', 'Central Driver');
            $mail->addAddress($email, $nome);

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Confirme seu cadastro Central Driver';
            $mail->Body    = "Ola " . $nome . ", confirme seu cadastro no aplicativo Central Driver!<br/><br/>Para confirmar seu cadastro solicitamos que confirme seu cadastro clicando no link abaixo: <br/><br/> <a href='https://alissonfgc.xyz/centraldriver/confirmaEmail.php?chave=$chave'>Clique Aqui</a><br/><br/>" ;
            $mail->AltBody = "Ola " . $nome . ", confirme seu cadastro no aplicativo Central Driver!\n\nPara confirmar seu cadastro solicitamos que confirme seu cadastro clicando no link abaixo: \n\n https://alissonfgc.xyz/centraldriver/confirmaEmail.php?chave=$chave \n\n";

            $mail->send();

            header('Location: ../confirmaEmail.php');
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    
} else if ($Acao == 'Editar') {
    $Crud->updateDB(
        "usuario",
        "nome=?,sobrenome=?,email=?,senha=?,chave=?,confirmado=?,pago=?,acesso_pag=?,sit_usuario_id=?",
        "usuario_id=?",
        array(
            $nome,
            $sobrenome,
            $email,
            $senha,
            $chave,
            $confirmado,
            $pago,
            $acesso_pag,
            $sit_usuario_id,
            $usuario_id
        )
    );
    if (isset($_SESSION["adm_id"])){
        header('Location: ../homeADM.php');
    } else if (isset($_SESSION["usuario_id"])) {
        header('Location: ../home.php');
    } else {
        echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
    }
    
} else if($Acao == 'Confirmar Email'){
    $mail = new PHPMailer(true);

    try {
        $chave = password_hash($email . date('Y-m-d H:i:s'), PASSWORD_DEFAULT);
        $Crud->updateDB(
            "usuario",
            "chave=?",
            "usuario_id=?",
            array(
                $chave,
                $usuario_id
            )
        );

        #$mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->CharSet = "UTF-8";
        $mail = new PHPMailer;
        $mail = new PHPMailer;
        $mail->SMTPDebug = 2;
        $mail->Host = 'smtp.hostinger.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'contato@alissonfgc.xyz';
        $mail->Password = 'ADM@centraldriver23';

        //Recipients
        $mail->setFrom('contato@alissonfgc.xyz', 'Central Driver');
        $mail->addAddress($email, $nome);

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Confirme seu cadastro Central Driver';
        $mail->Body    = "Ola " . $nome . ", confirme seu cadastro no aplicativo Central Driver!<br/><br/>Para confirmar seu cadastro solicitamos que confirme seu cadastro clicando no link abaixo: <br/><br/> <a href='https://alissonfgc.xyz/centraldriver/confirmaEmail.php?chave=$chave'>Clique Aqui</a><br/><br/>";
        $mail->AltBody = "Ola " . $nome . ", confirme seu cadastro no aplicativo Central Driver!\n\nPara confirmar seu cadastro solicitamos que confirme seu cadastro clicando no link abaixo: \n\n https://alissonfgc.xyz/centraldriver/confirmaEmail.php?chave=$chave \n\n";

        $mail->send();

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


    header('Location: ../confirmaEmail.php');

} else {
    echo "Ops! Algo deu errado. Por favor, tente novamente mais tarde.";
}

?>