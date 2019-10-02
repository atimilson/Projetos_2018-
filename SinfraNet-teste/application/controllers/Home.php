<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function _construct() {
        parent::_construct();
    }

    public function index() {
        $this->load->model('noticias_model', 'modelnoticias');
        $this->load->model('eventos_model', 'modeleventos');
        $this->load->model('aniversario_model', 'modelaniversario');
        $this->load->model('servicos_model', 'modelservicos');

        $dados['noticias_destaque'] = $this->modelnoticias->listar_noticias();
        $dados['noticias_carrosel'] = $this->modelnoticias->listar_noticias_carrosel();
        $dados['noticias_tres'] = $this->modelnoticias->listar_noticias_tres();
        $dados['noticias_quatro'] = $this->modelnoticias->listar_noticias_quatro();
        $dados['mais_lidos'] = $this->modelnoticias->mais_lidas();
        $dados['eventos_destaque'] = $this->modeleventos->listar_eventos();
        $dados['aniversarios'] = $this->modelaniversario->listar_ani();
        $dados['listas_servicos'] = $this->modelservicos->listar_servicos();




        $this->load->view('frontend/template/header-html', $dados);
        $this->load->view('frontend/template/header');
        //$this->load->view('frontend/home');
        //$this->load->view('frontend/template/aside');
        $this->load->view('frontend/template/section-carroseul-acessos');
        $this->load->view('frontend/template/section-noticia-segundaria-globo');
        $this->load->view('frontend/template/ultimas-noticias');
        $this->load->view('frontend/template/mais-lidas');
        $this->load->view('frontend/template/aniversariantes-fim-section-noticia-segundaria');
        $this->load->view('frontend/template/section-secundaria-tres');
        //$this->load->view('frontend/template/section-duvidas-servicos');
        $this->load->view('frontend/template/section-videos-audios');
        $this->load->view('frontend/template/section-fotos');
        $this->load->view('frontend/template/footer-index');
        $this->load->view('frontend/template/html-footer');
    }

    public function subMenu() {
        $this->load->view('frontend/template/html-header');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/historia');
//		$this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }

    public function subMenu_quem_e_quem() {
        $this->load->view('frontend/template/html-header');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/quem_e_quem');
//		$this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }

    public function subMenu_visao_misao() {
        $this->load->view('frontend/template/html-header');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/missao_visao');
//		$this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }

    public function menu_servico() {
        $this->load->model('servicos_model', 'modelservicos');
        
        $dados['listas_servicos'] = $this->modelservicos->listar_servicos();
        
        $this->load->view('frontend/template/html-header');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/servicos',$dados);
//		$this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }

    public function outros_acessos() {
        $this->load->model('acessos_model', 'modelacessos');

        $dados['listar_acessos'] = $this->modelacessos->listar_acessos();
        
        $this->load->view('frontend/template/html-header');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/outros_acessos',$dados);
//		$this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }

    public function ramal() {

        $this->load->model('ramal_model', 'modelramal');

        $dados['ramais_home'] = $this->modelramal->listar_ramais_home();

        $this->load->view('frontend/template/html-header');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/ramal', $dados);
//		$this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }

    public function listar_noticia() {


        $this->load->model('noticias_model', 'modelnoticias');


        $dados['noticias_todos'] = $this->modelnoticias->listar_todos_home();




        $this->load->view('frontend/template/header-html', $dados);
        $this->load->view('frontend/template/html-header');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/listar-noticia');
//		$this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }

    public function listar_evento() {


        $this->load->model('eventos_model', 'modeleventos');


        $dados['eventos_todos'] = $this->modeleventos->listar_todos_home();




        $this->load->view('frontend/template/header-html', $dados);
        $this->load->view('frontend/template/html-header');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/listar-evento');
//		$this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }
    
    public function repositorio() {
        $this->load->view('frontend/template/html-header');
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/repositorio');
//      $this->load->view('frontend/template/footer');
        $this->load->view('frontend/template/html-footer');
    }

}
