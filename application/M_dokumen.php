<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokumen extends CI_Model 
{
    public function createDokumen($data_order)
    {
        $this->db->insert('dokumen', $data_order);
        return $this->db->affected_rows();
    }

    public function getDokumen($id = null)
    {
        // $result = $this->db->get('dokumen');
        // return $result;
        if($id === null){
            return $this->db->get('dokumen')->result_array();
        }else{
            return $this->db->get_where('dokumen',['id'=>$id])->result_array();    
        }
    }

    public function deleteDokumen($id)
    {
        $this->db->delete('dokumen',$id);
    }
}

/* End of file ModelName.php */
