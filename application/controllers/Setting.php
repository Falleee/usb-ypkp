<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->library('upload');
        if ($this->session->userdata('islogin') != true) {
            redirect('login');
        }
    }

    // List all your items
    public function index()
    {
        $data['title'] = 'Setting';
        $data['login'] = $this->db->get_where('login', ['no_induk' =>
        $this->session->userdata('no_induk')])->row_array();
        $data['kategori'] = $this->db->get('kategori');
        $data['slide'] = $this->db->get('tbl_slider')->result();
        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/setting/setting', $data);
        $this->load->view('admin/_partials/footer', $data);
    }

    // Add a new item
    public function add()
    {
        $data['title'] = 'Setting';
        $data['login'] = $this->db->get_where('login', ['no_induk' =>
        $this->session->userdata('no_induk')])->row_array();
        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/setting/add', $data);
        $this->load->view('admin/_partials/footer', $data);
    }
    public function add_slider()
    {
        $config['upload_path']      = './upload/';
        $config['allowed_types']    = 'png|gif|jpg|jpeg|doc|pdf|xlsx';
        $config['encrypt_name']     = true;
        $config['max_size']         = 5050;

        $this->upload->initialize($config);
        if ($this->upload->do_upload('file')) {
            $data = $this->upload->data();
            $config['image_library'] = 'gd2';
            $config['source_image'] = './upload/' . $data['file_name'];
            $config['create_thumb'] = FALSE;
            $config['mintain_ratio'] = FALSE;
            $config['quality'] = '70%';
            // $config['width'] = 900;
            // $config['height'] = 900;
            $config['new_image'] = './upload/' . $data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $image_path = "upload/$data[file_name]";
            $data_order['file'] = $image_path;

            // echo $data;
        }
        $data = array(
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'file' => $image_path
        );
        $this->db->insert('tbl_slider', $data);
        $this->index();
        // echo $data;
    }

    public function edit()
    {
        $data['title'] = 'Setting';
        $data['login'] = $this->db->get_where('login', ['no_induk' =>
        $this->session->userdata('no_induk')])->row_array();
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $data['data'] = $this->db->get('tbl_slider')->row();
        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/setting/add', $data);
        $this->load->view('admin/_partials/footer', $data);
    }

    //Update one item
    public function update()
    {
        $id = $this->input->post('id');
        $data = array(
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('judul')
        );
        $this->db->where('id',$id);
        $this->db->update('tbl_slider', $data);
		// redirect('setting/edit/'.$id);
    }
    
    //Delete one item
    public function delete($id)
    {
        $id = $this->uri->segment(3);
        $foto_img = $this->db->get_where('tbl_slider',array('id' => $id))->row();
        unlink($foto_img->file);
        $this->db->where('id',$id);
        $this->db->delete('tbl_slider');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Menghapus Acara !<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('setting','refresh');
    }
    
    public function add_kategori()
    {
        $data = array(
            'kategori' => $this->input->post('kategori')
        );
        $this->db->insert('kategori', $data);
        redirect('setting', 'refresh');
    }
    // Menghapus Kategori 
    public function delete_kategori($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Menghapus Kategori!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');
        redirect('setting', 'refresh');
    }
}

/* End of file Setting.php */
