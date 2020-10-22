<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Groupchat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('userType');
        if ($login_type != 'presenter') {
            redirect('presenter/login');
        }
        $this->load->model('presenter/m_groupchat', 'objgroupchat');
    }

    public function sessions_groupchat($sessions_id) {
        $data['sessions_id'] = $sessions_id;
        $data['group_chat_data'] = $this->objgroupchat->getGroupChatData($sessions_id);
        $this->load->view('presenter/header');
        $this->load->view('presenter/group_chat', $data);
        $this->load->view('presenter/footer');
    }

    public function createGroupChat($sessions_id) {
        $data['sessions_id'] = $sessions_id;
        $data['users'] = $this->objgroupchat->getUsersData();
        $data['presenter'] = $this->objgroupchat->getPresenterData($sessions_id);
        $data['moderators'] = $this->objgroupchat->getModeratorData($sessions_id);

        $this->load->view('presenter/header');
        $this->load->view('presenter/create_group_chat', $data);
        $this->load->view('presenter/footer');
    }

    public function addNewGroupChat() {
        $post = $this->input->post();
        $result = $this->objgroupchat->addNewGroupChat($post);
        if ($result) {
            header('location:' . base_url() . 'presenter/groupchat/sessions_groupchat/' . $post['sessions_id'] . '?msg=AS');
        } else {
            header('location:' . base_url() . 'presenter/groupchat/sessions_groupchat/' . $post['sessions_id'] . '?msg=E');
        }
    }

    public function open_chat($sessions_id) {
        $sessions_group_chat_id = $this->input->get('id');
        if ($sessions_group_chat_id != "") {
            $query = $this->objgroupchat->open_chat($sessions_id, $sessions_group_chat_id);
            if ($query) {
                header('location:' . base_url() . 'presenter/groupchat/sessions_groupchat/' . $sessions_id . '?msg=OS');
            } else {
                header('location:' . base_url() . 'presenter/groupchat/sessions_groupchat/' . $sessions_id . '?msg=AE');
            }
        } else {
            header('location:' . base_url() . 'presenter/groupchat/sessions_groupchat/' . $sessions_id . '?msg=E');
        }
    }

    public function close_chat($sessions_id) {
        $sessions_group_chat_id = $this->input->get('id');
        if ($sessions_group_chat_id != "") {
            $query = $this->objgroupchat->close_chat($sessions_id, $sessions_group_chat_id);
            if ($query) {
                header('location:' . base_url() . 'presenter/groupchat/sessions_groupchat/' . $sessions_id . '?msg=CS');
            } else {
                header('location:' . base_url() . 'presenter/groupchat/sessions_groupchat/' . $sessions_id . '?msg=E');
            }
        } else {
            header('location:' . base_url() . 'presenter/groupchat/sessions_groupchat/' . $sessions_id . '?msg=E');
        }
    }

    public function view_chat($sessions_id) {
        $sessions_group_chat_id = $this->input->get('id');
        $data['chat_details'] = $this->objgroupchat->get_chat_details($sessions_id, $sessions_group_chat_id);
        $data['sessions_id'] = $sessions_id;
        $data['sessions_group_chat_id'] = $sessions_group_chat_id;
        $data['sessions_group_chat'] = $this->objgroupchat->get_sessions_group_chat($sessions_group_chat_id);
        $this->load->view('presenter/header');
        $this->load->view('presenter/view_chat', $data);
        $this->load->view('presenter/footer');
    }

    function message() {
        $post = $this->input->post();
        $data['messages'] = $this->objgroupchat->get_chat_details($post['sessions_id'], $post['sessions_group_chat_id']);

        $output = $this->load->view('presenter/message', $data, true);
        echo $output;
    }

    function send() {
        $post = $this->input->post();
        $this->objgroupchat->sendMessage($post);
        $data['messages'] = $this->objgroupchat->get_chat_details($post['sessions_id'], $post['sessions_group_chat_id']);
        $output = $this->load->view('presenter/message', $data, true);
        echo $output;
    }

    public function get_group_chat_section_status() {
        $result_data = $this->objgroupchat->get_group_chat_section_status();
        if (!empty($result_data)) {
            $result_array = array("status" => "success", "result" => $result_data);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }
	
	public function get_group_chat_section_status_moderator() {
        $result_data = $this->objgroupchat->get_group_chat_section_status_moderator();
        if (!empty($result_data)) {
            $result_array = array("status" => "success", "result" => $result_data);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

}
