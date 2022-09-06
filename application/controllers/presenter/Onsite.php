<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Onsite extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
//        $login_type = $this->session->userdata('userType');
//        if ($login_type != 'presenter') {
//            redirect('presenter/login');
//        }
        $this->load->model('presenter/m_sessions', 'msessions');
        $this->load->model('M_other_settings', 'mSettings');
    }


    public function index() {
//        print_r($this->session->userdata('email'));exit;
        if($this->session->userdata('email') !== 'onsite_presenter@gmail.com'){
            redirect(base_url().'presenter');
        }

        $data['sessions'] = $this->msessions->getSessionsAll();
        $data['moderator_sessions'] = $this->msessions->getModeratorSessionsAll();
        $this->load->view('presenter/onsite/header');
        $this->load->view('presenter/onsite/sessions', $data);
        $this->load->view('presenter/onsite/footer');
    }

    public function authentication(){
//        print_r($post=$this->input->post());
        $post=$this->input->post();
        $onsite_email = "presenterOnsite@gmail.com";
        $password = "12345";

        if($post['email'] == $onsite_email && $post['password']==$password){
            redirect (base_url().'presenter/onsite/question_answer');
        }else{
            redirect (base_url().'presenter/onsite');
        }

    }

    public function question_answer(){

        $this->load->view("presenter/onsite/session_header");
        $this->load->view("presenter/onsite/question_answer");
    }


    public function view_session($sessions_id) {
        $data['timezone'] = $this->mSettings->getPresenterTimezone();
        $data['poll_data'] = $this->msessions->get_poll_details($sessions_id);
        $data["sessions"] = $this->msessions->view_session($sessions_id);
        $data["session_resource"] = $this->msessions->get_session_resource($sessions_id);
        $data['music_setting'] = $this->msessions->get_music_setting();
        $this->load->view('presenter/onsite/session_header',$data);
        $this->load->view('presenter/onsite/view_session', $data);
//        $this->load->view('presenter/onsite/footer');
    }

    public function get_question_list() {

        $post = $this->input->post();

//        $post['sessions_id'] = '25';
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
//            print_r($response_array);
            echo   json_encode(array("status" => "success", "question_list" => $response_array));
//            print_r($response_array);
        } else {
            echo '';
        }
    }

}
