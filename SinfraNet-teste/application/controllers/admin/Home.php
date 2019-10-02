<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }
        
        $this->load->model('usuarios_model', 'modelusuarios');
    }
    
    
    public function index(){
        
                $id_logado = $this->session->userdata('userlogado')->id;
                
                $dadosSessao['permissoes'] = $this->modelusuarios->verifica_user_rel($id_logado);
                $this->session->set_userdata($dadosSessao);
        
        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');
        
        $this->load->view('backend/principal');
        $this->load->view('backend/template/html-footer');
        
                
    }
    
  
    
}