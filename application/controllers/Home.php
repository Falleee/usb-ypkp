<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Model Dokumen
        $this->load->model('M_dokumen','doku');
    }

    public function index()    
    { 
        $data['dokumen'] = $this->db->get('dokumen');
        $this->load->view('_partials/v_header');
        $this->load->view('v_home',$data);
        $this->load->view('_partials/v_footer');
    }
    public function detail($id_dokumen)
    {
        $this->db->where('id_dokumen',$id_dokumen);
        // $data['doku'] = $this->doku->getDokumen($id_dokumen)->row();
        // $data['dokumen'] = $this->db->get('dokumen');
        $data['berkas'] = $this->db->get('tbl_berkas',$id_dokumen);
        // Mengambil Nama Kategori
        $this->db->select('dokumen.*, kategori.kategori nama_kategori');        
        $this->db->where('dokumen.id_dokumen', $id_dokumen);
        $this->db->from('dokumen');
        $this->db->join('kategori', 'kategori.id_kategori = dokumen.id_kategori');
        $data['doku'] = $this->db->get()->row();
        $data['kategori'] = $this->db->get('kategori');
        
        
        // $this->db->select('dokumen.* tbl_berkas.foto nama_foto');
        // $this->db->where('dokumen.id_dokumen', $id_dokumen);
        // $this->db->from('dokumen');
        // $this->db->join('tbl_berkas', 'tbl_berkas.id_kategori = dokumen.id_kategori');
        // $data['tbl_berkas'] = $this->db->get('tbl_berkas');
        
        $this->load->view('_partials/v_header');
        $this->load->view('v_detail',$data);
        $this->load->view('_partials/v_footer');
    }

}

/* End of file Home.php */

