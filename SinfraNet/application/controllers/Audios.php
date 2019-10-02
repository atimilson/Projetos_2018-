<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Audios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('audio_model', 'modelaudio');
    }
    
    public function index() {
        $dados['listar_audios'] = $this->modelaudio->listar_audios_publicados();
        $this->load->view('frontend/template/header-html');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/listar-audios/listar-audios',$dados);
        $this->load->view('frontend/template/footer-noticia');
        $this->load->view('frontend/template/html-footer');
    }

}
