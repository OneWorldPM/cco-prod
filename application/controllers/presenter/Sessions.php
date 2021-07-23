<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sessions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('userType');
        if ($login_type != 'presenter') {
            redirect('presenter/login');
        }
        $this->load->model('presenter/m_sessions', 'msessions');
    }

    public function index() {
        $data['sessions'] = $this->msessions->getSessionsAll();
		 $data['moderator_sessions'] = $this->msessions->getModeratorSessionsAll();
        $this->load->view('presenter/header');
        $this->load->view('presenter/sessions', $data);
        $this->load->view('presenter/footer');
    }

    public function create_poll($sessions_id) {
        $data['sessions'] = $this->msessions->edit_sessions($sessions_id);
        $data['poll_type'] = $this->msessions->get_poll_type();
        $this->load->view('presenter/header');
        $this->load->view('presenter/create_poll', $data);
        $this->load->view('presenter/footer');
    }

    public function add_poll_data() {
        $result = $this->msessions->add_poll_data();
        if ($result) {
            header('location:' . base_url() . 'presenter/sessions');
        } else {
            header('location:' . base_url() . 'presenter/sessions');
        }
    }

    public function view_poll($sessions_id) {
        $data['poll_data'] = $this->msessions->get_poll_details($sessions_id);

        $this->load->view('presenter/header');
        $this->load->view('presenter/view_poll', $data);
        $this->load->view('presenter/footer');
    }

    public function deletePollQuestion($sessions_poll_question_id) {
        if ($sessions_poll_question_id != "") {
            $this->msessions->deletePollQuestion($sessions_poll_question_id);
            header('location:' . base_url() . 'presenter/sessions');
        } else {
            header('location:' . base_url() . 'presenter/sessions');
        }
    }

    public function editPollQuestion($sessions_poll_question_id) {
        $data['sessions_data'] = $this->msessions->editPollQuestion($sessions_poll_question_id);
        $data['poll_type'] = $this->msessions->get_poll_type();
        $this->load->view('presenter/header');
        $this->load->view('presenter/create_poll', $data);
        $this->load->view('presenter/footer');
    }

    public function update_poll_data() {
        $post=$this->input->post('sessions_id');
        $result = $this->msessions->update_poll_data();
        if ($result) {
            header('location:' . base_url() . 'presenter/sessions/view_poll/'.$post);
        } else {
            header('location:' . base_url() . 'presenter/sessions/view_poll/'.$post);
        }
    }

    public function open_poll($sessions_poll_question_id) {
        $sessions_poll_question_row = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $sessions_poll_question_id))->row();
        if (!empty($sessions_poll_question_row)) {
            $sessions_poll_question_row_data = $this->db->get_where("sessions_poll_question", array("sessions_id" => $sessions_poll_question_row->sessions_id, "status" => 1))->row();
            $sessions_poll_question_row_data_2 = $this->db->get_where("sessions_poll_question", array("sessions_id" => $sessions_poll_question_row->sessions_id, "status" => 2))->row();
            if (empty($sessions_poll_question_row_data) && empty($sessions_poll_question_row_data_2)) {
                $this->db->update("sessions_poll_question", array("status" => 1), array("sessions_poll_question_id" => $sessions_poll_question_id));
                header('location:' . base_url() . 'presenter/sessions/view_poll/' . $sessions_poll_question_row->sessions_id . '?msg=U');
            } else {
                header('location:' . base_url() . 'presenter/sessions/view_poll/' . $sessions_poll_question_row->sessions_id . '?msg=A');
            }
        }
    }

    public function open_poll_ajax() {
        $sessions_poll_question_id = $this->input->post('sessions_poll_question_id');
        $sessions_poll_question_row = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $sessions_poll_question_id))->row();
        if (!empty($sessions_poll_question_row)) {
            $sessions_poll_question_row_data = $this->db->get_where("sessions_poll_question", array("sessions_id" => $sessions_poll_question_row->sessions_id, "status" => 1))->row();
            $sessions_poll_question_row_data_2 = $this->db->get_where("sessions_poll_question", array("sessions_id" => $sessions_poll_question_row->sessions_id, "status" => 2))->row();
            if (empty($sessions_poll_question_row_data) && empty($sessions_poll_question_row_data_2)) {
                $this->db->update("sessions_poll_question", array("status" => 1), array("sessions_poll_question_id" => $sessions_poll_question_id));
                $result_array = array("status" => "success");
            } else {
                $result_array = array("status" => "error");
            }
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function show_result($sessions_poll_question_id) {
        $sessions_poll_question_row = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $sessions_poll_question_id))->row();
        if (!empty($sessions_poll_question_row)) {
			 $this->db->update("sessions_poll_question", array("status" => 3), array("status"=>2,"sessions_id" => $sessions_poll_question_row->sessions_id));
            $this->db->update("sessions_poll_question", array("status" => 2), array("sessions_poll_question_id" => $sessions_poll_question_id));
            header('location:' . base_url() . 'presenter/sessions/view_poll/' . $sessions_poll_question_row->sessions_id . '?msg=U');
        }
    }

    public function show_result_ajax() {
        $sessions_poll_question_id = $this->input->post('sessions_poll_question_id');
        $sessions_poll_question_row = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $sessions_poll_question_id))->row();
        if (!empty($sessions_poll_question_row)) {
			 $this->db->update("sessions_poll_question", array("status" => 3), array("status"=>2,"sessions_id" => $sessions_poll_question_row->sessions_id));
            $this->db->update("sessions_poll_question", array("status" => 2), array("sessions_poll_question_id" => $sessions_poll_question_id));
            $result_array = array("status" => "success");
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function close_poll($sessions_poll_question_id) {
        $sessions_poll_question_row = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $sessions_poll_question_id))->row();
        $this->db->update("sessions_poll_question", array("status" => 4), array("sessions_poll_question_id" => $sessions_poll_question_id));
        header('location:' . base_url() . 'presenter/sessions/view_poll/' . $sessions_poll_question_row->sessions_id . '?msg=U');
    }

    public function close_poll_ajax() {
        $sessions_poll_question_id = $this->input->post('sessions_poll_question_id');
        $sessions_poll_question_row = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $sessions_poll_question_id))->row();
        $this->db->update("sessions_poll_question", array("status" => 4), array("sessions_poll_question_id" => $sessions_poll_question_id));
        $result_array = array("status" => "success");
        echo json_encode($result_array);
    }

    public function close_result($sessions_poll_question_id) {
        $sessions_poll_question_row = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $sessions_poll_question_id))->row();
        $this->db->update("sessions_poll_question", array("status" => 3), array("sessions_poll_question_id" => $sessions_poll_question_id));
        header('location:' . base_url() . 'presenter/sessions/view_poll/' . $sessions_poll_question_row->sessions_id . '?msg=U');
    }

    public function close_result_ajax() {
        $sessions_poll_question_id = $this->input->post('sessions_poll_question_id');
        $sessions_poll_question_row = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $sessions_poll_question_id))->row();
        $this->db->update("sessions_poll_question", array("status" => 3), array("sessions_poll_question_id" => $sessions_poll_question_id));
        $result_array = array("status" => "success");
        echo json_encode($result_array);
    }

    public function view_question_answer($sessions_id) {
        $data['sessions_id'] = $sessions_id;
        $this->load->view('presenter/header');
        $this->load->view('presenter/view_question_answer', $data);
        $this->load->view('presenter/footer');
    }

    public function get_question_list() {
        $result_data = $this->msessions->get_question_list();
        if (!empty($result_data)) {
            $result_array = array("status" => "success", "question_list" => $result_data);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function get_favorite_question_list() {
        $result_data = $this->msessions->get_favorite_question_list();
        if (!empty($result_data)) {
            $result_array = array("status" => "success", "question_list" => $result_data);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function hide_question() {
        $post = $this->input->post();
        if ($post['sessions_question_id'] != '') {
            $this->db->update('sessions_cust_question', array('hide_status' => 1), array('sessions_cust_question_id' => $post['sessions_question_id']));
            $this->db->update('tbl_favorite_question', array('hide_status' => 1), array('sessions_cust_question_id' => $post['sessions_question_id']));
            if ($this->db->affected_rows()) {
                $result_array = array("status" => "success");
            } else {
                $result_array = array("status" => "success");
            }
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function favorite_hide_question() {
        $post = $this->input->post();
        if ($post['tbl_favorite_question_id'] != '') {
            $this->db->update('tbl_favorite_question', array('hide_status' => 1), array('tbl_favorite_question_id' => $post['tbl_favorite_question_id']));
            if ($this->db->affected_rows()) {
                $result_array = array("status" => "success");
            } else {
                $result_array = array("status" => "error");
            }
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function likeQuestion() {
        $result_data = $this->msessions->likeQuestion();

        if ($result_data[0]) {
            $result_array = array("status" => "success","data"=>$result_data[1]);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function addQuestionAnswer() {
        $result_data = $this->msessions->addQuestionAnswer();
        if ($result_data) {
            $result_array = array("status" => "success");
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function view_session($sessions_id) {
        $data['poll_data'] = $this->msessions->get_poll_details($sessions_id);
        $data["sessions"] = $this->msessions->view_session($sessions_id);
        $data["session_resource"] = $this->msessions->get_session_resource($sessions_id);
         $data['music_setting'] = $this->msessions->get_music_setting();
        $this->load->view('presenter/session_header',$data);
        $this->load->view('presenter/view_session', $data);
        $this->load->view('presenter/footer');
    }

    public function get_poll_vot_section() {
        $result_data = $this->msessions->get_poll_vot_section();
        if (!empty($result_data)) {
            $result_array = array("status" => "success", "result" => $result_data);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    public function get_poll_vot_section_close_poll() {
        $result_data = $this->msessions->get_poll_vot_section_close_poll();
        if (!empty($result_data)) {
            $result_array = array("status" => "success", "result" => $result_data);
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    function view_result($sessions_poll_question_id) {
        $data['poll_report'] = $this->msessions->view_result($sessions_poll_question_id);
        $this->load->view('presenter/header');
        $this->load->view('presenter/view_result', $data);
        $this->load->view('presenter/footer');
    }

    function poll_redo($sessions_poll_question_id) {
        $sessions_poll_question_row = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $sessions_poll_question_id))->row();
        $this->db->update("sessions_poll_question", array("status" => 0, "timer_status" => 0), array("sessions_poll_question_id" => $sessions_poll_question_row->sessions_poll_question_id));
        $this->db->update("poll_question_option", array("total_vot" => 0), array("sessions_poll_question_id" => $sessions_poll_question_id));
        $this->db->delete("tbl_poll_voting", array("sessions_poll_question_id" => $sessions_poll_question_id));
        header('location:' . base_url() . 'presenter/sessions/view_poll/' . $sessions_poll_question_row->sessions_id . '?msg=U');
    }

    public function start_timer($sessions_poll_question_id) {
        $sessions_poll_question_row = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $sessions_poll_question_id))->row();
        $this->db->update("sessions_poll_question", array("timer_status" => 1), array("sessions_poll_question_id" => $sessions_poll_question_id));
        header('location:' . base_url() . 'presenter/sessions/view_poll/' . $sessions_poll_question_row->sessions_id . '?msg=U');
    }

    public function start_timer_ajax() {
        $sessions_poll_question_id = $this->input->post('sessions_poll_question_id');
        $sessions_poll_question_row = $this->db->get_where("sessions_poll_question", array("sessions_poll_question_id" => $sessions_poll_question_id))->row();
        if (!empty($sessions_poll_question_row)) {
            $this->db->update("sessions_poll_question", array("timer_status" => 1), array("sessions_poll_question_id" => $sessions_poll_question_id));
            $result_array = array("status" => "success");
        } else {
            $result_array = array("status" => "error");
        }
        echo json_encode($result_array);
    }

    function importSessionsPoll() {
        $result = $this->msessions->importSessionsPoll();
        if ($result) {
            header('location:' . base_url() . 'presenter/sessions?msg=S');
        } else {
            header('location:' . base_url() . 'presenter/sessions?msg=E');
        }
    }

    ################Added by Rexter ################

    public function saveAdminToAttendeeChat()
    {
        $post = $this->input->post();

        $data = array(
            'session_id' => $post['session_id'],
            'from_id' => $post['from_id'],
            'to_id' => $post['to_id'],
            'chat_text' => $post['chat_text'],
            'date_time' => date("Y-m-d H:i:s"),
            'sent_from'=>$post['sent_from'],
            'presenter_name'=>$post['presenter_name']
        );

        $this->db->insert('admin_to_attendee_chat', $data);

        if ($this->db->affected_rows() > 0)
            echo 1;
        else
            echo 0;

        return;
    }

    public function getAllUsersList()
    {
        $post = $this->input->post();

        $data = array(
            'session_id' => $post['session_id']
        );

        $this->db->select('from_id, to_id');
        $this->db->from('admin_to_attendee_chat');
        $this->db->where($data);

        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            $users =array();
            foreach ($query->result_array() as $row)
            {
                $this->load->model('madmin/m_user', 'userModel');

                if($row['from_id'] != "admin")
                    $users[] = $row['from_id'];
                if($row['to_id'] != "admin")
                    $users[] = $row['to_id'];
            }

            $users = array_unique($users);

            $users_details = array();
            foreach ($users as $user)
            {
                $user_details = $this->userModel->getUserDetail($user);
                $user_details->unread_msgs = $this->getUnreadMsgs($post['session_id'], $user);

                $users_details[] = $user_details;
            }

            echo json_encode(($users_details));
        }else{
            echo json_encode(array());
        }

        return;
    }


    public function getAllAdminToAttendeeChat()
    {
        $post = $this->input->post();
        $data = array(
            'session_id' => $post['session_id']
        );
        $or_where = "((from_id = '{$post['from_id']}' AND to_id = '{$post['to_id']}') OR (from_id = '{$post['to_id']}' AND to_id = '{$post['from_id']}'))";


        $this->db->select('*');
        $this->db->from('admin_to_attendee_chat');
        $this->db->where($data);
        $this->db->or_where($or_where);
        $this->db->order_by("date_time", "asc");

        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
        {
            echo json_encode($query->result_array());
        }else{
            echo json_encode(array());
        }

        return;
    }

    public function getUnreadMsgs($session_id, $user_id)
    {

        $data = array(
            'session_id' => $session_id,
            'from_id' => $user_id,
            'marked_read' => 0
        );

        $this->db->select('*');
        $this->db->from('admin_to_attendee_chat');
        $this->db->where($data);

        $query = $this->db->get();

        if ( $query->num_rows() > 0 )
            return true;

        return false;
    }

    public function markAllAsRead($session_id, $user_id)
    {
        $data = array(
            'session_id' => $session_id,
            'from_id' => $user_id
        );

        $this->db->where($data);
        $this->db->update('admin_to_attendee_chat', array('marked_read'=>1));

        if ($this->db->affected_rows() > 0)
            echo 1;
        else
            echo 0;

        return;
    }
    ######################End Add Rexter ##################


}
