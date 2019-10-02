<?php

//
defined('BASEPATH') OR exit('No direct script access allowed');

class Video extends CI_Controller {

    public function __construct() {

        parent::__construct();
        if(!$this->session->userdata('logado')){
                redirect(base_url('admin/login'));
            }


        $this->load->model('video_model', 'modelvideo');
    }

    public function index() {




        $dados['listar_videos'] = $this->modelvideo->listar_videos();




        $this->load->view('backend/template/html-header', $dados);

        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');



        $this->load->view('backend/videos/listar-videos');

        $this->load->view('backend/template/html-footer');


    }



    public function salvar_publicacao() {

        //carrega a blibioteca
        $this->load->library('form_validation');

        $this->form_validation->set_rules('video', 'URL do Vídeo', 'required');

        if ($this->form_validation->run() == False) {
            $_SESSION ['item'] = "<script>$('#myModal').modal('show')</script>";
            $this->session->mark_as_flash('item');
            $this->index();
        } else {


                    $video = $this->input->post('video');
                    $posicao_principal = $this->input->post('posicao[1]');
                    $posicao_segundaria = $this->input->post('posicao[2]');
                    $publicar = $this->input->post('publicar');




                    $url_video = $video;
                    $posicao = strpos($url_video, "watch?v=");
                    $id_video = substr($url_video, $posicao + 8);





                    $apikey = 'AIzaSyBNqZubSwtdjNz9g_XhIym4qj8vGu9p1E4';
                    $googleApiUrl = 'https://www.googleapis.com/youtube/v3/videos?id=' . $id_video . '&key=' . $apikey . '&part=snippet';
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                    curl_setopt($ch, CURLOPT_VERBOSE, 0);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    $response = curl_exec($ch);
                    curl_close($ch);
                   // var_dump($response);
                    $data = json_decode($response);
                    $value = json_decode(json_encode($data), true);
                    $title = $value['items'][0]['snippet']['title'];

                    $tamb_video = "https://i.ytimg.com/vi/".$id_video."/sddefault.jpg";


                    $preview_video = "https://www.youtube.com/embed/".$id_video;



                    $nome_publicador = $this->session->userdata('userlogado')->nome_completo ;

                    $id_publicador = $this->session->userdata('userlogado')->id ;

                    if($posicao_principal == null){
                      $posicao_principal = 0;
                    }else{
                      $posicao_principal = 1;
                    }

                    if($posicao_segundaria == null){
                      $posicao_segundaria = 0;
                    }else{
                      $posicao_segundaria = 1;
                    }
                    if($publicar == null){
                      $publicar = 0;
                    }else{
                      $publicar = 1;
                    }


                if ($this->modelvideo->inserir_video($video,$id_video,$title,$tamb_video,$preview_video,$nome_publicador,$id_publicador,$posicao_principal,$posicao_segundaria,$publicar)) {
                    $_SESSION['inserido'] = 1;
                    $this -> session -> mark_as_flash ( 'inserido' );
                    redirect(base_url('admin/video'));
                } else {
                    echo 'Houve um erro no sistema!';
                }




        }

    }



