<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berkas extends CI_Controller {
    
    public function index()
    {
        $data['dokumen'] = $this->db->get('dokumen');
        $this->load->view('_partials/v_header');
        $this->load->view('v_berkas',$data);
        $this->load->view('_partials/v_footer');
    }
}

/* End of file Berkas.php */
