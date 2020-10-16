<?php

class M_push_notification extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_push_notification_admin() {

        $this->db->select('*');
        $this->db->from('push_notification_admin');
        $this->db->where(array("status" => 1));
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return '';
        }
    }

    function get_push_notification_admin_check_status() {
        $post = $this->input->post();
        $result_chck = $this->db->get_where("push_notification_user_status", array('user_id' => $this->session->userdata("cid"), 'push_notification_id' => $post['push_notification_id']))->row();
        if (empty($result_chck)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function get_push_notification_sponsor() {
        $post = $this->input->post();
        $this->db->select('*');
        $this->db->from('push_notification_sponsor');
        $this->db->where(array("sponsors_id" => $post['sponsor_id']));
        $this->db->where(array("status" => 1));
        $result = $this->db->get();
        if ($result->num_rows() > 0) {

            return $result->row();
        } else {
            return '';
        }
    }

    function push_notification_close() {
        $post = $this->input->post();
        $insert_array = array(
            'user_id' => $this->session->userdata("cid"),
            'push_notification_id' => $post['push_notification_id']
        );
        $result = $this->db->get_where("push_notification_user_status", $insert_array)->row();
        if (empty($result)) {
            $this->db->insert("push_notification_user_status", $insert_array);
        }
        return TRUE;
    }

}