    public function alterar() {
      //carrega a blibioteca
      $this->load->library('form_validation');

      $this->form_validation->set_rules('video', 'URL do Vídeo', 'required');
      $id = $this->input->post('id');


      if ($this->form_validation->run() == False) {
          $_SESSION ['alterar'] = $id;
            $this->session->mark_as_flash('alterar');


            $this->index();
      } else {


                  $video = $this->input->post('video');
                  $posicao_principal = $this->input->post('posicao[1]');
                  $posicao_segundaria = $this->input->post('posicao[2]');
                  $publicar = $this->input->post('publicar');




                  $url_video = $video;
                  $posicao = strpos($url_video, "watch?v=");
                  $id_video = substr($url_video, $posicao + 8);





                  $apikey = 'AIzaSyBNqZubSwtdjNz9g_XhIym4qj8vGu9p1E4';
                  $googleApiUrl = 'https://www.googleapis.com/youtube/v3/videos?id=' . $id_video . '&key=' . $apikey . '&part=snippet';
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_HEADER, 0);
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                  curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
                  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                  curl_setopt($ch, CURLOPT_VERBOSE, 0);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                  $response = curl_exec($ch);
                  curl_close($ch);
                 // var_dump($response);
                  $data = json_decode($response);
                  $value = json_decode(json_encode($data), true);
                  $title = $value['items'][0]['snippet']['title'];

                  $tamb_video = "https://i.ytimg.com/vi/".$id_video."/sddefault.jpg";


                  $preview_video = "https://www.youtube.com/embed/".$id_video;



                  $nome_publicador = $this->session->userdata('userlogado')->nome_completo ;

                  $id_publicador = $this->session->userdata('userlogado')->id ;

                  if($posicao_principal == null){
                    $posicao_principal = 0;
                  }else{
                    $posicao_principal = 1;
                  }

                  if($posicao_segundaria == null){
                    $posicao_segundaria = 0;
                  }else{
                    $posicao_segundaria = 1;
                  }
                  if($publicar == null){
                    $publicar = 0;
                  }else{
                    $publicar = 1;
                  }


              if ($this->modelvideo->alterar_video($id,$video,$id_video,$title,$tamb_video,$preview_video,$nome_publicador,$id_publicador,$posicao_principal,$posicao_segundaria,$publicar)) {
                $_SESSION['alterado'] = 1;
                $this -> session -> mark_as_flash ( 'alterado' );
                redirect(base_url('admin/video'));
              } else {
                  echo 'Houve um erro no sistema!';
              }




      }
    }

    public function preview($id) {

        $this->load->model('noticias_model', 'modelnoticias');


        $dados['noticias_todos'] = $this->modelnoticias->buscar_por_id($id);


        $this->load->view('backend/template/html-header');
        $this->load->view('backend/template/menu-lateral');
        $this->load->view('backend/template/menu-central');
        $this->load->view('backend/noticia/preview', $dados);
        $this->load->view('backend/template/html-footer');
    }

    public function publicar($id) {


      //  $id_publicador = $this->session->userdata('userlogado')->id;
        $publicar = 1;

        if ($this->modelvideo->publicar_video($id, $publicar)) {
                $_SESSION['publicar'] = 1;
                $this -> session -> mark_as_flash ( 'publicar' );
            redirect(base_url('admin/video').'#video-'.$id);
        }
    }

    public function desativar($id) {



        $publicar = 0;

        if ($this->modelvideo->desativar_noticia($id, $publicar)) {
                $_SESSION['desativar'] = 1;
                $this -> session -> mark_as_flash ( 'desativar' );
            redirect(base_url('admin/video').'#video-'.$id);
        }



    }

     public function excluir($id) {



       if ($this->modelvideo->excluir($id)) {
            $_SESSION['excluido'] = 1;
            $this -> session -> mark_as_flash ( 'excluido' );
            redirect(base_url('admin/video'));
        }
     }


     public function alterar_posicao(){
         $this->load->library('form_validation');



        $teste = $this->input->post('id');


          $posicao_principal = $this->input->post('check[1]');
          $posicao_segundaria = $this->input->post('check[2]');


                if($posicao_principal == null){
                  $posicao_principal = 0;
                }else{
                  $posicao_principal = 1;
                }

                if($posicao_segundaria == null){
                  $posicao_segundaria = 0;
                }else{
                  $posicao_segundaria = 1;
                }

            if ($this->modelvideo->alterar_posicao($teste,$posicao_principal, $posicao_segundaria)) {
                $_SESSION['mensage'] = 1;
                $this -> session -> mark_as_flash ( 'mensage' );
            redirect(base_url('admin/video'.'#modal-posi-'.$teste));
        }
}
}
