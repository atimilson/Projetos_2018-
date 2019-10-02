<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acessos_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    
    public function inserir_acesso($caminho_poster,$nome,$url,$id_publicador) {
        
        $dados['nome'] = $nome;
        $dados['url'] = $url;
        $dados['id_usuario'] = $id_publicador;
        $dados['icone'] = $caminho_poster;
      
       
        return $this->db->insert('acessos', $dados);
    }
    
    
    public function listar_acessos(){
        
        $this->db->order_by('nome', 'ASC');
        return $this->db->get('acessos')->result();
        
    }
    
    public function alterar_acesso($id,$nome, $url, $id_publicador){
        $dados['nome'] = $nome;
        $dados['url'] = $url;
        $dados['id_usuario'] = $id_publicador;
        
        $this->db->where('id',$id);
        return $this->db->update('acessos',$dados);
        
        
    }
    
    public function alterar_acesso_icone($id, $caminho_poster, $nome, $url, $id_publicador){
        
        $dados['nome'] = $nome;
        $dados['url'] = $url;
        $dados['icone'] = $caminho_poster;
        $dados['id_usuario'] = $id_publicador;
        
        $this->db->where('id',$id);
        return $this->db->update('acessos',$dados);
        
        
        
    }
    
    public function excluir ($id){
        
        $this->db->where('id',$id);
        return $this->db->delete('acessos');
        
        
    }
    
    
    
}