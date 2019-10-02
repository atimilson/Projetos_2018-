<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

       public function listar_categorias(){
           $this->db->order_by('id','DESC');
        $result = $this->db->get('categoria');
        return $result->result();
        }

      public function inserir($nome) {
          $dados['nome'] = $nome;




//          return var_dump($dados);
//          die();
        $result = $this->db->insert('categoria',$dados);
          return $result;

      }



    public function alterar($nome,$id) {

          $dados['nome'] = $nome;





        $this->db->where('id',$id);

        $result = $this->db->update('categoria',$dados);
        return $result;


    }

    public function excluir ($id){

        $this->db->where('id',$id);
        $result = $this->db->delete('categoria');
        return $result;


    }

    public function listar_sub($id){


  //    like('parent_id', '"' . $parent_id . '"')
  //    $this->db->where_in('id_subcategoria' , decoded(5) );

    $result = $this->db->query("select * from subcategoria where id_categoria = $id");
//      $result = $this->db->get('subcategoria');

      return $result->result_array();

    }

public function inserir_sub_categoria($nome,$id,$id_publicador)
{
    $dados['id_categoria'] = $id;
    $dados['nome_sub'] = $nome;
    $dados['id_cadastrador'] = $id_publicador;

    $result = $this->db->insert('subcategoria',$dados);
      return $result;
}

public function alterar_sub_categoria($nome,$id_sub_cate,$id_publicador)
{
    $this->db->where('id_subcategoria',$id_sub_cate);
    $dados['nome_sub'] = $nome;
    $dados['id_cadastrador'] = $id_publicador;

    $result = $this->db->update('subcategoria',$dados);
      return $result;
}


public function excluir_sub_categoria ($id){

    $this->db->where('id_subcategoria',$id);
    $result = $this->db->delete('subcategoria');
    return $result;


}








}
