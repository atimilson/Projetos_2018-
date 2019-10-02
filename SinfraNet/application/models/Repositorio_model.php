<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repositorio_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

       public function listar_setores(){
        return $this->db->get('setor')->result();
        }

      public function inserir_documento($nome, $descricao, $categoria,$subcategoria, $id_setor, $caminho_documento, $extensao, $nome_original_doc, $nome_arquivo, $id_usuario) {
          $dados['nome_doc'] = $nome;
          $dados['descricao'] = $descricao;
          $dados['subcategoria'] = $subcategoria;
          $dados['categoria'] = $categoria;
          $dados['id_setor'] = $id_setor;
          $dados['caminho_doc'] = $caminho_documento;
          $dados['extencao_doc'] = $extensao;
          $dados['id_usuario'] = $id_usuario;
          $dados['nome_original_doc'] = $nome_original_doc;
          $dados['nome_arquivo'] = $nome_arquivo;
          return $this->db->insert('repositorio',$dados);
      }


      public function mover_documento_mod($nome, $descricao, $categoria,$subcategoria,$id_setor,$caminho_documento_mod,$extensao,$id_usuario,$nome_original_doc,$nome_arquivo) {
          $dados['nome_doc'] = $nome;
          $dados['descricao'] = $descricao;

          $dados['categoria'] = $categoria;
          $dados['subcategoria']= $subcategoria;
          $dados['id_setor'] = $id_setor;
          $dados['caminho_doc'] = $caminho_documento_mod;
          $dados['extencao_doc'] = $extensao;
          $dados['id_usuario'] = $id_usuario;
          $dados['nome_original_doc'] = $nome_original_doc;
          $dados['nome_arquivo'] = $nome_arquivo;
          return $this->db->insert('repositorio_alterados',$dados);
      }

     public function listar_documentos_cat_subcat($categoria, $subcategoria)
     {
        $this->db->select('repositorio.*, setor.nome_setor');
        $this->db->join('setor', 'setor.id_setor = repositorio.id_setor','left');
        $this->db->where('categoria',$categoria);
        $this->db->where('subcategoria',$subcategoria);
        return $this->db->get('repositorio')->result();
     }

      public function listar_documentos($setor){

        $this->db->select('repositorio.*, subcategoria.nome_sub, setor.nome_setor,categoria.nome as nome_categoria,usuario.usuario,usuario.nome_completo');
        $this->db->from('repositorio');
        $this->db->join('setor', 'setor.id_setor = repositorio.id_setor','left');
        $this->db->join('categoria', 'categoria.id = repositorio.categoria','left');
        $this->db->join('usuario', 'usuario.id = repositorio.id_usuario','left');
        $this->db->join('subcategoria', 'subcategoria.id_subcategoria = repositorio.subcategoria','left');
        $this->db->order_by('repositorio.nome_doc', 'ASC');
        $this->db->where('repositorio.id_setor',$setor);
        return $this->db->get()->result();
    }

    public function listar_documentos_todos(){

     $this->db->select('repositorio.*, subcategoria.nome_sub, setor.nome_setor,categoria.nome as nome_categoria,usuario.usuario,usuario.nome_completo');
     $this->db->from('repositorio');
     $this->db->join('setor', 'setor.id_setor = repositorio.id_setor','left');
     $this->db->join('categoria', 'categoria.id = repositorio.categoria','left');
     $this->db->join('usuario', 'usuario.id = repositorio.id_usuario','left');
     $this->db->join('subcategoria', 'subcategoria.id_subcategoria = repositorio.subcategoria','left');
//     $this->db->where('repositorio.subcategoria is null');




     $this->db->order_by('repositorio.nome_doc','repositorio.id_setor', 'ASC');

     return $this->db->get()->result();
  }

    public function listar_documento_id($id){

      $this->db->select('repositorio.*, subcategoria.nome_sub, setor.nome_setor,categoria.nome as nome_categoria,usuario.usuario,usuario.nome_completo');
      $this->db->from('repositorio');
      $this->db->join('setor', 'setor.id_setor = repositorio.id_setor','left');
      $this->db->join('categoria', 'categoria.id = repositorio.categoria','left');
      $this->db->join('usuario', 'usuario.id = repositorio.id_usuario','left');
      $this->db->join('subcategoria', 'subcategoria.id_subcategoria = repositorio.subcategoria','left');
      $this->db->where('repositorio.id',$id);
      $this->db->order_by('repositorio.nome_doc', 'DESC');
      return $this->db->get()->result();
  }

  public function listar_documentos_categoria($id){

    $this->db->select('repositorio.*, subcategoria.nome_sub, setor.nome_setor,categoria.nome as nome_categoria,usuario.usuario,usuario.nome_completo');
    $this->db->from('repositorio');
    $this->db->join('setor', 'setor.id_setor = repositorio.id_setor','left');
    $this->db->join('categoria', 'categoria.id = repositorio.categoria','left');
    $this->db->join('usuario', 'usuario.id = repositorio.id_usuario','left');
    $this->db->join('subcategoria', 'subcategoria.id_subcategoria = repositorio.subcategoria','left');
    $this->db->where('repositorio.categoria',$id);
    $this->db->order_by('repositorio.nome_doc', 'DESC');
    return $this->db->get()->result();
}

    public function alterar_documento($id,$nome, $descricao, $categoria,$id_subcategoria,$id_setor,$caminho_documento,$extensao,$nome_original_doc,$nome_arquivo,$id_usuario,$contador){

      $dados['nome_doc'] = $nome;
      $dados['descricao'] = $descricao;
      $dados['categoria'] = $categoria;
      $dados['subcategoria'] = $id_subcategoria;
      $dados['id_setor'] = $id_setor;
      $dados['caminho_doc'] = $caminho_documento;
      $dados['extencao_doc'] = $extensao;
      $dados['id_usuario'] = $id_usuario;
      $dados['nome_original_doc'] = $nome_original_doc;
      $dados['nome_arquivo'] = $nome_arquivo;
      $dados['vezes_alterado'] = $contador;
      $this->db->where('id',$id);

        return $this->db->update('repositorio',$dados);



    }


    public function alterar_nome_documento($id,$nome, $descricao, $categoria,$id_subcategoria,$caminho_documento,$nome_arquivo,$id_usuario,$contador)
    {
        #code
        $dados['nome_doc'] = $nome;
        $dados['descricao'] = $descricao;
        $dados['categoria'] = $categoria;
        $dados['subcategoria'] = $id_subcategoria;
        $dados['caminho_doc'] = $caminho_documento;


        $dados['id_usuario'] = $id_usuario;

        $dados['nome_arquivo'] = $nome_arquivo;
        $dados['vezes_alterado'] = $contador;
        $this->db->where('id',$id);

          return $this->db->update('repositorio',$dados);

    }



    public function excluir ($id){

        $this->db->where('id',$id);
        return $this->db->delete('repositorio');


    }



    public function listar_sub($id){


  //    like('parent_id', '"' . $parent_id . '"')
  //    $this->db->where_in('id_subcategoria' , decoded(5) );

    $result = $this->db->query("select * from subcategoria where id_categoria = $id");
//      $result = $this->db->get('subcategoria');

      return $result->result_array();

    }





}
