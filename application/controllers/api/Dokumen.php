<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Dokumen extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_dokumen', 'doku');
        $this->load->library('upload');
    }

    public function index_get()
    {
        $id_dokumen = $this->get('id_dokumen');
        if ($id_dokumen == null) {
            $data = $this->doku->getDokumenapi();
        } else {
            // $data = $this->doku->getDokumenapi($id_dokumen);
            $this->db->where('id_dokumen', $id_dokumen);
            $doku = $this->db->get('dokumen')->result();
            $this->db->reset_query();
            // $this->db->where('id_dokumen', $id_dokumen);
            $query = $this->db->query("SELECT * FROM tbl_berkas WHERE id_dokumen = $id_dokumen AND extension IN ('png','jpg')");
            
            // $this->db->select('tbl_berkas.*');
            // $this->db->from('tbl_berkas');
            // $this->db->where('id_dokumen', $id_dokumen);
            // $this->db->where('extension','jpg');
            // $this->db->or_where_in('extension','png');
            // // $this->db->where_in('extension','jpg');
            // $query = $this->db->get()->result();
            $doku1 = $query->result();
        }

        if ($doku) {
            // Set the respone and exit
            $this->response([
                'status' => true,
                'data' => $doku, $doku1
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            //Set the response and exit
            $this->response([
                'status' => false,
                'message' => 'Dokumen id Tidak Ada'
            ], REST_Controller::HTTP_NOT_FOUND); // Not Found (404) being the HTTP response code
        }
    }

    public function index_post()
    {
        $id_kategori = $this->post('id_kategori');
        $nama_file = $this->post('nama_file');
        $judul = $this->post('judul');
        $tema = $this->post('tema');
        $ketua = $this->post('ketua');
        $tanggal = $this->post('tanggal');
        $deskripsi = $this->post('deskripsi');

        $config['upload_path']      = './upload/';
        $config['allowed_types']    = 'png|gif|jpg|jpeg';
        $config['encrypt_name']     = true;
        $config['max_size']         = 2050;

        $this->upload->initialize($config);
        if ($this->upload->do_upload('nama_file')) {
            $data = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/' . $data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['mintain_ratio'] = FALSE;
            $config['quality'] = '50%';
            $config['width'] = 900;
            $config['height'] = 900;
            $config['new_image'] = './upload/' . $data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $image_path = "upload/$data[file_name]";
            $data_order['nama_file'] = $image_path;
        }

        $data_order = array(
            'id_kategori' => $id_kategori,
            'nama_file' => $image_path,
            'judul' => $judul,
            'tema' => $tema,
            'ketua' => $ketua,
            'tanggal' => $tanggal,
            'deskripsi' => $deskripsi
        );
        $insert = $this->doku->createDokumen($data_order);
        $insertId_dokumen = $this->db->insert_id();
        $this->db->reset_query();
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'png|gif|jpg|jpeg';
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        $jml_foto = count($_FILES['foto']['name']);
        for ($i = 0; $i < $jml_foto; $i++) {
            if (!empty($_FILES['foto']['name'][$i])) {

                $_FILES['file']['name'] = $_FILES['foto']['name'][$i];
                $_FILES['file']['type'] = $_FILES['foto']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['foto']['error'][$i];
                $_FILES['file']['size'] = $_FILES['foto']['size'][$i];

                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $extensi = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $data = array(
                        'id_dokumen' => $insertId_dokumen,
                        'foto' => $uploadData['file_name'],
                        'extension' => $extensi
                    );
                    $this->db->insert('tbl_berkas', $data);
                }
            }
        }
        if ($insert > 0) {
            $this->response([
                'status' => true,
                'message' => 'Dokumentasi Berhasil Di Unggah'
            ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal Membuat data baru'
            ], REST_Controller::HTTP_BAD_REQUEST); // Not Found (404) being the HTTP response code
        }
    }

    public function update_post()
    {
        $id_dokumen = $this->post('id_dokumen');

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'png|gif|jpg|jpeg';
        $config['encrypt_name'] = TRUE;
        $this->upload->initialize($config);
        $jml_foto = count($_FILES['foto']['name']);
        for ($i = 0; $i < $jml_foto; $i++) {
            if (!empty($_FILES['foto']['name'][$i])) {

                $_FILES['file']['name'] = $_FILES['foto']['name'][$i];
                $_FILES['file']['type'] = $_FILES['foto']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['foto']['error'][$i];
                $_FILES['file']['size'] = $_FILES['foto']['size'][$i];

                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $extensi = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $data = array(
                        'id_dokumen' => $id_dokumen,
                        'foto' => $uploadData['file_name'],
                        'extension' => $extensi
                    );
                    $this->db->where('id_dokumen', $id_dokumen);
                    $insert = $this->db->insert('tbl_berkas', $data);
                }
            }
        }
        if ($insert > 0) {
            $this->response([
                'status' => true,
                'message' => 'Dokumentasi Berhasil Di Unggah'
            ], REST_Controller::HTTP_CREATED); // CREATED (201) being the HTTP response code
        } else {
            $this->response([
                'status' => false,
                'message' => 'Gagal Membuat data baru'
            ], REST_Controller::HTTP_BAD_REQUEST); // Not Found (404) being the HTTP response code
        }
    }
}

/* End of file Controllername.php */
