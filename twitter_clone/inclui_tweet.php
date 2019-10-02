<?php
/**
 * Created by PhpStorm.
 * User: dev-atimilson
 * Date: 02/01/2017
 * Time: 17:01
 */
session_start();
if(!isset($_SESSION['usuario'])) header("Location: index.php?erro=1");

$tweet = $_POST['txt_tweet'];

$id_usuario = $_SESSION['id_usuario'];



require_once ('bd.class.php');




$objBd = new bd();
$link = $objBd->conecta_mysql();


$sql = "insert into tweet(id_usuario , tweet) values ($id_usuario,'$tweet')";



mysqli_query($link,$sql);

    
