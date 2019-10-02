<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content_model extends CI_Model
{
    public function get_all_count()
    {
        $sql = "SELECT COUNT(*) as tol_records FROM noticias";       
        $result = $this->db->query($sql)->row();
        return $result;
    }

    public function get_all_content($start,$content_per_page)
    {
        $sql = "SELECT * FROM  noticias LIMIT $content_per_page OFFSET $start";       
        $result = $this->db->query($sql)->result();
        return $result;
    }
    
}