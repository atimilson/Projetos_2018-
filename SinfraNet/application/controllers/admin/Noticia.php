<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia extends CI_Controller {

    public function __construct() {

        parent::__construct();
        if(!$this->session->userdata('logado')){
                redirect(base_url('admin/login'));
            }
    }

    public function index() {

        $this->load->model('noticias_model', 'modelnoticias');

        $dados['noticias_todos'] = $this->modelnoticias->listar_todos();


        $dados['noticias_carrosel'] = $this->modelnoticias->listar_id_carrousel();
        $dados['noticias_princial'] = $this->modelnoticias->listar_id_principal();
        $dados['noticias_secundaria'] = $this->modelnoticias->listar_id_secundaria();



        $this->load->view('backend/template/html-header', $dados);

        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');



        $this->load->view('backend/noticia/listar-noticia');

        $this->load->view('backend/template/html-footer');


    }

    public function form_inserir() {

        $this->load->model('noticias_model', 'modelnoticias');


        $dados['noticias_todos'] = $this->modelnoticias->listar_todos();



        $this->load->view('backend/template/html-header', $dados);

        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');

        $this->load->view('backend/noticia/inserir-noticia');

        $this->load->view('backend/template/html-footer');
    }

    public function salvar_publicacao() {

        //carrega a blibioteca
        $this->load->library('upload');


        $this->load->library('form_validation');





        $this->form_validation->set_rules('check[]', 'Posição da notícia', 'required');


        $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[80]');
        $this->form_validation->set_rules('subtitulo', 'Subtítulo', 'required|max_length[80]');

        $this->form_validation->set_rules('autor_noticia', 'Autor da noticia', 'required|max_length[80]');
        $this->form_validation->set_rules('autor_foto', 'Autor da foto', 'required|max_length[80]');

        $this->form_validation->set_rules('editor1', 'Conteudo', 'required');


        if ($this->form_validation->run() == False) {
            $this->form_inserir();
        } else {

            $titulo = $this->input->post('titulo');
            $subtitulo = $this->input->post('subtitulo');
            $conteudo = $this->input->post('editor1');
            $usuario_criador = $this->input->post('txt-usuario');

            $posicao_carrousel = $this->input->post('check[1]');
            $posicao_meio = $this->input->post('check[2]');
            $posicao_bottom = $this->input->post('check[3]');

            $autor_noticia = $this->input->post('autor_noticia');
            $autor_foto = $this->input->post('autor_foto');

            $action = $this->input->post('acao');

            if($action == 'Salva_publicar'){
             $publicar = 1;
            }
            if($action == 'salvar'){
             $publicar = 0;
            }

            if($posicao_carrousel == null){
                $posicao_carrousel = 0;
            }else{
                $posicao_carrousel = 1;
            }

            if($posicao_meio == null){
                $posicao_meio = 0;
            }else{
                $posicao_meio = 1;
            }
            if($posicao_bottom == null){
                $posicao_bottom = 0;
            }else{
                $posicao_bottom = 1;
            }



            $objDateTime = new DateTime('NOW');
            $time = microtime();
            $nomeimage = $objDateTime->format('YmdHis') . '' . substr($time, 2, 9) . '<br/>';
            //configura arquivos



                $config['upload_path'] = './galeria/imagensdestaque';
                $config['allowed_types'] = 'gif|jpg|png|svg';
                $config['file_name'] = $nomeimage;
                $config['overwrite'] = 'true';
                //inicializa as configurações
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('poster-principal')) {
                    $caminho_poster = 'semimagem/2018-08-13.png';
                    //echo $this->upload->display_errors() . ' - ' . $config['upload_path'];
                } else {
                    //se correu tudo bem, recuperamos os dados do arquivo
                    $poster['dadosArquivo'] = $this->upload->data();
                    // definimos o caminho original do arquivo
                    $caminho_poster = 'imagensdestaque/' . $poster['dadosArquivo']['file_name'];
                    
                     $p =  './galeria/imagensdestaque'. '/thumb';
                    
                     if (!is_dir($p)) {
                        mkdir($p, 0777, $recursive = true);
                    }
                    
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = './galeria/'.$caminho_poster;
                    $config2['create_thumb'] = FALSE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['quality'] = '90%';
                    $config2['new_image'] = $p.'/'.$poster['dadosArquivo']['file_name'];
                    $config2['width'] = 900;
                    $config2['height'] = 500;
                    
                    $this->load->library('image_lib',$config2);
                    
                    if ( ! $this->image_lib->resize())
                    {
                            echo $this->image_lib->display_errors();
                            die();
                    }

            }



            $this->load->model('noticias_model', 'modelnoticias');
            if ($this->modelnoticias->inserir_noticia($titulo, $subtitulo, $conteudo, $caminho_poster,$usuario_criador,$publicar,$autor_noticia,$autor_foto,$posicao_carrousel,$posicao_meio,$posicao_bottom)) {
                $this->modelnoticias->ultimoinserido();
//                var_dump($dados['id']);
//                die;
                $_SESSION['inserido'] = 1;
                $this -> session -> mark_as_flash ( 'inserido' );
                redirect(base_url('admin/noticia'));
            } else {
                echo 'Houve um erro no sistema!';
            }
        }



    }



    public function alterar($id) {
         if(!$this->session->userdata('logado')){
                redirect(base_url('admin/login'));
            }
        $this->load->model('noticias_model', 'modelnoticias');


        $dados['noticias_todos'] = $this->modelnoticias->buscar_por_id($id);



        $this->load->view('backend/template/html-header', $dados);

        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');

        $this->load->view('backend/noticia/alterar-noticia');

        $this->load->view('backend/template/html-footer');
    }

    public function salvar_alteracao() {


        //carrega a blibioteca
        $this->load->library('upload');


        $this->load->library('form_validation');
        $teste = $this->input->post('id_postagem');
        $this->form_validation->set_rules('check[]', 'Posição da notícia', 'required');
        $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[80]');
        $this->form_validation->set_rules('subtitulo', 'Subtítulo', 'required|max_length[80]');
        $this->form_validation->set_rules('editor1', 'Conteudo', 'required');



        if ($this->form_validation->run() == False) {
            $this->alterar($teste);
        } else {

            $titulo = $this->input->post('titulo');
            $subtitulo = $this->input->post('subtitulo');
            $conteudo = $this->input->post('editor1');
            $id = $this->input->post('id_postagem');

            $posicao_carrousel = $this->input->post('check[1]');
            $posicao_meio = $this->input->post('check[2]');
            $posicao_bottom = $this->input->post('check[3]');

            $autor_noticia = $this->input->post('autor_noticia');
            $autor_foto = $this->input->post('autor_foto');

             if($posicao_carrousel == null){
                $posicao_carrousel = 0;
            }else{
                $posicao_carrousel = 1;
            }

            if($posicao_meio == null){
                $posicao_meio = 0;
            }else{
                $posicao_meio = 1;
            }
            if($posicao_bottom == null){
                $posicao_bottom = 0;
            }else{
                $posicao_bottom = 1;
            }

            $objDateTime = new DateTime('NOW');
            $time = microtime();
            $nomeimage = $objDateTime->format('YmdHis') . '' . substr($time, 2, 9) . '<br/>';
            //configura arquivos
            $this->load->model('noticias_model', 'modelnoticias');


            $config['upload_path'] = './galeria/imagensdestaque';
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['file_name'] = $nomeimage;
            $config['overwrite'] = 'true';
            //inicializa as configurações
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('poster-principal')) {

                echo $this->upload->display_errors() . ' - ' . $config['upload_path'];
            } else {
                //se correu tudo bem, recuperamos os dados do arquivo
                $poster['dadosArquivo'] = $this->upload->data();
                // definimos o caminho original do arquivo
                $caminho_poster = 'imagensdestaque/' . $poster['dadosArquivo']['file_name'];
            }


            if (empty($poster['dadosArquivo']['file_name'])) {

                if ($this->modelnoticias->alterar_noticia($titulo, $subtitulo, $conteudo, $id,$autor_noticia,$autor_foto,$posicao_carrousel,$posicao_meio,$posicao_bottom)) {
                    $_SESSION['alterado'] = 1;
                    $this -> session -> mark_as_flash ( 'alterado' );
                    redirect(base_url('admin/noticia'));
                } else {
                    echo 'Houve um erro no sistema!';
                }
            } else {



                if ($this->modelnoticias->alterar_noticia_poster($titulo, $subtitulo, $conteudo, $caminho_poster, $id,$autor_noticia,$autor_foto,$posicao_carrousel,$posicao_meio,$posicao_bottom)) {
                    $p =  './galeria/imagensdestaque'. '/thumb';
                    
                     if (!is_dir($p)) {
                        mkdir($p, 0777, $recursive = true);
                    }
                    
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = './galeria/'.$caminho_poster;
                    $config2['create_thumb'] = FALSE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['quality'] = '90%';
                    $config2['new_image'] = $p.'/'.$poster['dadosArquivo']['file_name'];
                    $config2['width'] = 900;
                    $config2['height'] = 500;
                    
                    $this->load->library('image_lib',$config2);
                    
                    if ( ! $this->image_lib->resize())
                    {
                            echo $this->image_lib->display_errors();
                            die();
                    }
                    $_SESSION['alterado'] = 1;
                    $this -> session -> mark_as_flash ( 'alterado' );
                    redirect(base_url('admin/noticia'));
                } else {
                    echo 'Houve um erro no sistema!';
                }
            }
        }
    }

    public function preview($id) {

        $this->load->model('noticias_model', 'modelnoticias');


        $dados['noticias_todos'] = $this->modelnoticias->buscar_por_id($id);


        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');
        $this->load->view('backend/noticia/preview', $dados);
        $this->load->view('backend/template/html-footer');
    }

    public function publicar($id) {

        $this->load->model('noticias_model', 'modelnoticias');
        $id_publicador = $this->session->userdata('userlogado')->id;
        $publicar = 1;

        if ($this->modelnoticias->publicar_noticia($id, $publicar,$id_publicador)) {
                $_SESSION['publicar'] = 1;
                $this -> session -> mark_as_flash ( 'publicar' );
            redirect(base_url('admin/noticia').'#noticia-'.$id);
        }
    }

    public function desativar($id) {

         $this->load->model('noticias_model', 'modelnoticias');

        $publicar = 0;

        if ($this->modelnoticias->desativar_noticia($id, $publicar)) {
                $_SESSION['desativar'] = 1;
                $this -> session -> mark_as_flash ( 'desativar' );
            redirect(base_url('admin/noticia').'#noticia-'.$id);
        }



    }

     public function excluir($id) {

         $this->load->model('noticias_model', 'modelnoticias');

       if ($this->modelnoticias->excluir($id)) {
            $_SESSION['excluido'] = 1;
            $this -> session -> mark_as_flash ( 'excluido' );
            redirect(base_url('admin/noticia'));
        }
     }


     public function alterar_posicao(){
         $this->load->library('form_validation');

        $this->load->model('noticias_model', 'modelnoticias');

        $teste = $this->input->post('id');

        $this->form_validation->set_rules('check[]', 'Posição da notícia', 'required');

          $posicao_carrousel = $this->input->post('check[1]');
          $posicao_meio = $this->input->post('check[2]');
          $posicao_bottom = $this->input->post('check[3]');

            if($posicao_carrousel == null){
                $posicao_carrousel = 0;
            }else{
                $posicao_carrousel = 1;
            }

            if($posicao_meio == null){
                $posicao_meio = 0;
            }else{
                $posicao_meio = 1;
            }
            if($posicao_bottom == null){
                $posicao_bottom = 0;
            }else{
                $posicao_bottom = 1;
            }

            if ($this->modelnoticias->alterar_posicao($teste,$posicao_carrousel,$posicao_meio,$posicao_bottom)) {
                $_SESSION['mensage'] = 1;
                $this -> session -> mark_as_flash ( 'mensage' );
            redirect(base_url('admin/noticia'.'#noticia-'.$teste));
        }
}
}
