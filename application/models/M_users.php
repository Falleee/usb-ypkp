<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

    public function getUsers()
    {
        $result = $this->db->get('login');
        return $result;
    }

    public function createUsers($data_users)
    {
        $this->db->insert('login', $data_users);
        return $this->db->affected_rows();
    }

    public function editUser($data)
    {
        $aw = $this->db->insert('login',$data);
        return $aw;
    }
}

/* End of file ModelName.php */
 