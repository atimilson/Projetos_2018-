<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Album_model extends CI_Model {

    public $id;
    public $categoria;
    public $titulo;
    public $subtitulo;
    public $conteudo;
    public $data;
    public $img;
    public $user;

    public function __construct() {
        parent::__construct();
    }


    public function listar_albuns() {




  //    like('parent_id', '"' . $parent_id . '"')
  //    $this->db->where_in('id_subcategoria' , decoded(5) );

    $result = $this->db->query("select A.*, COUNT(TI.id) as numero_fotos from albuns As A
                                left outer join foto_album As TI ON A.id = TI.id_album
                                GROUP BY A.id order by A.data_cadastro DESC");
//      $result = $this->db->get('subcategoria');

      return $result->result();


    }


    public function listar_albuns_home() {




  //    like('parent_id', '"' . $parent_id . '"')
  //    $this->db->where_in('id_subcategoria' , decoded(5) );

    $result = $this->db->query("select A.*, COUNT(TI.id) as numero_fotos from albuns As A
                                left outer join foto_album As TI ON A.id = TI.id_album where A.publicado = 1
                                GROUP BY A.id order by A.data_publicado DESC");
  //      $result = $this->db->get('subcategoria');

      return $result->result();


    }

    public function inserir_album($titulo, $caminho_poster,$pasta,$caminho_raiz,$autor_album,$arquivo_poster) {
        $dados['titulo'] = $titulo;
        $dados['nome_arquivo'] = $arquivo_poster;
        $dados['caminho_arquivo'] = $caminho_poster;
        $dados['autor_album'] = $autor_album;
        $dados['pasta'] = $pasta;
        $dados['caminho_raiz'] = $caminho_raiz;

        return $this->db->insert('albuns', $dados);
    }





    public function buscar_por_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('albuns')->result();
    }



    public function alterar_album($id,$titulo,$autor_album) {


        $dados['titulo'] = $titulo;
        $dados['autor_album'] = $autor_album;


        $this->db->where('id', $id);
        return $this->db->update('albuns', $dados);
    }

    public function alterar_album_poster($id,$titulo, $caminho_poster,$autor_album,$arquivo_poster) {
        $dados['titulo'] = $titulo;
        $dados['caminho_arquivo'] = $caminho_poster;
        $dados['autor_album'] = $autor_album;
        $dados['caminho_arquivo'] = $caminho_poster;
        $dados['nome_arquivo'] = $arquivo_poster;



        $this->db->where('id', $id);

        return $this->db->update('albuns', $dados);
    }





    public function publicar_album($id, $publicar, $nome_publicador) {

        $dados['publicado'] = $publicar;
        $dados['nome_publicador'] = $nome_publicador;
        $dados['data_publicado'] = 'NOW()';
        $this->db->where('id', $id);
        return $this->db->update('albuns', $dados);
    }

    public function desativar_album($id, $publicar) {
        $dados['publicado'] = $publicar;
        $this->db->where('id', $id);
        return $this->db->update('albuns', $dados);
    }

    public function excluir($id) {

        $this->db->where('id', $id);
        return $this->db->delete('albuns');
    }



/* -----------------------------------------------------------------------*/

public function listar_por_album($id)
{
    $this->db->where('id_album',$id);
    return $this->db->get('foto_album')->result();
}


public function insert_fotos($data = array()){
        $insert = $this->db->insert_batch('foto_album',$data);
        return $insert;
    }


    public function excluir_foto($id){
        $this->db->where('id', $id);
        return $this->db->delete('foto_album');
    }










}
