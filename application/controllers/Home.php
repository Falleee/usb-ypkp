<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Model Dokumen
        $this->load->model('M_dokumen', 'doku');
    }

    public function index()
    {
        $data['dokumen'] = $this->db->get('dokumen');
        $data['file'] = $this->db->get('tbl_slider')->result_array();
        $this->load->view('_partials/v_header');
        $this->load->view('v_home', $data);
        $this->load->view('_partials/v_footer');
    }
    public function detail($id_dokumen)
    {
        $this->db->where('id_dokumen', $id_dokumen);
        $data['file'] = $this->db->get('tbl_berkas')->result();
        // Mengambil Nama Kategori
        $this->db->select('dokumen.*, kategori.kategori nama_kategori');
        $this->db->where('dokumen.id_dokumen', $id_dokumen);
        $this->db->from('dokumen');
        $this->db->join('kategori', 'kategori.id_kategori = dokumen.id_kategori');
        $data['doku'] = $this->db->get()->row();
        $data['kategori'] = $this->db->get('kategori');


        // $this->db->select('dokumen.* tbl_berkas.foto nama_foto');
        // $this->db->where('dokumen.id_dokumen', $id_dokumen);
        // $this->db->from('dokumen');
        // $this->db->join('tbl_berkas', 'tbl_berkas.id_kategori = dokumen.id_kategori');
        // $data['tbl_berkas'] = $this->db->get('tbl_berkas');

        $this->load->view('_partials/v_header');
        $this->load->view('v_detail', $data);
        $this->load->view('_partials/v_footer');
    }
    public function create()
    {
        $config['upload_path']      = './upload/';
        $config['allowed_types']    = 'png|gif|jpg|jpeg|doc|pdf|xlsx';
        $config['encrypt_name']     = true;
        $config['max_size']         = 5050;

        $this->upload->initialize($config);
        if ($this->upload->do_upload('nama_file')) {
            $data = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/' . $data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['mintain_ratio'] = FALSE;
            $config['quality'] = '50%';
            // $config['x_axis'] = 900;
            // $config['y_axis'] = 900;
            $config['width'] = 900;
            $config['height'] = 900;
            $config['new_image'] = './upload/' . $data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $image_path = "upload/$data[file_name]";
            $data_order['nama_file'] = $image_path;
        }
        $data_order = array(
            'id_kategori' => $this->input->post('kategori'),
            'nama_file' => $image_path,
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi')
        );
        $insert = $this->doku->createDokumen($data_order);
        // Multiple Upload
        $insertId_dokumen = $this->db->insert_id();
        $this->db->reset_query();
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'png|gif|jpg|jpeg|zip|docx|pdf|xlsx|rar';
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
                    $data = array(
                        'id_dokumen' => $insertId_dokumen,
                        'foto' => $uploadData['file_name']
                    );
                    $this->db->insert('tbl_berkas', $data);
                }
            }
        }
        if ($insert > 0) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil Membuat Acara Baru!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('admin/dokumentasi', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                Gagal Upload Acara!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            // redirect('admin/dokumentasi', 'refresh');
            $this->index();
        }

        // $this->doku->createDokumen($data_order);

    }
}

/* End of file Home.php */
