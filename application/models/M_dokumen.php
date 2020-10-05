<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_dokumen extends CI_Model 
{
    public function createDokumen($data_order)
    {
        $this->db->insert('dokumen', $data_order);
        return $this->db->affected_rows();
    }

    public function getDokumen($id_dokumen)
    {
        // $result = $this->db->get('dokumen');
        // return $result->result_array();
        
        if($id_dokumen === null){
            return $this->db->get('dokumen')->result_array();
        }else{
            return $this->db->get_where('dokumen',['id_dokumen'=>$id_dokumen])->result_array();    
        }
    }

    public function deleteDokumen($id_dokumen)
    {
        $this->db->delete('dokumen',$id_dokumen);
    }
}

/* End of file ModelName.php */
