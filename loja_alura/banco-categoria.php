<?php
include ("conecta.php");
function listaCategorias($link) {
    $categorias = array();
    $query = "select * from categoria";
    $resultado = mysqli_query($link, $query);
    while ($categoria = mysqli_fetch_assoc($resultado)){
    array_push($categorias, $categoria);
    }
    return $categorias;
}

