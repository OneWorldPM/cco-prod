<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $this->load->model('mobile/m_login', 'objlogin');
        $this->load->model('mobile/m_sessions', 'mobileSession');
    }

    public function index($session_id) {

        $this->session->set_userdata('sess_id', $this->uri->segment(4,0));

        $data['sessions'] = $this->mobileSession->getSessionsData($session_id);

        $this->load->view('mobile/templates/header');
        $this->load->view('mobile/login', $data);
        $this->load->view('mobile/templates/footer');
    }

    public function authentication() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $sess_id = $this->input->post('sess_id');


        if (strlen(trim(preg_replace('/\xb2\xa0/', '', $username))) == 0 || strlen(trim(preg_replace('/\xb2\xa0/', '', $password))) == 0) {
            $this->session->set_flashdata('msg', '<div class="col-md-12 text-red" style="padding: 0 0 10px 0;">Please enter Username or Password</div><br>');
            redirect('mobile/login/index/'.$sess_id);
        } else {
            $arr = array(
                'username' => $username,
                'password' => base64_encode($password)
            );
            $data = $this->objlogin->user_login($username,base64_encode($password));
            if ($data) {
                $token = $this->objlogin->update_user_token($data['cust_id']);
                $session = array(
                    'cid' => $data['cust_id'],
                    'cname' => $data['first_name'],
                    'fullname' => $data['first_name'] . ' ' . $data['last_name'],
                    'email' => $data['email'],
                    'token' => $token,
                    'userType' => 'user',
                    'isMobileUser' => $data['isMobileUser'],
                );
                $this->session->set_userdata($session);
                redirect('mobile/sessions/view/'.$sess_id);
            } else {
                $this->session->set_flashdata('msg', '<div class="col-md-12 text-red" style="padding: 0 0 10px 0;">Username or Password is Wrong.</div><br>');
                redirect('mobile/login/index/'.$sess_id);
            }
        }
    }

    function register_login($cust_id) {
        $data = $this->objlogin->register_login($cust_id);
        if ($data) {
            $token = $this->objlogin->update_user_token($data['cust_id']);
            $session = array(
                'cid' => $data['cust_id'],
                'cname' => $data['first_name'],
                'fullname' => $data['first_name'] . ' ' . $data['last_name'],
                'email' => $data['email'],
                'token' => $token,
                'userType' => 'user'
            );
            $this->session->set_userdata($session);
            redirect('home');
        } else {
            redirect('login');
        }
    }

    function logout() {
        $this->session->unset_userdata('cid');
        $this->session->unset_userdata('cname');
        $this->session->unset_userdata('fullname');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userType');
        header('location:' . base_url() . 'mobile/sessions/id/'.$this->session->userdata('sess_id'));
    }

}
