<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Audio_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

       public function listar_audios(){
         $this->db->order_by('data_cadastro','DESC');
        return $this->db->get('audio')->result();
        }

      public function inserir_audio($titulo, $caminho_documento, $extensao, $nome_original_doc, $nome_arquivo, $nome_usuario,$path) {
          $dados['titulo'] = $titulo;
          $dados['caminho_arquivo'] = $caminho_documento;
          $dados['nome_arquivo'] = $nome_arquivo;

          $dados['extensao'] = $extensao;
          $dados['nome_original'] = $nome_original_doc;
          $dados['extensao'] = $extensao;
          $dados['nome_publicador'] = $nome_usuario;
          $dados['caminho_servidor'] = $path;
          return $this->db->insert('audio',$dados);
      }


      public function mover_audio_mod($titulo, $nome_arquivo, $caminho_arquivo,$nome_original ,$extensao, $data_cadastro, $nome_publicador, $publicado, $data_publicado, $nome_publicador_home, $caminho_servidor) {
        $dados['titulo'] = $titulo;
        $dados['caminho_arquivo'] = $caminho_arquivo;
        $dados['nome_arquivo'] = $nome_arquivo;

        $dados['extensao'] = $extensao;
        $dados['nome_original'] = $nome_original;
        $dados['extensao'] = $extensao;
        $dados['nome_publicador'] = $nome_publicador;
        $dados['publicado'] = $publicado;
        $dados['data_publicado'] = $data_publicado;
        $dados['nome_publicador_home'] = $nome_publicador_home;
        $dados['caminho_servidor'] = $caminho_servidor;
        return $this->db->insert('audio_alterados',$dados);
      }

      public function excluir_audio_mod($titulo, $nome_arquivo, $caminho_arquivo,$nome_original ,$extensao, $data_cadastro, $nome_publicador, $publicado, $data_publicado, $nome_publicador_home, $caminho_servidor) {
        $dados['titulo'] = $titulo;
        $dados['caminho_arquivo'] = $caminho_arquivo;
        $dados['nome_arquivo'] = $nome_arquivo;

        $dados['extensao'] = $extensao;
        $dados['nome_original'] = $nome_original;
        $dados['extensao'] = $extensao;
        $dados['nome_publicador'] = $nome_publicador;
        $dados['publicado'] = $publicado;
        $dados['data_publicado'] = $data_publicado;
        $dados['nome_publicador_home'] = $nome_publicador_home;
        $dados['caminho_servidor'] = $caminho_servidor;
        return $this->db->insert('audio_excluidos',$dados);
      }


    public function listar_documento_id($id){


      $this->db->where('id',$id);

      return $this->db->get('audio')->result();
  }


    public function alterar_audio($id,$titulo, $caminho_documento, $extensao, $nome_original_doc, $nome_arquivo, $nome_usuario,$path){

      $dados['titulo'] = $titulo;
      $dados['caminho_arquivo'] = $caminho_documento;
      $dados['nome_arquivo'] = $nome_arquivo;

      $dados['extensao'] = $extensao;
      $dados['nome_original'] = $nome_original_doc;
      $dados['extensao'] = $extensao;
      $dados['nome_publicador'] = $nome_usuario;
      $dados['caminho_servidor'] = $path;

      $this->db->where('id',$id);


      return $this->db->update('audio',$dados);


    }


    public function alterar_nome_audio($titulo,$id)
    {
        #code
        $dados['titulo'] = $titulo;

        $this->db->where('id',$id);

          return $this->db->update('audio',$dados);

    }



    public function excluir ($id){

        $this->db->where('id',$id);
        return $this->db->delete('audio');


    }



    public function publicar($id, $publicar,$nome_publicador) {

     $dados['publicado'] = $publicar;
     $dados['nome_publicador_home'] = $nome_publicador;
   //  $dados['id_publicador_noticia'] = $id_publicador;
     $dados['data_publicado'] = 'NOW()';
     $this->db->where('id', $id);
     return $this->db->update('audio', $dados);
 }

 public function desativar($id, $publicar) {
     $dados['publicado'] = $publicar;
     $this->db->where('id', $id);
     return $this->db->update('audio', $dados);
 }




 public function listar_audios_home(){


   $this->db->limit(2);
   $this->db->order_by('data_publicado','DESC');
   $this->db->where('publicado',1);
   return $this->db->get('audio')->result();
}

 public function listar_audios_publicados(){


   
   $this->db->order_by('data_publicado','DESC');
   $this->db->where('publicado',1);
   return $this->db->get('audio')->result();
}


}
