<?php 

#Toolkit class
#Handy Framework
#Developed by Michael Lopes [michael.s.lopes@hotmail.com]

class Toolkit { 
    
    public static function formatNumber($val) {
       return number_format(Toolkit::tofloat($val), 2, ',', '');
    }
    
    public static function tofloat($num) {
        $dotPos = strrpos($num, '.');
        $commaPos = strrpos($num, ',');
        $sep = (($dotPos > $commaPos) && $dotPos) ? $dotPos : 
            ((($commaPos > $dotPos) && $commaPos) ? $commaPos : false);

        if (!$sep) {
            return floatval(preg_replace("/[^0-9]/", "", $num));
        } 

        return floatval(
            preg_replace("/[^0-9]/", "", substr($num, 0, $sep)) . '.' .
            preg_replace("/[^0-9]/", "", substr($num, $sep+1, strlen($num)))
        );
    }
    
     public static function getControllerName($url) { 
         
         $arr = explode("-", $url);
         $name = "";
         foreach($arr as $item) {
             $name = $name . ucfirst($item);
         }
         return $name;
         
     }
    
     function money_format($format, $number) 
     {   
        return number_format(Toolkit::tofloat($number), 2, ',', '.');
       /* if(function_exists('money_format')){
            setlocale(LC_MONETARY, 'pt_BR');
            
        }

        $regex  = '/%((?:[\^!\-]|\+|\(|\=.)*)([0-9]+)?'. 
                '(?:#([0-9]+))?(?:\.([0-9]+))?([in%])/'; 
        if (setlocale(LC_MONETARY, 0) == 'C') { 
            setlocale(LC_MONETARY, ''); 
        } 
        $locale = localeconv(); 
        preg_match_all($regex, $format, $matches, PREG_SET_ORDER); 
        foreach ($matches as $fmatch) { 
            $value = floatval($number); 
            $flags = array( 
                'fillchar'  => preg_match('/\=(.)/', $fmatch[1], $match) ? 
                            $match[1] : ' ', 
                'nogroup'   => preg_match('/\^/', $fmatch[1]) > 0, 
                'usesignal' => preg_match('/\+|\(/', $fmatch[1], $match) ? 
                            $match[0] : '+', 
                'nosimbol'  => preg_match('/\!/', $fmatch[1]) > 0, 
                'isleft'    => preg_match('/\-/', $fmatch[1]) > 0 
            ); 
            $width      = trim($fmatch[2]) ? (int)$fmatch[2] : 0; 
            $left       = trim($fmatch[3]) ? (int)$fmatch[3] : 0; 
            $right      = trim($fmatch[4]) ? (int)$fmatch[4] : $locale['int_frac_digits']; 
            $conversion = $fmatch[5]; 

            $positive = true; 
            if ($value < 0) { 
                $positive = false; 
                $value  *= -1; 
            } 
            $letter = $positive ? 'p' : 'n'; 

            $prefix = $suffix = $cprefix = $csuffix = $signal = ''; 

            $signal = $positive ? $locale['positive_sign'] : $locale['negative_sign']; 
            switch (true) { 
                case $locale["{$letter}_sign_posn"] == 1 && $flags['usesignal'] == '+': 
                    $prefix = $signal; 
                    break; 
                case $locale["{$letter}_sign_posn"] == 2 && $flags['usesignal'] == '+': 
                    $suffix = $signal; 
                    break; 
                case $locale["{$letter}_sign_posn"] == 3 && $flags['usesignal'] == '+': 
                    $cprefix = $signal; 
                    break; 
                case $locale["{$letter}_sign_posn"] == 4 && $flags['usesignal'] == '+': 
                    $csuffix = $signal; 
                    break; 
                case $flags['usesignal'] == '(': 
                case $locale["{$letter}_sign_posn"] == 0: 
                    $prefix = '('; 
                    $suffix = ')'; 
                    break; 
            } 
            if (!$flags['nosimbol']) { 
                $currency = $cprefix . 
                            ($conversion == 'i' ? $locale['int_curr_symbol'] : $locale['currency_symbol']) . 
                            $csuffix; 
            } else { 
                $currency = ''; 
            } 
            $space  = $locale["{$letter}_sep_by_space"] ? ' ' : ''; 

            $value = number_format((double)$value, $right, $locale['mon_decimal_point'], 
                    $flags['nogroup'] ? '' : $locale['mon_thousands_sep']); 
            $value = @explode($locale['mon_decimal_point'], $value); 

            $n = strlen($prefix) + strlen($currency) + strlen($value[0]); 
            if ($left > 0 && $left > $n) { 
                $value[0] = str_repeat($flags['fillchar'], $left - $n) . $value[0]; 
            } 
            $value = implode($locale['mon_decimal_point'], $value); 
            if ($locale["{$letter}_cs_precedes"]) { 
                $value = $prefix . $currency . $space . $value . $suffix; 
            } else { 
                $value = $prefix . $value . $space . $currency . $suffix; 
            } 
            if ($width > 0) { 
                $value = str_pad($value, $width, $flags['fillchar'], $flags['isleft'] ? 
                        STR_PAD_RIGHT : STR_PAD_LEFT); 
            } 

            $format = str_replace($fmatch[0], $value, $format); 
        } 
        return $format; */
    } 

