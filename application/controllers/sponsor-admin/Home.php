<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $login_type = $this->session->userdata('userType');
        if ($login_type != 'sponsor') {
            redirect('sponsor-admin/login');
        }
        $this->load->model('user/m_sponsor', 'objsponsor');
    }

    public function index()
    {
        $sponsorId = $this->session->userdata()['sponsors_id'];
        $data = $this->objsponsor->viewSponsorData($sponsorId);

        $this->load->view('header');
        $this->load->view('/sponsor/home', $data);
        $this->load->view('footer');
    }

    public function logout()
    {
        $this->session->unset_userdata(array('email', 'userType'));
        redirect('sponsor-admin/login');
    }
}

