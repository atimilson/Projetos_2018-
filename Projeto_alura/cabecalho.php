<?php 
error_reporting(E_ALL ^ E_NOTICE);
require_once ("./mostra-alerta.php"); ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Minha Loja</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/loja.css">
    </head>
    <body>
        
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php"> Minha Loja</a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li><a href="produto-formulario.php">Adiciona Produto</a></li>
                        <li><a href="produto-lista.php">Lista Produto</a></li>
                        <li><a href="contato.php">Contato</a></li>
                        
                    </ul>
                </div>
                <div id="sair">
                    <a class="btn btn-primary" href="logout.php">Sair</a>
                </div>
            </div>
            
        </div>
        
        
        <div class="container">
            <div class="principal">
                        
                        <?php  mostraAlerta("success");
			 mostraAlerta("danger"); ?>