    function strClean($string, $rmSpace = true) {
       /*
        $string = preg_replace('/[^A-Za-z0-9\-ığşçöüÖÇŞİıĞ]/', '', $string);
        $string = str_replace('-', '', $string);
        if($rmSpace == true) {
           $string = str_replace(' ', '', $string);
        }

        return preg_replace('/-+/', '', $string);*/
        return ereg_replace("[^a-zA-Z0-9_]", "", strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
    }
     
    public static function htmlToWordDownload($filename, $content)
	{
		$arquivo = $filename . '.doc';
        header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.ms-word; charset=iso-8859-1");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PRECF | Prestação de Contas FETHAB" );
        
		// Envia o conteúdo do arquivo
		echo chr(239) . chr(187) . chr(191) . $content;
		exit;
	}

     public static function upload($fileName, $ext, $folder = "indice", $finalFileName = "") {

            $result = [];
            $result['success'] = true;
            $result['err_msg'] = "";

           // print_r(); exit;
            // Pasta onde o arquivo vai ser salvo
            $_UP['pasta'] =  dirname(__FILE__) . '/../../view/uploads/'.$folder.'/';
            if(!is_dir($_UP['pasta'])) {
                mkdir($_UP['pasta'], 644); 
            }

            // Tamanho máximo do arquivo (em Bytes)
            $_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
            
            ///print_r($ext); exit;
            // Array com as extensões permitidas
            $_UP['extensoes'] = $ext;

            // Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
            $_UP['renomeia'] = false;

            // Array com os tipos de erros de upload do PHP
            $_UP['erros'][0] = 'Não houve erro';
            $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
            $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
            $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
            $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

            // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
            if ($_FILES[$fileName]['error'] != 0)
            {
                $result['success'] = false;
                $result['str_result'] = $_UP['erros'][$_FILES[$fileName]['error']];
                return $result;
            }

            // Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
            //print_r($_FILES); exit;
            // Faz a verificação da extensão do arquivo
            $extensao = strtolower(end(explode('.', $_FILES[$fileName]['name'])));
            if (array_search($extensao, $_UP['extensoes']) === false)
            {
                $result['success'] = false;
                $result['str_result'] = "Por favor, envie arquivos com as seguintes extensões: " . implode(", ", $ext);
                return $result;
            }

            // Faz a verificação do tamanho do arquivo
            else if ($_UP['tamanho'] < $_FILES[$fileName]['size'])
            {
                $result['success'] = false;
                $result['str_result'] =  "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
                return $result;
            }

            // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
            else
            {
       
                // Mantém o nome original do arquivo
                if($finalFileName == "") {
                    $finalFileName = self::strClean($_FILES[$fileName]['name'], true);
                    $nome_final = date('d_m_Y__H_i_s_U') . str_replace(" ", "_", $finalFileName) . "." . $extensao;
                } else {
                    $nome_final =  str_replace(" ", "_",  self::strClean($finalFileName, true)) . "." . $extensao;
                }
                
                
                //Depois verifica se é possível mover o arquivo para a pasta escolhida
                if(file_exists($_UP['pasta'] . $nome_final)) unlink($_UP['pasta'] . $nome_final);

                if (move_uploaded_file($_FILES[$fileName]['tmp_name'], $_UP['pasta'] . $nome_final))
                {
                     $result['str_result'] = $folder . '/' . $nome_final;
                     return $result;
                }
                else
                {
                    $result['success'] = false;
                    $result['str_result'] =  "Não foi possível enviar o arquivo, tente novamente";
                    return $result; 
                }
                
            } 
     }
     
