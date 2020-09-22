<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LoungeGroupChat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $login_type = $this->session->userdata('userType');
        if ($login_type == '') {
            redirect(base_url());
        }

        $this->load->model('user/LoungeGroupChat_Model', 'groupChatModel');
    }

    public function newText()
    {
        $data = $this->groupChatModel->newText();
        echo json_encode($data);
        return;
    }

    public function clearChat()
    {
        $this->groupChatModel->clearChat();
        return;
    }

    public function getAllChats()
    {

        $chats = $this->groupChatModel->getAllChats();

        if ($chats != false)
        {
            $chatsJson = json_encode($chats,JSON_FORCE_OBJECT);
            echo $chatsJson;
        }else{
            echo 0;
        }

        return;
    }
}
