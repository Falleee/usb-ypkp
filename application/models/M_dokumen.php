<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_dokumen extends CI_Model
{
    public function createDokumen($data_order)
    {
        $this->db->insert('dokumen', $data_order);
        return $this->db->affected_rows();
    }

    public function getDokumen($id_dokumen = null)
    {
        // $result = $this->db->get('dokumen');
        // return $result->result_array();

        if ($id_dokumen === null) {
            return $this->db->get('dokumen')->result_array();
        } else {
            return $this->db->get_where('dokumen', ['id_dokumen' => $id_dokumen]);
        }
    }

    public function getDokumenapi($id_dokumen = null)
    {
        if ($id_dokumen == null) {
            return $this->db->get('dokumen')->result_array();
        } else {
            $this->db->where('id_dokumen',$id_dokumen);
            $query = $this->db->get('dokumen')->row_array();
            // $cek = $this->db->get_where('tbl_berkas',['id_dokumen'=>$id_dokumen]);
            $this->db->where('id_dokumen',$id_dokumen);
            $this->db->where('extension','png');
            $query = $this->db->get('tbl_berkas')->result();
            // if($cek)
            // {
            // }
            return $query;
        }
    }

    public function deleteDokumen($id_dokumen)
    {
        $this->db->delete('dokumen', $id_dokumen);
    }

    public function totalRows($table)
    {
        return $this->db->count_all_results($table);
    }

    public function getDoku()
    {
        $result = $this->db->get('dokumen');
        return $result;
    }

    public function getDetail($id_dokumen)
    {
        $this->db->where('id_dokumen', $id_dokumen);
        $this->db->select('dokumen.*, kategori.kategori nama_kategori');
        $this->db->where('dokumen.id_dokumen', $id_dokumen);
        $this->db->from('dokumen');
        $this->db->join('kategori', 'kategori.id_kategori = dokumen.id_kategori');
        $data = $this->db->get()->row();
        return $data;
    }
}

/* End of file ModelName.php */
