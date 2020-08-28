<?php
class Music_setting extends CI_Controller {
    function __construct() {
        parent::__construct();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_music_setting', 'music_setting');
    }

    function index() {
        $data['music_setting'] = $this->music_setting->get_music_setting();
        $this->load->view('admin/header');
        $this->load->view('admin/music_setting', $data);
        $this->load->view('admin/footer');
    }

    function update_music_setting() {
        $result = $this->music_setting->update_music_setting();
        header('location:' . site_url() . 'admin/music_setting?msg=U');
    } 
}
?>
