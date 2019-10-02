<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Repositorio_home extends CI_Controller {

     public function __construct() {
        parent::__construct();


        $this->load->model('repositorio_model','modelrepositorio');
        $this->load->model('categoria_model','modelcategoria');
    }


	public function index()
	{


         $dados['categorias_todos'] = $this->modelcategoria->listar_categorias();

        $dados['documentos_todos'] = $this->modelrepositorio->listar_documentos_todos();



        $this->load->view('frontend/template/header-html-repositorio',$dados);
        $this->load->view('frontend/template/menu-repositorio/header');
        $this->load->view('frontend/template/repositorio/repositorio');
        $this->load->view('frontend/template/html-footer-repositorio');
	}



        public function categorias($id,$slug=null) {



        $dados['categorias_todos'] = $this->modelcategoria->listar_categorias();

        $dados['documentos_ids'] = $this->modelrepositorio->listar_documentos_categoria($id);

        $this->load->view('frontend/template/header-html-repositorio',$dados);
        $this->load->view('frontend/template/menu-repositorio/header');
        $this->load->view('frontend/template/repositorio/repositorio_id');
        $this->load->view('frontend/template/html-footer-repositorio');



    }

      public function categoria_subcategoria()
      {

        $id = $this->input->post('id');
        $data = $this->modelrepositorio->listar_sub($id);

        echo json_encode($data);

      }

      public function listar_cat_subcat($categoria, $subcategoria)
      {


        $dados['categorias_todos'] = $this->modelcategoria->listar_categorias();

        $dados['documentos_ids'] = $this->modelrepositorio->listar_documentos_cat_subcat($categoria, $subcategoria);

        $this->load->view('frontend/template/header-html-repositorio',$dados);
        $this->load->view('frontend/template/menu-repositorio/header');
        $this->load->view('frontend/template/repositorio/repositorio_id');
        $this->load->view('frontend/template/html-footer-repositorio');
      }




}
