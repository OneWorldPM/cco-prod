<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->common->set_timezone();
        $this->load->model('presenter/m_login', 'objlogin');
    }

    public function index() {
        $this->load->view('presenter/login');
    }

    public function authentication() {
        $username = $this->input->post('email');
        $password = $this->input->post('password');
        if (strlen(trim(preg_replace('/\xb2\xa0/', '', $username))) == 0 || strlen(trim(preg_replace('/\xb2\xa0/', '', $password))) == 0) {
            $this->session->set_flashdata('msg', '<div class="col-md-12 text-red" style="padding: 0 0 10px 0;">Please enter Username or Password</div><br>');
            redirect('presenter/login');
        } else {
            $arr = array(
                'email' => $username,
                'password' => $password
            );
            $data = $this->objlogin->user_login($arr);
            if ($data) {
                $session = array(
                    'pid' => $data['presenter_id'],
                    'pname' => $data['presenter_name'],
                    'email' => $data['email'],
                    'userType' => 'presenter'
                );

                $this->session->set_userdata($session);
                redirect('presenter/sessions');
            } else {
                $this->session->set_flashdata('msg', '<div class="col-md-12 text-red" style="padding: 0 0 10px 0;">Username or Password is Wrong.</div><br>');
                redirect('presenter/login');
            }
        }
    }

    function logout() {
        $this->session->unset_userdata('pid');
        $this->session->unset_userdata('pname');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('userType');
        redirect('presenter/login');
    }

}
