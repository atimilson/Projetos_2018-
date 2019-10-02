<?php
/**
 * Created by PhpStorm.
 * User: dev-atimilson
 * Date: 28/12/2016
 * Time: 15:56
 */
session_start();

require_once ('bd.class.php');

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

$sql ="Select * from usuarios where usuario ='$usuario' AND senha = '$senha'";

$objBd = new bd();
$link = $objBd->conecta_mysql();

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){

    $dados_usuario = mysqli_fetch_array($resultado_id);

    if (isset($dados_usuario['usuario'])){
        $_SESSION["id_usuario"] = $dados_usuario['id'];
        $_SESSION["usuario"] = $dados_usuario['usuario'];
       

        header("Location: public_html/home.php");
    }else{
        header("Location: index.php?erro=1");
    }

}else{
    echo 'Erro na consulta';
}
