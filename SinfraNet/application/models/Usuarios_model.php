<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

        public $id;
    public $categoria;
    public $titulo;
    public $subtitulo;
    public $conteudo;
    public $data;
    public $img;
    public $user;

    public function verifica_user($usuario, $senha){
              $this->db->where('usuario',$usuario);
              $this->db->where('senha',$senha);
              $this->db->where('ativo',1);
              return $this->db->get('usuario')->result();
    }

     public function verifica_user_rel($id){
         $this->db->select('usuario.id as id_user ,usuario.*,setor.*, perfil.*');
        $this->db->from('usuario');
        $this->db->join('setor', 'usuario.setor_id = setor.id_setor');
        $this->db->join('perfil', 'usuario.perfil_id = perfil.id');

              $this->db->where('usuario.id',$id);

              return $this->db->get()->result();
    }


    public function listar_usuarios(){

        $this->db->order_by('usuario', 'ASC');
        return $this->db->get('usuario')->result();

    }

    public function listar_usuarios_setor($setor)
    {

        $this->db->select('usuario.*, setor.*, perfil.id as id_per, perfil.nome');
        $this->db->from('usuario');
        $this->db->join('setor', 'usuario.setor_id = setor.id_setor');
        $this->db->join('perfil', 'usuario.perfil_id = perfil.id');
        $this->db->where('usuario.setor_id',$setor);

        $this->db->order_by('usuario.nome_completo', 'ASC');
        return $this->db->get()->result();
    }


    public function listar_perfis(){


        return $this->db->get('perfil')->result();

    }

     public function listar_usuarios_relacao() {
        $this->db->select('usuario.*, setor.*, perfil.id as id_per, perfil.nome');
        $this->db->from('usuario');
        $this->db->join('setor', 'usuario.setor_id = setor.id_setor');
        $this->db->join('perfil', 'usuario.perfil_id = perfil.id');


        $this->db->order_by('usuario.nome_completo', 'ASC');
        return $this->db->get()->result();
    }

    public function inserir($nome,$usuario,$email,$senha,$perfil,$setor,$status){
        $dados['nome_completo'] = $nome;
        $dados['usuario'] = $usuario;
        $dados['email'] = $email;
        $dados['senha'] = md5($senha);
        $dados['perfil_id'] = $perfil;
        $dados['ativo'] = $status;
        $dados['setor_id'] = $setor;

       return $this->db->insert('usuario',$dados);




    }

    public function alterar_status_usuario($id,$status){
        $dados['ativo'] = $status;
        $this->db->where('id',$id);
        return $this->db->update('usuario',$dados);


    }


    public function alterar($nome,$usuario,$email,$perfil,$setor,$status,$id){

        $dados['nome_completo'] = $nome;
        $dados['usuario'] = $usuario;
        $dados['email'] = $email;
        $dados['perfil_id'] = $perfil;
        $dados['ativo'] = $status;
        $dados['setor_id'] = $setor;

        $this->db->where('id',$id);

       return $this->db->update('usuario',$dados);


    }

    public function alterar_senha($nome,$usuario,$email,$senha,$perfil,$setor,$status,$id){



         $dados['nome_completo'] = $nome;
        $dados['usuario'] = $usuario;
        $dados['email'] = $email;
        $dados['senha'] = md5($senha);
        $dados['perfil_id'] = $perfil;
        $dados['ativo'] = $status;
        $dados['setor_id'] = $setor;

        $this->db->where('id',$id);

       return $this->db->update('usuario',$dados);

    }

     public function excluir ($id){

        $this->db->where('id',$id);
        return $this->db->delete('usuario');


    }

}
