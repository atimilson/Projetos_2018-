<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Calculadora{
    
    private $total;
    private $numero1;
    private $numero2;
    
    function __construct() {
        $this->total = 0;
        $this->numero1 = 0;
        $this->numero2 = 0;
    }
    
    public function setNumero1($parametro_numero1){
        $this->numero1 = $parametro_numero1;
    }
    
    public function setNumero2($parametro_numero2){
        $this->numero2 = $parametro_numero2;
    }
    
    public function Somar(){
        $this->total = $this->numero1 + $this->numero2;
    }
    
    public function getTotal(){
      return $this->total;
    }
    
}

