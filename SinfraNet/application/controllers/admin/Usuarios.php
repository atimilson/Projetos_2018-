<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->model('usuarios_model', 'modelusuarios');
        $this->load->model('ramal_model', 'modelramal');
    }

    public function index() {

//        $dados['titulo'] = 'Painel de Controle';
//        $dados['subtitulo'] = 'Entrar no sistema';
        
         if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }
        
        
        $obj = $this->session->userdata('permissoes');
    
        
        if($this->session->userdata('permissoes')[0]->perfil_id == '1'){
            
           $dados['listar_todos'] = $this->modelusuarios->listar_usuarios_relacao();
        } else {
            
            
            $dados['listar_todos'] = $this->modelusuarios->listar_usuarios_setor($obj[0]->setor_id); 
            
        }
        
        $dados['usuarios'] = $this->modelusuarios->listar_usuarios();
        
        $dados['setores_todos'] = $this->modelramal->listar_setores();
        $dados['perfis'] = $this->modelusuarios->listar_perfis();
        
        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');
        $this->load->view('backend/usuario/listar-usuario',$dados);                
        $this->load->view('backend/template/html-footer');
        
        
    }

    public function pag_login() {
        $this->load->view('backend/template/login');
        $this->load->view('backend/template/html-footer');
    }

  

    public function logar() {


        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Usuario', 'required|min_length[3]');
        $this->form_validation->set_rules('password', 'Senha', 'required|min_length[3]');

        if ($this->form_validation->run() == False) {
            $this->pag_login();
        } else {
            $usuario = $this->input->post('username');
            $senha = md5($this->input->post('password'));
            $this->load->model('usuarios_model', 'modelusuarios');
            $userlogado = $this->modelusuarios->verifica_user($usuario, $senha);

            if (count($userlogado) == 1) {
                $dadosSessao['userlogado'] = $userlogado[0];
                $dadosSessao['logado'] = TRUE;
                $this->session->set_userdata($dadosSessao);
                $id_logado = $this->session->userdata('userlogado')->id;
                $dadosSessao['permissoes'] = $this->modelusuarios->verifica_user_rel($id_logado[0]);
                $this->session->set_userdata($dadosSessao);
                redirect(base_url('admin/home'));
            } else {
                $dadosSessao['userlogado'] = NULL;
                $dadosSessao['logado'] = FALSE;
                $this->session->set_userdata($dadosSessao);
                 $_SESSION ['erro_logar'] = '1';
                $this->session->mark_as_flash('erro_logar');
                redirect(base_url('admin/login'));
            }
        }
    }

    public function logout() {
        if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }
        $dadosSessao['userlogado'] = NULL;
        $dadosSessao['logado'] = FALSE;
        $this->session->set_userdata($dadosSessao);
        redirect(base_url('admin/login'));
    }
    
    
        public function salvar() {
             if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
            
            
        }
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nome_completo', 'Nome Completo', 'required');
        $this->form_validation->set_rules('user', 'Usuário', 'required|max_length[80]|is_unique[usuario.usuario]');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required|min_length[3]');
        $this->form_validation->set_rules('confimar_senha', 'Confirmar Senha', 'required|matches[senha]');
        $this->form_validation->set_rules('perfil', 'Perfil', 'required');
        $this->form_validation->set_rules('setor','Setor','required');
        $this->form_validation->set_rules('estado_usuario', 'Status', 'required');

        if ($this->form_validation->run() == False) {
            $_SESSION ['item'] = "<script>$('#myModal').modal('show')</script>";
            $this->session->mark_as_flash('item');
            $this->index();
        } else {
            

            
            $nome = $this->input->post('nome_completo');
            $usuario = $this->input->post('user');
            $email = $this->input->post('email');
            $senha = $this->input->post('senha');
            $perfil = $this->input->post('perfil');
            $setor = $this->input->post('setor');
            $status = $this->input->post('estado_usuario');
            
            
            
            
            $id_publicador = $this->session->userdata('userlogado')->id;
            

            if ($this->modelusuarios->inserir($nome,$usuario,$email,$senha,$perfil,$setor,$status)) {
                $_SESSION ['inserido'] = '1';
            $this->session->mark_as_flash('inserido');
                
                redirect(base_url('admin/usuarios'));
            }
        }
    }
    
    public function alterar(){
         if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }
        
        $this->load->library('form_validation');
        
        if($this->input->post('senha') == "" and $this->input->post('senha') == NULL){
        
            

        $this->form_validation->set_rules('nome_completo', 'Nome Completo', 'required');
        $this->form_validation->set_rules('user', 'Usuário', 'required|max_length[80]');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
//        $this->form_validation->set_rules('senha', 'Senha', '');
//        $this->form_validation->set_rules('confimar_senha', 'Confirmar Senha', 'matches[senha]');
        $this->form_validation->set_rules('estado_usuario', 'Status', 'required');
        
        $id = $this->input->post('id');

        if ($this->form_validation->run() == False) {
            $_SESSION ['alterar'] = $id;
            $this->session->mark_as_flash('alterar');
            
            
            $this->index();
   
        } else {
            
            
            $nome = $this->input->post('nome_completo');
            $usuario = $this->input->post('user');
            $email = $this->input->post('email');
//            $senha = $this->input->post('senha');
            $perfil = $this->input->post('perfil');
            $setor = $this->input->post('setor');
            $status = $this->input->post('estado_usuario');
             $id_publicador = $this->session->userdata('userlogado')->id;
             
            
            if ($this->modelusuarios->alterar($nome,$usuario,$email,$perfil,$setor,$status,$id)) {
                
                $_SESSION ['alterado'] = '1';
            $this->session->mark_as_flash('alterado');
                
              
                redirect(base_url('admin/usuarios'));
            }
        }
        
        }else{
            
            
            
        $this->form_validation->set_rules('nome_completo', 'Nome Completo', 'required');
        $this->form_validation->set_rules('user', 'Usuário', 'required|max_length[80]');
        $this->form_validation->set_rules('email', 'E-mail', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        $this->form_validation->set_rules('confimar_senha', 'Confirmar Senha', 'matches[senha]');
        $this->form_validation->set_rules('estado_usuario', 'Status', 'required');
        
        $id = $this->input->post('id');

        if ($this->form_validation->run() == False) {
            $_SESSION ['alterar'] = $id;
            $this->session->mark_as_flash('alterar');
            
            
            $this->index();
   
        } else {
            
            
            $nome = $this->input->post('nome_completo');
            $usuario = $this->input->post('user');
            $email = $this->input->post('email');
            $senha = $this->input->post('senha');
            $perfil = $this->input->post('perfil');
            $setor = $this->input->post('setor');
            $status = $this->input->post('estado_usuario');
             $id_publicador = $this->session->userdata('userlogado')->id;
             
            
            if ($this->modelusuarios->alterar_senha($nome,$usuario,$email,$senha,$perfil,$setor,$status,$id)) {
                
                $_SESSION ['alterado'] = '1';
            $this->session->mark_as_flash('alterado');
                
              
                redirect(base_url('admin/usuarios'));
            }
        }
            
            
            
            
            
            
            
            
        }
        
        
        
    }

    

    public function excluir($id){
        
         if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }
        
        
        
        if($this->modelusuarios->excluir($id)){
              $_SESSION ['excluido'] = '1';
            $this->session->mark_as_flash('excluido');
            redirect(base_url('admin/usuarios'));
        }
        
        
    }
    
    
    public function desativar($id){
        if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }
        $status = 0;
        
        if($this->modelusuarios->alterar_status_usuario($id,$status)){
              $_SESSION ['alterado'] = '1';
            $this->session->mark_as_flash('alterado');
            redirect(base_url('admin/usuarios'));
        }
        
    }
    
    public function ativar($id){
        if (!$this->session->userdata('logado')) {
            redirect(base_url('admin/login'));
        }
        $status = 1;
        if($this->modelusuarios->alterar_status_usuario($id,$status)){
              $_SESSION ['alterado'] = '1';
            $this->session->mark_as_flash('alterado');
            redirect(base_url('admin/usuarios'));
        }
        
        
    }

}
