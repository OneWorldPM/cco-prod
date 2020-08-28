<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/M_sponsor', 'sponsor');
        $login_type = $this->session->userdata('userType');
        if ($login_type == 'sponsor') {
            redirect('sponsor-admin');
        }
    }

    public function index()
    {
        $this->load->view('header');
        $this->load->view('/sponsor/login');
        $this->load->view('footer');
    }

    public function validate()
    {
        $username = $this->input->post('email');
        $password = $this->input->post('password');

        if (strlen(trim(preg_replace('/\xb2\xa0/', '', $username))) == 0 || strlen(trim(preg_replace('/\xb2\xa0/', '', $password))) == 0) {
            $this->session->set_flashdata('msg', '<div class="col-md-12 text-red" style="padding: 0 0 10px 0;">Please enter Username or Password</div><br>');
            redirect('sponsor-admin/login');
        } else {
            $credentials = array(
                'email' => $username,
                'password' => $password
            );
            $data = $this->sponsor->validateLogin($credentials);

            if ($data) {
                $session = array(
                    'sponsors_id' => $data['sponsors_id'],
                    'email' => $data['email'],
                    'twitter_id' => $data['twitter_id'],
                    'sponsors_logo' => $data['sponsors_logo'],
                    'company_name' => $data['company_name'],
                    'about' => $data['about'],
                    'userType' => 'sponsor'
                );
                $this->session->set_userdata($session);
                redirect('sponsor-admin');
            } else {
                $this->session->set_flashdata('msg', '<div class="col-md-12 text-red" style="padding: 0 0 10px 0;">Username or Password is Wrong.</div><br>');
                redirect('sponsor-admin/login');
            }
        }
    }


}

