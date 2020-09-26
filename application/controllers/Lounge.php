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
        $get_user_token_details = $this->common->get_user_details($this->session->userdata('cid'));
        if($this->session->userdata('token') != $get_user_token_details->token){
            redirect('login');
        }
        $this->load->model('user/m_home', 'objhome');
    }

    public function index()
    {
        $socket_config = $this->getSocketConfig();
        $profile_data = $this->common->get_user_details($this->session->userdata('cid'));
        $data = array(
            'profile_data' => $profile_data,
            'socket_config' => $socket_config);

        $this->load->view('header');
        $this->load->view('lounge', $data);
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
}
