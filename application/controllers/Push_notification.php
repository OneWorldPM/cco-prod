<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Push_notification extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('userType');
        if ($login_type != 'user') {
            redirect('login');
        }
        $this->load->model('user/m_push_notification', 'objpush_notification');
    }

    public function get_push_notification_admin() {
        $result_data = $this->objpush_notification->get_push_notification_admin();
        if (!empty($result_data)) {
            $result_array = array("status" => "success", "result" => $result_data);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function get_push_notification_admin_check_status() {
        $result_data = $this->objpush_notification->get_push_notification_admin_check_status();
        if (!empty($result_data)) {
            $result_array = array("status" => "success");
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function get_push_notification_sponsor() {
        $result_data = $this->objpush_notification->get_push_notification_sponsor();
        if (!empty($result_data)) {
            $result_array = array("status" => "success", "result" => $result_data);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function push_notification_close() {
        $result_data = $this->objpush_notification->push_notification_close();
        $result_array = array("status" => "success");
        echo json_encode($result_array);
    }

}
