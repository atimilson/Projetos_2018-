<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Ramal extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }
        
         $this->load->model('ramal_model', 'modelramal');
    }
    
    public function index(){
        
        
        
        $dados['aniversarios_todos'] = $this->modelramal->listar_ramais();


        $dados['setores_todos'] = $this->modelramal->listar_setores();
        
        
        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');
        
        $this->load->view('backend/ramal/inserir-ramal',$dados);
        $this->load->view('backend/template/html-footer');
    }
    
    
       public function salvar() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('ramal', 'Ramal', 'required');
        $this->form_validation->set_rules('setor', 'Setor', 'required');

        if ($this->form_validation->run() == False) {
            $_SESSION ['item'] = "<script>$('#myModal').modal('show')</script>";
            $this->session->mark_as_flash('item');
            $this->index();
        } else {
            $setor = $this->input->post('setor');
            $ramal = $this->input->post('ramal');
            $nome = $this->input->post('nome');

            if ($this->modelramal->inserir($nome, $ramal, $setor)) {
                $_SESSION ['inserido'] = '1';
            $this->session->mark_as_flash('inserido');
                
                redirect(base_url('admin/ramal'));
            }
        }
    }
    
    public function alterar(){
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('ramal', 'Ramal', 'required');
        $this->form_validation->set_rules('setor', 'Setor', 'required');
        $id = $this->input->post('id');

        if ($this->form_validation->run() == False) {
            $_SESSION ['alterar'] = $id;
            $this->session->mark_as_flash('alterar');
            
            
            $this->index();
   
        } else {
            $setor = $this->input->post('setor');
            $ramal = $this->input->post('ramal');
            $nome = $this->input->post('nome');
            
            if ($this->modelramal->alterar($nome, $ramal, $setor,$id)) {
                
                $_SESSION ['alterado'] = '1';
            $this->session->mark_as_flash('alterado');
                
              
                redirect(base_url('admin/ramal'));
            }
        }
        
        
        
    }

    

    public function excluir($id){
        
        
        if($this->modelramal->excluir($id)){
              $_SESSION ['excluido'] = '1';
            $this->session->mark_as_flash('excluido');
            redirect(base_url('admin/ramal'));
        }
        
        
    }
    
    
    
    
    
    
    
    
}