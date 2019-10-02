<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Produto{
    public $id;
    public $nome;
    public $preco;
    public $descricao;
    public $categoria;
    public $usado;
    
    
    function precoComDesconto($valor =0.1){
        if($valor > 00 && $valor <= 0.5){
        $this->preco -= $this->preco * $valor;
        }
    return number_format($this->preco,2,'.','');
}


public function getPreco(){
    return $this->preco;
    
}


}