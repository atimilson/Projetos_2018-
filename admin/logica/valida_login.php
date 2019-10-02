<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



session_start();

require_once ('../bd/conecta.php');

$objBd = new Conexao();
$link = $objBd->conecta_mysql();

$usuario = filter_input(INPUT_POST, 'login',FILTER_SANITIZE_SPECIAL_CHARS);

// = mysqli_real_escape_string($link, $usuario);

$pass =  filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_SPECIAL_CHARS);
//$senha = mysqli_real_escape_string($link, $pass);
$senha = md5($pass);

$pesquisa ="Select * from usuario where nome ='$usuario' AND senha = '$senha'";






$resultado_id = pg_query($link, $pesquisa);

if($resultado_id){

    $dados_usuario = pg_fetch_array($resultado_id);

    if (isset($dados_usuario['id'])){
        $_SESSION["id_usuario"] = $dados_usuario['id'];
        $_SESSION["nome"] = $dados_usuario['nome'];
       

        header("Location: ../home.php");
        
       
    }else{
       $_SESSION["danger"] = '<script>alert("Usuario ou senha incorreto!");</script>';
       header("Location: ../index.php");
       
    }

}else{
    echo 'Erro na consulta';
}
