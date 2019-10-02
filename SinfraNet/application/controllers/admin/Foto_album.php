<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Foto_album extends CI_Controller {

    public function __construct() {

        parent::__construct();
        if(!$this->session->userdata('logado')){
                redirect(base_url('admin/login'));
            }
            $this->load->model('album_model','modelalbum');
             $this->load->library('session');
    }

    public function index($id) {

        $dados['id_pai'] = $id;
        $dados['retorno'] = $this->modelalbum->buscar_por_id($id);
        $dados['listar_fotos'] = $this->modelalbum->listar_por_album($id);
       

         $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central',$dados);
        $this->load->view('backend/fotos/fotos-albuns');
        $this->load->view('backend/template/html-footer');
    }


    public function salvar(){
            
        $data = array();
        
        $id = $this->input->post('id');
          $teste = $this->session->userdata('permissoes');

           

            foreach ($teste as $value) {
                $nome_setor = $value->nome_setor;
                $id_setor = $value->id_setor;
                $autor_album = $value->nome_completo;
            }
        
        $retorno = $this->modelalbum->buscar_por_id($id);
        
        
        $path = './galeria/album/' . $retorno[0]->pasta .'/fotos';
        
        if (!is_dir($path)) {
                mkdir($path, 0777, $recursive = true);
            }
            
            
            
           
        
         if($this->input->post('fileSubmit') && !empty($_FILES['files']['name'])){
            $filesCount = count($_FILES['files']['name']);
            for($i = 0; $i < $filesCount; $i++){


                $_FILES['file']['name']     = $_FILES['files']['name'][$i];
                $_FILES['file']['type']     = $_FILES['files']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['files']['error'][$i];
                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

                // File upload configuration
                $uploadPath = './galeria/teste/';
                $config['upload_path'] = $path;
                $config['encrypt_name'] = TRUE;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['id_album'] = $id;
                    $uploadData[$i]['nome_arquivo'] = $fileData['file_name'];
                    $uploadData[$i]['caminho_arquivo'] = 'galeria/album/' . $retorno[0]->pasta .'/fotos/'.$fileData['file_name'];
                    $uploadData[$i]['autor_foto'] = $autor_album;
                    $uploadData[$i]['pasta'] = 'galeria/album/' . $retorno[0]->pasta .'/fotos';
                    $uploadData[$i]['caminho_raiz'] = 'galeria/album/' . $retorno[0]->pasta;
                    
                    
                }
   
                    
                     
                    
                 

                
                
                
            }
            
            
                if(!empty($uploadData)){
                // Insert files data into the database
                if($this->modelalbum->insert_fotos($uploadData)){
                $_SESSION['inserido'] = 1;
                $this -> session -> mark_as_flash ( 'inserido' );
                redirect(base_url('admin/foto_album/'.$id));
                }else{
                    echo 'erro ao salvar ';
                }
                
               
            }

        }




    }
    
    
    public function excluir($id,$voltar){
        
        if($this->modelalbum->excluir_foto($id)){
             $_SESSION['excluido'] = 1;
            $this -> session -> mark_as_flash ( 'excluido' );
            redirect(base_url('admin/foto_album/'.$voltar));
        } else {
            echo 'erro ao excluir';    
        }
        
    }



}
