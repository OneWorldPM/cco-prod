<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sessions extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();

        $this->load->model('mobile/m_sessions', 'mobileSession');
    }

    public function id($session_id) {

        $this->session->set_userdata('sess_id', $this->uri->segment(4,0));

        $data['sessions'] = $this->mobileSession->getSessionsData($session_id);
        $this->load->view('mobile/templates/header');
        $this->load->view('mobile/index', $data);
        $this->load->view('mobile/templates/footer');
    }

    public function view() {

        $login_type = $this->session->userdata('userType');
        $mobileUser = $this->session->userdata('isMobileUser');
        if ($login_type != 'user') {
            redirect('mobile/register');
        }
//        if ($mobileUser != 1) {
//            redirect('mobile/register');
//        }
        if ($this->session->userdata('cid') != "100028") {
            $get_user_token_details = $this->common->get_user_details($this->session->userdata('cid'));
            if ($this->session->userdata('token') != $get_user_token_details->token) {
                redirect('mobile/login/index/'.$this->session->userdata('sess_id'));
            }
        }

        $sessions_id = $this->session->userdata('sess_id');

        $data['sess_data'] = $this->mobileSession->getSessionsData($sessions_id);

        if(isset($sessions_id) && !empty($sessions_id)) {

            $this->load->library('MobileDetect');
            $this->MobileDetect = new MobileDetect();

            $sesions = $this->mobileSession->viewSessionsData($sessions_id);

            if (date("Y-m-d H:i:s") > date("Y-m-d H:i:s", strtotime($sesions->sessions_date . ' ' . $sesions->end_time)) && $sessions_id != 25) {
                header("location:" . base_url() . "mobile/sessions/session_end/$sessions_id");
                die();
            }

            $header_data["sesions_logo"] = $sesions->sessions_logo;
            $header_data["sesions_logo_width"] = $sesions->sessions_logo_width;
            $header_data["sesions_logo_height"] = $sesions->sessions_logo_height;
            $header_data["sessions_addnl_logo"] = $sesions->sessions_addnl_logo;
            $header_data["sponsor_type"] = $sesions->sponsor_type;
            $header_data["right_bar"] = $sesions->right_bar;
            $header_data["tool_box_status"] = $sesions->tool_box_status;

            $data["sessions"] = $sesions;
            $data["session_resource"] = $this->mobileSession->get_session_resource($sessions_id);
            $data['music_setting'] = $this->mobileSession->get_music_setting();

            $header_data["attendee_view_links_status"] = $sesions->attendee_view_links_status;
            $header_data["url_link"] = $sesions->url_link;
            $header_data["link_text"] = $sesions->link_text;
            $header_data['session_id'] = $sessions_id;

            $data['isMobile'] = $this->MobileDetect->isMobile();
            $data["url_link"] = $sesions->url_link;

            $data['isSessionWithPoll'] = $this->mobileSession->checkSessionWithPoll($sessions_id);

            $this->load->view('mobile/templates/header',$header_data);
            $this->load->view('mobile/view_sessions_optimized', $data);
            $this->load->view('mobile/view_session_modals', $data);

            $this->load->view('mobile/templates/footer');


        }else{
            redirect(base_url()."mobile/sessions/id/".$sessions_id);
        }

    }

    public function session_end($session_id){

        $sesions = $this->mobileSession->viewSessionsData($session_id);
        $header_data["attendee_view_links_status"] = $sesions->attendee_view_links_status;
        $header_data["url_link"] = $sesions->url_link;
        $header_data["link_text"] = $sesions->link_text;
        $header_data['session_id'] = $session_id;

        $this->db->select('*')
            ->from('sessions')
            ->where('sessions_id', $session_id)
        ;
        $data['sessions'] = $this->db->get()->result();
        $this->load->view('mobile/templates/header', $header_data);
        $this->load->view('mobile/end_session', $data);
        $this->load->view('mobile/templates/footer');
    }

}
