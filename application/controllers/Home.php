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
        $data['dokumen'] = $this->doku->getDokumen();   
        $this->load->view('v_home',$data);
    }
    public function detail($id = null)
    {
        $this->db->where('id',$id);
        $data['dokumen'] = $this->doku->getDokumen();   
        $this->load->view('v_detail',$data);
    }

}

/* End of file Home.php */

