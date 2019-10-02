<?php


session_start();


define( 'DS', DIRECTORY_SEPARATOR );
define( 'BASE_DIR', dirname( __FILE__ ) . DS );


require_once ('conecta.php');



require_once('enviaremail.php');
//echo BASE_DIR.'enviaremail.php';


$objBd = new Conexao();
$link = $objBd->conecta_mysql();


// Recebe valores dos formularios
$txtNome    = filter_input(INPUT_POST, 'nome',FILTER_SANITIZE_SPECIAL_CHARS);
$txtEmail    = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_SPECIAL_CHARS);
$txtProfissao    = filter_input(INPUT_POST, 'profissao',FILTER_SANITIZE_SPECIAL_CHARS);
$txtCpf    = filter_input(INPUT_POST, 'cpf',FILTER_SANITIZE_SPECIAL_CHARS);





$IDestado    = filter_input(INPUT_POST, 'estado',FILTER_SANITIZE_SPECIAL_CHARS);
$IDcidade    = filter_input(INPUT_POST, 'cidade',FILTER_SANITIZE_SPECIAL_CHARS);
 

if(empty($IDestado) && empty($IDcidade) ){
    
    
    $_SESSION['var']="1";
    header("Location: index.php");
    
}else{
    
}

//variaveis ultilizadas para o envio de email.
$txtMensagem    = "Mapa Rodoviario";
$txtAssunto    = "Mapa Rodoviario";

//para a segurança do banco
$nome = pg_escape_string($link,$txtNome);
$email = pg_escape_string($link,$txtEmail);
$cpf = pg_escape_string($link,$txtCpf);
$profissao = pg_escape_string($link,$txtProfissao);
$Esc_estado = pg_escape_string($link,$IDestado);
$Esc_cidade = pg_escape_string($link,$IDcidade);







$pesquisa ="Select * from cliente order by cod_cliente desc";



$resultado_id = pg_query($link, $pesquisa);

if($resultado_id){

    $dados_usuario = pg_fetch_array($resultado_id);
    
    if (isset($dados_usuario['nome'])){
        
        
        $id_usuario = $dados_usuario['cod_cliente'];
       $id_usuario = $id_usuario+1;
        
    }
}
//codigo enviado ao email 
$cod_email= md5($id_usuario."".$email);

//$senha = mysqli_real_escape_string($link, $pass);
//$senha = md5($senha);

$inserir = "insert into cliente (nome, cpf, email,codigo, profissao,cod_estados, cod_cidades) values"
        . "('{$nome}','{$cpf}','{$email}','{$cod_email}','{$profissao}','{$Esc_estado}','{$Esc_cidade}')";



if(pg_query($link, $inserir)){
    
   
    if (EnviaEmail($nome, $txtAssunto, $txtEmail, $txtMensagem,$cod_email)){
        
    }else{
        echo 'Erro ao enviar email';
        die();
    }
    
    
}else{
    echo 'Erro ao Cadastrar';
    die();
}

