<?php
/**
 * Created by PhpStorm.
 * User: dev-atimilson
 * Date: 28/12/2016
 * Time: 14:42
 */

require_once ('bd.class.php');


$usuario = $_POST['usuario'];

$senha = $_POST['senha'];




$objBd = new bd();
$link = $objBd->conecta_mysql();

$usuario_existe = false;
$email_existe = false;


$sql_consulta = "select * from usuarios WHERE usuario = '$usuario'";
if($resultado_id = mysqli_query($link,$sql_consulta)){

    $dados = mysqli_fetch_array($resultado_id);

    if (isset($dados['usuario'])){
        $usuario_existe = true;
    }

} else{

    echo "Erro ao Localizar o registro de usuarios no Banco de dados";

}


if($usuario_existe || $email_existe){

    $retorno_get = '';

    if ($usuario_existe){
        $retorno_get.= "erro_usuario=1&";
    }
   
    header("Location: inscrevase.php?".$retorno_get);
    die();
}



$sql = "insert into usuarios values (DEFAULT ,'$usuario','$senha')";

 if(mysqli_query($link,$sql)){

    echo "Usuario registrado com sucesso";

} else{

    echo "Erro ao registrar usuario";

}

