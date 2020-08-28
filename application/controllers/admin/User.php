<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_user', 'muser');
    }

    public function index() {
        $data['user'] = $this->muser->getUserData();
        $this->load->view('admin/header');
        $this->load->view('admin/user', $data);
        $this->load->view('admin/footer');
    }

    public function filter_search() {
        $data['user'] = $this->muser->filter_search();
        $this->load->view('admin/header');
        $this->load->view('admin/users', $data);
        $this->load->view('admin/footer');
    }

    public function editUser($userid) {
        $data['user'] = $this->muser->getUserDetail($userid);
        $this->load->view('admin/header');
        $this->load->view('admin/adduser', $data);
        $this->load->view('admin/footer');
    }

    public function updateCustomer() {
        $post = $this->input->post();
        $result = $this->muser->updateCustomer($post);
        if ($result == "0") {
            header('location:' . base_url() . 'admin/user?msg=A'); //email or phone already Exist
        } else if ($result == "2") {
            header('location:' . base_url() . 'admin/user?msg=E'); //Some Error
        } else {
            header('location:' . base_url() . 'admin/user?msg=U'); //Register Success
        }
    }

    public function deleteuser($userid) {
        $this->db->delete("customer_master", array("cust_id" => $userid));
        header('location:' . base_url() . 'admin/user?msg=D');
    }

    public function user_activity($userid) {
        $data['user_activity'] = $this->muser->get_user_activity($userid);
        $this->load->view('admin/header');
        $this->load->view('admin/user_activity', $data);
        $this->load->view('admin/footer');
    }

}
