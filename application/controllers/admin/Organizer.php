<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Organizer extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
    }

    public function index() {
        $this->load->view('admin/header');
        $this->load->view('admin/organizer');
        $this->load->view('admin/footer');
    }
    
    

}
