<?php

/**
 * Created by PhpStorm.
 * User: dev-atimilson
 * Date: 09/02/2017
 * Time: 18:38
 */
class conexao
{
    private $host ='localhost';

    private $user = 'root';

    private  $pass = '';

    private $database = 'sistema_financeiro';

    public function conecta_mysql(){
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

        mysqli_set_charset($con,"utf8");

        if (mysqli_connect_errno()){
            echo "Erro ao tentar se conectar com o BD MySQL: " . mysqli_connect_error();

        }
        return $con;



    }
}