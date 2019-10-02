<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('video_model', 'modelvideo');
    }

    public function index() {


        $dados['videos_todos'] = $this->modelvideo->listar_publicado();

        $this->load->view('frontend/template/header-html');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/listar-videos/listar-videos',$dados);
        $this->load->view('frontend/template/footer-noticia');
        $this->load->view('frontend/template/html-footer');
    }

}
