<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Login extends REST_Controller {

    public function index_post()
    {
        $no_induk = $this->post('no_induk');
        $password = $this->post('password');

        $login = $this->db->get_where('login', ['no_induk' => $no_induk])->row_array();
        // var_dump($login);
        // die;

        // Jika User Ada
        if (password_verify($password,$login['password'])){
            $this->response([
                'status' => true,
                'message' => 'Berhasil Login'], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else{
            $this->response([
                'status' => false,
                'message' => 'Gagal Login Y'
            ],REST_Controller::HTTP_NOT_FOUND);// Not Found (404) being the HTTP response code
        }
    }

}

/* End of file Controllername.php */
