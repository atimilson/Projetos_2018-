<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
       public function listar_perfis(){
           $this->db->order_by('nome','ASC');
        return $this->db->get('perfil')->result();
        }
    
      public function inserir($nome,$noticia , $evento ,$repositorio,$acessos,$servico,$aniversario ,$fotos ,$videos ,$audios ,$ramal ,$enquete ,$usuario,$perfil ,$setor) {
          $dados['nome'] = $nome;
          
          $dados['noticia'] = $noticia;
          $dados['evento'] = $evento;
          $dados['repositorio'] = $repositorio;
          $dados['acessos'] = $acessos;
          $dados['servico'] = $servico;
          $dados['fotos'] = $fotos;
          $dados['videos'] = $videos;
          $dados['audios'] = $audios;
          $dados['aniversario'] = $aniversario;
          $dados['ramal'] = $ramal;
          $dados['enquete'] = $enquete;
          $dados['usuario'] = $usuario;
          $dados['perfil'] = $perfil;
          $dados['setor'] = $setor;
          
//          return var_dump($dados);
//          die();
          return $this->db->insert('perfil',$dados);
          
          
      }
                 
 
          
    public function alterar($id,$nome,$noticia , $evento ,$repositorio,$acessos,$servico,$aniversario ,$fotos ,$videos ,$audios ,$ramal ,$enquete ,$usuario,$perfil ,$setor) {
           
          $dados['nome'] = $nome;
          
          $dados['noticia'] = $noticia;
          $dados['evento'] = $evento;
          $dados['repositorio'] = $repositorio;
          $dados['acessos'] = $acessos;
          $dados['servico'] = $servico;
          $dados['fotos'] = $aniversario;
          $dados['videos'] = $fotos;
          $dados['audios'] = $videos;
          $dados['aniversario'] = $audios;
          $dados['ramal'] = $ramal;
          $dados['enquete'] = $enquete;
          $dados['usuario'] = $usuario;
          $dados['perfil'] = $perfil;
          $dados['setor'] = $setor;
          
          
        $this->db->where('id',$id);
        
        return $this->db->update('perfil',$dados);
         
        
        
    }
    
    public function excluir ($id){
        
        $this->db->where('id',$id);
        $teste = $this->db->delete('perfil');
        
        try {
            return $teste;
        } catch (Exception $ex) {
            return 'erro'.$ex;
        }
        
        
//        if($teste){
//            return 'foi';
//        } else {
//            ;    
//        }
        
    }
    

    
    
    
}
