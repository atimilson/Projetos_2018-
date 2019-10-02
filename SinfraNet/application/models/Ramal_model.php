<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ramal_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
       public function listar_setores(){
        return $this->db->get('setor')->result();
        }
    
      public function inserir($nome,$ramal,$setor) {
          $dados['nome'] = $nome;
          $dados['ramal'] = $ramal;
          $dados['id_setor'] = $setor;
          
          return $this->db->insert('ramal',$dados);
          
          
      }
                 
      public function listar_ramais(){
           
        $this->db->select('ramal.*, setor.nome_setor');
        $this->db->from('setor');
        $this->db->join('ramal', 'ramal.id_setor = setor.id_setor');
        
        $this->db->order_by('ramal.nome', 'ASC');
        return $this->db->get()->result();
    }
          
    public function alterar($nome, $ramal, $setor,$id){
        
        $dados['nome'] = $nome;
        $dados['ramal'] = $ramal;
        $dados['id_setor'] = $setor;
        $this->db->where('id_ramal',$id);
        return $this->db->update('ramal',$dados);
         
        
        
    }
    
    public function excluir ($id){
        
        $this->db->where('id_ramal',$id);
        return $this->db->delete('ramal');
        
        
    }
    
         public function listar_ramais_home(){
           
        $this->db->select('ramal.*, setor.nome_setor,setor.andar');
        $this->db->from('setor');
        $this->db->join('ramal', 'ramal.id_setor = setor.id_setor');
        
        $this->db->order_by('ramal.nome', 'ASC');
        return $this->db->get()->result();
    }
    
    
    
}
