<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Video_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function inserir_video($video,$id_video,$title,$tamb_video,$preview_video,$nome_publicador,$id_publicador,$posicao_principal,$posicao_segundaria,$publicar) {

        $dados['url_video'] = $video;
        $dados['url_id_video'] = $id_video;
        $dados['titulo'] = $title;
        $dados['tumb_video'] = $tamb_video;
        $dados['url_preview'] = $preview_video;
        $dados['nome_usuario_publicador'] = $nome_publicador;
        $dados['id_usuario_publicador'] = $id_publicador;
        $dados['principal_home'] = $posicao_principal;
        $dados['segundaria_home'] = $posicao_segundaria;
        if($publicar == 1){
        $dados['publicado'] = $publicar;
        $dados['data_publicado'] = 'now()';
        }



        return $this->db->insert('videos', $dados);
    }


    public function listar_videos(){

        $this->db->order_by('data_cadastrado', 'DESC');
        return $this->db->get('videos')->result();

    }

    public function alterar_video($id,$video,$id_video,$title,$tamb_video,$preview_video,$nome_publicador,$id_publicador,$posicao_principal,$posicao_segundaria,$publicar){
      $dados['url_video'] = $video;
      $dados['url_id_video'] = $id_video;
      $dados['titulo'] = $title;
      $dados['tumb_video'] = $tamb_video;
      $dados['url_preview'] = $preview_video;
      $dados['nome_usuario_publicador'] = $nome_publicador;
      $dados['id_usuario_publicador'] = $id_publicador;
      $dados['principal_home'] = $posicao_principal;
      $dados['segundaria_home'] = $posicao_segundaria;
      if($publicar == 1){
      $dados['publicado'] = $publicar;
      $dados['data_publicado'] = 'now()';
    }else {
      $dados['publicado'] = $publicar;
    }

        $this->db->where('id',$id);
        return $this->db->update('videos',$dados);


    }

    public function publicar_video($id, $publicar) {

        $dados['publicado'] = $publicar;
      //  $dados['id_publicador_noticia'] = $id_publicador;
        $dados['data_publicado'] = 'NOW()';
        $this->db->where('id', $id);
        return $this->db->update('videos', $dados);
    }

    public function desativar_noticia($id, $publicar) {
        $dados['publicado'] = $publicar;
        $this->db->where('id', $id);
        return $this->db->update('videos', $dados);
    }

    public function excluir ($id){

        $this->db->where('id',$id);
        return $this->db->delete('videos');


    }

    public function alterar_posicao($teste,$posicao_principal, $posicao_segundaria) {
      $dados['principal_home'] = $posicao_principal;
      $dados['segundaria_home'] = $posicao_segundaria;
      $this->db->where('id', $teste);

        return $this->db->update('videos', $dados);
    }

    public function listar_video_principal()
    {
      $this->db->limit(1);

      $this->db->where('principal_home', 1);
      $this->db->where('publicado', 1);
      $this->db->order_by('data_publicado', 'DESC');
      return $this->db->get('videos')->result();
    }




    public function listar_video_segundaria ()
    {
      $this->db->limit(4);

      $this->db->where('segundaria_home', 1);
      $this->db->where('publicado', 1);
      $this->db->order_by('data_publicado', 'DESC');
      return $this->db->get('videos')->result();
    }

    public function listar_publicado()
    {

      $this->db->where('publicado', 1);
      $this->db->order_by('data_publicado', 'DESC');
      return $this->db->get('videos')->result();
    }



}
