<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumentasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_dokumen', 'doku');
        $this->load->model('M_kategori', 'ktgr');
        $this->load->library('upload');
        $this->load->library('form_validation');
        if ($this->session->userdata('islogin') != true) {
            redirect('login');
        }
    }

    // List all your items
    public function index()
    {
        // membuat title
        $data['title'] = 'Dokumentasi';
        $data['login'] = $this->db->get_where(
            'login',
            ['no_induk' => $this->session->userdata('no_induk')]
        )->row_array();
        $this->db->select('dokumen.*, kategori.kategori nama_kategori');
        $this->db->from('dokumen');
        $this->db->join('kategori', 'kategori.id_kategori = dokumen.id_kategori');
        $data['dokumen'] = $this->db->get();
        $data['kategori'] = $this->db->get('kategori');

        // Ngeload View
        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/dokumen/dokumentasi', $data);
        $this->load->view('admin/_partials/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Dokumentasi';
        $data['login'] = $this->db->get_where('login', ['no_induk' =>
        $this->session->userdata('no_induk')])->row_array();
        $id = $this->uri->segment(3);
        $this->db->where('id_dokumen', $id);
        $data['doku'] = $this->doku->getDetail($id);
        $this->db->where('id_dokumen',$id);
        $data['berkas'] = $this->db->get('tbl_berkas')->result();
        $this->db->reset_query();
        $data['kategori'] = $this->db->get('kategori');
        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/dokumen/form', $data);
        $this->load->view('admin/_partials/footer');
    }

    public function detail($id_dokumen)
    {
        $data['title'] = 'Detail Dokumentasi';
        $data['login'] = $this->db->get_where('login', ['no_induk' =>
        $this->session->userdata('no_induk')])->row_array();
        
        $this->db->where('id_dokumen', $id_dokumen);
        $data['berkas'] = $this->db->get('tbl_berkas')->result();
        // Untuk Mengambil data dokumen
        $data['doku'] = $this->doku->getDetail($id_dokumen);
        // View
        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/dokumen/detail_dokumentasi', $data);
        $this->load->view('admin/_partials/footer');
    }

    public function add()
    {
        $data['title'] = 'Tambah Acara';
        $data['login'] = $this->db->get_where('login', ['no_induk' =>
        $this->session->userdata('no_induk')])->row_array();
        $data['kategori'] = $this->db->get('kategori');

        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/dokumen/form', $data);
        $this->load->view('admin/_partials/footer');
    }

    // Add a new item
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
            'tema' => $this->input->post('tema'),
            'ketua' => $this->input->post('ketua'),
            'tanggal' => date_format(date_create($this->input->post('tanggal')),'Y-m-d'),
            'deskripsi' => $this->input->post('deskripsi')
        );
        $insert = $this->doku->createDokumen($data_order);
        // Multiple Upload
        $insertId_dokumen = $this->db->insert_id();
        $this->db->reset_query();
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'png|gif|jpg|jpeg|zip|docx|pdf|xlsx|rar';
        $config['encrypt_name'] = FALSE;
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil Membuat Acara Baru!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('dokumentasi', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                Gagal Upload Acara!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            // redirect('admin/dokumentasi', 'refresh');
            $this->index();
        }

        $this->doku->createDokumen($data_order);
    }

    //Update one item
    public function update($id_dokumen)
    {
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
        $data = array(
            'id_kategori' => $this->input->post('kategori'),
            'tema' => $this->input->post('tema'),
            'ketua' => $this->input->post('ketua'),
            'tanggal' => date_format(date_create($this->input->post('tanggal')),'Y-m-d'),
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi')
        );
        $this->db->where('id_dokumen', $id_dokumen);
        $insert = $this->db->update('dokumen', $data);
        $this->db->reset_query();

        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'png|gif|jpg|jpeg|zip|docx|pdf|xlsx|rar';
        $config['encrypt_name'] = FALSE;
        $this->upload->initialize($config);
        $jml_foto = count($_FILES['foto']['name']);
        for ($i = 0; $i < $jml_foto; $i++) {
            if (!empty($_FILES['foto']['name'][$i])) {
                $_FILES['file']['name'] = $_FILES['foto']['name'][$i];
                $_FILES['file']['type'] = $_FILES['foto']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['foto']['error'][$i];
                $_FILES['file']['size'] = $_FILES['foto']['size'][$i];
                // $extensi = end(explode(".", $_FILES['file']['name']));
                if ($this->upload->do_upload('file')) {
                    $uploadData = $this->upload->data();
                    $extensi = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    $data = array(
                        'id_dokumen' => $id_dokumen,
                        'foto' => $uploadData['file_name'],
                        'extension' => $extensi
                    );
                    $this->db->insert('tbl_berkas', $data);
                    // echo $data;
                }
            }
        }
        if ($insert) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil Update Acara Baru!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            redirect('dokumentasi', 'refresh');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                Gagal Update Acara!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
            $this->index();
        }
    }

    //Delete one item
    public function delete($id_dokumen)
    {
        $id_dokumen = $this->uri->segment(3);
        $foto_img = $this->db->get_where('dokumen', array('id_dokumen' => $id_dokumen))->row();
        unlink($foto_img->nama_file);
        $this->db->where('id_dokumen', $id_dokumen);
        // $this->db->delete('tbl_berkas');
        $this->db->delete('dokumen');
        $this->db->reset_query();
        $data = $this->db->get_where('tbl_berkas', array('id_dokumen' => $id_dokumen))->result();
        foreach ($data as $fl) {
            unlink('upload/' . $fl->foto);
        }
        $this->db->where('id_dokumen', $id_dokumen);
        $this->db->delete('tbl_berkas');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Menghapus Acara !<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('dokumentasi', 'refresh');
    }

    public function deletefoto()
    {
        $id = $this->uri->segment(4);
        $foto_img = $this->db->get_where('tbl_berkas', array('id' => $id))->row();
        unlink('upload/' . $foto_img->foto);
        $this->db->where('id', $id);
        $this->db->delete('tbl_berkas');
        redirect($this->uri->segment(1) . '/edit/' . $this->uri->segment(3), 'refresh');
    }
}

/* End of file Dokumentasi.php */
