<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Other_settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('M_other_settings', 'mSettings');
    }

    public function index(){
        $this->load->view('admin/header');
        $this->load->view('admin/other_settings');
        $this->load->view('admin/footer');
    }

    public function updatePresenterTimezone(){
        echo json_encode($this->mSettings->updatePresenterTimezone());
    }

    public function getPresenterTimezone(){
        echo json_encode($this->mSettings->getPresenterTimezone());
    }
}