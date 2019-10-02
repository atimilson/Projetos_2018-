<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
function usuarioEstaLogado(){
    return isset($_SESSION["usuario_logado"]);
}

function verificaUsuario() {
    if (!usuarioEstaLogado()) {
        $_SESSION["danger"] = "Usuário ou senha inválida";
        header("Location: index.php");
        die();
    }
}

function usuarioLogado(){
    return $_SESSION["usuario_logado"];
}

function logaUsuario($email){
    $_SESSION["usuario_logado"] = $email;
}

function logout(){
    session_destroy();
    session_start();
}