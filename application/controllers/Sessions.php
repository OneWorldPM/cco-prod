<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sessions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('userType');
        if ($login_type != 'user') {
            redirect('login');
        }
        $get_user_token_details = $this->common->get_user_details($this->session->userdata('cid'));
        if ($this->session->userdata('token') != $get_user_token_details->token) {
            redirect('login');
        }
        $this->load->model('user/m_sessions', 'objsessions');
    }

    public function index() {
        $data["all_sessions_week"] = $this->objsessions->getSessionsWeekData();
        if (!empty($data["all_sessions_week"])) {
            $data["all_sessions"] = $this->objsessions->getsessions_data($data["all_sessions_week"][0]->sessions_date);
        }
        $this->load->view('header');
        $this->load->view('sessions', $data);
        $this->load->view('footer');
    }

    public function getsessions_data($date) {
        $data["all_sessions_week"] = $this->objsessions->getSessionsWeekData();
        $data["all_sessions"] = $this->objsessions->getsessions_data($date);
        $this->load->view('header');
        $this->load->view('sessions', $data);
        $this->load->view('footer');
    }

    public function sunday() {
        $data["all_sessions"] = $this->objsessions->getSessionsSundayData();
        $this->load->view('header');
        $this->load->view('sessions', $data);
        $this->load->view('footer');
    }

    public function monday() {
        $data["all_sessions"] = $this->objsessions->getSessionsMondayData();

        $this->load->view('header');
        $this->load->view('sessions', $data);
        $this->load->view('footer');
    }

    public function view($sessions_id) {
        $data["sessions"] = $this->objsessions->viewSessionsData($sessions_id);
        $data["session_resource"] = $this->objsessions->get_session_resource($sessions_id);
        $data['music_setting'] = $this->objsessions->get_music_setting();

        $this->load->view('header');
        $this->load->view('view_sessions', $data);
        $this->load->view('footer');
    }

    public function get_poll_vot_section() {
        $result_data = $this->objsessions->get_poll_vot_section();
        if (!empty($result_data)) {
            $result_array = array("status" => "success", "result" => $result_data);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function pollVoting() {
        $result_data = $this->objsessions->pollVoting();
        if (!empty($result_data)) {
            $result_array = array("status" => "success");
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function addQuestions() {
        $result_data = $this->objsessions->addQuestions();
        if (!empty($result_data)) {
            $result_array = array("status" => "success");
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function addBriefcase() {
        $result_data = $this->objsessions->addBriefcase();
        if (!empty($result_data)) {
            $result_array = array("status" => "success");
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function addresource() {
        $result_data = $this->objsessions->addresource();
        if (!empty($result_data)) {
            $result_array = array("status" => "success");
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function get_question_list() {
        $result_data = $this->objsessions->get_question_list();
        if (!empty($result_data)) {
            $result_array = array("status" => "success", "question_list" => $result_data);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function get_poll_vot_section_close_poll() {
        $result_data = $this->objsessions->get_poll_vot_section_close_poll();
        if (!empty($result_data)) {
            $result_array = array("status" => "success", "result" => $result_data);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function get_group_chat_section_status() {
        $result_data = $this->objsessions->get_group_chat_section_status();
        if (!empty($result_data)) {
            $result_array = array("status" => "success", "result" => $result_data);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function send_message() {
        $post = $this->input->post();
        $result = $this->objsessions->send_message($post);
        if ($result) {
            $result = array("status" => "success");
        } else {
            $result = array("status" => "error");
        }
        echo json_encode($result);
    }

    public function message() {
        $post = $this->input->post();
        $data['messages'] = $this->objsessions->get_chat_details($post['sessions_id'], $post['sessions_group_chat_id']);
        $output = $this->load->view('message', $data, true);
        echo $output;
    }

    public function attend($sessions_id) {
        $data["sessions"] = $this->objsessions->viewSessionsData($sessions_id);

        $this->load->view('header');
        $this->load->view('view_attend', $data);
        $this->load->view('footer');
    }

    public function gettimenow() {
        echo json_encode(array("current_time" => date("H:i:s")));
    }

    public function add_viewsessions_history_open() {
        $post = $this->input->post();
        $this->load->library('user_agent');
        $user_agent = $this->input->ip_address();
        $session_his_arr = array(
            'sessions_id' => $post['sessions_id'],
            'cust_id' => $this->session->userdata("cid"),
            'operating_system' => $this->agent->platform(),
            'computer_type' => $this->agent->browser(),
            'ip_address' => $this->input->ip_address(),
            'resolution' => $post['resolution'],
            'start_date_time' => date("Y-m-d h:i:s"),
            'status' => 0
        );
        $this->db->insert('view_sessions_history', $session_his_arr);
        $insert_id = $this->db->insert_id();

        $where_session_his_arr = array(
            'sessions_id' => $post['sessions_id'],
            'cust_id' => $this->session->userdata("cid")
        );

        $login_sessions_history = $this->db->get_where('login_sessions_history', $where_session_his_arr)->row();
        if (!empty($login_sessions_history)) {
            $session_his_arr = array(
                'sessions_id' => $post['sessions_id'],
                'cust_id' => $this->session->userdata("cid"),
                'operating_system' => $this->agent->platform(),
                'computer_type' => $this->agent->browser(),
                'ip_address' => $this->input->ip_address(),
                'resolution' => $post['resolution'],
                'status' => 0
            );
            $this->db->update('login_sessions_history', $session_his_arr, array("login_sessions_history_id" => $login_sessions_history->login_sessions_history_id));
        } else {
            $this->db->insert('login_sessions_history', $session_his_arr);
        }

        echo json_encode(array("status" => "success", "view_sessions_history_id" => $insert_id));
    }

    public function update_viewsessions_history_open() {
        $post = $this->input->post();
        $session_his_arr = array(
            'end_date_time' => date("Y-m-d h:i:s")
        );
        $this->db->update('view_sessions_history', $session_his_arr, array("view_sessions_history_id" => $post['view_sessions_history_id']));

        $view_sessions_history = $this->db->get_where('view_sessions_history', array("view_sessions_history_id" => $post['view_sessions_history_id']))->row();
        if (!empty($view_sessions_history)) {
            $where_session_his_arr = array(
                'sessions_id' => $view_sessions_history->sessions_id,
                'cust_id' => $this->session->userdata("cid")
            );
            $login_sessions_history = $this->db->get_where('login_sessions_history', $where_session_his_arr)->row();
            if (!empty($login_sessions_history)) {
                $this->db->update('login_sessions_history', $session_his_arr, array("login_sessions_history_id" => $login_sessions_history->login_sessions_history_id));
            }
        }
        echo json_encode(array("status" => "success"));
    }

}

