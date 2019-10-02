<?php
include ("conecta.php");
require_once ("./class/produto.php");
require_once ("./class/categoria.php"); 
function listaProdutos($link) {
    $produtos = array();
    $query = "select p.* ,c.nome as categoria_nome from "
            ."produtos as p join categoria as c on "
            ."c.id = p.categoria_id";
    $resultado = mysqli_query($link, $query);
    while ($produto_array = mysqli_fetch_array($resultado)) {
        
        $produto = new Produto();
        $categoria = new Categoria();
        
        $categoria->nome = $produto_array['categoria_nome'];
        
        $produto->nome = $produto_array['nome'];
        $produto->preco = $produto_array['preco'];
        $produto->descricao = $produto_array['descricao'];
        $produto->categoria = $categoria;
        $produto->id = $produto_array['id'];
        $produto->usado = $produto_array['usado'];
        
        array_push($produtos, $produto);
    }

    return $produtos;
}

function buscaProdutos($link , $id){
    $query = "select * from produtos where id={$id}";
    $resultado = mysqli_query($link, $query);
    $produto_buscado = mysqli_fetch_assoc($resultado);

    $categoria = new Categoria();
    $categoria->id = $produto_buscado['categoria_id'];

    $produto = new Produto();
    $produto->id = $produto_buscado['id'];
    $produto->nome = $produto_buscado['nome'];
    $produto->descricao = $produto_buscado['descricao'];
    $produto->categoria = $categoria;
    $produto->preco = $produto_buscado['preco'];
    $produto->usado = $produto_buscado['usado'];

    return $produto;
}

function alteraProduto($link, Produto $produto){
    $query = "update produtos set nome = '{$produto->nome}', preco='{$produto->preco}', descricao='{$produto->descricao}', categoria_id='{$produto->categoria->id}',usado='{$produto->usado}' where id='{$produto->id}'";
    
    
   // return var_dump($query);
   // die();
   return mysqli_query($link, $query);
}

function insereProduto($link, Produto $produto) {
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado) values "
            ."('{$produto->nome}',{$produto->preco},'{$produto->descricao}',{$produto->categoria->id},{$produto->usado})";
    return var_dump($query);
    
    //return mysqli_query($link, $query);
}

function removeProduto($link, $id){
    $query = "delete from produtos where id = {$id}";
    return mysqli_query($link, $query);
}
