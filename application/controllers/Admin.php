<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/Format.php';

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Model Dokumen
        $this->load->model('M_dokumen','doku');
        $this->load->model('M_users','usr');
        $this->load->library('upload');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['login'] = $this->db->get_where('login',['no_induk' => 
        $this->session->userdata('no_induk')])->row_array();
        $data['users'] = $this->db->get('login');
        $data['countuser'] = $this->usr->totalRows('login');
        $data['countfile'] = $this->doku->totalRows('dokumen');
        $this->load->view('admin/_partials/header',$data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/admin');
        $this->load->view('admin/_partials/footer');   
    }

    public function dokumentasi()
    {
        $data['title'] = 'Dokumentasi';
        $data['login'] = $this->db->get_where('login',['no_induk' => 
        $this->session->userdata('no_induk')])->row_array();
        // $data['dokumen'] = $this->db->get('dokumen');
        $this->db->select('dokumen.*, kategori.kategori nama_kategori');
        $this->db->from('dokumen');
        $this->db->join('kategori', 'kategori.id_kategori = dokumen.id_kategori');
        $data['dokumen'] = $this->db->get();
        $data['kategori'] = $this->db->get('kategori');
        
        $this->load->view('admin/_partials/header',$data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/dokumen/dokumentasi',$data);
        $this->load->view('admin/_partials/footer');
    }

    public function edit_dokumentasi($id_dokumen = null)
    {
        $data['title'] = 'Edit Dokumentasi';
        $data['login'] = $this->db->get_where('login',['no_induk' => 
        $this->session->userdata('no_induk')])->row_array();
        $this->load->view('admin/_partials/header',$data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/dokumen/edit_dokumentasi',$data);
        $this->load->view('admin/_partials/footer');

    }

    public function create()
    {   
        $config['upload_path']      = './upload/';
        $config['allowed_types']    = 'png|gif|jpg|jpeg';
        $config['encrypt_name']     = true;
        $config['max_size']         = 5050;

        $this->upload->initialize($config);
        if($this->upload->do_upload('nama_file')){
            $data = $this->upload->data();
            $config['image_library']='gd2';
            $config['source_image']='./upload/'.$data['file_name'];
            $config['create_thumb']= FALSE;
            $config['mintain_ratio']= FALSE;
            $config['quality']='50%';
            $config['x_axis'] = 900;
            $config['y_axis'] = 900;
            // $config['width']=900;
            // $config['height']=900;
            $config['new_image']='./upload/'.$data['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $image_path = "upload/$data[file_name]";
            $data_order['nama_file'] = $image_path; 
            
            $data_order = array(
                'id_kategori' => $this->input->post('kategori'),
                'nama_file' => $image_path,
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi')   
            );
            $insert = $this->doku->createDokumen( $data_order);
            // Multiple Upload
            $insertId_dokumen = $this->db->insert_id();
            $this->db->reset_query();
            $config['upload_path'] = './upload/';
            $config['allowed_types'] = 'png|gif|jpg|jpeg';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);
            $jml_foto = count($_FILES['foto']['name']);
            for ($i=0; $i < $jml_foto ; $i++) 
            { 
                if (!empty($_FILES['foto']['name']['$i'])) {
                    $_FILES['file']['name'] = $_FILES['foto']['name']['$i'];
                    $_FILES['file']['type'] = $_FILES['foto']['type']['$i'];
                    $_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name']['$i'];
                    $_FILES['file']['error'] = $_FILES['foto']['error']['$i'];
                    $_FILES['file']['size'] = $_FILES['foto']['size']['$i'];
                    
                    if ($this->upload->do_upload('file')) 
                    {
                        $uploadData = $this->upload->data();
                        $data = array(
                            'id_dokumen' => $insertId_dokumen,
                            'foto' =>$uploadData['file_name']);
                            $this->db->insert('tbl_berkas',$data);
                    }
                }
            }
            if($insert > 0){
                $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                Berhasil Membuat Acara Baru!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/dokumentasi' , 'refresh');
            }else {
                $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
                Gagal Upload Acara!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/dokumentasi','refresh');
            }

            // $this->doku->createDokumen($data_order);
        }
        
        
        
    }

    public function delete($id_dokumen = null)
    {
        $this->db->where('id_dokumen', $id_dokumen);
        $this->db->delete('dokumen');
        // $this->doku->deleteDokumen($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil Menghapus Acara !<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('admin/dokumentasi','refresh');
        redirect('admin/dokumentasi','refresh');
    }

    public function updatedoku($id_dokumen = null)
    {
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

        $data = array(
            'kategori' => $this->input->post('kategori'),
            'nama_file' => $image_path,
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi')
        );
        // $this->usr->editUser($data);
        $this->db->where('id_dokumen', $id_dokumen);
        $this->db->update('dokumentasi',$data);
        }

        redirect('admin/dokumentasi','refresh');  
    }
    
    public function users()
    {
        $data['title'] = 'Users';
        $data['login'] = $this->db->get_where('login',['no_induk' => 
        $this->session->userdata('no_induk')])->row_array();
        $data['user'] = $this->usr->getUsers();
        $this->load->view('admin/_partials/header',$data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/users/users', $data);  
        $this->load->view('admin/_partials/footer', $data);
         
    }

    public function createusers()
    {
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('no_induk','Nomer Induk','required|is_unique[login.no_induk]',[
            'is_unique' => 'Nomer Induk Ini Telah Ada!'
        ]);
        $this->form_validation->set_rules('role','Role','required|trim');
        $this->form_validation->set_rules('password1','Password','required|trim|matches[password2]',[
            'matches' => 'Password dont match!'
        ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            // $data['user'] = $this->usr->getUsers();
            $this->users();
        }else {
            $data_users = array(
                'no_induk' => $this->input->post('no_induk'),
                'nama' => $this->input->post('nama'),
                'password' => password_hash($this->input->post('password1'),
                PASSWORD_DEFAULT),
                'role' => $this->input->post('role')
            );
            // $this->db->insert('login',$data_users);
            $this->usr->createUsers($data_users);
            // $this->db->insert('dokumen', $data_order);
            $this->session->set_flashdata('message', '<div class="alert alert-primary" role="alert">
            Berhasil Membuat Akun Baru!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('admin/users');   
        }
    }
    public function editusers($no_induk)
    {
        $data['title'] = 'Users';
        $data['login'] = $this->db->get_where('login',['no_induk' => 
        $this->session->userdata('no_induk')])->row_array();
        $this->db->where('no_induk' , $no_induk);
        $data['user'] = $this->usr->getUsers($no_induk);
        $this->load->view('admin/_partials/header',$data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/users/edit_users', $data);  
        $this->load->view('admin/_partials/footer', $data);
    }
    public function updateusers($no_induk = null)
    {
        $data = array(
            'no_induk' => $this->input->post('no_induk'),
            'nama' => $this->input->post('nama'),
            // 'password' => password_hash($this->input->post('password'),
            //     PASSWORD_DEFAULT),
            'role' => $this->input->post('role')
        );
        // $this->usr->editUser($data);
        $this->db->where('no_induk', $no_induk);
        $this->db->update('login',$data);
        redirect('admin/users','refresh');  
    }
    public function deleteusers($no_induk = null)
    {
        $this->db->where('no_induk', $no_induk);
        $this->db->delete('login');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Berhasil Menghapus Users!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');

        redirect('admin/users','refresh');
    }

    
}

/* End of file Controllername.php */