<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cms_setting extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
         $this->load->model('madmin/m_cms_setting', 'mcms_setting');
    }

    public function index() {
        $data['cms'] = $this->mcms_setting->getCmsdata();
        $this->load->view('admin/header');
        $this->load->view('admin/cms_setting',$data);
        $this->load->view('admin/footer');
    }
    public function addData()
    {       
        $result =  $this->mcms_setting->addCms();

        if ($result) {
            header('location:' . base_url() . 'admin/cms_setting?msg=S');
        } else {
            header('location:' . base_url() . 'admin/cms_setting?msg=E');
        }
    }
    function delete_cms_setting($cms_id)
    {
    if ($cms_id != "") {
            $this->mcms_setting->delete_cms($cms_id);
            header('location:' . base_url() . 'admin/cms_setting?msg=D');
        } else {
            header('location:' . base_url() . 'admin/cms_setting?msg=E');
        }
    }
    function edit_cms_setting($cms_id) 
    {
        $data['editCms'] = $this->mcms_setting->getCmsDetail($cms_id);
        $data['cms'] = $this->mcms_setting->getCmsdata();
        $this->load->view('admin/header');
        $this->load->view('admin/cms_setting', $data);
        $this->load->view('admin/footer');
    }
    public function updateCms() {
        $result = $this->mcms_setting->updateCms_setting();
        if ($result != "") {
            header('location:' . base_url() . 'admin/cms_setting?msg=U');
        } else {
            header('location:' . base_url() . 'admin/cms_setting?msg=E');
        }
    }

}
?>