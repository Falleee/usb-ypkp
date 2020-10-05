<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Kategori extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategori','kategori');
        
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $kategori = $this->kategori->getKategori();
        }else {
            $kategori = $this->kategori->getKategori($id);
        }

        if ($kategori) {
            // Set the respone and exit
            $this->response([
                'status' => true,
                'data' => $kategori], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else {
            //Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Kategori Id Tidak Ada'
            ],REST_Controller::HTTP_NOT_FOUND);// Not Found (404) being the HTTP response code
        }
    }

}

/* End of file Controllername.php */
