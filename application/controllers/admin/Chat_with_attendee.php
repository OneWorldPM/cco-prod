<?php
class Chat_with_attendee extends CI_Controller {
    function __construct() {
        parent::__construct();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }

        $this->load->model('madmin/m_sessions', 'msessions');
    }

    function index() {

        $data['sessions'] = $this->msessions->getSessionsAll();

        $this->load->view('admin/header');
        $this->load->view('admin/chat_with_attendee', $data);
        $this->load->view('admin/footer');
    }
}
?>
