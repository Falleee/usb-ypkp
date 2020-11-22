<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . 'libraries/Format.php';

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Load Model Dokumen
        $this->load->model('M_dokumen', 'doku');
        $this->load->model('M_users', 'usr');
        $this->load->library('upload');
        $this->load->library('form_validation');
        if ($this->session->userdata('islogin') != TRUE) {
            redirect('login');
        }
    }

    public function index()
    {

        $data['title'] = 'Dashboard';
        $data['login'] = $this->db->get_where('login', ['no_induk' =>
        $this->session->userdata('no_induk')])->row_array();
        $data['users'] = $this->db->get('login');
        $data['countuser'] = $this->usr->totalRows('login');
        $data['countfile'] = $this->doku->totalRows('dokumen');
        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/admin');
        $this->load->view('admin/_partials/footer');
    }

    public function setting()
    {
        $data['title'] = 'Setting';
        $data['login'] = $this->db->get_where('login', ['no_induk' =>
        $this->session->userdata('no_induk')])->row_array();
        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/admin');
        $this->load->view('admin/_partials/footer');
    }

    // Add a new item
    public function add()
    {
    }

    //Update one item
    public function update()
    {
    }

    //Delete one item
    public function delete()
    {
    }
}

/* End of file Controllername.php */
