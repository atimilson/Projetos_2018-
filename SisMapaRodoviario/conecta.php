<?php


/**
 * Description of Conexao1
 *
 * @author 05506932111
 */

class Conexao{
    //put your code here
    
     private $host ='localhost';
    private $user = 'postgres';

    private  $pass = '123';

    private $database = 'maparodoviario';

    public function conecta_mysql(){
        $con = pg_connect("host=localhost port=5432 dbname=maparodoviario user=postgres password=sinfra") or die ("falha");

        
/*
        if (mysqli_connect_errno()){
            echo "Erro ao tentar se conectar com o BD MySQL: " . mysqli_connect_error();

        } */
     
        return $con;



    }
    
    
}
