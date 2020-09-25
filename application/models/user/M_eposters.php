<?php

class M_eposters extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_eposters_data() {
        $this->db->select('*');
        $this->db->from('eposters e');
        $this->db->order_by("e.assigned_id", "ASC");
        $eposters = $this->db->get();
        if ($eposters->num_rows() > 0) {
            $return_array = array();
            foreach ($eposters->result() as $val) {
                $val->presenter = $this->common->get_presenter_eposters($val->presenter_id);
                $return_array[] = $val;
            }
            return $return_array;
        } else {
            return '';
        }
    }

    function get_eposters_data_filter_search($post) {
        $this->db->select('*');
        $this->db->from('eposters e');
        if ($post['sessions_tracks'] != "" && $post['sessions_tracks'] != "all") {
            $this->db->like("e.sessions_tracks_id", $post['sessions_tracks']);
        }
        if ($post['presenter'] != "" && $post['presenter'] != "all") {
            $this->db->like("e.presenter_id", $post['presenter']);
        }
        if ($post['name_search'] != "") {
            $this->db->like("e.eposters_title", $post['name_search']);
        }
        $this->db->order_by("e.assigned_id", "ASC");
        $eposters = $this->db->get();
        if ($eposters->num_rows() > 0) {
            $return_array = array();
            foreach ($eposters->result() as $val) {
                $val->presenter = $this->common->get_presenter_eposters($val->presenter_id);
                $return_array[] = $val;
            }
            return $return_array;
        } else {
            return '';
        }
    }

    function get_sessions_tracks() {
        $this->db->select('*');
        $this->db->from('sessions_tracks');
        $this->db->where('sessions_tracks <>', "");
        $session_resource = $this->db->get();
        if ($session_resource->num_rows() > 0) {
            return $session_resource->result();
        } else {
            return '';
        }
    }

    function get_presenters() {
        $this->db->select('*');
        $this->db->from('presenter');
        $presenter = $this->db->get();
        if ($presenter->num_rows() > 0) {
            $return_array = array();
            foreach ($presenter->result() as $value) {
                $this->db->select('*');
                $this->db->from('eposters e');
                $this->db->like("e.presenter_id", $value->presenter_id);
                $eposters = $this->db->get();
                if ($eposters->num_rows() > 0) {
                    $return_array[] = $value;
                }
            }
            return $return_array;
        } else {
            return '';
        }
    }

    function viewEpostersData($eposters_id) {
        $this->db->select('*');
        $this->db->from('eposters');
        $this->db->where("eposters_id", $eposters_id);
        $eposters = $this->db->get();
        if ($eposters->num_rows() > 0) {
            $result_sessions = $eposters->row();
            $result_sessions->presenter = $this->common->get_presenter_eposters($result_sessions->presenter_id);
            return $result_sessions;
        } else {
            return '';
        }
    }

    function viewEpostersDataNext($eposters_id) {
        $this->db->select('*');
        $this->db->from('eposters');
        $this->db->where("eposters_id >", $eposters_id);
        $this->db->order_by("eposters_id", "ASC");
        $eposters = $this->db->get();
        if ($eposters->num_rows() > 0) {
            $result_sessions = $eposters->row();
            if (!empty($result_sessions)) {
                $result_sessions->presenter = $this->common->get_presenter_eposters($result_sessions->presenter_id);
                return $result_sessions;
            } else {
                $this->db->select('*');
                $this->db->from('eposters');
                $this->db->where("eposters_id", $eposters_id);
                $eposters = $this->db->get();
                $result_sessions = $eposters->row();
                $result_sessions->presenter = $this->common->get_presenter_eposters($result_sessions->presenter_id);
                return $result_sessions;
            }
        } else {
            $this->db->select('*');
            $this->db->from('eposters');
            $this->db->where("eposters_id", $eposters_id);
            $eposters = $this->db->get();
            $result_sessions = $eposters->row();
            $result_sessions->presenter = $this->common->get_presenter_eposters($result_sessions->presenter_id);
            return $result_sessions;
        }
    }

    function viewEpostersDataPrevious($eposters_id) {
        $this->db->select('*');
        $this->db->from('eposters');
        $this->db->where("eposters_id <", $eposters_id);
        $this->db->order_by("eposters_id", "desc");
        $eposters = $this->db->get();
        if ($eposters->num_rows() > 0) {
            $result_sessions = $eposters->row();
            if (!empty($result_sessions)) {
                $result_sessions->presenter = $this->common->get_presenter_eposters($result_sessions->presenter_id);
                return $result_sessions;
            } else {
                $this->db->select('*');
                $this->db->from('eposters');
                $this->db->where("eposters_id", $eposters_id);
                $eposters = $this->db->get();
                $result_sessions = $eposters->row();
                $result_sessions->presenter = $this->common->get_presenter_eposters($result_sessions->presenter_id);
                return $result_sessions;
            }
        } else {
            $this->db->select('*');
            $this->db->from('eposters');
            $this->db->where("eposters_id", $eposters_id);
            $eposters = $this->db->get();
            $result_sessions = $eposters->row();
            $result_sessions->presenter = $this->common->get_presenter_eposters($result_sessions->presenter_id);
            return $result_sessions;
        }
    }
    
     function addBriefcase() {
        $post = $this->input->post();
        $insert_array = array(
            'cust_id' => $this->session->userdata("cid"),
            'eposters_id' => $post['eposters_id'],
            'note' => $post['briefcase'],
            'reg_briefcase_date' => date("Y-m-d")
        );
        $result_data = $this->db->get_where("eposters_briefcase", array("cust_id" => $this->session->userdata("cid"), 'eposters_id' => $post['eposters_id']))->row();
        if (empty($result_data)) {
            $this->db->insert("eposters_briefcase", $insert_array);
        } else {
            $this->db->update("eposters_briefcase", $insert_array, array("eposters_briefcase_id" => $result_data->eposters_briefcase_id));
        }
        return TRUE;
    }

}
