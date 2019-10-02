<?php
/**
 * Created by PhpStorm.
 * User: dev-atimilson
 * Date: 28/12/2016
 * Time: 14:47
 */

class bd{
    private $host = 'localhost';

    private $user = 'root';

    private $pass = '';

    private $database ='twitter_clone';

    public function conecta_mysql(){

        //cria a variável de conexão
        $con = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

        //ajusta o charset de comunicação entre a aplicação e o banco de dados
        mysqli_set_charset($con,"utf8");

        // verificando se houve erro de conexão
        if(mysqli_connect_errno()) {
            echo "Erro ao tentar se conectar com o BD MySQL: " . mysqli_connect_error();
        }

        return $con;


    }





}