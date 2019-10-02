<?php
/* Recuperar os Dados do Formulário de Envio*/
/*$txtNome    = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_SPECIAL_CHARS);
$txtAssunto    = "Mapa Rodoviario";
$txtEmail    = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_SPECIAL_CHARS);
$txtMensagem    = "Mapa Rodoviario";
*/
 require("PHPMailer/PHPMailerAutoload.php");
/* Montar o corpo do email*/
//$corpoMensagem         = "<b>Nome:</b> ".$txtNome." <br><b>Assunto:</b> ".$txtAssunto."<br><b>Mensagem:</b> ".$txtMensagem;

/* Extender a classe do phpmailer para envio do email*/
require_once("PHPMailer/class.phpmailer.php");


function EnviaEmail($nome, $assunto, $email, $mensagem, $codigo){


/* Definir Usuário e Senha do Gmail de onde partirá os emails*/
//define('GUSER', 'atimilson95@gmail.com'); 
//define('GPWD', 'cancer06');

$emailEnviar = "app.sinfra";
$senhaEmailEnviar = "8zv)e#pa";

 /* $mensagem = "
                <table width='800' hidden='300' xmlns=\"http://www.w3.org/1999/html\"     border='no'>
                    <tr>
                    <img src='http://www.mt.gov.br/mt-portal-theme/images/brasoes/sinfra.png'>
                    </tr>
                    <tr bgcolor='#FFF' height='150'>
                        <p>
                            <b>
                                <h1>                                      
                                    Olá, $txtNome !
                                </h1>
                            </b>
                        </p>
                        <p> Link para Download do Mapa Rodoviário: www.sinfra.mt.gov.br </p>
                     
                    </tr>                        
                </table>"; */

  
  
    global $error;
    $mail = new PHPMailer();
    /* Montando o Email*/
    
    $adicionar = "http://10.17.9.13/SisMapaRodoviario/verifica-email.php?var=$codigo";
    
    $content = '<a class="st0" style="background : #FBBA00;
  background : rgba(251, 186, 0, 1);
  border-radius : 6px;
  -moz-border-radius : 6px;
  -webkit-border-radius : 6px; font-family : Nexa Black;
  font-size : 14px;padding: 6px;
  color : #1D1D1B;
  text-decoration:none;" href="'.$adicionar.'"><b>CLIQUE AQUI E CONFIRME SEU CADASTRO</b> </a>';
    
    
    
                
            
    
    $body = file_get_contents("email.html");
    $body = str_replace("{{CONTENT}}", $content, $body); 
    
    
    
    $mail->SMTPOptions = array (
					   'ssl' => array(
			         	//'verify_peer'  => true,
						'verify_peer'  => false,
						'verify_depth' => 0,
						'allow_self_signed' => true,
						'peer_name' => 'cuco.mt.gov.br',
					//	'cafile' => '/conf/ssl.crt/cuco.mt.gov.br-publico.cer',   // local onde está o certificado enviado Windows
                                               'cafile' => '/etc/ssl/cuco.mt.gov.br-publico.cer' // local onde está o certificado enviado Debian
					)
				);

    
    $mail->IsSMTP();            /* Ativar SMTP*/
     $mail->IsHTML(true);
    $mail->SMTPDebug = 0;        /* Debugar: 1 = erros e mensagens, 2 = mensagens apenas*/
    $mail->SMTPAuth = true;        /* Autenticação ativada    */
    $mail->SMTPSecure = 'tls';    /* TLS REQUERIDO pelo GMail*/
    $mail->Host = 'cuco.mt.gov.br';    /* SMTP utilizado*/
    $mail->Port = 25;             /* A porta 587 deverá estar aberta em seu servidor*/
    $mail->Username = $emailEnviar;
    $mail->Password = $senhaEmailEnviar;
    $mail->SetFrom('servicos@sinfra.mt.gov.br', 'Sinfra');
    $mail->Subject = $assunto;
    $mail->Body = $body;
    $mail->AddAddress($email, 'Email para enviar');
    
    /* Função Responsável por Enviar o Email*/
    if($mail->Send()) {
        header("Location: retorno.php");
        $_SESSION['usuario'] = "1";
        
    } else {
             
        
        $error = "<font color='red'><b>Mail error: </b></font>".$mail->ErrorInfo; 
        echo $error;
    }

}
