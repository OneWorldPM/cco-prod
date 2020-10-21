<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dummy_user extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_dummy_user', 'mdummyuser');
    }

    public function index() {
        $data['dummy_user'] = $this->mdummyuser->get_dummy_user();
        $this->load->view('admin/header');
        $this->load->view('admin/dummy_user', $data);
        $this->load->view('admin/footer');
    }

    public function add_dummy_user() {
        $post = $this->input->post();
        if (!empty($post)) {
            $res = $this->mdummyuser->add_dummy_user($post);
            if ($res == "exist") {
                header('Location: ' . base_url() . 'admin/dummy_user?msg=EX');
            } else if ($res == "error") {
                header('Location: ' . base_url() . 'admin/dummy_user?msg=E');
            } else {
                  header('Location: ' . base_url() . 'admin/dummy_user?msg=S');
            }
        }
    }

    public function getDummyUserById($cust_id) {
        $q = $this->db->get_where('customer_master', array('cust_id' => $cust_id));
        if ($q->num_rows() > 0) {
            $plan = $q->row();
            $data['msg'] = 'success';
            $data['data'] = $plan;
        } else {
            $data['msg'] = 'error';
            $data['data'] = 'Record not found please try again later!';
        }
        echo json_encode($data);
    }

    public function delete_dummy_user($cust_id) {
        $this->db->delete('customer_master', array('cust_id' => $cust_id));
        header('Location: ' . base_url() . 'admin/dummy_user?msg=D');
    }

}
