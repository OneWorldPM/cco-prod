<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Push_notifications extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_push_notifications', 'mpushnotifications');
    }

    public function index() {
        $data['push_notifications'] = $this->mpushnotifications->get_push_notifications();
        $this->load->view('admin/header');
        $this->load->view('admin/push_notifications', $data);
        $this->load->view('admin/footer');
    }

    public function add_push_notifications() {
        $post = $this->input->post();
        if (!empty($post)) {
            $res = $this->mpushnotifications->add_push_notifications($post);
            if ($res) {
                header('Location: ' . base_url() . 'admin/push_notifications?msg=S');
            } else {
                header('Location: ' . base_url() . 'admin/push_notifications?msg=E');
            }
        }
    }

    public function delete_push_notifications($pid) {
        $this->db->delete('push_notification_admin', array('push_notification_id' => $pid));
        header('Location: ' . base_url() . 'admin/push_notifications?msg=D');
    }

    public function send_notification($pid) {
        $this->db->update('push_notification_admin', array('status' => 0));
        $this->db->update('push_notification_admin', array('status' => 1), array('push_notification_id' => $pid));
        //  header('Location: ' . base_url() . 'admin/push_notifications?msg=U');
        $result_array = array("status" => "success");
        echo json_encode($result_array);
    }

    public function close_notification($pid) {
        $this->db->update('push_notification_admin', array('status' => 0), array('push_notification_id' => $pid));
        // header('Location: ' . base_url() . 'admin/push_notifications?msg=U');
        $result_array = array("status" => "success");
        echo json_encode($result_array);
    }

}
