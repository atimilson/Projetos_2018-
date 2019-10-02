<?php defined('BASEPATH') OR exit('No direct script access allowed');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends CI_Controller{
    
    public function autenticar(){
        
        $this->load->model("usuarios_model");
        $email = $this->input->post("e-mail");
        $senha = md5($this->input->post("s-enha"));
        $usuario = $this->usuarios_model->buscaProEmailESenha($email, $senha);
        
        if($usuario){
            $this->session->set_userdata("usuario_logado" , $usuario);
            // com array - array("usuario" => $varialvel, "teste" => $variavel2)
             $this->session->set_flashdata("sucess","Logado com sucesso");
            
           
        }else{
             $this->session->set_flashdata("danger","Usuario ou senha incorretos");
        }
        $dados = '';
        $this->load->view("login/autenticar",$dados);
        redirect('/');
    }
    
    
    public function logout(){
        $this->session->unset_userdata("usuario_logado");
        $this->session->set_flashdata("success", "Deslogado com sucesso");
        redirect('/');
    }

}