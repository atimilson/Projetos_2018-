<?php
include ("conecta.php");
require_once("class/Categoria.php");
function listaCategorias($link) {
    $categorias = array();
    $query = "select * from categoria";
    $resultado = mysqli_query($link, $query);
    while ($categoria_array = mysqli_fetch_assoc($resultado)){
        
    $categoria = new Categoria();

    $categoria->id = $categoria_array['id'];
    $categoria->nome = $categoria_array['nome'];
    
    array_push($categorias, $categoria);
    }
    return $categorias;
}