     public static function sendEmail($from, $fromPass, $smptHost, $smptPort, $subject, $content, $toEmails, $attachments = null) {
        
        if(isset($toEmails[0])) {
                require_once( ROOT_PATH . 'class/PHPMailer/PHPMailerAutoload.php');

                // Inicia a classe PHPMailer
                $mail = new PHPMailer(true);

               /* $mail->SMTPOptions = array (
                    'ssl' => array(
                //        'verify_peer'  => true,
                        'verify_peer'  => false,
                        'verify_depth' => 3,
                        'allow_self_signed' => true,
                        'peer_name' => 'cuco.mt.gov.br',
                        'cafile' => 'cuco.pem',   // local onde está o certificado enviado
                    )
                );

		*/
				$mail->SMTPOptions = array (
					   'ssl' => array(
			         	//'verify_peer'  => true,
						'verify_peer'  => false,
						'verify_depth' => 3,
						'allow_self_signed' => true,
						'peer_name' => 'cuco.mt.gov.br',
						'cafile' => '/etc/ssl/cuco.mt.gov.br-publico.cer',   // local onde está o certificado enviado
					)
				);

                // Define os dados do servidor e tipo de conexão
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->IsSMTP(); // Define que a mensagem será SMTP
                $mail->Host = $smptHost; // Endereço do servidor SMTP
                $mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
                $mail->SMTPSecure = 'tsl';
                $mail->Port = 25;//$smptPort;
                $mail->Username = $from; // Usuário do servidor SMTP
                $mail->Password = $fromPass; // Senha do servidor SMTP


                //$mail->SMTPDebug = 3;

                // Define o remetente
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->From = "servicos@sinfra.mt.gov.br"; // Seu e-mail
                $mail->FromName = "PRECF - Sistema de prestação de contas FETHB"; // Seu nome

                //$mail->setFrom('imea@imea.com.br', 'IMEA - Tabalhe Conosco');

                // Define os destinatário(s)
                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                $mail->AddAddress($toEmails[0]['EMAIL'], $toEmails[0]['NOME']);
                unset($toEmails[0]);
                foreach($toEmails as $email) {

                    $mail->AddCC($email["EMAIL"], $email["NOME"]);
                }

                //$mail->AddAddress('ciclano@site.net');

                //$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia

                //$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta

                // Define os dados técnicos da Mensagem

                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

                $mail->IsHTML(true); // Define que o e-mail será enviado como HTML
                $mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)

                // Define a mensagem (Texto e Assunto)

                // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=

                $mail->Subject  = $subject; // Assunto da mensagem

                

                $body = file_get_contents( ROOT_PATH . "view/uploads/modelos/email.html");
                $body = str_replace("{{CONTENT}}", $content, $body);  


                try {

                    $mail->Body = $body;

                // $mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano! \r\n :)";

                    // Define os anexos (opcional)

                    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
                    if($attachments != null) {
                        foreach($attachments as $attachment) {
                        $mail->AddAttachment($attachment[0], $attachment[1]);  // Insere um anexo
                        }
                    }

                    // Envia o e-mail
                    /* ++++++++++++++ Comentado Caleb 30/10 ++++++++++++++ */
                   //print_r("AKI");
                    //$mail->sign('C:\xampp\apache\conf\ssl.crt\server.crt', 'C:\xampp\apache\conf\ssl.key\server.key', 'cwtibr', '');
                    $enviado = $mail->Send();

                    // Limpa os destinatários e os anexos
                    $mail->ClearAllRecipients();

                    $mail->ClearAttachments();
                    // Exibe uma mensagem de resultado
                    
                    //print_r($enviado); exit();
                    
                    if ($enviado) {
                    $result = array("status" => true, "msg" => "");
                    return $result;
                    } else {
                    $result = array("status" => false, "msg" => $mail->ErrorInfo);
                    return $result;
                    }

                } catch (phpmailerException $e) {
                    print_r($e->errorMessage()); exit;
                    $result = array("status" => false, "msg" => $e->errorMessage());
                    return $result;
                    } catch (Exception $e) {
                    print_r($e->getMessage()); exit;
                    $result = array("status" => false, "msg" => $e->getMessage());
                    return $result;
                }
                
          } else {
             $result = array("status" => true, "msg" => "");
          }

     }
     
}
