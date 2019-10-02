<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Servico extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }
        $this->load->model('aniversario_model', 'modelaniversario');
         $this->load->model('servicos_model', 'modelservicos');
    }

    public function index() {
        
        
         $dados['servicos_todos'] = $this->modelservicos->listar_servicos();
         

        
        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');

        $this->load->view('backend/servico/inserir-servico',$dados);
        $this->load->view('backend/template/html-footer');
    }

    public function salvar() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome_servico', 'Nome', 'required');
        $this->form_validation->set_rules('descricao', 'Descricão', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');

        if ($this->form_validation->run() == False) {
            $_SESSION ['item'] = "<script>$('#myModal').modal('show')</script>";
            $this->session->mark_as_flash('item');
            $this->index();
        } else {
            $nome = $this->input->post('nome_servico');
            $descricao = $this->input->post('descricao');
            $url = $this->input->post('url');
            $id_publicador = $this->session->userdata('userlogado')->id;

            if ($this->modelservicos->inserir($nome, $descricao, $url, $id_publicador)) {
                $_SESSION ['inserido'] = '1';
            $this->session->mark_as_flash('inserido');
                
                redirect(base_url('admin/servico'));
            }
        }
    }
    
    public function alterar(){
        
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome_servico', 'Nome', 'required');
        $this->form_validation->set_rules('descricao', 'Descricão', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');
        $id = $this->input->post('id');

        if ($this->form_validation->run() == False) {
            $_SESSION ['alterar'] = $id;
            $this->session->mark_as_flash('alterar');
            
            
            $this->index();
   
        } else {
            $nome = $this->input->post('nome_servico');
            $descricao = $this->input->post('descricao');
            $url = $this->input->post('url');
             $id_publicador = $this->session->userdata('userlogado')->id;
             
            
            if ($this->modelservicos->alterar($nome, $descricao, $url, $id_publicador,$id)) {
                
                $_SESSION ['alterado'] = '1';
            $this->session->mark_as_flash('alterado');
                
              
                redirect(base_url('admin/servico'));
            }
        }
    }

    

    public function excluir($id){
        
        
        if($this->modelservicos->excluir($id)){
              $_SESSION ['excluido'] = '1';
            $this->session->mark_as_flash('excluido');
            redirect(base_url('admin/servico'));
        }
        
        
    }
    
    
}