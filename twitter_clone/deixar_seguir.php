<?php
/**
 * Created by PhpStorm.
 * User: dev-atimilson
 * Date: 02/01/2017
 * Time: 17:01
 */
session_start();
if(!isset($_SESSION['usuario'])) header("Location: index.php?erro=1");



$id_usuario = $_SESSION['id_usuario'];
$seguir_id_usuario = filter_input(INPUT_POST,'seguir_id_usuario',FILTER_SANITIZE_SPECIAL_CHARS);


require_once ('bd.class.php');




$objBd = new bd();
$link = $objBd->conecta_mysql();


$sql = "delete from usuarios_seguidores WHERE  id_usuario = $id_usuario and seguindo_id_usuario = $seguir_id_usuario";



mysqli_query($link,$sql);

    
