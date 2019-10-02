<?php

session_start();

require_once ('./Conexao1.php');

$objBd = new Conexao1();
$link = $objBd->conecta_mysql();

$usuario = filter_input(INPUT_POST, 'login',FILTER_SANITIZE_SPECIAL_CHARS);

// = mysqli_real_escape_string($link, $usuario);

$pass =  filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_SPECIAL_CHARS);
//$senha = mysqli_real_escape_string($link, $pass);
//$senha = md5($senha);

$pesquisa ="Select * from usuario where nome ='$usuario' AND senha = '$pass'";

//var_dump($pesquisa);

//die();

$resultado_id = mysqli_query($link, $pesquisa);

if($resultado_id){

    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (isset($dados_usuario['nome'])){
        $_SESSION["id_usuario"] = $dados_usuario['id'];
        $_SESSION["nome"] = $dados_usuario['nome'];
       

        header("Location: home.php");
        
       
    }else{
       $_SESSION["danger"] = '<script>msg("Usuario ou senha incorreto!");</script>';
       header("Location: index.php");
       
    }

}else{
    echo 'Erro na consulta';
}
