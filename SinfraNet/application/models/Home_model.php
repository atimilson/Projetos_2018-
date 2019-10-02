<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
    
    
    
    public function contar_noticias() {

    $result = $this->db->query("select COUNT(id) as num_noticia from noticias");
    return $result->result();


    }
     public function contar_eventos() {

    $result = $this->db->query("select COUNT(id) as num_eventos from evento");
    return $result->result();


    }
    
     public function contar_servicos() {

    $result = $this->db->query("select COUNT(id) as num_servicos from servicos");
    return $result->result();


    }
    
    public function contar_documentos() {

    $result = $this->db->query("select COUNT(id) as num_documentos from repositorio");
    return $result->result();


    }
    
    public function contar_videos() {

    $result = $this->db->query("select COUNT(id) as num_videos from videos");
    return $result->result();


    }
    
    public function contar_audios() {

    $result = $this->db->query("select COUNT(id) as num_audios from audio");
    return $result->result();


    }
    
    public function contar_albuns() {

    $result = $this->db->query("select COUNT(id) as num_albuns from albuns");
    return $result->result();


    }
    
    public function contar_aniversariantes() {

    $result = $this->db->query("select COUNT(id_aniver) as num_aniversarios from aniversario");
    return $result->result();


    }
    
    public function contar_ramais() {

    $result = $this->db->query("select COUNT(id_ramal) as num_ramais from ramal");
    return $result->result();


    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}