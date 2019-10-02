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
$nome = filter_input(INPUT_POST,'txt_nome', FILTER_SANITIZE_SPECIAL_CHARS);


require_once('bd.class.php');




$objBd = new bd();
$link = $objBd->conecta_mysql();


$sql = "select u.*, us.id_usuario_seguidor from usuarios as u left JOIN usuarios_seguidores as us ON (u.id = us.seguindo_id_usuario AND us.idusuario = $id_usuario) where u.usuario like '%$nome%' and id <> $id_usuario";




 $resultado_id = mysqli_query($link,$sql);

 if($resultado_id){

     while($pessoa = mysqli_fetch_array($resultado_id)){

         $esta_seguindo_usuario_sn = isset($pessoa['id_usuario_seguidor']) && !empty($pessoa['id_usuario_seguidor']) ? 'S' : 'N';

         echo '<a href="#" class="list-group-item">';
            echo '<strong>'.$pessoa['usuario'].'</strong> <small> - '.$pessoa['email'].'</small>';
            echo '<p class="list-group-item-text pull-right">';

                $btn_seguir_display = 'block';
                $btn_deixar_seguir_display = 'block';

                if($esta_seguindo_usuario_sn == 'N'){

                    $btn_deixar_seguir_display = 'none';
                } else {
                    $btn_seguir_display = 'none';
                }

                echo '<button type="button" class="btn btn-default btn_seguir" style="display: '.$btn_seguir_display.'" $btn_seguir_display" id="seguir_'.$pessoa['id'].'" data-id_usuario="'.$pessoa['id'].'">Seguir</button>';
                echo '<button type="button" class="btn btn-primary btn_deixar_seguir" id="deixar_seguir_'.$pessoa['id'].'" style="display: '.$btn_deixar_seguir_display.'" data-id_usuario="'.$pessoa['id'].'">Deixar de seguir</button>';
            echo '</p>';
         echo '<div class="clearfix"></div>';
         echo '</a>';
     }

 }else{
     echo 'Erro na execução da consulta';
 }


