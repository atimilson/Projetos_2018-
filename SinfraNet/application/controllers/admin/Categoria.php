<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }

         $this->load->model('categoria_model', 'modelcategoria');
    }



    public function index() {

//        $dados['aniversarios_todos'] = $this->modelramal->listar_ramais();
        $dados['categorias_todos'] = $this->modelcategoria->listar_categorias();

        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');

        $this->load->view('backend/repositorio/inserir-categoria',$dados);
        $this->load->view('backend/template/html-footer');
    }

    public function listar_categorias(){
        $data = $this->modelcategoria->listar_categorias();

        echo json_encode($data);
    }

    public function salvar() {

        $this->load->library('form_validation');
        $data = array('success' => false, 'messages' => array());

        $this->form_validation->set_rules('nome', 'Nome', 'required|is_unique[categoria.nome]');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');

        if ($this->form_validation->run()) {
          $nome = $this->input->post('nome');
          $data = $this->modelcategoria->inserir($nome);


		}
		else {
			foreach ($_POST as $key=> $values ) {
				$data['messages'][$key] = form_error($key);
			}
		}



		echo json_encode($data);
    }

    public function alterar(){

        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">X</span></button><strong>', '</strong></div>');


        if ($this->form_validation->run()) {
             $nome = $this->input->post('nome');
             $id = $this->input->post('id');
          $data = $this->modelcategoria->alterar($nome,$id);




        } else {

          foreach ($_POST as $key=> $values ) {
            $data['messages'][$key] = form_error($key);
            }
        }

        echo json_encode($data);

    }








    public function excluir(){
            $data = array('success' => false, 'messages' => false);



            $id = $this->input->post('id');




             if( $this->modelcategoria->excluir($id)){

            $data['success'] = TRUE;


               } else{

                   if($this->db->error()){


                   $data['messages'] = TRUE;

                 }else{
                     $data['messages'] = TRUE;
                 }


               }





               echo json_encode($data);





    }

    public function listar_sub(){





         $id = $this->input->post('id');



         $data = $this->modelcategoria->listar_sub($id);

         echo json_encode($data);

}

public function cadastrar_sub()
{
  $this->load->library('form_validation');
  $data = array('success' => false, 'messages' => array());

  $this->form_validation->set_rules('nome', 'Subcategoria', 'required|is_unique[subcategoria.nome_sub]');
  $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">X</span></button><strong>', '</strong></div>');

  if ($this->form_validation->run()) {
    $nome = $this->input->post('nome');
    $id = $this->input->post('id');
    $id_publicador = $this->session->userdata('userlogado')->id;

    $data = $this->modelcategoria->inserir_sub_categoria($nome,$id,$id_publicador);


}
else {
foreach ($_POST as $key=> $values ) {
  $data['messages'][$key] = form_error($key);
}
}



echo json_encode($data);
}





public function alterar_sub()
{
  $this->load->library('form_validation');
  $data = array('success' => false, 'messages' => array());

  $this->form_validation->set_rules('nome', 'Nome', 'required');
  $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade in" role="role="alert""><button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">X</span></button><strong>', '</strong></div>');

  if ($this->form_validation->run()) {
    $nome = $this->input->post('nome');
    $id_sub_cate = $this->input->post('id_sub_cate');
    $id_categoria = $this->input->post('id_categoria');
    $id_publicador = $this->session->userdata('userlogado')->id;

    $data = $this->modelcategoria->alterar_sub_categoria($nome,$id_sub_cate,$id_publicador);


}
else {
foreach ($_POST as $key=> $values ) {
  $data['messages'][$key] = form_error($key);
}
}



echo json_encode($data);
}


public function excluir_subcategoria(){
        $data = array('success' => false, 'messages' => false);



        $id = $this->input->post('id');




         if( $this->modelcategoria->excluir_sub_categoria($id)){

        $data['success'] = TRUE;


           } else{

               if($this->db->error()){


               $data['messages'] = TRUE;

             }else{
                 $data['messages'] = TRUE;
             }


           }





           echo json_encode($data);





}






}
