<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto extends CI_Controller {

    public function __construct() {

        parent::__construct();
        if(!$this->session->userdata('logado')){
                redirect(base_url('admin/login'));
            }
            $this->load->model('album_model','modelalbum');
    }

    public function index() {
      
        $dados['listar_albuns'] = $this->modelalbum->listar_albuns();
        
       
        
        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');
        $this->load->view('backend/fotos/listar-albuns',$dados);
        $this->load->view('backend/template/html-footer');
    }
    
  


    public function salvar_album() {

        //carrega a blibioteca
        $this->load->library('upload');
        

        $this->load->library('form_validation');





        


        $this->form_validation->set_rules('titulo', 'Titulo', 'required|max_length[150]');
        
        


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
                $autor_album = $value->nome_completo;
            }

            $objDateTime = new DateTime('NOW');
            $time = microtime();
            $nome_pasta = $objDateTime->format('YmdHis'). substr($time, 2,6);

            

            $path = './galeria/album/' . $nome_pasta;




            if (!is_dir($path)) {
                mkdir($path, 0777, $recursive = true);
            }



           
            //configura arquivos
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = 'true';
                //inicializa as configurações
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('poster-principal')) {
//                    $caminho_poster = 'semimagem/2018-08-13.png';
                    echo $this->upload->display_errors() . ' - ' . $config['upload_path'];
                } else {
                    
                 
                    
                    
                    //se correu tudo bem, recuperamos os dados do arquivo
                    $poster['dadosArquivo'] = $this->upload->data();
                    // definimos o caminho original do arquivo
                    $caminho_poster = 'galeria/album/' . $nome_pasta.'/'.$poster['dadosArquivo']['file_name'];
                    $pasta = $nome_pasta;
                    $caminho_raiz = 'galeria/album/';
                    $arquivo_poster = $poster['dadosArquivo']['file_name'];
                    
                    $p =  './galeria/album/' . $nome_pasta . '/thumb';
                    
                    if (!is_dir($p)) {
                        mkdir($p, 0777, $recursive = true);
                    }
                    
                    $config2['image_library'] = 'gd2';
                    $config2['source_image'] = $caminho_poster;
                    $config2['create_thumb'] = FALSE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['quality'] = '95%';
                    $config2['new_image'] = $p.'/'.$poster['dadosArquivo']['file_name'];
                    $config2['width'] = 800;
                    $config2['height'] = 411;
                    
                    $this->load->library('image_lib',$config2);
                    
                    if ( ! $this->image_lib->resize())
                    {
                            echo $this->image_lib->display_errors();
                            die();
                    }
                    
                    

            }



            
            if ($this->modelalbum->inserir_album($titulo, $caminho_poster,$pasta,$caminho_raiz,$autor_album,$arquivo_poster)) {
                $_SESSION['inserido'] = 1;
                $this -> session -> mark_as_flash ( 'inserido' );
                redirect(base_url('admin/foto'));
            } else {
                echo 'Houve um erro no sistema!';
            }
        }



    }

//
    public function alterar() {


        //carrega a blibioteca
        $this->load->library('upload');


        $this->load->library('form_validation');
        $id = $this->input->post('id');
        
        $this->form_validation->set_rules('titulo_edit', 'Titulo', 'required|max_length[150]');
    



        if ($this->form_validation->run() == False) {
            echo 'error';
            
            // validação
            
        } else {
            $retorno = $this->modelalbum->buscar_por_id($id);
            
              $teste = $this->session->userdata('permissoes');



            foreach ($teste as $value) {
                $nome_setor = $value->nome_setor;
                $id_setor = $value->id_setor;
                $autor_album = $value->nome_completo;
            }
           
            
            
            $titulo = $this->input->post('titulo_edit');

            $path = './galeria/album/' . $retorno[0]->pasta;
            
            
//           
            //configura arquivos
                $config['upload_path'] = $path;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['encrypt_name'] = TRUE;
                $config['overwrite'] = 'true';
                //inicializa as configurações
                $this->upload->initialize($config);
//
                $this->upload->do_upload('poster-principal');
               
               
           
                //se correu tudo bem, recuperamos os dados do arquivo
                $poster['dadosArquivo'] = $this->upload->data();
                // definimos o caminho original do arquivo
                $caminho_poster = 'galeria/album/' . $retorno[0]->pasta.'/' . $poster['dadosArquivo']['file_name'];
                $arquivo_poster = $poster['dadosArquivo']['file_name'];
            
//              
//
            if (empty($poster['dadosArquivo']['file_name'])) {
                
               

                if ($this->modelalbum->alterar_album($id,$titulo,$autor_album)) {
                    $_SESSION['alterado'] = 1;
                    $this -> session -> mark_as_flash ( 'alterado' );
                    redirect(base_url('admin/foto'));
                } else {
                    echo 'Houve um erro no sistema!';
                }
            } else {

                 
                 
                if ($this->modelalbum->alterar_album_poster($id,$titulo, $caminho_poster,$autor_album,$arquivo_poster)) {
                    
                     $p =  './galeria/album/' . $retorno[0]->pasta . '/thumb';
                    
                     if (!is_dir($p)) {
                        mkdir($p, 0777, $recursive = true);
                    }
                    
                      $config2['image_library'] = 'gd2';
                    $config2['source_image'] = './'.$caminho_poster;
                    $config2['create_thumb'] = FALSE;
                    $config2['maintain_ratio'] = TRUE;
                    $config2['quality'] = '95%';
                    $config2['new_image'] = $p.'/'.$poster['dadosArquivo']['file_name'];
                    $config2['width'] = 800;
                    $config2['height'] = 411;
                    
                    $this->load->library('image_lib',$config2);
                    
                     if ( ! $this->image_lib->resize())
                    {
                            echo $this->image_lib->display_errors();
                            die();
                    }
                    
                    $_SESSION['alterado'] = 1;
                    $this -> session -> mark_as_flash ( 'alterado' );
                    redirect(base_url('admin/foto'));
                } else {
                    echo 'Houve um erro no sistema!';
                }
            }
        }
    }

//
    public function publicar($id) {

        
        $nome_publicador = $this->session->userdata('userlogado')->nome_completo;
        
        $publicar = 1;

        if ($this->modelalbum->publicar_album($id, $publicar,$nome_publicador)) {
                $_SESSION['publicar'] = 1;
                $this -> session -> mark_as_flash ( 'publicar' );
            redirect(base_url('admin/foto').'#foto-'.$id);
        }
    }

    public function desativar($id) {

        

        $publicar = 0;

        if ($this->modelalbum->desativar_album($id, $publicar)) {
                $_SESSION['desativar'] = 1;
                $this -> session -> mark_as_flash ( 'desativar' );
            redirect(base_url('admin/foto').'#foto-'.$id);
        }



    }
//
     public function excluir($id) {

         

       if ($this->modelalbum->excluir($id)) {
            $_SESSION['excluido'] = 1;
            $this -> session -> mark_as_flash ( 'excluido' );
            redirect(base_url('admin/foto'));
        }else {
                   $_SESSION ['err'] = '1';
                   $this->session->mark_as_flash('err');
                    redirect(base_url('admin/foto')); 
               }
     }
//
//

}
