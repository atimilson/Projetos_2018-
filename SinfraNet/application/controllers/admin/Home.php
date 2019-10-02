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
        $this->load->model('home_model', 'modelhome');
    }
    
    
    public function index(){
        
                $id_logado = $this->session->userdata('userlogado')->id;
                
                $dadosSessao['permissoes'] = $this->modelusuarios->verifica_user_rel($id_logado);
                $this->session->set_userdata($dadosSessao);
                
                $dados['noticias'] = $this->modelhome->contar_noticias();
                $dados['eventos'] = $this->modelhome->contar_eventos();
                $dados['servicos'] = $this->modelhome->contar_servicos();
                $dados['documentos'] = $this->modelhome->contar_documentos();
                $dados['videos'] = $this->modelhome->contar_videos();
                $dados['audios'] = $this->modelhome->contar_audios();
                $dados['albuns'] = $this->modelhome->contar_albuns();
                $dados['aniversariantes'] = $this->modelhome->contar_aniversariantes();
                $dados['ramais'] = $this->modelhome->contar_ramais();
                
                
        
        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');
        
        $this->load->view('backend/principal', $dados);
        $this->load->view('backend/template/html-footer');
        
                
    }
    
  
    
}