<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    

    public function index()
    {
        $this->form_validation->set_rules('no_induk','Nomer Induk','trim|required');
        $this->form_validation->set_rules('password','password','required');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/login');
        }else {
            $this->_login();
        }    
    }
    private function _login()
    {
        $no_induk = $this->input->post('no_induk');
        $password = $this->input->post('password');

        $login = $this->db->get_where('login', ['no_induk' => $no_induk])->row_array();
        // var_dump($login);
        // die;

        # Usernya ada
        if ($login) {
            if (password_verify($password, $login['password'])) {
                $data = [
                    'no_induk' => $login['no_induk'],
                    'role' => $login['role']
                ];
                $this->session->set_userdata($data);
                if($login['role'] == 'admin'){
                    redirect('admin');
                }else{
                    redirect('member');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
                redirect('login');    
            }
        }else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Nomer Induk Tidak Ada!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('no_induk');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout!</div>');
            redirect('login');

    }

}

/* End of file Login.php */
