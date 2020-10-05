<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model 
{
    public function getKategori($id = null)
    {
        if($id === null){
            return $this->db->get('kategori')->result_array();
        }else{
            return $this->db->get_where('kategori',['id'=>$id])->result_array();    
        }
    }

}

/* End of file ModelName.php */
