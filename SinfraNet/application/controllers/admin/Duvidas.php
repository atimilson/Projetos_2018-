<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Duvidas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }

//        $this->load->model('acessos_model', 'modelacessos');
    }

    public function index() {


//        $dados['acessos_todos'] = $this->modelacessos->listar_acessos();


        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');

        $this->load->view('backend/duvida/duvidas');
        $this->load->view('backend/template/html-footer');
    }


//
//
//
//    public function alterar() {
//
//        //carrega a blibioteca
//        $this->load->library('upload');
//
//
//        $this->load->library('form_validation');
//
//
//
//
//
//
//
//
//        $this->form_validation->set_rules('nome_sistema', 'nome', 'required|max_length[200]');
//        $this->form_validation->set_rules('url', 'url', 'required|max_length[200]');
////        $this->form_validation->set_rules('icone', 'icone', 'required');
//
//        $id = $this->input->post('id');
//
//
//        if ($this->form_validation->run() == False) {
//            $_SESSION ['alterar'] = $id;
//            $this->session->mark_as_flash('alterar');
//            $this->index();
//        } else {
//
//
//            $nome = $this->input->post('nome_sistema');
//            $url = $this->input->post('url');
//            $id_publicador = $this->session->userdata('userlogado')->id;
//            $id = $this->input->post('id');
//
//
//
//
//
//            $objDateTime = new DateTime('NOW');
//            $time = microtime();
//            $nomeimage = $objDateTime->format('YmdHis') . '' . substr($time, 2, 9) . '<br/>';
//            //configura arquivos
//
//
//
//            $config['upload_path'] = './galeria/acessos';
//            $config['allowed_types'] = 'gif|jpg|png|svg';
//            $config['file_name'] = $nomeimage;
//            $config['overwrite'] = 'true';
//            //inicializa as configurações
//            $this->upload->initialize($config);
//
//            if (!$this->upload->do_upload('icone')) {
//                $caminho_poster = 'semimagem/2018-08-13.png';
//                //echo $this->upload->display_errors() . ' - ' . $config['upload_path'];
//            } else {
//                //se correu tudo bem, recuperamos os dados do arquivo
//                $poster['dadosArquivo'] = $this->upload->data();
//                // definimos o caminho original do arquivo
//                $caminho_poster = 'acessos/' . $poster['dadosArquivo']['file_name'];
//            }
//
//            if (empty($poster['dadosArquivo']['file_name'])) {
//
//                if ($this->modelacessos->alterar_acesso($id, $nome, $url, $id_publicador)) {
//                    
//                    $_SESSION['alterado'] = 1;
//                    $this->session->mark_as_flash('alterado');
//                    redirect(base_url('admin/acessos'));
//                } else {
//                    echo 'Houve um erro no sistema!';
//                }
//            } else {
//
//                $config2['source_image'] = './galeria/' . $caminho_poster;
//                $config2['create_thumb'] = FALSE;
//                $config2['width'] = 80;
//                $config2['height'] = 80;
//                $this->load->library('image_lib', $config2);
//                if ($this->image_lib->resize()) {
//
//                    
//                    if ($this->modelacessos->alterar_acesso_icone($id, $caminho_poster, $nome, $url, $id_publicador)) {
//                        
//                        $_SESSION['alterado'] = 1;
//                        $this->session->mark_as_flash('alterado');
//                        redirect(base_url('admin/acessos'));
//                    } else {
//                        echo 'Houve um erro no sistema!';
//                    }
//                } else {
//                    echo $this->image_lib->display_errors();
//                }
//            }
//        }
//    }
//
//    public function salvar() {
//
//        //carrega a blibioteca
//        $this->load->library('upload');
//
//
//        $this->load->library('form_validation');
//
//
//
//
//
//
//
//
//        $this->form_validation->set_rules('nome-acesso', 'nome-acesso', 'required|max_length[200]');
//        $this->form_validation->set_rules('url', 'url', 'required|max_length[200]');
////        $this->form_validation->set_rules('icone', 'icone', 'required');
//
//
//
//
//        if ($this->form_validation->run() == False) {
//            $_SESSION ['item'] = "<script>$('#myModal').modal('show')</script>";
//            $this->session->mark_as_flash('item');
//            $this->index();
//        } else {
//
//
//            $nome = $this->input->post('nome-acesso');
//            $url = $this->input->post('url');
//            $id_publicador = $this->session->userdata('userlogado')->id;
//
//
//
//
//
//
//            $objDateTime = new DateTime('NOW');
//            $time = microtime();
//            $nomeimage = $objDateTime->format('YmdHis') . '' . substr($time, 2, 9) . '<br/>';
//            //configura arquivos
//
//
//            $config['image_library'] = 'gd2';    
//            $config['upload_path'] = './galeria/acessos';
//            $config['allowed_types'] = 'gif|jpg|png|svg';
//            $config['file_name'] = $nomeimage;
//            $config['overwrite'] = 'true';
//            //inicializa as configurações
//            $this->upload->initialize($config);
//
//            if (!$this->upload->do_upload('icone')) {
//                $caminho_poster = 'semimagem/2018-08-13.png';
//                //echo $this->upload->display_errors() . ' - ' . $config['upload_path'];
//            } 
////            else
////                {
////                //se correu tudo bem, recuperamos os dados do arquivo
////                $poster['dadosArquivo'] = $this->upload->data();
////                // definimos o caminho original do arquivo
////                $caminho_poster = 'acessos/' . $poster['dadosArquivo']['file_name'];
////
////
////                $config2['source_image'] = './galeria/' . $caminho_poster;
////                $config2['create_thumb'] = FALSE;
////                $config2['width'] = 80;
////                $config2['height'] = 80;
//////                $this->load->library('image_lib', $config2);
////                
////                $this->load->library('image_lib');
////                // Set your config up
////                $this->image_lib->initialize($config2);
////                // Do your manipulation
////                $this->image_lib->clear();
////                if ($this->image_lib->resize()) {
//
//
//
//                    if ($this->modelacessos->inserir_acesso($caminho_poster, $nome, $url, $id_publicador)) {
//
//
//                        $_SESSION['inserido'] = 1;
//                        $this->session->mark_as_flash('inserido');
//                        redirect(base_url('admin/acessos'));
//                    } else {
//                        echo 'Houve um erro no sistema!';
//                    }
////                } else {
////                    echo $this->image_lib->display_errors();
////                }
////            }
//        }
//    }
//    
//    
//        public function excluir($id){
//        
//        
//        if($this->modelacessos->excluir($id)){
//              $_SESSION ['excluido'] = '1';
//            $this->session->mark_as_flash('excluido');
//            redirect(base_url('admin/acessos'));
//        }
//        
//        
//    }

}
