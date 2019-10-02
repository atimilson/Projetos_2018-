<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias_model extends CI_Model {


	public $id;
	public $titulo;


	public function _construct(){
		parent::_construct();
	}

	public function listar_categorias(){
		$this->db->order_by('titulo','ASC');
	}
	
}