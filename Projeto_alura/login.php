<?php
require_once ("./conecta.php");
require_once ("./bancoUsuario.php");
require_once ("./logica-usuario.php");

$usuario = buscaUsuario($link, $_POST["email"], md5($_POST["senha"]));

if($usuario == null){
    $_SESSION["danger"] = "Usuário ou senha inválida";
    header("Location: index.php");
}else{
    $_SESSION["success"] = "Usuário logado com sucesso";
    logaUsuario($usuario["email"]);
    header("Location: index.php");
}
die();

