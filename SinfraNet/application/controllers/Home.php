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
        $this->load->model('video_model', 'modelvideo');
        $this->load->model('audio_model', 'modelaudio');
        $this->load->model('album_model', 'modelalbum');

        $dados['noticias_destaque'] = $this->modelnoticias->listar_noticias();
        $dados['noticias_carrosel'] = $this->modelnoticias->listar_noticias_carrosel();
        $dados['noticias_tres'] = $this->modelnoticias->listar_noticias_tres();
        $dados['noticias_quatro'] = $this->modelnoticias->listar_noticias_quatro();
        $dados['mais_lidos'] = $this->modelnoticias->mais_lidas();
        $dados['eventos_destaque'] = $this->modeleventos->listar_eventos();
        $dados['aniversarios'] = $this->modelaniversario->listar_ani();
        $dados['listas_servicos'] = $this->modelservicos->listar_servicos();
        $dados['listar_principal'] = $this->modelvideo->listar_video_principal();
        $dados['listar_segundaria'] = $this->modelvideo->listar_video_segundaria();
        $dados['listar_audios'] = $this->modelaudio->listar_audios_home();
        $dados['listar_albuns'] = $this->modelalbum->listar_albuns_home();


        $this->load->view('frontend/template/header-html', $dados);
        $this->load->view('frontend/template/menu-index/header');

        //carroseul e acesso
        $this->load->view('frontend/template/carroseul/carroseul');
        $this->load->view('frontend/template/acessos/acessos');

        //tres noticias & serviço & quatro noticias
        $this->load->view('frontend/template/tresNoticias/tresNoticias');
        $this->load->view('frontend/template/servicos/servicos');
        $this->load->view('frontend/template/quatroNoticias/quatroNoticias');
        $this->load->view('frontend/template/aniversario/aniversario');
        
        $this->load->view('frontend/template/ultimasNoticias/ultimasNoticias');
        $this->load->view('frontend/template/maisLidas/maisLidas');
        

        $this->load->view('frontend/template/evento/evento');
        $this->load->view('frontend/template/videos-e-audios/videos-e-audios');
        $this->load->view('frontend/template/fotos/fotos');
        $this->load->view('frontend/template/footer-index');
        $this->load->view('frontend/template/html-footer');
    }

    public function subMenu() {
        $this->load->view('frontend/template/header-html');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/sub-menu-institucional/historia');
        $this->load->view('frontend/template/footer-noticia');
        $this->load->view('frontend/template/html-footer');
    }

    public function subMenu_quem_e_quem() {
        $this->load->view('frontend/template/header-html');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/sub-menu-institucional/quem_e_quem');
        $this->load->view('frontend/template/footer-noticia');
        $this->load->view('frontend/template/html-footer');
    }

    public function subMenu_visao_misao() {
        $this->load->view('frontend/template/header-html');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/sub-menu-institucional/missao_visao');
        $this->load->view('frontend/template/footer-noticia');
        $this->load->view('frontend/template/html-footer');
    }

    public function menu_servico() {
        $this->load->model('servicos_model', 'modelservicos');

        $dados['listas_servicos'] = $this->modelservicos->listar_servicos();

        $this->load->view('frontend/template/header-html');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/listar-servico/listar-servicos', $dados);
        $this->load->view('frontend/template/footer-noticia');
        $this->load->view('frontend/template/html-footer');
    }

    public function outros_acessos() {
        $this->load->model('acessos_model', 'modelacessos');

        $dados['listar_acessos'] = $this->modelacessos->listar_acessos();

        $this->load->view('frontend/template/header-html');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/outros-acessos/outros_acessos', $dados);
        $this->load->view('frontend/template/footer-noticia');
        $this->load->view('frontend/template/html-footer');
    }

    public function ramal() {

        $this->load->model('ramal_model', 'modelramal');
        $dados['ramais_home'] = $this->modelramal->listar_ramais_home();
        $this->load->view('frontend/template/header-html');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/ramal/ramal', $dados);
        $this->load->view('frontend/template/footer-index');
        $this->load->view('frontend/template/html-footer');
    }

    public function listar_noticia($pular = null, $post_por_pagina = null) {
        $this->load->library('pagination');
        $this->load->model('noticias_model', 'modelnoticias');
        
        
        $config['base_url'] = base_url("postagens");
        $config['total_rows'] = $this->modelnoticias->contar();
        
        
       
        $post_por_pagina = 5;
        $config['per_page'] = $post_por_pagina;
               
        $this->pagination->initialize($config);
        
        $dados['links_paginacao'] = $this->pagination->create_links();
        
        $dados['noticias_todos'] = $this->modelnoticias->listar_todos_home($pular, $post_por_pagina);

        $this->load->view('frontend/template/header-html', $dados);
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/listar-noticia/listar-noticia');
        $this->load->view('frontend/template/footer-index');
        $this->load->view('frontend/template/html-footer');
    }

    public function listar_evento() {

        $this->load->model('eventos_model', 'modeleventos');
        $dados['eventos_todos'] = $this->modeleventos->listar_todos_home();
        $this->load->view('frontend/template/header-html', $dados);
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/listar-evento/listar-evento');
        $this->load->view('frontend/template/footer-index');
        $this->load->view('frontend/template/html-footer');
    }
    
    public function listar_duvidas() {
            
        $this->load->view('frontend/template/header-html');
        $this->load->view('frontend/template/menu-index/header');
        $this->load->view('frontend/template/duvidas/duvidas');
        $this->load->view('frontend/template/footer-index');
        $this->load->view('frontend/template/html-footer');
    }

    

}
