<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Evento extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }
        
        $this->load->model('eventos_model', 'modeleventos');
    }
    
    
    public function index(){
        
//         $this->load->model('noticias_model', 'modelnoticias');

        $dados['eventos_todos'] = $this->modeleventos->listar_todos();
        
//        $dados['eventos_todos'] = $this->modelnoticias->listar_todos();

        $this->load->view('backend/template/html-header', $dados);

        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');

        $this->load->view('backend/evento/listar-evento');

        $this->load->view('backend/template/html-footer');
        
                
    }
    
   public function form_inserir() {
  
        $this->load->model('noticias_model', 'modelnoticias');


        $dados['eventos_todos'] = $this->modeleventos->listar_todos();



        $this->load->view('backend/template/html-header', $dados);

        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');

        $this->load->view('backend/evento/inserir-evento');

        $this->load->view('backend/template/html-footer');
    }

    public function salvar_publicacao() {
       
        //carrega a blibioteca
        $this->load->library('upload');


        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[80]');
        $this->form_validation->set_rules('subtitulo', 'Subtítulo', 'required|max_length[80]');
        $this->form_validation->set_rules('editor1', 'Conteudo', 'required');
        
        $this->form_validation->set_rules('autor_evento', 'Autor da noticia', 'required|max_length[80]');
        $this->form_validation->set_rules('autor_fotos', 'Autor da foto', 'required|max_length[80]');

        if ($this->form_validation->run() == False) {
            $this->form_inserir();
        } else {
            
            $titulo = $this->input->post('titulo');
            $subtitulo = $this->input->post('subtitulo');
            $conteudo = $this->input->post('editor1');
            $usuario_criador = $this->input->post('txt-usuario');
            $action = $this->input->post('acao');
            
            $autor_noticia = $this->input->post('autor_evento');
            $autor_foto = $this->input->post('autor_fotos');
            
            if($action == 'Salva_publicar'){
             $publicar = 1;   
            }
            if($action == 'salvar'){
             $publicar = 0;
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
            
         

            
            if ($this->modeleventos->inserir_evento($titulo, $subtitulo, $conteudo, $caminho_poster,$usuario_criador,$publicar,$autor_noticia,$autor_foto)) {
                $this->modeleventos->ultimoinserido();
//                var_dump($dados['id']);
//                die;
                $_SESSION['inserido'] = 1;
                $this -> session -> mark_as_flash ( 'inserido' );
                redirect(base_url('admin/evento'));
            } else {
                echo 'Houve um erro no sistema!';
            }
        }
    }

    public function alterar($id) {
         if(!$this->session->userdata('logado')){
                redirect(base_url('admin/login'));
            }
        


        $dados['eventos_todos'] = $this->modeleventos->buscar_por_id($id);



        $this->load->view('backend/template/html-header', $dados);

        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');

        $this->load->view('backend/evento/alterar-evento');

        $this->load->view('backend/template/html-footer');
    }

    public function salvar_alteracao() {

       
        //carrega a blibioteca
        $this->load->library('upload');

        $id = $this->input->post('id_postagem');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[80]');
        $this->form_validation->set_rules('subtitulo', 'Subtítulo', 'required|max_length[80]');
        $this->form_validation->set_rules('editor1', 'Conteudo', 'required');
        
        $this->form_validation->set_rules('autor_evento', 'Autor da noticia', 'required|max_length[80]');
        $this->form_validation->set_rules('autor_fotos', 'Autor da foto', 'required|max_length[80]');

        if ($this->form_validation->run() == False) {
            $this->alterar($id);
        } else {

            $titulo = $this->input->post('titulo');
            $subtitulo = $this->input->post('subtitulo');
            $conteudo = $this->input->post('editor1');
            
             $autor_noticia = $this->input->post('autor_evento');
            $autor_foto = $this->input->post('autor_fotos');
            

            $objDateTime = new DateTime('NOW');
            $time = microtime();
            $nomeimage = $objDateTime->format('YmdHis') . '' . substr($time, 2, 9) . '<br/>';
            //configura arquivos
            
//            $p =  './galeria/imagensdestaque_evento';
//                    
//                     if (!is_dir($p)) {
//                        mkdir($p, 0777, $recursive = true);
                    }
                    
//            $pe =  './galeria/imagensdestaque_evento/'.$nomeimage;
//                    
//                     if (!is_dir($pe)) {
//                        mkdir($pe, 0777, $recursive = true);
//                    }        
//            $pe1 =  './galeria/imagensdestaque_evento/'.$nomeimage.'/thumb';
//                    
//                     if (!is_dir($pe1)) {
//                        mkdir($pe1, 0777, $recursive = true);
//                    }         


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

                if ($this->modeleventos->alterar_evento($titulo, $subtitulo, $conteudo, $id,$autor_noticia,$autor_foto)) {
                     $_SESSION['alterado'] = 1;
                    $this -> session -> mark_as_flash ( 'alterado' );
                    redirect(base_url('admin/evento'));
                } else {
                    echo 'Houve um erro no sistema!';
                }
            } else {



                if ($this->modeleventos->alterar_evento_poster($titulo, $subtitulo, $conteudo, $caminho_poster, $id, $publicar,$autor_noticia,$autor_foto)) {
                    
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
                    redirect(base_url('admin/evento'));
                } else {
                    echo 'Houve um erro no sistema!';
                }
            }
        
    }

    public function preview($id) {
       
        


        $dados['eventos_todos'] = $this->modeleventos->buscar_por_id($id);


        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');
        $this->load->view('backend/evento/preview', $dados);
        $this->load->view('backend/template/html-footer');
    }

    public function publicar($id) {
      
        
        $id_publicador = $this->session->userdata('userlogado')->id;
        $publicar = 1;
       
        if ($this->modeleventos->publicar_evento($id, $publicar,$id_publicador)) {

            $_SESSION['publicar'] = 1;
                $this -> session -> mark_as_flash ( 'publicar' );
            redirect(base_url('admin/evento').'#espaco-evento-'.$id);
        }
    }

    public function desativar($id) {
         
        

        $publicar = 0;

        if ($this->modeleventos->desativar_evento($id, $publicar)) {
            $_SESSION['desativar'] = 1;
                $this -> session -> mark_as_flash ( 'desativar' );
            redirect(base_url('admin/evento').'#espaco-evento-'.$id);
        }
        
        
        
    }
    
     public function excluir($id) {
         
        

       if ($this->modeleventos->excluir($id)) {

           $_SESSION['excluido'] = 1;
            $this -> session -> mark_as_flash ( 'excluido' );
            redirect(base_url('admin/evento'));
        }
     }
    
    
    
}