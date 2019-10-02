<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('DS', DIRECTORY_SEPARATOR);
define('BASE_DIR', dirname(__FILE__) . DS);


require_once (BASE_DIR . 'conecta.php');

$objBd = new Conexao();
$link = $objBd->conecta_mysql();



$estado    = filter_input(INPUT_POST, 'estado',FILTER_SANITIZE_SPECIAL_CHARS);


$id_estado = pg_escape_string($link,$estado);

$sql = "Select * from cidades where estados_cod_estados = '{$id_estado}' order by nome";





$rs = pg_query($link, $sql);






if($rs === FALSE) { 
   die(pg_result_error($rs));
}

 

 while ($row = pg_fetch_assoc($rs)) {
   echo '<option value="' . $row['cod_cidades'] . '">' . $row['nome'] . '</option>';
};

 
?>