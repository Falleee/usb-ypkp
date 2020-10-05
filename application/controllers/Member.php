<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Member';
        $data['login'] = $this->db->get_where('login',['no_induk' => 
        $this->session->userdata('no_induk')])->row_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar', $data);
        $this->load->view('admin/member');
        $this->load->view('admin/footer');   
    }

}

/* End of file Controllername.php */
