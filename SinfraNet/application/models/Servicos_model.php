<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicos_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function inserir($nome, $descricao, $url, $id_publicador){
        $dados['nome'] = $nome;
        $dados['descricao'] = $descricao; 
        $dados['url'] = $url; 
        $dados['id_publicador'] = $id_publicador;
        
        return $this->db->insert('servicos', $dados);
        
        
        
    }
    
    
    public function listar_servicos(){
        
        
        
        return $this->db->get('servicos')->result();
        
        
    }
    
    
     public function excluir ($id){
        
        $this->db->where('id',$id);
        return $this->db->delete('servicos');
        
        
    }
    
    
    public function alterar($nome, $descricao, $url, $id_publicador,$id){
        $dados['nome'] = $nome;
        $dados['descricao'] = $descricao;
        $dados['url'] = $url;
        $dados['id_publicador'] = $id_publicador;
        
        $this->db->where('id',$id);
        return $this->db->update('servicos',$dados);
        
        
        
        
        
        
    }
    
    
    
    
    
}