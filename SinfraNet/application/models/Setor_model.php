<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setor_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function inserir($nome,$setor){
        $dados['nome_setor'] = $nome;
        $dados['andar'] = $setor;
        
        return $this->db->insert('setor', $dados);
        
        
        
    }
    
    
    public function listar_setor(){
        
        
        
        return $this->db->get('setor')->result();
        
        
    }
    
    
     public function excluir ($id){
        
        $this->db->where('id_setor',$id);
        return $this->db->delete('setor');
        
        
    }
    
    
    public function alterar($nome,$setor,$id){
        $dados['nome_setor'] = $nome;
        $dados['andar'] = $setor;
        
        $this->db->where('id_setor',$id);
        return $this->db->update('setor',$dados);
        
        
        
        
        
        
    }
    
    
    
    
    
}