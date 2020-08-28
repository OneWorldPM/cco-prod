<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sponsors extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_sponsors', 'msponsors');
    }

    public function index() {
        $data['sponsors'] = $this->msponsors->getSponsorsAll();
        $this->load->view('admin/header');
        $this->load->view('admin/sponsors', $data);
        $this->load->view('admin/footer');
    }

    public function add_sponsors() {
        $this->load->view('admin/header');
        $this->load->view('admin/add_sponsors');
        $this->load->view('admin/footer');
    }

    public function createSponsors() {
        $result = $this->msponsors->createSponsors();
        if ($result != "") {
            header('location:' . base_url() . 'admin/sponsors?msg=S');
        } else {
            header('location:' . base_url() . 'admin/sponsors?msg=E');
        }
    }

    public function edit_sponsors($sponsors_id) {
        $data['sponsors_edit'] = $this->msponsors->edit_sponsors($sponsors_id);
        $this->load->view('admin/header');
        $this->load->view('admin/add_sponsors', $data);
        $this->load->view('admin/footer');
    }

    function delete_sponsors($sponsors_id) {
        if ($sponsors_id != "") {
            $this->msponsors->delete_sponsors($sponsors_id);
            header('location:' . base_url() . 'admin/sponsors?msg=D');
        } else {
            header('location:' . base_url() . 'admin/sponsors?msg=E');
        }
    }

    public function updateSponsors() {
        $result = $this->msponsors->updateSponsors();
        if ($result != "") {
            header('location:' . base_url() . 'admin/sponsors?msg=U');
        } else {
            header('location:' . base_url() . 'admin/sponsors?msg=E');
        }
    }

}
