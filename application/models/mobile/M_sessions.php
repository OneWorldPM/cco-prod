<?php

class M_sessions extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getSessionsData($session_id) {
        $this->db->select('*');
        $this->db->from('sessions s');
        $this->db->where('s.sessions_id', $session_id);
        $sessions = $this->db->get();
        if ($sessions->num_rows() > 0) {
            $return_array = array();
            foreach ($sessions->result() as $val) {
                $val->presenter = $this->common->get_presenter($val->presenter_id, $val->sessions_id);
                $return_array[] = $val;
            }
            return $return_array;
        } else {
            return '';
        }
    }

    function get_session_resource($sessions_id) {
        $this->db->select('*');
        $this->db->from('session_resource');
        $this->db->where('sessions_id', $sessions_id);
        $session_resource = $this->db->get();
        if ($session_resource->num_rows() > 0) {
            return $session_resource->result();
        } else {
            return '';
        }
    }

    function get_music_setting() {
        $query = $this->db->get_where('music_setting');
        return $query->row();
    }

    function viewSessionsData($sessions_id) {
        $this->db->select('*');
        $this->db->from('sessions s');
        $this->db->where("s.sessions_id", $sessions_id);
        $sessions = $this->db->get();
        if ($sessions->num_rows() > 0) {
            $result_sessions = $sessions->row();
            $result_sessions->presenter = $this->common->get_presenter($result_sessions->presenter_id, $result_sessions->sessions_id);
            return $result_sessions;
        } else {
            return '';
        }
    }
}
