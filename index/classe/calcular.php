<!DOCTYPE html>
<html>
<head>
	<title>Calculadora em PHP</title>

  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="estilo.css">
    <meta charset="iso-8859-1">
</head>
<body>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'config.php';
require_once '../calculadora.php';

$numero1 = filter_input(INPUT_POST, 'numero1', FILTER_SANITIZE_SPECIAL_CHARS);
$numero2 = filter_input(INPUT_POST, 'numero2', FILTER_SANITIZE_SPECIAL_CHARS);
$operacao = filter_input(INPUT_POST, 'operacao', FILTER_SANITIZE_SPECIAL_CHARS);


$calculadora = new Calculadora();

$calculadora ->setNumero1($numero1);
$calculadora ->setNumero2($numero2);

$calculadora->Somar();

echo '<h1>'.$calculadora->getTotal().'</h1>';


?>

 </body>

 <script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
 </html>