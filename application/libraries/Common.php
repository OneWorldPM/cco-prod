<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Common {

    private $_CI;

    function __construct() {
        $this->_CI = & get_instance();
    }

    function set_timezone() {
        date_default_timezone_set("US/Eastern"); //America/Dawson_Creek or Asia/Kolkata or America/Los_Angeles
    }

    function sendEmail($from, $to, $subject, $message, $name = NULL) {
        $from = "admin@yourconference.live";
        $config = Array(
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $this->_CI->load->library('email', $config);
        $this->_CI->email->set_newline("\r\n");
        $this->_CI->email->from($from, $name);
        $this->_CI->email->to($to);
        $this->_CI->email->subject($subject);
        $this->_CI->email->message($message);
        if ($this->_CI->email->send()) {
            return 1;
        } else {
            return 0;
        }
    }

    function get_user_details($cust_id) {
        $this->_CI->db->where('cust_id', trim($cust_id));
        $customer_master = $this->_CI->db->get('customer_master');
        if ($customer_master->num_rows() > 0) {
            return $customer_master->row();
        } else {
            return "";
        }
    }

    function get_presenter_data($presenter_id) {
        $this->_CI->db->where('presenter_id', trim($presenter_id));
        $presenter = $this->_CI->db->get('presenter');
        if ($presenter->num_rows() > 0) {
            return $presenter->row();
        } else {
            return "";
        }
    }

    function getGroupChatUser($users_id) {
        $where_in = explode(",", $users_id);
        $this->_CI->db->select('cust_id,register_id,first_name,last_name');
        $this->_CI->db->from('customer_master');
        $this->_CI->db->where_in('cust_id', $where_in);
        $this->_CI->db->order_by("cust_id", "desc");
        $result = $this->_CI->db->get();
        return ($result->num_rows() > 0) ? $result->result() : '';
    }

    function getGroupChatPresenter($presenter_id) {
        $where_in = explode(",", $presenter_id);
        $this->_CI->db->select('*');
        $this->_CI->db->from('presenter');
        $this->_CI->db->where_in('presenter_id', $where_in);
        $this->_CI->db->order_by("presenter_id", "desc");
        $result = $this->_CI->db->get();
        return ($result->num_rows() > 0) ? $result->result() : '';
    }

    function get_question_favorite_status($presenter_id, $sessions_cust_question_id) {
        $this->_CI->db->where(array('cust_id' => $presenter_id, 'sessions_cust_question_id' => $sessions_cust_question_id));
        $presenter = $this->_CI->db->get('tbl_favorite_question');
        if ($presenter->num_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    function get_session_presenter($sessions_id) {
        $this->_CI->db->select('*');
        $this->_CI->db->from('sessions_add_presenter');
        $this->_CI->db->where_in('sessions_id', $sessions_id);
        $this->_CI->db->order_by("order_index_no", "asc");
        $result = $this->_CI->db->get();
        return ($result->num_rows() > 0) ? $result->result() : '';
    }

    function get_presenter($presenter_id, $sessions_id) {
        $where_in = explode(",", $presenter_id);
        $this->_CI->db->select('p.*');
        $this->_CI->db->from('presenter p');
        $this->_CI->db->join('sessions_add_presenter s', 'p.presenter_id = s.select_presenter_id');
        $this->_CI->db->where_in('p.presenter_id', $where_in);
        $this->_CI->db->where('s.sessions_id', $sessions_id);
        $this->_CI->db->order_by("s.order_index_no", "asc");
        $result = $this->_CI->db->get();
        return ($result->num_rows() > 0) ? $result->result() : '';
    }
	
	 function get_presenter_eposters($presenter_id) {
        $where_in = explode(",", $presenter_id);
        $this->_CI->db->select('p.*');
        $this->_CI->db->from('presenter p');
        $this->_CI->db->where_in('p.presenter_id', $where_in);
        $result = $this->_CI->db->get();
        return ($result->num_rows() > 0) ? $result->result() : '';
    }

    function get_presenter_chat_data($presenter_id) {
        $where_in = explode(",", $presenter_id);
        $this->_CI->db->select('p.*');
        $this->_CI->db->from('presenter p');
        $this->_CI->db->where_in('p.presenter_id', $where_in);
        $result = $this->_CI->db->get();
        return ($result->num_rows() > 0) ? $result->result() : '';
    }

    function get_session_resource($session_resource_id) {
        $this->_CI->db->where('session_resource_id', trim($session_resource_id));
        $session_resource = $this->_CI->db->get('session_resource');
        if ($session_resource->num_rows() > 0) {
            return $session_resource->row();
        } else {
            return "";
        }
    }
    
     function do_upload($htmlFieldName, $path, $filename, $isoverwrite = TRUE) {
        $config['file_name'] = $filename;
        $config['upload_path'] = $path;
        $config['allowed_types'] = '*';
        $config['overwrite'] = $isoverwrite;
        $this->_CI->load->library('upload', $config);
        if (!$this->_CI->upload->do_upload($htmlFieldName)) {
            return array('error' => $this->_CI->upload->display_errors(), 'status' => 0);
        } else {
            return array('status' => 1, 'upload_data' => $this->_CI->upload->data());
        }
    }
    

}
