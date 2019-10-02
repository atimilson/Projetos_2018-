<?php

class Login extends CI_Controller {


    public function logar() {
        $this->load->view('menu');
    }

    public function salvar() {
        $nome = $this->input->post("nome");
        $login = $this->input->post("login");
        $senha = $this->input->post("senha");

          echo "Nome: $nome <br />";
          echo "Login: $login <br />";
          echo "Senha: $senha <br />";
    }

}
