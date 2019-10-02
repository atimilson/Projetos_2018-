<?php session_start();

define( 'DS', DIRECTORY_SEPARATOR );
define( 'BASE_DIR', dirname( __FILE__ ) . DS );


require_once ('conecta.php');

$objBd = new Conexao();
$link = $objBd->conecta_mysql();

$valor = filter_input(INPUT_GET, 'var',FILTER_SANITIZE_SPECIAL_CHARS);


$valor_veri = pg_escape_string($link,$valor);




$pesquisa ="Select * from cliente where codigo = '{$valor_veri}' order by data_cadastro desc";



$resultado_id = pg_query($link, $pesquisa);

if($resultado_id){

    $dados_usuario = pg_fetch_array($resultado_id);
    
  
    

    if (isset($dados_usuario['nome'])){
        
        
        $id_usuario = $dados_usuario['cod_cliente'];
        $nome_user = $dados_usuario['nome'];
        
     
       
        $verificado = "update cliente set verificador = 'S' where cod_cliente = {$id_usuario}";
        
        if (pg_query($link, $verificado)){
        // echo "Bem vindo ".$nome_user."<br> Email verificado com sucesso!";
        header("Location: mapa.php");
        $_SESSION['user']="1";
        } else {
             echo "Bem vindo ".$nome_user."<br> Erro ao verificar";
             
             
            
             
             
        }
       
    }else{
       //$_SESSION["danger"] = '<script>msg("Usuario ou senha incorreto!");</script>';
       header("Location: index.php");
       
    }

}else{
    echo 'Erro na consulta';
}
