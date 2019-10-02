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



require_once('bd.class.php');




$objBd = new bd();
$link = $objBd->conecta_mysql();


$sql = "select t.id_tweet, t.id_usuario, t.tweet, date_format(t.data_inclusao,'%d %b %Y %T') as data_inclusao, u.usuario ";
$sql.="from tweet as t join usuarios as u on(t.id_usuario = u.id) or id_usuario in ()";
$sql.=" where id_usuario = $id_usuario order by data_inclusao desc";




 $resultado_id = mysqli_query($link,$sql);

 if($resultado_id){

     while($tweet = mysqli_fetch_array($resultado_id)){
         echo '<a href="#" class="list-group-item">';
         echo '<h4 class="list-group-item-heading">'.$tweet['usuario'].'<small> - '.$tweet['data_inclusao'].'</small></h4>';
         echo '<p class="list-group-item-text">'.$tweet['tweet'].'</p>';
         echo '</a>';
     }

 }else{
     echo 'Erro na execução da consulta';
 }


