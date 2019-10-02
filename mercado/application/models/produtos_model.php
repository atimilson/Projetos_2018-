<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Produtos_model extends CI_Model{
    
    public function buscaTodos() {
        return $this->db->get("produtos")->result_array();
    }
    
    public function salva($produto){
        $this->db->insert("produtos", $produto);
    }
    
    public function busca($id){
        return $this->db->get_where("produtos", array(
          "id" => $id  
        ))->row_array();
    }
    
}