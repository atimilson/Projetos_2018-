<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];
require_once ("./logica-usuario.php");
require_once("./PHPMailerAutoload.php");
verificaUsuario();
global $error;
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;

$mail->SMTPDebug = 1;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username="atimilson95@gmail.com";
$mail->Password="cancer06";

$mail->setFrom("atimilson95@gmail.com","Atimilson");
$mail->addAddress("atimilson95@gmail.com");
$mail->Subject="Email de contato da loja";

$mail->msgHTML("<html>de: {$nome}<br> email:{$email} <br> Mensagem: {$mensagem}</html>");
$mail->AltBody ="de: {$nome}\n email:{$email}\n Mensagem: {$mensagem}";

if($mail->send()){
     $_SESSION["success"]= "Mensagem enviada com sucesso";
    header("Location:index.php");
}else{
     $_SESSION["danger"]= "Mensagem não enviada: $mail->ErrorInfo";
    header("Location:contato.php");
}


die();