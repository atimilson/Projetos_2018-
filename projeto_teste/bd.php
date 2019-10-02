<?php

/**
 * Created by PhpStorm.
 * User: dev-atimilson
 * Date: 26/01/2017
 * Time: 15:53
 */
class bd{
    private $host ='localhost';

    private $user = 'root';

    private  $pass = '';

    private $database = 'projeto_teste';

        public function conecta_mysql(){
            $con = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

            mysqli_set_charset($con,"utf8");

            if (mysqli_connect_errno()){
                echo "Erro ao tentar se conectar com o BD MySQL: " . mysqli_connect_error();

            }
                return $con;



        }

}