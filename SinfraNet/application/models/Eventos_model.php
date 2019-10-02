<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eventos_model extends CI_Model {


    public $id;
    public $categoria;
    public $titulo;
    public $subtitulo;
    public $conteudo;
    public $data;
    public $img;
    public $user;
    
    
    public function listar_eventos(){
                
                $this->db->where('publicado',1);
               $this->db->order_by('data_publicacao','DESC');
               $this->db->limit(3);
              return $this->db->get('evento')->result();
    }
    
    public function listar_todos(){
              $this->db->order_by('data_evento','DESC');
              return $this->db->get('evento')->result();
          }
    
        
    public function listar_todos_home(){
              
              $this->db->where('publicado',1);
               $this->db->order_by('data_publicacao','DESC');
              return $this->db->get('evento')->result();
          }
          
          
          public function inserir_evento($titulo, $subtitulo, $conteudo,$caminho_poster,$usuario_criador,$publicar,$autor_noticia,$autor_foto){
              $dados['titulo'] = $titulo;
              $dados['subtitulo'] = $subtitulo;
              $dados['conteudo'] = $conteudo;
              $dados['img'] = $caminho_poster;
              $dados['id_criador_noticia'] = $usuario_criador;
              $dados['autor_noticia'] = $autor_noticia;
              $dados['autor_imagens'] = $autor_foto;
              if($publicar == 1){
                  $dados['publicado'] = $publicar;
                  $dados['id_publicador_noticia'] = $usuario_criador;
                  $dados['data_publicacao'] = 'NOW()';
              }
              
              return $this->db->insert('evento',$dados);
              
              
          }
          
          public function listar_postagem($id){
                            
                   
                    
              $this->db->where('id_evento',$id);
              $teste = $this->db->get('visualizacoes_eventos')->result();
              foreach ($teste as $t){
                  $te = $t->views_evento;
                  $te++;
              }
               $dados['views_evento'] = $te;
               $dados['data_ultima_view'] = 'now()';
              $this->db->where('id_evento',$id);
              $this->db->update('visualizacoes_eventos',$dados);   
                   
             
              
              $this->db->where('id',$id);
              return $this->db->get('evento')->result();
          }
          
         
          
          
          public function buscar_por_id($id){
              $this->db->where('id',$id);
              return $this->db->get('evento')->result();
          }
          
          public function alterar_evento($titulo, $subtitulo, $conteudo, $id,$autor_noticia,$autor_foto){
             
              
              $dados['titulo'] = $titulo;
              $dados['subtitulo'] = $subtitulo;
              $dados['conteudo'] = $conteudo;
              $dados['autor_noticia'] = $autor_noticia;
              $dados['autor_imagens'] = $autor_foto;
              $this->db->where('id',$id);
              return $this->db->update('evento',$dados);
              
              
          }
          
           public function alterar_evento_poster($titulo, $subtitulo, $conteudo, $caminho_poster, $id,$autor_noticia,$autor_foto){
              $dados['titulo'] = $titulo;
              $dados['subtitulo'] = $subtitulo;
              $dados['conteudo'] = $conteudo;
              $dados['img'] = $caminho_poster;
              $dados['autor_noticia'] = $autor_noticia;
              $dados['autor_imagens'] = $autor_foto;
              $this->db->where('id',$id);
              return $this->db->update('evento',$dados);
              
              
          }
          
         public function publicar_evento($id,$publicar,$id_publicador){
           
             $dados['publicado'] = $publicar;
            $dados['id_publicador_noticia'] = $id_publicador;
            $dados['data_publicacao'] = 'NOW()';
            $this->db->where('id',$id);
            return $this->db->update('evento',$dados);



         } 
          
         public function desativar_evento($id, $publicar){
             $dados['publicado'] = $publicar;
             $this->db->where('id',$id);
             return $this->db->update('evento',$dados);
         }
          
        public function excluir($id) {
            
            $this->db->where('id_evento',$id);
            $this->db->delete('visualizacoes_eventos');
            
            $this->db->where('id',$id);
             return $this->db->delete('evento');
            
            
        } 
        
        public function ultimoinserido(){
             $this->db->select('id');
             $this->db->limit(1);
            $this->db->order_by('data_evento','DESC');
            $id = $this->db->get('evento')->result();
            
            
            foreach ($id as $aux){
                 $id_noticia = $aux->id;
            }
           
            $dados['id_evento'] = $id_noticia;
            $dados['views_evento'] = 0;
            $dados['data_ultima_view'] = 'now()';
            $this->db->insert('visualizacoes_eventos',$dados);
        }
        
        
          
         
          
          public function teste($start, $teste){
               $this->db->limit($start, $teste);
               return $this->db->get('noticias')->result();     
          }
    
    
}