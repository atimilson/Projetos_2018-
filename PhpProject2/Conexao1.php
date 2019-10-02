<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao1
 *
 * @author 05506932111
 */
class Conexao1 {
    //put your code here
    
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
