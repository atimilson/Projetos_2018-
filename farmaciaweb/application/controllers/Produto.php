<?php


class Produto extends CI_Controller {

	
	public function index() {
		$this->load->view('cadastro_produto');
	}
                   public function voltar() {
		$this->load->view('menu');
	}
}

