<?php
session_start();

require_once ('conexao.php');

$usuario = filter_input(INPUT_POST, 'login',FILTER_SANITIZE_SPECIAL_CHARS);

$login = mysqli_real_escape_string($link, $usuario);

$senha =  filter_input(INPUT_POST, 'senha',FILTER_SANITIZE_SPECIAL_CHARS);


$pesquisa ="Select * from usuario where login ='$login' AND senha = '$senha'";

$objBd = new conexao();
$link = $objBd->conecta_mysql();

$resultado_id = mysqli_query($link, $pesquisa);

if($resultado_id){

    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (isset($dados_usuario['login'])){
        $_SESSION["id_usuario"] = $dados_usuario['id'];
        $_SESSION["usuario"] = $dados_usuario['usuario'];
        $_SESSION["email"] = $dados_usuario['email'];

        header("Location: home.php");
    }else{
        header("Location: index.php?erro=1");
    }

}else{
    echo 'Erro na consulta';
}
