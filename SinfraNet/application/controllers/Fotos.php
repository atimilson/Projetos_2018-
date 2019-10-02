<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Fotos extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        
        $this->load->model('album_model', 'modelalbum');
    }

    public function index() {
        
        
        $dados['listar_albuns'] = $this->modelalbum->listar_albuns_home();

        $this->load->view('frontend/template/header-html');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/listar-albuns/listar-albuns',$dados);
        $this->load->view('frontend/template/footer-noticia');
        $this->load->view('frontend/template/html-footer');
    }
    
    public function fotos_albuns($id) {
        
        $dados['retorno'] = $this->modelalbum->buscar_por_id($id);
        
        
        
        $dados['listar_fotos'] = $this->modelalbum->listar_por_album($id);

        $this->load->view('frontend/template/header-html');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/fotos-albuns/fotos-albuns',$dados);
        $this->load->view('frontend/template/footer-noticia');
        $this->load->view('frontend/template/html-footer');
    }

}
