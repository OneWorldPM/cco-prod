<?php

class M_groupchat extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getUsersData() {
        $this->db->select('*');
        $this->db->from('customer_master');
        $this->db->order_by("cust_id", "desc");
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->result() : '';
    }

    function getPresenterData($sessions_id) {
        $this->db->select('*');
        $this->db->from('sessions s');
        $this->db->where("sessions_id", $sessions_id);
        $sessions = $this->db->get();
        if ($sessions->num_rows() > 0) {
            $result_sessions = $sessions->row();
            $result_sessions->presenter = $this->common->get_presenter_chat_data($result_sessions->presenter_id, $result_sessions->sessions_id);
            return $result_sessions;
        } else {
            return '';
        }
    }
    function getModeratorData($sessions_id) {
        $this->db->select('*');
        $this->db->from('sessions s');
        $this->db->where("sessions_id", $sessions_id);
        $sessions = $this->db->get();
        if ($sessions->num_rows() > 0) {
            $result_sessions = $sessions->row();
            $result_sessions->moderator = $this->common->get_presenter_chat_data($result_sessions->moderator_id, $result_sessions->sessions_id);
            return $result_sessions;
        } else {
            return '';
        }
    }


    function getGroupChatData($sessions_id) {
        $this->db->select('*');
        $this->db->from('sessions_group_chat');
        $this->db->where('sessions_id', $sessions_id);
        $this->db->order_by("sessions_group_chat_id", "desc");
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            $result_array = array();
            foreach ($result->result() as $val) {
                $val->user_list = $this->common->getGroupChatUser($val->users_id);
                $val->presenter_list = $this->common->getGroupChatPresenter($val->presenter_id);
                $result_array[] = $val;
            }
            return $result_array;
        } else {
            return "";
        }
    }

    function addNewGroupChat($post) {
        $user_db = $this->db->get("customer_master")->result();
        $implode_array = array();

        $moderators="";
        if($post["moderators"]){
            $moderators=implode(",",$post["moderators"]);
        }

        foreach ($user_db as $val) {
            $implode_array[] = $val->cust_id;
        }
        if (!empty($implode_array)) {
            $users_id = implode(",", $implode_array);
        } else {
            $users_id = "";
        }
        $presenter_id = implode(",", $post['presenters']);
        $array = array(
            'sessions_id' => $post['sessions_id'],
            'created_by_id' => $this->session->userdata('pid'),
            'users_id' => $users_id,
            'presenter_id' => $presenter_id,
            'moderator_id' => $moderators,
            'group_chat_number' => $post['group_chat_number'],
            'group_chat_title' => $post['chat_title'],
            'status' => 0,
            'group_chat_date' => date("Y-m-d h:i:s")
        );
        $this->db->insert('sessions_group_chat', $array);
        return TRUE;
    }

    function open_chat($sessions_id, $sessions_group_chat_id) {
        $sessions_group_chat_row = $this->db->get_where("sessions_group_chat", array("sessions_id" => $sessions_id, 'status' => 1))->row();
        if (empty($sessions_group_chat_row)) {
            $this->db->update("sessions_group_chat", array("status" => 1), array("sessions_group_chat_id" => $sessions_group_chat_id));
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function close_chat($sessions_id, $sessions_group_chat_id) {
        $this->db->update("sessions_group_chat", array("status" => 2), array("sessions_group_chat_id" => $sessions_group_chat_id));
        return TRUE;
    }

    function get_chat_details($sessions_id, $sessions_group_chat_id) {
        $where = array('sgc.sessions_group_chat_id' => $sessions_group_chat_id, 'sgc.sessions_id' => $sessions_id);
        $this->db->select('s.status,s.group_chat_number,s.group_chat_title,sgc.*');
        $this->db->from('sessions_group_chat_msg as sgc');
        $this->db->join('sessions_group_chat as s', 'sgc.sessions_group_chat_id = s.sessions_group_chat_id', 'left');
        $this->db->where($where);
        $this->db->order_by("sgc.sessions_group_chat_msg_id", "asc");
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->result() : '';
    }

    function get_sessions_group_chat($sessions_group_chat_id) {
        $this->db->select('*');
        $this->db->from('sessions_group_chat');
        $this->db->where("sessions_group_chat_id", $sessions_group_chat_id);
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->row() : '';
    }

    function sendMessage($post) {
        $sessions_group_chat_row = $this->db->get_where("sessions_group_chat", array("sessions_group_chat_id" => $post['sessions_group_chat_id']))->row();
        $dataarray = array(
            'sessions_group_chat_id' => $post['sessions_group_chat_id'],
            'group_chat_number' => $sessions_group_chat_row->group_chat_number,
            'sessions_id' => $post['sessions_id'],
            'user_id' => $this->session->userdata('pid'),
            'message' => $post['message'],
            'message_status' => 'presenter',
            'message_date' => date("Y-m-d h:i:s")
        );
        $this->db->insert('sessions_group_chat_msg', $dataarray);
        return TRUE;
    }

    function get_group_chat_section_status() {
        $post = $this->input->post();
        $this->db->select('*');
        $this->db->from('sessions_group_chat');
        $this->db->group_start();
        $this->db->like('presenter_id', $this->session->userdata("pid"));
        $this->db->or_like('moderator_id', $this->session->userdata("pid"));
        $this->db->group_end();
        $this->db->where(array("sessions_id" => $post['sessions_id'], "status" => 1));



        $sessions = $this->db->get();
        if ($sessions->num_rows() > 0) {
            return $sessions->row();
        } else {
            return "";
        }
    }
	
	function get_group_chat_section_status_moderator() {
        $post = $this->input->post();
        $this->db->select('*');
        $this->db->from('sessions_group_chat');
        $this->db->like('moderator_id', $this->session->userdata("pid"));
        $this->db->where(array("sessions_id" => $post['sessions_id'], "status" => 1));
        $sessions = $this->db->get();
        if ($sessions->num_rows() > 0) {
            return $sessions->row();
        } else {
            return "";
        }
    }

}
