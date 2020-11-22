 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/Format.php';

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //Load Dependencies
        $this->load->model('M_users', 'usr');
        $this->load->library('upload');
        $this->load->library('form_validation');
        if ($this->session->userdata('islogin') != true) {
            redirect('login');
        }
    }

    // List all your items
    public function index()
    {
        $data['title'] = 'Users';
        $data['login'] = $this->db->get_where('login', ['no_induk' =>
        $this->session->userdata('no_induk')])->row_array();
        $data['user'] = $this->usr->getUsers();
        // $data['user'] = $this->usr->getUsers()->row();
        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/users/user', $data);
        $this->load->view('admin/_partials/footer', $data);
    }

    // Add a new item
    public function add()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_induk', 'Nomer Induk', 'required|is_unique[login.no_induk]', [
            'is_unique' => 'Nomer Induk Ini Telah Ada!'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]', [
            'matches' => 'Password dont match!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            // $data['user'] = $this->usr->getUsers();
            $this->index();
        } else {
            $data_users = array(
                'no_induk' => $this->input->post('no_induk'),
                'nama' => $this->input->post('nama'),
                'password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
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
            redirect('user');
        }
    }

    public function editusers($no_induk)
    {
        $data['title'] = 'Edit Users';
        $data['login'] = $this->db->get_where('login', ['no_induk' =>
        $this->session->userdata('no_induk')])->row_array();
        $this->db->where('no_induk', $no_induk);
        $data['user'] = $this->usr->getUsers($no_induk)->row();
        $this->load->view('admin/_partials/header', $data);
        $this->load->view('admin/_partials/sidebar', $data);
        $this->load->view('admin/users/edit_users', $data);
        $this->load->view('admin/_partials/footer', $data);
    }

    //Update one item
    public function update($no_induk = null)
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
        $this->db->update('login', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Mengubah Data Users!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');

        redirect('user', 'refresh');
    }

    //Delete one item
    public function delete($no_induk = null)
    {
        $this->db->where('no_induk', $no_induk);
        $this->db->delete('login');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil Menghapus Users!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          </div>');

        redirect('user', 'refresh');
    }
}

/* End of file User.php */

