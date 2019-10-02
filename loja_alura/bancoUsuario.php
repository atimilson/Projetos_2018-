<?php
include ("conecta.php");
function buscaUsuario($link, $email, $senha){
    $email = mysqli_escape_string($link, $email);
    $query = "select * from usuarios where email = '{$email}' and senha = '{$senha}'";
    $resultado = mysqli_query($link, $query);
    $usuario = mysqli_fetch_assoc($resultado);
    return $usuario;
}