<?php

class M_myprofile extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getUserDetail() {
        $this->db->select('*');
        $this->db->from('customer_master');
        $this->db->where('cust_id', $this->session->userdata("cid"));
        $user = $this->db->get();
        if ($user->num_rows() > 0) {
            return $user->row();
        } else {
            return '';
        }
    }

    function updateCustomer($post) {
        $set = array(
            'fullname' => trim($post['full_name']),
            'country' => trim($post['country']),
            'phone' => trim($post['phone'])
        );
        $this->db->update("customer_master", $set, array('cust_id' => $this->session->userdata("cid")));

        if ($_FILES['profile_photo']['name'] != "") {
            $_FILES['profile_photo']['name'] = $_FILES['profile_photo']['name'];
            $_FILES['profile_photo']['type'] = $_FILES['profile_photo']['type'];
            $_FILES['profile_photo']['tmp_name'] = $_FILES['profile_photo']['tmp_name'];
            $_FILES['profile_photo']['error'] = $_FILES['profile_photo']['error'];
            $_FILES['profile_photo']['size'] = $_FILES['profile_photo']['size'];
            $this->load->library('upload');
            $this->upload->initialize($this->set_upload_options());
            $this->upload->do_upload('profile_photo');
            $file_upload_name = $this->upload->data();
            $this->db->update('customer_master', array('profile' => $file_upload_name['file_name']),array('cust_id' => $this->session->userdata("cid")));
        }
        return "1";
    }

    function set_upload_options() {
        $this->load->helper('string');
        $randname = random_string('numeric', '8');
        $config = array();
        $config['upload_path'] = './uploads/users/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;
        $config['file_name'] = "user_" . $randname;
        return $config;
    }

    public function nameById($cid)
    {
        $this->db->select(array('first_name', 'last_name'));
        $this->db->from('customer_master');
        $this->db->where('cust_id', $cid);
        $user = $this->db->get();
        if ($user->num_rows() > 0) {
            return $user->row();
        } else {
            return '';
        }
    }

    public function getAllUsers()
    {
        $query = $this->db->get('customer_master');

        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    public function getProfileById($id)
    {
        $this->db->select('profile');
        $this->db->where('cust_id', $id);
        $query = $this->db->get('customer_master');
        if($query->num_rows() != 0)
        {
            return $query->result()[0]->profile;
        }
        else
        {
            return false;
        }
    }

    public function userDataById($id)
    {
        $this->db->select('*');
        $this->db->where('cust_id', $id);
        $query = $this->db->get('customer_master');
        if($query->num_rows() != 0)
        {
            return $query->result()[0];
        }
        else
        {
            return false;
        }
    }

}
