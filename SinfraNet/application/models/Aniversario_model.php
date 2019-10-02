<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aniversario_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function listar_setores(){
        return $this->db->get('setor')->result();
        }
    
      public function inserir($nome,$dataNasc,$setor) {
          $dados['nome'] = $nome;
          $dados['data_nasc'] = $dataNasc;
          $dados['id_setor'] = $setor;
          
          return $this->db->insert('aniversario',$dados);
          
          
      }
                 
      public function listar_aniversarios(){
           
        $this->db->select('aniversario.*, setor.nome_setor');
        $this->db->from('setor');
        $this->db->join('aniversario', 'aniversario.id_setor = setor.id_setor');
        
        $this->db->order_by('aniversario.nome', 'ASC');
        return $this->db->get()->result();
    }
          
    public function alterar($nome, $dataNasc, $setor,$id){
        
        $dados['nome'] = $nome;
        $dados['data_nasc'] = $dataNasc;
        $dados['id_setor'] = $setor;
        $this->db->where('id_aniver',$id);
        return $this->db->update('aniversario',$dados);
         
        
        
    }
    
    public function excluir ($id){
        
        $this->db->where('id_aniver',$id);
        return $this->db->delete('aniversario');
        
        
    }
    
    
    // select para exibir na home
    public function listar_ani(){
//       $sql =  "SELECT *
//		FROM   aniversarios
//		WHERE  Extract(month from data_nasc) >= Extract(month from Now())
//		AND    Extract(month from data_nasc) <= Extract(month from Now() + Interval '20 day') order  by Extract(day from data_nasc) Asc";
        
                $this->db->where("Extract(month from data_nasc) >= Extract(month from Now()) AND    Extract(month from data_nasc) <= Extract(month from Now() + Interval '1 day') order  by Extract(day from data_nasc) Asc");
                return $this->db->get("aniversario")->result();
        
        
    }

    
    
}
