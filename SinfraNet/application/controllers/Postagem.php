
<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Postagem extends CI_Controller {

    public function _construct() {
        parent::_construct();
    }

    public function index($id,$slug=null) {
        
        $this->load->model('noticias_model','modelnoticias');
        
        $dados['exibe_postagem'] = $this->modelnoticias->listar_postagem($id);
        
	$this->load->view('frontend/template/html-header-noticia-evento/html-header');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/noticia', $dados);
        $this->load->view('frontend/template/footer-noticia');
        $this->load->view('frontend/template/html-footer');
        
        
    }
    
       public function eventos($id,$slug=null) {
        
        $this->load->model('eventos_model','modeleventos');
        
        $dados['exibe_postagem'] = $this->modeleventos->listar_postagem($id);

	$this->load->view('frontend/template/html-header-noticia-evento/html-header');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/evento', $dados);
        $this->load->view('frontend/template/footer-noticia');
        $this->load->view('frontend/template/html-footer');
        
        
        
    } 
    
    

}
