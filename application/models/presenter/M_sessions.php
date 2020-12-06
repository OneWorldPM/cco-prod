<?php

class M_sessions extends CI_Model {

    function __construct() {
        parent::__construct();
    }
	
	   function getSessionsAll() {
        $this->db->select('*');
        $this->db->from('sessions s');
        $this->db->like('s.presenter_id', $this->session->userdata("pid"));
        $this->db->order_by("s.sessions_date", "asc");
        $this->db->order_by("s.time_slot", "asc");
        $sessions = $this->db->get();
        if ($sessions->num_rows() > 0) {
            $return_array = array();
            foreach ($sessions->result() as $val) {
                $presenter_id_array = explode(",", $val->presenter_id);
                if (in_array($this->session->userdata("pid"), $presenter_id_array)) {
                    $val->presenter = $this->common->get_presenter($val->presenter_id, $val->sessions_id);
                    $return_array[] = $val;
                }
            }
            return $return_array;
        } else {
            return '';
        }
    }

    function getModeratorSessionsAll() {
        $this->db->select('*');
        $this->db->from('sessions s');
        $this->db->like('s.moderator_id', $this->session->userdata("pid"));
        $this->db->order_by("s.sessions_date", "asc");
        $this->db->order_by("s.time_slot", "asc");
        $sessions = $this->db->get();
        if ($sessions->num_rows() > 0) {
            $return_array = array();
            foreach ($sessions->result() as $val) {
                $presenter_id_array = explode(",", $val->moderator_id);
                if (in_array($this->session->userdata("pid"), $presenter_id_array)) {
                    $val->presenter = $this->common->get_presenter($val->presenter_id, $val->sessions_id);
                    $return_array[] = $val;
                }
            }
            return $return_array;
        } else {
            return '';
        }
    }

   
    function edit_sessions($sessions_id) {
        $this->db->select('*');
        $this->db->from('sessions');
        $this->db->where("sessions_id", $sessions_id);
        $sessions = $this->db->get();
        if ($sessions->num_rows() > 0) {
            return $sessions->row();
        } else {
            return '';
        }
    }

    function add_poll_data() {
        $post = $this->input->post();
        $set = array(
            'sessions_id' => trim($post['sessions_id']),
            'poll_type_id' => $post['poll_type_id'],
            'question' => trim($post['question']),
			'slide_number' => trim($post['slide_number']),
            'poll_comparisons_id' => 0,
            "create_poll_date" => date("Y-m-d h:i")
        );
        $this->db->insert("sessions_poll_question", $set);
        $insert_id = $this->db->insert_id();
        if ($insert_id > 0) {
            for ($i = 1; $i <= 10; $i++) {
                if ($post['option_' . $i] != "") {
                    $set_array = array(
                        'sessions_poll_question_id' => $insert_id,
                        'sessions_id' => trim($post['sessions_id']),
                        'option' => $post['option_' . $i],
                        "total_vot" => 0
                    );
                    $this->db->insert("poll_question_option", $set_array);
                }
            }
        }

        if ($post['poll_comparisons_with_us'] != "") {
            $this->add_poll_comparisons($post, $insert_id);
        }
        return TRUE;
    }

    function add_poll_comparisons($post, $insert_id) {
        $set = array(
            'sessions_id' => trim($post['sessions_id']),
            'poll_type_id' => $post['poll_comparisons_with_us'],
            'question' => trim($post['question']),
			'slide_number' => trim($post['slide_number']),
            'poll_comparisons_id' => $insert_id,
            "create_poll_date" => date("Y-m-d h:i")
        );
        $this->db->insert("sessions_poll_question", $set);
        $insert_new_id = $this->db->insert_id();
        if ($insert_new_id > 0) {
            $this->db->update("sessions_poll_question", array("poll_comparisons_id" => $insert_new_id), array("sessions_poll_question_id" => $insert_id));
            for ($i = 1; $i <= 10; $i++) {
                if ($post['option_' . $i] != "") {
                    $set_array = array(
                        'sessions_poll_question_id' => $insert_new_id,
                        'sessions_id' => trim($post['sessions_id']),
                        'option' => $post['option_' . $i],
                        "total_vot" => 0
                    );
                    $this->db->insert("poll_question_option", $set_array);
                }
            }
        }
    }

