<?php

class M_sessions extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getSessionsData() {
        $this->db->select('*');
        $this->db->from('sessions s');
        // $this->db->join('presenter p', 'p.presenter_id=s.presenter_id');
        $this->db->order_by("s.sessions_date", "asc");
        $this->db->order_by("s.time_slot", "asc");
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

    function getSessionsWeekData() {
        $this->db->select("s.sessions_date,DAYNAME(s.sessions_date) as dayname, s.sessions_date as daydate");
        $this->db->from("sessions s");
        $this->db->where('DATE_FORMAT(s.sessions_date, "%Y-%m-%d") >=', date('Y-m-d'));
        $this->db->where('DATE_FORMAT(s.sessions_date, "%Y-%m-%d") <', date('Y-m-d', strtotime("+7 days")));
        $this->db->group_by('dayname');
        $this->db->order_by("s.sessions_date", "asc");
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return '';
        }
    }

    function getsessions_data($date) {
        $this->db->select('*');
        $this->db->from('sessions s');
        $this->db->where("DATE_FORMAT(s.sessions_date,'%Y-%m-%d') =", date('Y-m-d', strtotime($date)));
        $this->db->order_by("s.sessions_date", "asc");
        $this->db->order_by("s.time_slot", "asc");
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

    function getSessionsSundayData() {
        $this->db->select('*');
        $this->db->from('sessions s');
        // $this->db->join('presenter p', 'p.presenter_id=s.presenter_id');
        $this->db->where("DATE_FORMAT(s.sessions_date,'%Y-%m-%d') =", date('Y-m-d', strtotime('this Sunday')));
        $this->db->order_by("s.sessions_date", "asc");
        $this->db->order_by("s.time_slot", "asc");
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

    function getSessionsMondayData() {
        $this->db->select('*');
        $this->db->from('sessions s');
        // $this->db->join('presenter p', 'p.presenter_id=s.presenter_id');
        $this->db->where("DATE_FORMAT(s.sessions_date,'%Y-%m-%d') =", date('Y-m-d', strtotime('this Monday')));
        $this->db->order_by("s.sessions_date", "asc");
        $this->db->order_by("s.time_slot", "asc");
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

    function get_poll_vot_section() {
        $post = $this->input->post();
        $this->db->select('*');
        $this->db->from('sessions_poll_question');
        $this->db->where(array("sessions_id" => $post['sessions_id']));
        $where = '(status = 1 or status = 2)';
        $this->db->where($where);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            $poll_question_array = $result->row();
            if ($poll_question_array->status == 1) {
                $check_exist_data = $this->db->get_where("tbl_poll_voting", array("cust_id" => $this->session->userdata("cid"), "sessions_id" => $post['sessions_id'], "sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->row();
                $poll_question_array->poll_status = 1;
                if (empty($check_exist_data)) {
                    $poll_question_array->exist_status = 0;
                    $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
                    return $poll_question_array;
                } else {
                    $poll_question_array->exist_status = 1;
                    $poll_question_array->select_option_id = $check_exist_data->poll_question_option_id;
                    $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
                    return $poll_question_array;
                }
            } else if ($poll_question_array->status == 2) {
                if ($poll_question_array->poll_comparisons_id == 0 || $poll_question_array->poll_type_id == 1) {
                    $poll_question_array->poll_status = 2;
                    $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
                    $poll_question_array->max_value = $this->get_maxvalue_option($poll_question_array->sessions_poll_question_id);
                    return $poll_question_array;
                } else {
                    $result_compar_poll = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $poll_question_array->poll_comparisons_id))->row();
                    if ($result_compar_poll->status == 0) {
                        $poll_question_array->poll_status = 2;
                        $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
                        $poll_question_array->max_value = $this->get_maxvalue_option($poll_question_array->sessions_poll_question_id);
                        return $poll_question_array;
                    } else {
                        $poll_question_array->option = $this->getOption($poll_question_array->sessions_poll_question_id, $poll_question_array->poll_comparisons_id);
                        $poll_question_array->poll_status = 2;
                        $poll_question_array->max_value = $this->get_maxvalue_option($poll_question_array->sessions_poll_question_id);
                        if (!empty($result_compar_poll)) {
                            //  $poll_question_array->compere_poll_type = $this->db->get_where("poll_type", array("poll_type_id" => $result_compar_poll->poll_type_id))->row()->poll_type;
                            //  $poll_question_array->compere_option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $result_compar_poll->sessions_poll_question_id))->result();
                            $poll_question_array->compere_max_value = $this->get_maxvalue_option($result_compar_poll->sessions_poll_question_id);
                        }
                        return $poll_question_array;
                    }
                }
            }
        } else {
            return '';
        }
    }

    function getOption($sessions_poll_question_id, $poll_comparisons_id) {

        $this->db->select('*');
        $this->db->from('poll_question_option');
        $this->db->where("sessions_poll_question_id", $sessions_poll_question_id);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            $result_compar_poll = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $poll_comparisons_id))->row();
            $result_array = array();
            foreach ($result->result() as $val) {
                $val->compere_option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $result_compar_poll->sessions_poll_question_id, "option" => $val->option))->row()->total_vot;
                $result_array[] = $val;
            }
            return $result_array;
        } else {
            return '';
        }
    }

    function get_maxvalue_option($sessions_poll_question_id) {
        $this->db->select('MAX(total_vot) as max_total_vot');
        $this->db->from('poll_question_option');
        $this->db->where("sessions_poll_question_id", $sessions_poll_question_id);
        $sessions = $this->db->get();
        if ($sessions->num_rows() > 0) {
            return $sessions->row()->max_total_vot;
        } else {
            return '';
        }
    }

    function get_poll_vot_section_close_poll() {
        $post = $this->input->post();
        $this->db->select('*');
        $this->db->from('sessions_poll_question');
        $this->db->where(array("sessions_id" => $post['sessions_id']));
        $where = '(status = 4)';
        $this->db->where($where);
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            $poll_question_array = $result->row();
            if ($poll_question_array->status == 1) {
                $check_exist_data = $this->db->get_where("tbl_poll_voting", array("cust_id" => $this->session->userdata("cid"), "sessions_id" => $post['sessions_id'], "sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->row();
                $poll_question_array->poll_status = 1;
                if (empty($check_exist_data)) {
                    $poll_question_array->exist_status = 0;
                    $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
                    return $poll_question_array;
                } else {
                    $poll_question_array->exist_status = 1;
                    $poll_question_array->select_option_id = $check_exist_data->poll_question_option_id;
                    $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
                    return $poll_question_array;
                }
            } else if ($poll_question_array->status == 2) {
                $poll_question_array->poll_status = 2;
                $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
                return $poll_question_array;
            } else if ($poll_question_array->status == 4) {
                $poll_question_array->poll_status = 4;
                $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
                return $poll_question_array;
            }
        } else {
            return '';
        }
    }

    function pollVoting() {
        $post = $this->input->post();
        $poll_question_option_data = $this->db->get_where("poll_question_option", array("poll_question_option_id" => $post['poll_question_option_id']))->row();
        if (!empty($poll_question_option_data)) {
            $check_exist_data = $this->db->get_where("tbl_poll_voting", array("cust_id" => $this->session->userdata("cid"), "sessions_id" => $poll_question_option_data->sessions_id, "sessions_poll_question_id" => $poll_question_option_data->sessions_poll_question_id))->row();
            if (empty($check_exist_data)) {
                $voting_value = $poll_question_option_data->total_vot + 1;
                $this->db->update("poll_question_option", array("total_vot" => $voting_value), array("poll_question_option_id" => $poll_question_option_data->poll_question_option_id));
                $set_array = array(
                    "cust_id" => $this->session->userdata("cid"),
                    "sessions_id" => $poll_question_option_data->sessions_id,
                    "sessions_poll_question_id" => $poll_question_option_data->sessions_poll_question_id,
                    "poll_question_option_id" => $post['poll_question_option_id'],
                );
                $this->db->insert("tbl_poll_voting", $set_array);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    function addQuestions() {
        $post = $this->input->post();
        $insert_array = array(
            'cust_id' => $this->session->userdata("cid"),
            'sessions_id' => $post['sessions_id'],
            'question' => $post['questions'],
            'reg_question_date' => date("Y-m-d")
        );
        $this->db->insert("sessions_cust_question", $insert_array);
        $question_id = $this->db->insert_id();
        if ($question_id > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getMyQuestions($session_id) {
        $this->db->select('*');
        $this->db->from('sessions_cust_question');
        $this->db->where(array("cust_id" => $this->session->userdata("cid"), 'sessions_id' => $session_id));
        $questions = $this->db->get();
        if ($questions->num_rows() > 0) {
            return $questions->result_array();
        } else {
            return false;
        }
    }

    function addBriefcase() {
        $post = $this->input->post();
        $insert_array = array(
            'cust_id' => $this->session->userdata("cid"),
            'sessions_id' => $post['sessions_id'],
            'note' => $post['briefcase'],
            'reg_briefcase_date' => date("Y-m-d")
        );
        $result_data = $this->db->get_where("sessions_cust_briefcase", array("cust_id" => $this->session->userdata("cid"), 'sessions_id' => $post['sessions_id']))->row();
        if (empty($result_data)) {
            $this->db->insert("sessions_cust_briefcase", $insert_array);
        } else {
            $this->db->update("sessions_cust_briefcase", $insert_array, array("sessions_cust_briefcase_id" => $result_data->sessions_cust_briefcase_id));
        }
        return TRUE;
    }
	
 function downloadbriefcase($sessions_id) {
	 
        $result_data = $this->db->get_where("sessions_cust_briefcase", array("cust_id" => $this->session->userdata("cid"), 'sessions_id' => $sessions_id))->row()->note;
        return $result_data;
    }
	
	  function get_sessions_notes_download($sessions_id) {
        $this->db->select('*');
        $this->db->from('sessions_cust_briefcase');
        $this->db->where(array("cust_id" => $this->session->userdata("cid"), 'sessions_id' => $sessions_id));
        $sessions_cust = $this->db->get();
        if ($sessions_cust->num_rows() > 0) {
            return $sessions_cust->row()->note;
        } else {
            return '';
        }
    }

    function addresource() {
        $post = $this->input->post();
        $insert_array = array(
            'cust_id' => $this->session->userdata("cid"),
            'sessions_id' => $post['sessions_id'],
            "session_resource_id" => $post['session_resource_id'],
            'reg_briefcase_date' => date("Y-m-d")
        );
        $result_data = $this->db->get_where("sessions_cust_briefcase", array("cust_id" => $this->session->userdata("cid"), 'sessions_id' => $post['sessions_id']))->row();
        if (empty($result_data)) {
            $this->db->insert("sessions_cust_briefcase", $insert_array);
        } else {
            $this->db->update("sessions_cust_briefcase", $insert_array, array("sessions_cust_briefcase_id" => $result_data->sessions_cust_briefcase_id));
        }
        return TRUE;
    }

    function get_question_list() {
        $post = $this->input->post();
        $this->db->select('*');
        $this->db->from('sessions_cust_question s');
        $this->db->join('customer_master c', 's.cust_id=c.cust_id');
        $this->db->where(array("s.sessions_id" => $post['sessions_id'], 'sessions_cust_question_id >' => $post['list_last_id'], "answer_status" => 1));
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return '';
        }
    }

    function get_group_chat_section_status() {
        $post = $this->input->post();
        $this->db->select('*');
        $this->db->from('sessions_group_chat');
        $this->db->where(array("sessions_id" => $post['sessions_id'], "status" => 1));
        $this->db->like("users_id", $this->session->userdata("cid"));
        $sessions = $this->db->get();
        if ($sessions->num_rows() > 0) {
            return $sessions->row();
        } else {
            return "";
        }
    }

    function send_message($post) {
        $sessions_group_chat_row = $this->db->get_where("sessions_group_chat", array("sessions_group_chat_id" => $post['sessions_group_chat_id']))->row();
        $dataarray = array(
            'sessions_group_chat_id' => $post['sessions_group_chat_id'],
            'group_chat_number' => $sessions_group_chat_row->group_chat_number,
            'sessions_id' => $post['sessions_id'],
            'user_id' => $this->session->userdata('cid'),
            'message' => $post['send_message'],
            'message_status' => 'customer',
            'message_date' => date("Y-m-d h:i:s")
        );
        $this->db->insert('sessions_group_chat_msg', $dataarray);
        return TRUE;
    }

    function get_chat_details($sessions_id, $sessions_group_chat_id) {
        $where = array('sgc.sessions_group_chat_id' => $sessions_group_chat_id, 'sgc.sessions_id' => $sessions_id);
        $this->db->select('s.status,s.group_chat_number,s.group_chat_title,sgc.*');
        $this->db->from('sessions_group_chat_msg as sgc');
        $this->db->join('sessions_group_chat as s', 'sgc.sessions_group_chat_id = s.sessions_group_chat_id', 'left');
        $this->db->where($where);
        $this->db->order_by("sgc.sessions_group_chat_msg_id", "desc");
        $result = $this->db->get();
        return ($result->num_rows() > 0) ? $result->result() : '';
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

}
