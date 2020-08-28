<?php

class Sessions_configurations extends CI_Controller {

    function __construct() {
        parent::__construct();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_sessions_configurations', 'msessionsconfigurations');
    }

    function index() {
        $data['session_types'] = $this->msessionsconfigurations->getSessionTypes();
        $data['session_tracks'] = $this->msessionsconfigurations->getSessionTracks();
        $this->load->view('admin/header');
        $this->load->view('admin/sessions_configurations', $data);
        $this->load->view('admin/footer');
    }

    function add_configurations() {
        $post = $this->input->post();
        if (!empty($post)) {
            $res = $this->msessionsconfigurations->add_configurations($post);
            if ($res) {
                header('Location: ' . base_url() . 'admin/sessions_configurations?msg=S');
            } else {
                header('Location: ' . base_url() . 'admin/sessions_configurations?msg=E');
            }
        }
    }

}

?>
