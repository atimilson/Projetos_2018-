<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Acessos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }

        $this->load->model('acessos_model', 'modelacessos');
    }

    // O index carrega a pagina principal do painel adminstrador -> Acessos
    public function index() {

        // Select em todos os registros da tabela acessos
        $dados['acessos_todos'] = $this->modelacessos->listar_acessos();

        // carregando e montando o html de acessos
        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');

        $this->load->view('backend/acessos/inserir-acessos', $dados);
        $this->load->view('backend/template/html-footer');
        
    }





    public function alterar() {

        //carrega a blibioteca para inserir arquivos e a biblioteca de validação de formularios nativa do codeigniter
        $this->load->library('upload');
        $this->load->library('form_validation');

        // funcão para o campo ser obrigatório e ter o tamanho maximo de 200 caracteres
        $this->form_validation->set_rules('nome_sistema', 'nome', 'required|max_length[200]');
        $this->form_validation->set_rules('url', 'url', 'required|max_length[200]');

        // A variavel é adicionada para o retorno da validação caso seja necessário
        $id = $this->input->post('id');

        // validação dos campos caso algum seje FAlSE é executado o bloco 
        if ($this->form_validation->run() == False) {
            // é passado para a seccção o $id para ser aberto o modal na view 
            $_SESSION ['alterar'] = $id;
            
            // metodo ultilizado para variavel temporaria 
            $this->session->mark_as_flash('alterar');
            
            //retorna para a funcção index deste controlador
            $this->index();
            
        } else {
            //se a validação do campos forem verdadeiras é executado este bloco
            
            //recebendo a requisição post
            $nome = $this->input->post('nome_sistema');
            $url = $this->input->post('url');
            $id_publicador = $this->session->userdata('userlogado')->id;
            $id = $this->input->post('id');




            //para criar o nome do arquivo é ultilizado o data e concatenado os segundos e milisegundos
            $objDateTime = new DateTime('NOW');
            $time = microtime();
            $nomeimage = $objDateTime->format('YmdHis') . '' . substr($time, 2, 9) . '<br/>';
            
            
            //configura arquivos para o upload
            $config['upload_path'] = './galeria/acessos'; // caminho para armazenar o arquivo
            $config['allowed_types'] = 'gif|jpg|png|svg'; // as extenções compativeis 
            $config['file_name'] = $nomeimage; // o nome do arquivo criado na linha 76
            $config['overwrite'] = 'true';
            
            
            //inicializa as configurações
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('icone')) {  // verifica se tudo ocorreu bem e se existe arquivo no input file
                
                $caminho_poster = 'semimagem/2018-08-13.png'; // caso não exista arquivo é adicionado o caminho de uma imagen default
               
            } else {
                //se correu tudo bem, recuperamos os dados do arquivo
                $poster['dadosArquivo'] = $this->upload->data();
                
                // definimos o caminho original do arquivo
                $caminho_poster = 'acessos/' . $poster['dadosArquivo']['file_name'];
            }

            if (empty($poster['dadosArquivo']['file_name'])) { // se o retorno do post for vazio é porque não existe arquivo inserido
                //se não existe arquivo é alterado somente os outros campos
                if ($this->modelacessos->alterar_acesso($id, $nome, $url, $id_publicador)) {
                    //bloco para aparecer a mensagem de sucesso
                    $_SESSION['alterado'] = 1;
                    $this->session->mark_as_flash('alterado');
                    redirect(base_url('admin/acessos'));
                    } else {
                        echo 'Houve um erro no sistema!';
                    }
            } else {
                // se existir arquivo é redimensionado para 80px width x 80px height
                
                //configuração para redimencionar arquivo
                $config2['source_image'] = './galeria/' . $caminho_poster;
                $config2['create_thumb'] = FALSE;
                $config2['width'] = 80;
                $config2['height'] = 80;
                $this->load->library('image_lib', $config2); // carrega as configurações na biblioteca
                if ($this->image_lib->resize()) {  // função para executar o redimencionamento

                    // apos redimencionado e salvo no banco
                    if ($this->modelacessos->alterar_acesso_icone($id, $caminho_poster, $nome, $url, $id_publicador)) { 
                        // mensagem de sucesso
                        $_SESSION['alterado'] = 1;
                        $this->session->mark_as_flash('alterado');
                        redirect(base_url('admin/acessos'));
                    } else {
                        echo 'Houve um erro no sistema!';
                    }
                } else {
                    // caso de erro no redimencionamento
                    echo $this->image_lib->display_errors();
                }
            }
        }
    }

    public function salvar() {

        //carrega a blibioteca de upload e validação de formulario
        $this->load->library('upload');
        $this->load->library('form_validation');

        
         // funcão para o campo ser obrigatório e ter o tamanho maximo de 200 caracteres
        $this->form_validation->set_rules('nome-acesso', 'nome-acesso', 'required|max_length[200]');
        $this->form_validation->set_rules('url', 'url', 'required|max_length[200]');




        // validação dos campos caso algum seje FAlSE é executado o bloco 
        if ($this->form_validation->run() == False) {
            // é passado para a seccção o id do modal para ser aberto o modal na view 
            $_SESSION ['item'] = "<script>$('#myModal').modal('show')</script>";
            
            // metodo ultilizado para variavel temporaria 
            $this->session->mark_as_flash('item');
            
            //retorna para a funcção index deste controlador
            $this->index();
            
        } else {
            //se a validação do campos forem verdadeiras é executado este bloco
            
            //recebendo a requisição post

            $nome = $this->input->post('nome-acesso');
            $url = $this->input->post('url');
            $id_publicador = $this->session->userdata('userlogado')->id;






            $objDateTime = new DateTime('NOW');
            $time = microtime();
            $nomeimage = $objDateTime->format('YmdHis') . '' . substr($time, 2, 9) . '<br/>';
            //configura arquivos


            $config['image_library'] = 'gd2';    
            $config['upload_path'] = './galeria/acessos';
            $config['allowed_types'] = 'gif|jpg|png|svg';
            $config['file_name'] = $nomeimage;
            $config['overwrite'] = 'true';
            //inicializa as configurações
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('icone')) {
                $caminho_poster = 'semimagem/2018-08-13.png';
                //echo $this->upload->display_errors() . ' - ' . $config['upload_path'];
            } 
            else
                {
                //se correu tudo bem, recuperamos os dados do arquivo
                $poster['dadosArquivo'] = $this->upload->data();
                // definimos o caminho original do arquivo
                $caminho_poster = 'acessos/' . $poster['dadosArquivo']['file_name'];


                $config2['source_image'] = './galeria/' . $caminho_poster;
                $config2['create_thumb'] = FALSE;
                $config2['width'] = 80;
                $config2['height'] = 80;
                $this->load->library('image_lib', $config2);
                
                $this->load->library('image_lib');
                // Set your config up
                $this->image_lib->initialize($config2);
                // Do your manipulation
                $this->image_lib->clear();
                if ($this->image_lib->resize()) {



                    if ($this->modelacessos->inserir_acesso($caminho_poster, $nome, $url, $id_publicador)) {


                        $_SESSION['inserido'] = 1;
                        $this->session->mark_as_flash('inserido');
                        redirect(base_url('admin/acessos'));
                    } else {
                        echo 'Houve um erro no sistema!';
                    }
                } else {
                    echo $this->image_lib->display_errors();
                }
            }
        }
    }
    
    
        public function excluir($id){
        
        
        if($this->modelacessos->excluir($id)){
              $_SESSION ['excluido'] = '1';
            $this->session->mark_as_flash('excluido');
            redirect(base_url('admin/acessos'));
        }
        
        
    }

}
