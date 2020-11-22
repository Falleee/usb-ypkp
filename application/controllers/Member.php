<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        if ($this->session->userdata('islogin') != true) {
            redirect('login');
        }
    }
    

    public function index()
    {
        $data['title'] = 'Member';
        $data['login'] = $this->db->get_where('login',['no_induk' => 
        $this->session->userdata('no_induk')])->row_array();
        $this->load->view('admin/_partials/header',$data);
        $this->load->view('admin/_partials/sidebarm', $data);
        $this->load->view('admin/member');
        $this->load->view('admin/_partials/footer');   
    }

}

/* End of file Controllername.php */
