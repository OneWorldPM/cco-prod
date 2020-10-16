<?php

class M_push_notifications extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_push_notifications() {
        $this->db->select('*');
        $this->db->from('push_notification_admin');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return '';
        }
    }

    function add_push_notifications($post) {
        $data = array(
            'message' => $post['message'],
            'notification_date' => date("Y-m-d h:i:s")
        );
        $this->db->insert('push_notification_admin', $data);
        $pid = $this->db->insert_id();
        if ($pid) {
            return $pid;
        } else {
            return '';
        }
    }

}
