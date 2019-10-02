<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Repositorio extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }

        $this->load->model('repositorio_model', 'repositoriomodel');
    }

    public function index() {
        $setor = $this->session->userdata('permissoes')[0]->id_setor;

        $this->load->model('categoria_model', 'modelcategoria');
//
//
        if($this->session->userdata('permissoes')[0]->perfil_id == '1'){
             $dados['documentos_todos'] = $this->repositoriomodel->listar_documentos_todos();
          

        }else{


            $dados['documentos_todos'] = $this->repositoriomodel->listar_documentos($setor);


        }





        $dados['categorias_todos'] = $this->modelcategoria->listar_categorias();

        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');

        $this->load->view('backend/repositorio/inserir-doc', $dados);
        $this->load->view('backend/template/html-footer');
    }

    public function inserir() {

        //carrega a blibioteca
        $this->load->library('upload');


        $this->load->library('form_validation');





        $this->form_validation->set_rules('categoria', 'Categoria', 'required');


        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[150]|is_unique[repositorio.nome_doc]');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required|min_length[5]');




        if ($this->form_validation->run() == False) {
            $_SESSION ['item'] = "<script>$('#myModal').modal('show')</script>";
            $this->session->mark_as_flash('item');
            $this->index();
        } else {

            $categoria = $this->input->post('categoria');
            $nome = $this->input->post('nome');
            $descricao = $this->input->post('descricao');

            $subcategoria = $this->input->post('categoria-filho');

            $teste = $this->session->userdata('permissoes');




             $nome_doc = preg_replace("/[^a-zA-Z0-9_]/", "", strtr($nome, "áàãâéêíóôõúüçñÁÀÃÂÉÊÍÓÔÕÚÜÇÑ ", "aaaaeeiooouucnAAAAEEIOOOUUCN_"));



            foreach ($teste as $value) {
                $nome_setor = $value->nome_setor;
                $id_setor = $value->id_setor;
                $id_usuario = $value->id_user;
            }



            $folder = $nome_setor;

            $path = './repositorio/' . $folder;


            if (!is_dir($path)) {
                mkdir($path, 0777, $recursive = true);
            }

            //configura arquivos
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';
            $config['file_name'] = $nome_doc;
            $config['overwrite'] = 'true';
            //inicializa as configurações
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('documento')) {
                //   $_SESSION['inserido'] = 1;
                //   $this->session->mark_as_flash('inserido');
                //   redirect(base_url('admin/repositorio'));
                echo $this->upload->display_errors() . ' - ' . $config['upload_path'];
                die();
            } else {
                //se correu tudo bem, recuperamos os dados do arquivo
                $poster['dadosArquivo'] = $this->upload->data();
                // definimos o caminho original do arquivo
                $caminho_documento = $path . '/' . $poster['dadosArquivo']['file_name'];


                $nome_original_doc = $poster['dadosArquivo']['client_name'];
                $extensao = $poster['dadosArquivo']['file_ext'];
                $nome_arquivo = $poster['dadosArquivo']['orig_name'];
            }





            if ($this->repositoriomodel->inserir_documento($nome, $descricao, $categoria,$subcategoria, $id_setor, $caminho_documento, $extensao, $nome_original_doc, $nome_arquivo, $id_usuario)) {


                $_SESSION['inserido'] = 1;
                $this->session->mark_as_flash('inserido');
                redirect(base_url('admin/repositorio'));
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

        $this->form_validation->set_rules('edit-categoria-pai', 'Categoria', 'required');


        $this->form_validation->set_rules('nome', 'Nome', 'required|max_length[150]');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required|min_length[5]');
        $id = $this->input->post('id');

        if ($this->form_validation->run() == False) {
            $_SESSION ['alterar'] = $id;
            $this->session->mark_as_flash('alterar');


            $this->index();
        } else {

            $categoria = $this->input->post('edit-categoria-pai');

            $nome = $this->input->post('nome');

            $descricao = $this->input->post('descricao');

            $id_subcategoria = $this->input->post('edit-categoria-filho');

            $teste = $this->session->userdata('permissoes');

            $nome_doc =  preg_replace("/[^a-zA-Z0-9_]/", "", strtr($nome, "áàãâéêíóôõúüçñÁÀÃÂÉÊÍÓÔÕÚÜÇÑ ", "aaaaeeiooouucnAAAAEEIOOOUUCN_"));

            foreach ($teste as $value) {
                $nome_setor = $value->nome_setor;
                $id_setor = $value->id_setor;
                $id_usuario = $value->id_user;
            }



            $folder = $nome_setor;

            $path = './repositorio/' . $folder;

            $modificados = $path . '/modificados';



            if (!is_dir($path)) {
                mkdir($path, 0777, $recursive = true);
            }
            if (!is_dir($modificados)) {
                mkdir($modificados, 0777, $recursive = true);
            }
            $dados['documento_m'] = $this->repositoriomodel->listar_documento_id($id);


             //configura arquivos
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'pdf|doc|docx|xls|xlsx|ppt|pptx';



                $contador = (intval($dados['documento_m'][0]->vezes_alterado)) + 1;

                $nome_mod = $nome_doc.'_'.$contador;





             $config['file_name'] = $nome_mod;
            $config['overwrite'] = 'true';
            //inicializa as configurações
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('documento')) {



                $dados['documentos_todos'] = $this->repositoriomodel->listar_documento_id($id);



                $nome_arquivo = $nome_mod . $dados['documentos_todos'][0]->extencao_doc;
                $origem = './repositorio/' . $dados['documentos_todos'][0]->nome_setor . '/' . $dados['documentos_todos'][0]->nome_arquivo;
                $destino = './repositorio/' . $dados['documentos_todos'][0]->nome_setor . '/' . $nome_mod . $dados['documentos_todos'][0]->extencao_doc;

                $caminho_documento = $destino;




                if ($this->repositoriomodel->alterar_nome_documento($id, $nome, $descricao, $categoria,$id_subcategoria, $caminho_documento, $nome_arquivo, $id_usuario,$contador)) {

//
                    if (is_file($origem)) {
                        if (rename($origem, $destino)) {
                            $_SESSION['alterado'] = 1;
                            $this->session->mark_as_flash('alterado');
                            redirect(base_url('admin/repositorio'));
                        } else {
                            echo 'erro ao renomear o arquivo.';
                        }
                    } else {
                        echo 'não achou o arquivo - ' . $origem;
                    }
                } else {
                    echo 'Houve um erro no sistema!';
                }
            } else {










                //se correu tudo bem, recuperamos os dados do arquivo
                $poster['dadosArquivo'] = $this->upload->data();
                // definimos o caminho original do arquivo
                $caminho_documento = $path . '/' . $poster['dadosArquivo']['file_name'];


                $nome_original_doc = $poster['dadosArquivo']['client_name'];
                $extensao = $poster['dadosArquivo']['file_ext'];
                $nome_arquivo = $poster['dadosArquivo']['orig_name'];
            }



            $dados['documento_m'] = $this->repositoriomodel->listar_documento_id($id);







            $origem = $dados['documento_m'][0]->caminho_doc;
            $destino = './repositorio/' . $dados['documento_m'][0]->nome_setor . '/modificados/' . $dados['documento_m'][0]->nome_arquivo;

            if (is_file($origem)) {
                if (rename($origem, $destino)) {
                    $caminho_documento_mod = $destino;
                    if ($this->repositoriomodel->mover_documento_mod(
                                    $dados['documento_m'][0]->nome_doc, $dados['documento_m'][0]->descricao, $dados['documento_m'][0]->categoria,$dados['documento_m'][0]->subcategoria, $dados['documento_m'][0]->id_setor, $caminho_documento_mod, $dados['documento_m'][0]->extencao_doc, $dados['documento_m'][0]->id_usuario, $dados['documento_m'][0]->nome_original_doc, $dados['documento_m'][0]->nome_arquivo)) {

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


            if ($this->repositoriomodel->alterar_documento($id, $nome, $descricao, $categoria,$id_subcategoria, $id_setor, $caminho_documento, $extensao, $nome_original_doc, $nome_arquivo, $id_usuario,$contador)) {

//                   rename($dados['documentos_todos'][0]->caminho_doc,
//                           './repositorio/'.$dados['documentos_todos'][0]->nome_setor.'/'.$nome);

                $_SESSION['inserido'] = 1;
                $this->session->mark_as_flash('inserido');
                redirect(base_url('admin/repositorio'));
            } else {
                echo 'Houve um erro no sistema!';
            }
        }
    }

    public function excluir($id) {

        $dados['documento_m'] = $this->repositoriomodel->listar_documento_id($id);


        if (is_file($dados['documento_m'][0]->caminho_doc)) {
            if (unlink($dados['documento_m'][0]->caminho_doc)) {
                if ($this->repositoriomodel->excluir($id)) {
                    $_SESSION ['excluido'] = '1';
                    $this->session->mark_as_flash('excluido');
                    redirect(base_url('admin/repositorio'));
                } else {
                    echo 'erro ao apagar aquivo BD';
                    die();
                }
            } else {
                echo 'erro ao apagar o arquivo.';
                die();
            }
        } else {
            echo 'não achou o arquivo - ' . $dados['documento_m'][0]->caminho_doc;
            $this->repositoriomodel->excluir($id);
            die();
        }
    }




    public function listar_sub(){





         $id = $this->input->post('id_subcategoria');



         $data = $this->repositoriomodel->listar_sub($id);

         echo json_encode($data);

}

public function listar_sub_cadastrar(){





     $id = $this->input->post('id');



     $data = $this->repositoriomodel->listar_sub($id);

     echo json_encode($data);

}




}
