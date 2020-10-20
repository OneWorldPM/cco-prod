<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lounge extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('userType');
        if ($login_type != 'user') {
            redirect('login');
        }
		 if ($this->session->userdata('cid') != "100028") {
        $get_user_token_details = $this->common->get_user_details($this->session->userdata('cid'));
        if($this->session->userdata('token') != $get_user_token_details->token){
            redirect('login');
        }
		 }
        $this->load->model('user/Attendees_Modal', 'attendees');
        $this->load->model('user/Meetings_Modal', 'meetings');
    }

    public function index()
    {
        $socket_config = $this->getSocketConfig();
        $profile_data = $this->common->get_user_details($this->session->userdata('cid'));
        $data = array(
            'profile_data' => $profile_data,
            'socket_config' => $socket_config);

        $this->load->view('header');
        $this->load->view('lounge/lounge', $data);
        $this->load->view('footer');
    }

    private function getSocketConfig()
    {

        if(!file_exists(FCPATH.'socket_config.php')){
            log_message('error', 'Socket IO config file does not exist at /socket_config.php');
            die("Socket IO config file does not exist at  /socket_config.php");
        }

        $socket_config = json_decode(file_get_contents(base_url().'socket_config.php'));

        if
        (
            $socket_config->socket_app_name == '' ||
            $socket_config->socket_lounge_room == '' ||
            $socket_config->socket_lounge_oto_chat_group == '' ||
            $socket_config->socket_active_user_list == ''
        )
        {
            log_message('error', 'At least one of the Socket IO config values are empty at /socket_config.php');
            die("At least one of the Socket IO config values are empty at /socket_config.php");
        }

        return $socket_config;
    }

    public function searchAttendees($searchTerm)
    {
        $result = $this->attendees->searchAttendees($searchTerm);

        if ($result == false){
            echo json_encode(array());
            return;
        }

        echo json_encode($result);
        return;
    }

    public function newMeeting()
    {
        if($this->meetings->newMeeting())
        {
            echo json_encode(array('status' => 'success'));
        }else{
            echo json_encode(array('status' => 'failed'));
        }

        return;
    }

    public function getMeetings($user)
    {
        $result = $this->meetings->getMeetings($user);

        echo json_encode($result);
        return;
    }

    public function meet($meeting_id)
    {
        $user = $this->session->userdata('cid');

        $this->load->view('header');

        $meeting = $this->meetings->getMeetingDetails($meeting_id);

        $now = date("Y-m-d H:i:s");

        if ($meeting && $meeting->meeting_from > $now)
        {
            $datetime1 = strtotime($meeting->meeting_from);
            $datetime2 = strtotime($now);
            $interval  = abs($datetime2 - $datetime1);
            $minutesDiff   = round($interval / 60);
            $diff = $this->convertToHoursMins($minutesDiff, '%02d hours %02d minutes');

            $meeting_status = array('status' => false, 'message' => "Meeting starts at {$meeting->meeting_from}(CT) ie; in {$diff}, please comeback!");
        }elseif ($meeting && $meeting->meeting_to < $now){
            $datetime1 = strtotime($meeting->meeting_to);
            $datetime2 = strtotime($now);
            $interval  = abs($datetime2 - $datetime1);
            $minutesDiff   = round($interval / 60);
            $diff = $this->convertToHoursMins($minutesDiff, '%02d hours %02d minutes');

            $meeting_status = array('status' => false, 'message' => "Meeting already finished at {$meeting->meeting_to}(CT) ie; {$diff} ago!");
        }else{
            $meeting_status = array('status' => true);
        }

        $data = array(
            'meeting_status' => $meeting_status,
            'meeting' => $meeting,
            'socket_config' => $this->getSocketConfig()
        );

        if ($this->meetings->identityValidation($meeting_id, $user))
        {
            $this->load->view('lounge/meet', $data);
        }else{
            $this->load->view('lounge/meet_no_access');
        }

        $this->load->view('footer');
    }

    private function convertToHoursMins($time, $format = '%02d:%02d') {
        if ($time < 1) {
            return;
        }
        $hours = floor($time / 60);
        $minutes = ($time % 60);
        return sprintf($format, $hours, $minutes);
    }

}
