<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->common->set_timezone();
        $login_type = $this->session->userdata('userType');
        if ($login_type != 'presenter') {
            redirect('presenter/login');
        }
    }

    public function index() {
        $this->load->view('presenter/header');
        $this->load->view('presenter/dashboard');
        $this->load->view('presenter/footer');
    }

}
