<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Audio extends CI_Controller {

    public function __construct() {

        parent::__construct();
        if(!$this->session->userdata('logado')){
                redirect(base_url('admin/login'));
            }
            $this->load->model('audio_model', 'modelaudio');
    }

    public function index() {
      $dados['listar_audios'] = $this->modelaudio->listar_audios();

        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central',$dados);
        $this->load->view('backend/audio/listar-audios');
        $this->load->view('backend/template/html-footer');


    }
    public function inserir() {

        //carrega a blibioteca
        $this->load->library('upload');


        $this->load->library('form_validation');








        $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[150]|is_unique[audio.titulo]');





        if ($this->form_validation->run() == False) {
            $_SESSION ['item'] = "<script>$('#myModal').modal('show')</script>";
            $this->session->mark_as_flash('item');
            $this->index();
        } else {


            $titulo = $this->input->post('titulo');
            $teste = $this->session->userdata('permissoes');



            foreach ($teste as $value) {
                $nome_setor = $value->nome_setor;
                $id_setor = $value->id_setor;
                $nome_usuario = $value->nome_completo;
            }



            $folder = $nome_setor;

            $path = './galeria/audios/' . $folder;




            if (!is_dir($path)) {
                mkdir($path, 0777, $recursive = true);
            }

            //configura arquivos
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'mp3|wav|m4a|wma';
            $config['encrypt_name'] = TRUE;
            $config['overwrite'] = 'true';
            //inicializa as configurações

            $this->upload->initialize($config);
            if (!$this->upload->do_upload('poster-principal')) {
                //   $_SESSION['inserido'] = 1;
                //   $this->session->mark_as_flash('inserido');
                //   redirect(base_url('admin/repositorio'));

                echo $this->upload->display_errors() . ' - ' . $config['upload_path'];
                die();
            } else {
                //se correu tudo bem, recuperamos os dados do arquivo
                $poster['dadosArquivo'] = $this->upload->data();
                // definimos o caminho original do arquivo
                $caminho_documento = 'galeria/audios/' . $folder . '/' . $poster['dadosArquivo']['file_name'];


                $nome_original_doc = $poster['dadosArquivo']['orig_name'];
                $extensao = $poster['dadosArquivo']['file_ext'];
                $nome_arquivo = $poster['dadosArquivo']['file_name'];
            }




            if ($this->modelaudio->inserir_audio($titulo, $caminho_documento, $extensao, $nome_original_doc, $nome_arquivo, $nome_usuario,$path)) {


                 $_SESSION['inserido'] = 1;
                 $this->session->mark_as_flash('inserido');
                redirect(base_url('admin/audio'));
             } else {
                 echo 'Houve um erro no sistema!';
            }

         }
    }

//
//
//
    public function alterar() {
        $this->load->library('upload');

        $this->load->library('form_validation');

        $this->form_validation->set_rules('titulo_edit', 'Titulo', 'required|max_length[150]');
        $id = $this->input->post('id');

        if ($this->form_validation->run() == False) {
            $_SESSION ['alterar'] = $id;
            $this->session->mark_as_flash('alterar');


            $this->index();
        } else {

            $titulo = $this->input->post('titulo_edit');

            $teste = $this->session->userdata('permissoes');

            
           foreach ($teste as $value) {
                $nome_setor = $value->nome_setor;
                $id_setor = $value->id_setor;
                $nome_usuario = $value->nome_completo;
            }



            $folder = $nome_setor;

            $path = './galeria/audios/' . $folder;

            $modificados = $path . '/modificados/';



            if (!is_dir($path)) {
                mkdir($path, 0777, $recursive = true);
            }
            if (!is_dir($modificados)) {
                mkdir($modificados, 0777, $recursive = true);
            }
           

             
        

            //configura arquivos
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'mp3';
            $config['encrypt_name'] = TRUE;
            $config['overwrite'] = 'true';
            //inicializa as configurações

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('audio_file_edit')) {



//                $dados['documentos_todos'] = $this->modelaudio->listar_audio_id($id);



//                $nome_arquivo = $dados['documentos_todos'][0]->nome_arquivo;
//                $origem =  $dados['documentos_todos'][0]->caminho_servidor.$dados['documentos_todos'][0]->nome_arquivo;
//                $destino = $dados['documentos_todos'][0]->caminho_servidor.$modificados.$dados['documentos_todos'][0]->nome_arquivo;
//
//                $caminho_documento = $destino;




                if ($this->modelaudio->alterar_nome_audio($titulo,$id)) {

//
                            $_SESSION['alterado'] = 1;
                            $this->session->mark_as_flash('alterado');
                            redirect(base_url('admin/audio'));
                }
                 
            } else {










                $poster['dadosArquivo'] = $this->upload->data();
                // definimos o caminho original do arquivo
                $caminho_documento = 'galeria/audios/' . $folder . '/' . $poster['dadosArquivo']['file_name'];


                $nome_original_doc = $poster['dadosArquivo']['orig_name'];
                $extensao = $poster['dadosArquivo']['file_ext'];
                $nome_arquivo = $poster['dadosArquivo']['file_name'];
            }



            $dados['documento_m'] = $this->modelaudio->listar_documento_id($id);







            $origem = './'.$dados['documento_m'][0]->caminho_arquivo;
            $destino = $dados['documento_m'][0]->caminho_servidor . '/modificados/' . $dados['documento_m'][0]->nome_arquivo;

            if (is_file($origem)) {
                if (rename($origem, $destino)) {
                   
                    if ($this->modelaudio->mover_audio_mod(
                                    $dados['documento_m'][0]->titulo, 
                                    $dados['documento_m'][0]->nome_arquivo, 
                                    $dados['documento_m'][0]->caminho_arquivo,
                                    $dados['documento_m'][0]->nome_original,
                                    $dados['documento_m'][0]->extensao, 
                                    $dados['documento_m'][0]->data_cadastro, 
                                    $dados['documento_m'][0]->nome_publicador, 
                                    $dados['documento_m'][0]->publicado, 
                                    $dados['documento_m'][0]->data_publicado,
                                    $dados['documento_m'][0]->nome_publicador_home,
                                    $dados['documento_m'][0]->caminho_servidor )) {

                    } else {
                        echo 'Houve um erro no sistema!';
                        die();
                    }
                } else {
                    echo 'erro ao renomear o arquivo.';
                    die();
                }
            } else {
                echo 'não achou o arquivo - ' . $origem;
                die();
            }


            if ($this->modelaudio->alterar_audio($id,$titulo, $caminho_documento, $extensao, $nome_original_doc, $nome_arquivo, $nome_usuario,$path)) {

//                   rename($dados['documentos_todos'][0]->caminho_doc,
//                           './repositorio/'.$dados['documentos_todos'][0]->nome_setor.'/'.$nome);

                $_SESSION['inserido'] = 1;
                $this->session->mark_as_flash('inserido');
                redirect(base_url('admin/audio'));
            } else {
                echo 'Houve um erro no sistema!';
            }
        }
    }

    public function excluir($id) {

            $dados['documento_m'] = $this->modelaudio->listar_documento_id($id);
        
            $excluidos = $dados['documento_m'][0]->caminho_servidor .'/excluidos';



          
            if (!is_dir($excluidos)) {
                mkdir($excluidos, 0777, $recursive = true);
            }
        
        
            $origem = './'.$dados['documento_m'][0]->caminho_arquivo;
            $destino = $dados['documento_m'][0]->caminho_servidor . '/excluidos/' . $dados['documento_m'][0]->nome_arquivo;

            if (is_file($origem)) {
                if (rename($origem, $destino)) {
                   
                    if ($this->modelaudio->excluir_audio_mod(
                                    $dados['documento_m'][0]->titulo, 
                                    $dados['documento_m'][0]->nome_arquivo, 
                                    $dados['documento_m'][0]->caminho_arquivo,
                                    $dados['documento_m'][0]->nome_original,
                                    $dados['documento_m'][0]->extensao, 
                                    $dados['documento_m'][0]->data_cadastro, 
                                    $dados['documento_m'][0]->nome_publicador, 
                                    $dados['documento_m'][0]->publicado, 
                                    $dados['documento_m'][0]->data_publicado,
                                    $dados['documento_m'][0]->nome_publicador_home,
                                    $dados['documento_m'][0]->caminho_servidor )) {
                        
                        
                     if ($this->modelaudio->excluir($id)) {
                    $_SESSION ['excluido'] = '1';
                    $this->session->mark_as_flash('excluido');
                    redirect(base_url('admin/audio'));
                    } else {
                    echo 'erro ao apagar aquivo BD';
                    
                    }

                    } else {
                        echo 'Houve um erro no sistema!';
                        
                    }
                } else {
                    echo 'erro ao renomear o arquivo.';
                    
                }
            } else {
                
               echo 'não achou o arquivo - ' . $dados['documento_m'][0]->caminho_arquivo;
                $this->modelaudio->excluir($id);
                die();
            }



    }
    
    
    public function publicar($id) {

       
        $nome_publicador = $this->session->userdata('userlogado')->nome_completo ;
        $publicar = 1;

        if ($this->modelaudio->publicar($id, $publicar,$nome_publicador)) {
                $_SESSION['publicar'] = 1;
                $this -> session -> mark_as_flash ( 'publicar' );
            redirect(base_url('admin/audio').'#audio-'.$id);
        }
    }

    public function desativar($id) {

         

        $publicar = 0;

        if ($this->modelaudio->desativar($id, $publicar)) {
                $_SESSION['desativar'] = 1;
                $this -> session -> mark_as_flash ( 'desativar' );
            redirect(base_url('admin/audio').'#audio-'.$id);
        }



    }

    
    
    
    
    
    
    
}
