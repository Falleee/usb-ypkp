<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model 
{
    public function getKategori($id_kategori = null)
    {
        if($id_kategori === null){
            return $this->db->get('kategori')->result_array();
        }else{
            return $this->db->get_where('kategori',['id_kategori'=>$id_kategori])->result_array();    
        }
    }

}

/* End of file ModelName.php */
