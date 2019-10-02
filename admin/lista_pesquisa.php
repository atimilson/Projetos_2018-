<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

define('DS', DIRECTORY_SEPARATOR);
define('BASE_DIR', dirname(__FILE__) . DS);


require_once ('./bd/conecta.php');

$objBd = new Conexao();
$link = $objBd->conecta_mysql();



$dt_inicio = filter_input(INPUT_POST, 'data_inic', FILTER_SANITIZE_SPECIAL_CHARS);
$dt_final = filter_input(INPUT_POST, 'data_f', FILTER_SANITIZE_SPECIAL_CHARS);
$tipo_pes = filter_input(INPUT_POST, 'tipo_p', FILTER_SANITIZE_SPECIAL_CHARS);


if($tipo_pes != ""){
    
    if($tipo_pes == 3){
    if($dt_final == "" && $dt_inicio == ""){
        $sql = "SELECT cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades order by cliente.data_cadastro asc";
    }
    if($dt_inicio <> "" && $dt_final == ""){
        $sql = "SELECT cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades";
        $sql .= " And data_cadastro >= '{$dt_inicio}' order by cliente.data_cadastro asc";
    }
    
     if($dt_inicio == "" && $dt_final <> ""){
        $sql = "SELECT cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades";
        $sql .= " And data_cadastro <= '{$dt_final}' order by cliente.data_cadastro asc";
    }
    if($dt_inicio <> "" && $dt_final <> ""){
        $sql = "SELECT cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades";
        $sql .= " And data_cadastro >= '{$dt_inicio}' And data_cadastro <='{$dt_final}' order by cliente.data_cadastro asc";
    }
    
    }
    if($tipo_pes == 2){
       if($dt_final == "" && $dt_inicio == ""){
        $sql = "SELECT cliente.cod_cliente, cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades and verificador = 'N' order by cliente.data_cadastro asc";
    }
    
        if($dt_inicio <> "" && $dt_final == ""){
        $sql = "SELECT cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades and verificador = 'N'";
        $sql .= " And data_cadastro >= '{$dt_inicio}' order by cliente.data_cadastro asc";
    }
    
     if($dt_inicio == "" && $dt_final <> ""){
        $sql = "SELECT cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades and verificador = 'N'";
        $sql .= " And data_cadastro <= '{$dt_final}' order by cliente.data_cadastro asc";
    }
     if($dt_inicio <> "" && $dt_final <> ""){
        $sql = "SELECT cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades and verificador = 'N'";
        $sql .= " And data_cadastro >= '{$dt_inicio}' And data_cadastro <= '{$dt_final}' order by cliente.data_cadastro asc";
    }
    
        
    }
    
     if($tipo_pes == 1){
       if($dt_final == "" && $dt_inicio == ""){
        $sql = "SELECT cliente.cod_cliente, cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades and verificador = 'S' order by cliente.data_cadastro asc";
    }
    
            if($dt_inicio <> "" && $dt_final == ""){
        $sql = "SELECT cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades and verificador = 'S'";
        $sql .= " And data_cadastro >= '{$dt_inicio}' order by cliente.data_cadastro asc";
    }
    
     if($dt_inicio == "" && $dt_final <> ""){
        $sql = "SELECT cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades and verificador = 'S'";
        $sql .= " And data_cadastro <= '{$dt_final}' order by cliente.data_cadastro asc";
    }
    
         if($dt_inicio <> "" && $dt_final <> ""){
        $sql = "SELECT cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades and verificador = 'S'";
        $sql .= " And data_cadastro >= '{$dt_inicio}' And data_cadastro <= '{$dt_final}' order by cliente.data_cadastro asc";
    }
    
        
    }
    
    
    
}

//var_dump($sql);
//die();

//$id_estado = pg_escape_string($link, $estado);

$sql0 ="set datestyle to DMY, SQL";

//$sql = "SELECT cliente.nome, cliente.cpf, cliente.email, cliente.profissao, cliente.data_cadastro::date, estados.nome as estado,cidades.nome as cidades
//	FROM cliente, estados, cidades where cliente.cod_estados = estados.cod_estados and cliente.cod_cidades = cidades.cod_cidades";



pg_query($link, $sql0);

$rs = pg_query($link, $sql);






if ($rs === FALSE) {
    die(pg_result_error($rs));
}

/*

while ($row = pg_fetch_assoc($rs)) {
    echo '<option value="' . $row['cod_cidades'] . '">' . $row['nome'] . '</option>';
};
*/
while($resultado = pg_fetch_assoc($rs)){
        $vetor[] = $resultado; 
        
    }    
    
    //Passando vetor em forma de json
    echo json_encode($vetor);
