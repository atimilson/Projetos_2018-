<?php

require_once ("cabecalho.php");
require_once ("conecta.php");
require_once ("banco-produto.php");
require_once ("./logica-usuario.php");

verificaUsuario();

$id = $_POST['id'];

if (removeProduto($link, $id)){
    $_SESSION["sucess"] = "produto removido com sucesso";
header("Location: produto-lista.php");
}

die();
