<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alogin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $this->load->model('madmin/m_login', 'objlogin');
    }

    public function index() {
        $this->load->view('admin/login');
    }

    public function authentication() {
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        if (strlen(trim(preg_replace('/\xb2\xa0/', '', $username))) == 0 || strlen(trim(preg_replace('/\xb2\xa0/', '', $password))) == 0) {
            $this->session->set_flashdata('msg', '<div class="col-md-12 text-red" style="padding: 0 0 10px 0;">Please enter Username or Password</div><br>');
            redirect('admin/alogin');
        } else {
            $arr = array(
                'username' => $username,
                'password' => $password
            );
            $data = $this->objlogin->user_login($arr);

            if ($data) {
                $session = array(
                    'aid' => $data['admin_id'],
                    'aname' => 'admin',
                    'uname' => $data['username'],
                    'role'  => $data['role']
                );

                $this->session->set_userdata($session);
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('msg', '<div class="col-md-12 text-red" style="padding: 0 0 10px 0;">Username or Password is Wrong.</div><br>');
                redirect('admin/alogin');
            }
        }
    }

    function logout() {
        $session_array = array(
            "aid" => "",
            "aname" => "",
            "uname" => "",
            "role" => ""
        );
        $this->session->unset_userdata($session_array);
        header('location:' . base_url() . 'admin/alogin');
    }

}
