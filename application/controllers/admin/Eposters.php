<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Eposters extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_eposters', 'meposters');
    }

    public function index() {
        $data['eposters'] = $this->meposters->getEpostersAll();
        $this->load->view('admin/header');
        $this->load->view('admin/eposters', $data);
        $this->load->view('admin/footer');
    }

    public function add_eposters() {
        $data['presenter'] = $this->meposters->getPresenterDetails();
        $data['session_tracks'] = $this->meposters->getSessionTracks();
        $this->load->view('admin/header');
        $this->load->view('admin/add_eposters', $data);
        $this->load->view('admin/footer');
    }

    public function createEposters() {
        $result = $this->meposters->createEposters();
        if ($result != "") {
            header('location:' . base_url() . 'admin/eposters?msg=S');
        } else {
            header('location:' . base_url() . 'admin/eposters?msg=E');
        }
    }

    public function edit_eposters($eposters_id) {
        $data['eposters_edit'] = $this->meposters->edit_eposters($eposters_id);
        $data['presenter'] = $this->meposters->getPresenterDetails();
        $data['session_tracks'] = $this->meposters->getSessionTracks();
        $this->load->view('admin/header');
        $this->load->view('admin/add_eposters', $data);
        $this->load->view('admin/footer');
    }

    function delete_eposters($eposters_id) {
        if ($eposters_id != "") {
            $this->meposters->delete_eposters($eposters_id);
            header('location:' . base_url() . 'admin/eposters?msg=D');
        } else {
            header('location:' . base_url() . 'admin/eposters?msg=E');
        }
    }

    public function updateEposters() {
        $result = $this->meposters->updateEposters();
        if ($result != "") {
            header('location:' . base_url() . 'admin/eposters?msg=U');
        } else {
            header('location:' . base_url() . 'admin/eposters?msg=E');
        }
    }

    public function view_eposters($eposters_id) {
        $data["eposters"] = $this->meposters->view_eposters($eposters_id);
        $this->load->view('admin/header');
        $this->load->view('admin/view_eposters', $data);
        $this->load->view('admin/footer');
    }

}
