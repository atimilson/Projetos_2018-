<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('perfil_model', 'modelperfil');
    }

    public function index() {

//        $dados['titulo'] = 'Painel de Controle';
//        $dados['subtitulo'] = 'Entrar no sistema';
//         if (!$this->session->userdata('logado')) {
//            redirect(base_url('admin/login'));
//        }
//        
//        $dados['usuarios'] = $this->modelusuarios->listar_usuarios();
//        

        $dados['perfis'] = $this->modelperfil->listar_perfis();

        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');
        $this->load->view('backend/perfil/listar-perfil', $dados);
        $this->load->view('backend/template/html-footer');
    }

//    public function pag_login() {
//        $this->load->view('backend/template/login');
//        $this->load->view('backend/template/html-footer');
//    }

    public function salvar() {
        $this->load->library('form_validation');





        $this->form_validation->set_rules('check[]', 'Permissões', 'required');


        $this->form_validation->set_rules('nome_perfil', 'Nome', 'required|max_length[80]|is_unique[perfil.nome]');

        if ($this->form_validation->run() == False) {
            $_SESSION ['item'] = "<script>$('#myModal').modal('show')</script>";
            $this->session->mark_as_flash('item');
            $this->index();
        } else {
            $nome = $this->input->post('nome_perfil');
            
            $noticia = $this->input->post('check[1]');
            $evento = $this->input->post('check[2]');
            $repositorio = $this->input->post('check[3]');
            $acessos = $this->input->post('check[4]');
            $servico = $this->input->post('check[5]');
            $aniversario = $this->input->post('check[6]');
            $fotos = $this->input->post('check[7]');
            $videos = $this->input->post('check[8]');
            $audios = $this->input->post('check[9]');
            $ramal = $this->input->post('check[10]');
            $enquete = $this->input->post('check[11]');
            $usuario = $this->input->post('check[12]');
            $perfil = $this->input->post('check[13]');
            $setor = $this->input->post('check[14]');
            
            
            
            if($noticia == null){
                $noticia = 0;
            }else{
                $noticia = 1;
            }
            
            if($evento == null){
                $evento = 0;
            }else{
                $evento = 1;
            }
            if($repositorio == null){
                $repositorio = 0;
            }else{
                $repositorio = 1;
            }
            if($acessos == null){
                $acessos = 0;
            }else{
                $acessos = 1;
            }
            if($servico == null){
                $servico = 0;
            }else{
                $servico = 1;
            }
            if($aniversario == null){
                $aniversario = 0;
            }else{
                $aniversario = 1;
            }
            if($fotos == null){
                $fotos = 0;
            }else{
                $fotos = 1;
            }
            if($videos == null){
                $videos = 0;
            }else{
                $videos = 1;
            }
            if($audios == null){
                $audios = 0;
            }else{
                $audios = 1;
            }
            if($ramal == null){
                $ramal = 0;
            }else{
                $ramal = 1;
            }
            if($enquete == null){
                $enquete = 0;
            }else{
                $enquete = 1;
            }
            
            if($usuario == null){
                $usuario = 0;
            }else{
                $usuario = 1;
            }
            if($perfil == null){
                $perfil = 0;
            }else{
                $perfil = 1;
            }
            if($setor == null){
                $setor = 0;
            }else{
                $setor = 1;
            }
            
            
            
            
            
            

            if ($this->modelperfil->inserir($nome,$noticia , $evento ,$repositorio,$acessos,$servico,$aniversario ,$fotos ,$videos ,$audios ,$ramal ,$enquete ,$usuario,$perfil ,$setor)) {
                $_SESSION ['inserido'] = '1';
                $this->session->mark_as_flash('inserido');

                redirect(base_url('admin/perfil'));
            }
        }
    }

    public function alterar() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('check[]', 'Permissões', 'required');


        $this->form_validation->set_rules('nome_perfil', 'Nome', 'required|max_length[80]');
        $id = $this->input->post('id');

        if ($this->form_validation->run() == False) {
            $_SESSION ['alterar'] = $id;
            $this->session->mark_as_flash('alterar');


            $this->index();
        } else {
              $nome = $this->input->post('nome_perfil');
            
            $noticia = $this->input->post('check[1]');
            $evento = $this->input->post('check[2]');
            $repositorio = $this->input->post('check[3]');
            $acessos = $this->input->post('check[4]');
            $servico = $this->input->post('check[5]');
            $aniversario = $this->input->post('check[6]');
            $fotos = $this->input->post('check[7]');
            $videos = $this->input->post('check[8]');
            $audios = $this->input->post('check[9]');
            $ramal = $this->input->post('check[10]');
            $enquete = $this->input->post('check[11]');
            $usuario = $this->input->post('check[12]');
            $perfil = $this->input->post('check[13]');
            $setor = $this->input->post('check[14]');
            
            
            
            if($noticia == null){
                $noticia = 0;
            }else{
                $noticia = 1;
            }
            
            if($evento == null){
                $evento = 0;
            }else{
                $evento = 1;
            }
            if($repositorio == null){
                $repositorio = 0;
            }else{
                $repositorio = 1;
            }
            if($acessos == null){
                $acessos = 0;
            }else{
                $acessos = 1;
            }
            if($servico == null){
                $servico = 0;
            }else{
                $servico = 1;
            }
            if($aniversario == null){
                $aniversario = 0;
            }else{
                $aniversario = 1;
            }
            if($fotos == null){
                $fotos = 0;
            }else{
                $fotos = 1;
            }
            if($videos == null){
                $videos = 0;
            }else{
                $videos = 1;
            }
            if($audios == null){
                $audios = 0;
            }else{
                $audios = 1;
            }
            if($ramal == null){
                $ramal = 0;
            }else{
                $ramal = 1;
            }
            if($enquete == null){
                $enquete = 0;
            }else{
                $enquete = 1;
            }
            
            if($usuario == null){
                $usuario = 0;
            }else{
                $usuario = 1;
            }
            if($perfil == null){
                $perfil = 0;
            }else{
                $perfil = 1;
            }
            if($setor == null){
                $setor = 0;
            }else{
                $setor = 1;
            }

            if ($this->modelperfil->alterar($id,$nome,$noticia , $evento ,$repositorio,$acessos,$servico,$aniversario ,$fotos ,$videos ,$audios ,$ramal ,$enquete ,$usuario,$perfil ,$setor)) {
           
                $_SESSION ['alterado'] = '1';
                $this->session->mark_as_flash('alterado');


                redirect(base_url('admin/perfil'));
            }
        }
    }

    public function excluir($id) {
        $teste = $this->modelperfil->excluir($id);
        
               if($teste){
            $_SESSION ['excluido'] = '1';
            $this->session->mark_as_flash('excluido');
            redirect(base_url('admin/perfil')); 
               } else {
                   $_SESSION ['err'] = '1';
                   $this->session->mark_as_flash('err');
                    redirect(base_url('admin/perfil')); 
               }
                
                
                

//        if ($this->modelperfil->excluir($id)) {
//           
//        }else{
//            echo 'erro';
//            die();
//        }
    

}
}