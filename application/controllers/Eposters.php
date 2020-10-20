<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Eposters extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        header("Cache-Control: no cache");
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
        $this->load->model('user/m_eposters', 'objeposters');
    }

    public function index() {
        $data["all_eposters"] = $this->objeposters->get_eposters_data();
        $data['sessions_tracks'] = $this->objeposters->get_sessions_tracks();
        $data['presenter'] = $this->objeposters->get_presenters();
        $this->load->view('header');
        $this->load->view('eposters', $data);
        $this->load->view('footer');
    }

    public function filter_search() {
        $post = $this->input->post();
        $data["all_eposters"] = $this->objeposters->get_eposters_data_filter_search($post);
        $data['sessions_tracks'] = $this->objeposters->get_sessions_tracks();
        $data['presenter'] = $this->objeposters->get_presenters();
        $this->load->view('header');
        $this->load->view('eposters', $data);
        $this->load->view('footer');
    }

    public function view($eposters_id) {
        $data["eposters"] = $this->objeposters->viewEpostersData($eposters_id);
        $this->load->view('header');
        $this->load->view('view_eposters', $data);
        $this->load->view('footer');
    }

    public function next($eposters_id) {
        $data["eposters"] = $this->objeposters->viewEpostersDataNext($eposters_id);
        $this->load->view('header');
        $this->load->view('view_eposters', $data);
        $this->load->view('footer');
    }

    public function previous($eposters_id) {
        $data["eposters"] = $this->objeposters->viewEpostersDataPrevious($eposters_id);
        $this->load->view('header');
        $this->load->view('view_eposters', $data);
        $this->load->view('footer');
    }

    public function view_full_screen($eposters_id) {
        $data["eposters"] = $this->objeposters->viewEpostersData($eposters_id);
        $this->load->view('header');
        $this->load->view('view_full_screen', $data);
        $this->load->view('footer');
    }

    public function addBriefcase() {
        $result_data = $this->objeposters->addBriefcase();
        if (!empty($result_data)) {
            $result_array = array("status" => "success");
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

}
