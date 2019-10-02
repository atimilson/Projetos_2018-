<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias_model extends CI_Model {

    public $id;
    public $categoria;
    public $titulo;
    public $subtitulo;
    public $conteudo;
    public $data;
    public $img;
    public $user;

    public function _construct() {
        parent::_construct();
    }

    public function listar_noticias_carrosel() {
        $this->db->limit(4);
        $this->db->where('publicado', 1);
        $this->db->where('posicao_carrousel', 1);
        $this->db->order_by('data_noticia', 'DESC');
        return $this->db->get('noticias')->result();
    }

    public function listar_noticias_tres() {
        $this->db->limit(3);
        $this->db->where('publicado', 1);
        $this->db->where('posicao_tres', 1);
        $this->db->order_by('data_noticia', 'DESC');
        return $this->db->get('noticias')->result();
    }

     public function listar_noticias_quatro() {
        $this->db->limit(4);
        $this->db->where('publicado', 1);
        $this->db->where('posicao_quadro', 1);
        $this->db->order_by('data_noticia', 'DESC');
        return $this->db->get('noticias')->result();
    }


    public function listar_noticias() {
        $this->db->limit(11);
        $this->db->where('publicado', 1);
        $this->db->order_by('data_noticia', 'DESC');
        return $this->db->get('noticias')->result();
    }

    public function listar_todos() {
        $this->db->order_by('data_noticia', 'DESC');
        return $this->db->get('noticias')->result();
    }


    public function contar()
    {
      $this->db->where('publicado', 1);

      return $this->db->count_all_results('noticias');
    }

    public function listar_todos_home($pular, $post_por_pagina) {

        $this->db->where('publicado', 1);
        $this->db->order_by('data_noticia', 'DESC');

        if ($pular && $post_por_pagina) {
          $this->db->limit($post_por_pagina,$pular);
        }else {
          $this->db->limit(5);
        }
        return $this->db->get('noticias')->result();
    }

    public function inserir_noticia($titulo, $subtitulo, $conteudo, $caminho_poster, $usuario_criador, $publicar, $autor_noticia, $autor_foto, $posicao_carrousel, $posicao_meio, $posicao_bottom) {
        $dados['titulo'] = $titulo;
        $dados['subtitulo'] = $subtitulo;
        $dados['conteudo'] = $conteudo;
        $dados['img'] = $caminho_poster;
        $dados['id_criador_noticia'] = $usuario_criador;
        $dados['autor_imagens'] = $autor_foto;
        $dados['autor_noticia'] = $autor_noticia;
        $dados['posicao_carrousel'] = $posicao_carrousel;
        $dados['posicao_tres'] = $posicao_meio;
        $dados['posicao_quadro'] = $posicao_bottom;
        if ($publicar == 1) {
            $dados['publicado'] = $publicar;
            $dados['id_publicador_noticia'] = $usuario_criador;
            $dados['data_publicacao'] = 'NOW()';
        }

        return $this->db->insert('noticias', $dados);
    }

    public function listar_postagem($id) {



        $this->db->where('id_noticia', $id);
        $teste = $this->db->get('visualizacoes_noti')->result();
        foreach ($teste as $t) {
            $te = $t->views_noticia;
            $te++;
        }
        $dados['views_noticia'] = $te;
        $dados['data_ultima_view'] = 'now()';
        $this->db->where('id_noticia', $id);
        $this->db->update('visualizacoes_noti', $dados);



        $this->db->where('id', $id);
        return $this->db->get('noticias')->result();
    }

    public function buscar_por_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('noticias')->result();
    }

    public function alterar_noticia($titulo, $subtitulo, $conteudo, $id, $autor_noticia, $autor_foto, $posicao_carrousel, $posicao_meio, $posicao_bottom) {


        $dados['titulo'] = $titulo;
        $dados['subtitulo'] = $subtitulo;
        $dados['conteudo'] = $conteudo;
        $dados['autor_imagens'] = $autor_foto;
        $dados['autor_noticia'] = $autor_noticia;
        $dados['posicao_carrousel'] = $posicao_carrousel;
        $dados['posicao_tres'] = $posicao_meio;
        $dados['posicao_quadro'] = $posicao_bottom;

        $this->db->where('id', $id);
        return $this->db->update('noticias', $dados);
    }

    public function alterar_noticia_poster($titulo, $subtitulo, $conteudo, $caminho_poster, $id, $autor_noticia, $autor_foto, $posicao_carrousel, $posicao_meio, $posicao_bottom) {
        $dados['titulo'] = $titulo;
        $dados['subtitulo'] = $subtitulo;
        $dados['conteudo'] = $conteudo;
        $dados['img'] = $caminho_poster;
        $dados['autor_noticia'] = $autor_noticia;
        $dados['autor_imagens'] = $autor_foto;

        $dados['posicao_carrousel'] = $posicao_carrousel;
        $dados['posicao_tres'] = $posicao_meio;
        $dados['posicao_quadro'] = $posicao_bottom;


        $this->db->where('id', $id);

        return $this->db->update('noticias', $dados);
    }

    public function publicar_noticia($id, $publicar, $id_publicador) {

        $dados['publicado'] = $publicar;
        $dados['id_publicador_noticia'] = $id_publicador;
        $dados['data_publicacao'] = 'NOW()';
        $this->db->where('id', $id);
        return $this->db->update('noticias', $dados);
    }

    public function desativar_noticia($id, $publicar) {
        $dados['publicado'] = $publicar;
        $this->db->where('id', $id);
        return $this->db->update('noticias', $dados);
    }

    public function excluir($id) {

        $this->db->where('id_noticia', $id);
        $this->db->delete('visualizacoes_noti');

        $this->db->where('id', $id);
        return $this->db->delete('noticias');
    }

    public function ultimoinserido() {
        $this->db->select('id');
        $this->db->limit(1);
        $this->db->order_by('data_noticia', 'DESC');
        $id = $this->db->get('noticias')->result();


        foreach ($id as $aux) {
            $id_noticia = $aux->id;
        }

        $dados['id_noticia'] = $id_noticia;
        $dados['views_noticia'] = 0;
        $dados['data_ultima_view'] = 'now()';
        $this->db->insert('visualizacoes_noti', $dados);
    }

    public function mais_lidas() {
        $this->db->select('noticias.id, noticias.titulo, noticias.subtitulo, noticias.conteudo, '
                . 'visualizacoes_noti.views_noticia');
        $this->db->from('visualizacoes_noti');
        $this->db->join('noticias', 'noticias.id = visualizacoes_noti.id_noticia');
        $this->db->limit(3);
        $this->db->order_by('visualizacoes_noti.views_noticia', 'DESC');
        return $this->db->get()->result();
    }

    public function teste($start, $teste) {
        $this->db->limit($start, $teste);
        return $this->db->get('noticias')->result();
    }

    public function alterar_posicao($teste, $posicao_carrousel, $posicao_meio, $posicao_bottom) {
        $dados['posicao_carrousel'] = $posicao_carrousel;
        $dados['posicao_tres'] = $posicao_meio;
        $dados['posicao_quadro'] = $posicao_bottom;
        $this->db->where('id', $teste);

        return $this->db->update('noticias', $dados);
    }

    public function listar_id_carrousel()
    {
      $this->db->limit(4);
      $this->db->select('id');
      $this->db->where('posicao_carrousel', 1);
      $this->db->where('publicado', 1);
      $this->db->order_by('data_noticia', 'DESC');
      return $this->db->get('noticias')->result();
    }
    public function listar_id_principal()
    {
      $this->db->limit(3);
      $this->db->select('id');
      $this->db->where('posicao_tres', 1);
      $this->db->where('publicado', 1);;
      $this->db->order_by('data_noticia', 'DESC');
      return $this->db->get('noticias')->result();
    }
    public function listar_id_secundaria()
    {
      $this->db->limit(4);
        $this->db->select('id');
      $this->db->where('posicao_quadro', 1);
      $this->db->where('publicado', 1);
      $this->db->order_by('data_noticia', 'DESC');
      return $this->db->get('noticias')->result();
    }





}