    function get_poll_details($sessions_id) {
        $this->db->select('*');
        $this->db->from('sessions_poll_question s');
        $this->db->join('poll_type p', 's.poll_type_id=p.poll_type_id');
        $this->db->where("s.sessions_id", $sessions_id);
        $poll_question = $this->db->get();
        if ($poll_question->num_rows() > 0) {
            $poll_question_array = array();
            foreach ($poll_question->result() as $val) {
                $val->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $val->sessions_poll_question_id))->result();
                $poll_question_array[] = $val;
            }
            return $poll_question_array;
        } else {
            return '';
        }
    }

    function deletePollQuestion($sessions_poll_question_id) {
        $this->db->delete("sessions_poll_question", array("sessions_poll_question_id" => $sessions_poll_question_id));
        $this->db->delete("poll_question_option", array("sessions_poll_question_id" => $sessions_poll_question_id));
        return TRUE;
    }

    function editPollQuestion($sessions_poll_question_id) {
        $this->db->select('*');
        $this->db->from('sessions_poll_question');
        $this->db->where("sessions_poll_question_id", $sessions_poll_question_id);
        $poll_question = $this->db->get();
        if ($poll_question->num_rows() > 0) {
            $poll_question_array = $poll_question->row();
            $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
            return $poll_question_array;
        } else {
            return '';
        }
    }

    function update_poll_data() {
        $post = $this->input->post();
        $set = array(
            'question' => trim($post['question']),
			'slide_number' => trim($post['slide_number']),
            'poll_type_id' => $post['poll_type_id']
        );
        $this->db->update("sessions_poll_question", $set, array("sessions_poll_question_id" => $post['sessions_poll_question_id']));
        $option_result = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $post['sessions_poll_question_id']))->result();
        if (isset($option_result) && !empty($option_result)) {
            foreach ($option_result as $key => $val) {
                $key++;
                if ($post['option_' . $key] != "") {
                    $set_array = array(
                        'option' => $post['option_' . $key],
                    );
                    $this->db->update("poll_question_option", $set_array, array("poll_question_option_id" => $val->poll_question_option_id));
                } else {
                    $this->db->delete("poll_question_option", array("poll_question_option_id" => $val->poll_question_option_id));
                }
            }

            $total = 10;
            $edit = sizeof($option_result);
            $edit = $edit + 1;
            for ($i = $edit; $i <= $total; $i++) {
                if ($post['option_' . $i] != "") {
                    $set_array = array(
                        'option' => $post['option_' . $i],
                    );
                    $set_array_int = array(
                        'sessions_poll_question_id' => $post['sessions_poll_question_id'],
                        'sessions_id' => trim($post['sessions_id']),
                        'option' => $post['option_' . $i],
                        "total_vot" => 0
                    );
                    $this->db->insert("poll_question_option", $set_array_int);
                }
            }
        }
        return TRUE;
    }

    function get_question_list() {
        $post = $this->input->post();
        $this->db->select('*');
        $this->db->from('sessions_cust_question s');
        $this->db->join('customer_master c', 's.cust_id=c.cust_id');
        $this->db->where(array("s.sessions_id" => $post['sessions_id'], 'hide_status' => 0));
        $this->db->order_by("s.sessions_cust_question_id", "DESC");
        $result = $this->db->get();
        //print_r($this->db->last_query()); exit;
        $response_array = array();
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $val) {
                $val->favorite_status = $this->common->get_question_favorite_status($this->session->userdata("pid"), $val->sessions_cust_question_id);
                $response_array[] = $val;
            }
            return $response_array;
        } else {
            return '';
        }
    }

    function get_favorite_question_list() {
        $post = $this->input->post();
        $this->db->select('*');
        $this->db->from('tbl_favorite_question fq');
        $this->db->join('sessions_cust_question s', 's.sessions_cust_question_id = fq.sessions_cust_question_id');
        $this->db->join('customer_master c', 's.cust_id=c.cust_id');
        $this->db->where(array("fq.sessions_id" => $post['sessions_id'], 'fq.hide_status' => 0));
        $this->db->group_by('fq.tbl_favorite_question_id');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return '';
        }
    }
    function get_favorite_question_list_one($favorite_question_id) {
        $this->db->select('*');
        $this->db->from('tbl_favorite_question fq');
        $this->db->join('sessions_cust_question s', 's.sessions_cust_question_id = fq.sessions_cust_question_id');
        $this->db->join('customer_master c', 's.cust_id=c.cust_id');
        $this->db->where(array("fq.tbl_favorite_question_id" => $favorite_question_id, 'fq.hide_status' => 0));
        $this->db->group_by('fq.tbl_favorite_question_id');
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return '';
        }
    }

    function addQuestionAnswer() {
        $post = $this->input->post();
        $set = array(
            'answer' => trim($post['q_answer']),
            'answer_by_id' => $this->session->userdata("pid"),
            "answer_status" => 1
        );
        $this->db->update("sessions_cust_question", $set, array("sessions_cust_question_id" => $post['sessions_cust_question_id']));
        return TRUE;
    }

    function view_session($sessions_id) {
        $this->db->select('*');
        $this->db->from('sessions s');
        $this->db->where("sessions_id", $sessions_id);
        $sessions = $this->db->get();
        if ($sessions->num_rows() > 0) {
            $result_sessions = $sessions->row();
            $result_sessions->presenter = $this->common->get_presenter($result_sessions->presenter_id, $result_sessions->sessions_id);
            return $result_sessions;
        } else {
            return '';
        }
    }

    function likeQuestion() {
        $post = $this->input->post();
        $sessions_cust_question_id=$post['sessions_cust_question_id'];
        $insert_array = array(
            'cust_id' => $this->session->userdata("pid"),
            'sessions_id' => $post['sessions_id'],
            'sessions_cust_question_id' => $sessions_cust_question_id
        );
        $favorite_question_row = $this->db->get_where('tbl_favorite_question', $insert_array)->row();
        if (!empty($favorite_question_row)) {
            $this->db->delete("tbl_favorite_question", $insert_array);
        } else {
            $this->db->insert("tbl_favorite_question", $insert_array);
        }
//        var_dump($post['sessions_cust_question_id']);


        $favorite_question_id=$this->db->insert_id();
        $favorite_question="";
        if($favorite_question_id){
            $favorite_question=$this->get_favorite_question_list_one($favorite_question_id);
        }else{
            $favorite_question=$favorite_question_row;
        }
        return array(true,$favorite_question);
    }

    function get_poll_type() {
        $this->db->select('*');
        $this->db->from('poll_type');
        $poll_type = $this->db->get();
        if ($poll_type->num_rows() > 0) {
            return $poll_type->result();
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
                $poll_question_array->poll_status = 1;
                $poll_question_array->exist_status = 1;
                $poll_question_array->select_option_id = 0;
                $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
                return $poll_question_array;
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
                $poll_question_array->poll_status = 1;
                $poll_question_array->exist_status = 1;
                $poll_question_array->select_option_id = 0;
                $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
                return $poll_question_array;
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

    function view_result($sessions_poll_question_id) {
        $this->db->select('*');
        $this->db->from('sessions_poll_question s');
        $this->db->join('poll_type p', 's.poll_type_id=p.poll_type_id');
        $this->db->where(array("s.sessions_poll_question_id" => $sessions_poll_question_id));
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            $poll_question_array = $result->row();
            if ($poll_question_array->poll_comparisons_id == 0) {
                $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
                $poll_question_array->max_value = $this->get_maxvalue_option($poll_question_array->sessions_poll_question_id);
                return $poll_question_array;
            } else {
                $result_compar_poll = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $poll_question_array->poll_comparisons_id))->row();
                if ($result_compar_poll->status == 0) {
                    $poll_question_array->option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $poll_question_array->sessions_poll_question_id))->result();
                    $poll_question_array->max_value = $this->get_maxvalue_option($poll_question_array->sessions_poll_question_id);
                    return $poll_question_array;
                } else {
                    $poll_question_array->option = $this->getOption($poll_question_array->sessions_poll_question_id, $poll_question_array->poll_comparisons_id);
                    $poll_question_array->max_value = $this->get_maxvalue_option($poll_question_array->sessions_poll_question_id);
                    if (!empty($result_compar_poll)) {
                        //  $poll_question_array->compere_poll_type = $this->db->get_where("poll_type", array("poll_type_id" => $result_compar_poll->poll_type_id))->row()->poll_type;
                        //  $poll_question_array->compere_option = $this->db->get_where("poll_question_option", array("sessions_poll_question_id" => $result_compar_poll->sessions_poll_question_id))->result();
                        $poll_question_array->compere_max_value = $this->get_maxvalue_option($result_compar_poll->sessions_poll_question_id);
                    }
                    return $poll_question_array;
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
    
    function importSessionsPoll() {
        $this->load->library('csvimport');
        if ($_FILES['sessions_poll_file']['error'] != 4) {
            $pathMain = FCPATH . "/uploads/csv/";
            $filename = $this->generateRandomString() . '_' . $_FILES['sessions_poll_file']['name'];
            $result = $this->common->do_upload('sessions_poll_file', $pathMain, $filename);
            $file_path = $result['upload_data']['full_path'];
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                if (!empty($csv_array)) {
                    foreach ($csv_array as $val) {
                        if ($val['question'] != "" && $val['poll_type_id'] != "") {
                            $post = $this->input->post();
                            $set = array(
                                'sessions_id' => trim($post['sessions_id']),
                                'poll_type_id' => $val['poll_type_id'],
                                'question' => trim($val['question']),
                                'poll_comparisons_id' => 0,
                                "create_poll_date" => date("Y-m-d h:i")
                            );
                            $this->db->insert("sessions_poll_question", $set);
                            $insert_id = $this->db->insert_id();
                            if ($insert_id > 0) {
                                for ($i = 1; $i <= 10; $i++) {
                                    if ($val['option_' . $i] != "") {
                                        $set_array = array(
                                            'sessions_poll_question_id' => $insert_id,
                                            'sessions_id' => trim($post['sessions_id']),
                                            'option' => $val['option_' . $i],
                                            "total_vot" => 0
                                        );
                                        $this->db->insert("poll_question_option", $set_array);
                                    }
                                }
                            }
                        }
                    }
                }
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
    
    function get_music_setting() {
        $query = $this->db->get_where('music_setting');
        return $query->row();
    }

}
