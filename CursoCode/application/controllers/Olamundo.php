<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Olamundo extends CI_Controller {


	public function index()
	{
            $dados['mensagem'] = $this->db->get('postagens')->result();
                $this->load->view('inicio/olamundo', $dados);
            
	}
        
        
        public function teste(){
            
            
                $dados['mensagem'] = 'Testando!';
		$this->load->view('inicio/olamundo', $dados);
            
        }
        
            public function testedb(){
            
            
               
        }
        
}


