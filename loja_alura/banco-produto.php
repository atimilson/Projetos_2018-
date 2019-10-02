<?php
include ("conecta.php");
function listaProdutos($link) {
    $produtos = array();
    $query = "select p.* ,c.nome as categoria_nome from "
            ."produtos as p join categoria as c on "
            ."c.id = p.categoria_id";
    $resultado = mysqli_query($link, $query);
    while ($produto = mysqli_fetch_array($resultado)) {
        array_push($produtos, $produto);
    }

    return $produtos;
}

function buscaProdutos($link , $id){
    $query = "select * from produtos where id={$id}";
    $resultado = mysqli_query($link, $query);
    return mysqli_fetch_assoc($resultado);
    
}

function alteraProduto($link, $nome, $preco, $descricao, $categoria_id, $usado,$id){
    $query = "update produtos set nome = '{$nome}', preco='{$preco}', descricao='{$descricao}', categoria_id='{$categoria_id}',usado='{$usado}' where id='{$id}'";
    
    return mysqli_query($link, $query);
}

function insereProduto($link, $nome, $preco, $descricao, $categoria_id, $usado) {
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values "
            ."('{$nome}',{$preco},'{$descricao}',{$categoria_id},{$usado})";

    return mysqli_query($link, $query);
}

function removeProduto($link, $id){
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($link, $query);
}
