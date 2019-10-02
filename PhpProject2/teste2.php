

<?php
  $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
  echo getenv('USERNAME').'<br>';
echo $hostname.'<br>';




valida_ldap("pequi","SINFRA\05506932111","Sinfra2018@");
/*********************************************
Função de validação no AD via protocolo LDAP
como usar:
valida_ldap("servidor", "domíniousuário", "senha");

*********************************************/

function valida_ldap($srv, $usr, $pwd){
$ldap_server = $srv;
$auth_user = $usr;
$auth_pass = $pwd;

// Tenta se conectar com o servidor
if (!($connect = @ldap_connect($ldap_server))) {
return FALSE;
}

// Tenta autenticar no servidor
if (!($bind = @ldap_bind($connect, $auth_user, $auth_pass))) {
// se não validar retorna false
      
return FALSE;
} else {
// se validar retorna true
        
return TRUE;
}

}
 
 

// EXEMPLO do uso dessa função



$server = "pequi"; //IP ou nome do servidor
$dominio = "SINFRA"; //Dominio Ex: @gmail.com
$user = "SINFRA\05506932111";
$pass = "Sinfra2018@";

if (valida_ldap($server, $user, $pass)) {
echo "usuário autenticado<br>";
} else {
echo "usuário ou senha inválida";
}

?>