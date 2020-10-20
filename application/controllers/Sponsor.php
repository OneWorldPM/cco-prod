<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sponsor extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('userType');
        if ($login_type != 'user') {
            redirect('login');
        }
		 if ($this->session->userdata('cid') != "100028") {
        $get_user_token_details = $this->common->get_user_details($this->session->userdata('cid'));
        if ($this->session->userdata('token') != $get_user_token_details->token) {
            redirect('login');
        }
		 }
        $this->load->model('user/m_sponsor', 'objsponsor');
    }

    public function index() {
        $data["all_sponsor"] = $this->objsponsor->getSponsorData();
        $this->load->view('header');
        $this->load->view('sponsor', $data);
        $this->load->view('footer');
    }

    public function view($sponsor_id) {
        $data["sponsor"] = $this->objsponsor->viewSponsorData($sponsor_id);
        $this->load->view('header');
        $this->load->view('view_sponsor', $data);
        $this->load->view('footer');
    }

}
