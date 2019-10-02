<?php
/* Recuperar os Dados do Formulário de Envio*/
$txtNome    = $_POST["txtNome"];
$txtAssunto    = $_POST["txtAssunto"];
$txtEmail    = $_POST["txtEmail"];
$txtMensagem    = $_POST["txtMensagem"];

 require("./PHPMailer/PHPMailerAutoload.php");
/* Montar o corpo do email*/
$corpoMensagem         = "<b>Nome:</b> ".$txtNome." <br><b>Assunto:</b> ".$txtAssunto."<br><b>Mensagem:</b> ".$txtMensagem;
 
/* Extender a classe do phpmailer para envio do email*/
require_once("phpmailer/class.phpmailer.php");
 
/* Definir Usuário e Senha do Gmail de onde partirá os emails*/
define('GUSER', 'atimilson95@gmail.com'); 
define('GPWD', 'cancer06');

$emailEnviar = "app.sinfra";
$senhaEmailEnviar = "8zv)e#pa";

 

    global $error;
    $mail = new PHPMailer();
    /* Montando o Email*/
    
    
    $mail->SMTPOptions = array (
					   'ssl' => array(
			         	//'verify_peer'  => true,
						'verify_peer'  => false,
						'verify_depth' => 3,
						'allow_self_signed' => true,
						'peer_name' => 'cuco.mt.gov.br',
						'cafile' => '/conf/ssl.crt/cuco.mt.gov.br-publico.cer',   // local onde está o certificado enviado
					)
				);

    
    $mail->IsSMTP();            /* Ativar SMTP*/
    $mail->SMTPDebug = 1;        /* Debugar: 1 = erros e mensagens, 2 = mensagens apenas*/
    $mail->SMTPAuth = true;        /* Autenticação ativada    */
    $mail->SMTPSecure = 'tls';    /* TLS REQUERIDO pelo GMail*/
    $mail->Host = 'cuco.mt.gov.br';    /* SMTP utilizado*/
    $mail->Port = 25;             /* A porta 587 deverá estar aberta em seu servidor*/
    $mail->Username = $emailEnviar;
    $mail->Password = $senhaEmailEnviar;
    $mail->SetFrom('servicos@sinfra.mt.gov.br', 'teste');
    $mail->Subject = $txtAssunto;
    $mail->Body = $txtMensagem;
    $mail->AddAddress($txtEmail, 'Email para enviar');
    
    /* Função Responsável por Enviar o Email*/
    if($mail->Send()) {
        $error = "<font color='blue'><b>Mensagem enviada com Sucesso!</b></font>";
        echo $error;
        
    } else {
             
        
        $error = "<font color='red'><b>Mail error: </b></font>".$mail->ErrorInfo; 
        echo $error;
    }

 
