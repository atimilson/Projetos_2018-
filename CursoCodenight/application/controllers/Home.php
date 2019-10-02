<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
 
 public function _construct(){
 	parent::_construct();
 }

	public function index()
	{
		$this->load->view('frontend/template/html-header');
		$this->load->view('frontend/template/header');
		//$this->load->view('frontend/home');
		//$this->load->view('frontend/template/aside');
		$this->load->view('frontend/template/section-carroseul-acessos');
		$this->load->view('frontend/template/section-noticia-segundaria-globo');
                $this->load->view('frontend/template/ultimas-noticias');
                $this->load->view('frontend/template/mais-lidas');
                $this->load->view('frontend/template/aniversariantes-fim-section-noticia-segundaria');
                $this->load->view('frontend/template/section-secundaria-tres');
		$this->load->view('frontend/template/section-duvidas-servicos');
		$this->load->view('frontend/template/section-videos-audios');
		$this->load->view('frontend/template/section-fotos');
		
		$this->load->view('frontend/template/footer');
		$this->load->view('frontend/template/html-footer');
	}
	
}
