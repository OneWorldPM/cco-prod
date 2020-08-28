<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Changepassword extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $login_type = $this->session->userdata('userType');
        if ($login_type != 'user') {
            redirect('login');
        }
    }

    public function index() {
        $this->load->view('user/header');
        $this->load->view('user/changepassword');
        $this->load->view('user/footer');
    }

    public function updatePassword() {
        $post = $this->input->post();

        $oldpassword = $this->getOldPassword();

        if ($oldpassword != '') {
            if ($oldpassword == base64_encode($post['opassword'])) {
                $sql = 'UPDATE customer_master SET password = ? WHERE cust_id = ?';
                $this->db->query($sql, array(base64_encode($post['cpassword']), $this->session->userdata("cid")));
                header('location:' . base_url() . 'user/changepassword?msg=S');
            } else {
                header('location:' . base_url() . 'user/changepassword?msg=NM');
            }
        } else {
            header('location:' . base_url() . 'user/changepassword?msg=E');
        }
    }

    public function getOldPassword() {
        $sql = "SELECT * FROM customer_master WHERE cust_id = ?";
        $result = $this->db->query($sql, $this->session->userdata("cid"));

        return ($result->num_rows() > 0) ? $result->row()->password : '';
    }

}
