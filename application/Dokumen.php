<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Dokumen extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dokumen','doku');
        $this->load->library('upload');
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            $doku = $this->doku->getDokumen();
        }else {
            $doku = $this->doku->getDokumen($id);
        }

        if ($doku) {
            // Set the respone and exit
            $this->response([
                'status' => true,
                'data' => $doku], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }else {
            //Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Dokumen Id Tidak Ada'
            ],REST_Controller::HTTP_NOT_FOUND);// Not Found (404) being the HTTP response code
        }
    }

    public function index_post()
    {
        // $data = [
        //     'id_kategori' => $this->post('id_kategori'),
        //     'nama_file' => $this->post('nama_file'),
        //     'judul' => $this->post('judul'),
        //     'deskripsi' => $this->post('deskripsi')
        // ];
        $id_kategori = $this->post('id_kategori');
        $nama_file = $this->post('nama_file');
        $judul = $this->post('judul');
        $deskripsi = $this->post('deskripsi');
        
        $config['upload_path']      = './upload/';
        $config['allowed_types']    = 'png|gif|jpg|jpeg';
        $config['encrypt_name']     = true;
        $config['max_size']         = 2050;

        $this->upload->initialize($config);
        if($this->upload->do_upload('nama_file')){
            $data = $this->upload->data();
            $config['image_library']='gd2';
            $config['source_image']='./upload/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['mintain_ratio']= FALSE;
            $config['quality']='50%';
            $config['width']=900;
            $config['height']=900;
            $config['new_image']='./upload/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $image_path = "upload/$data[file_name]";
            $data_order['nama_file'] = $image_path; 
        }
        // else {
        //     $error = $this->upload->display_errors();
        //     $this->response($error,400);
        // }
        $data_order = array(
            'id_kategori' => $id_kategori,
            'nama_file' => $image_path,
            'judul' => $judul,
            'deskripsi' => $deskripsi,

        );
        if ($this->doku->createDokumen($data_order) > 0) {
            $this->response([
                'status' => true,
                'message' => 'Dokumentasi Berhasil Di Unggah'
            ], REST_Controller::HTTP_CREATED);// CREATED (201) being the HTTP response code
        }else {
            $this->response([
                'status' => false,
                'message' => 'Gagal Membuat data baru'
            ], REST_Controller::HTTP_BAD_REQUEST);// Not Found (404) being the HTTP response code
        }
    }
}

/* End of file Controllername.php */
