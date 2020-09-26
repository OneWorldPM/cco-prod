<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class LoungeOtoChat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $login_type = $this->session->userdata('userType');
        if ($login_type == '') {
            redirect(base_url());
        }

        $this->load->model('user/LoungeOtoChat_Model', 'LoungeOtoChat_Model');
    }

    public function newText()
    {
        $data = $this->LoungeOtoChat_Model->newText();
        if ($data == false)
        {
            echo 'false';
            return;
        }
        echo json_encode($data);
        return;
    }

    public function getChatsUserToUser($cid)
    {
        $data = $this->LoungeOtoChat_Model->getChatsUserToUser($cid);
        echo json_encode($data);
        return;
    }

    public function checkForUnreadChat($user_id)
    {
        $response = $this->LoungeOtoChat_Model->checkForUnreadChat($user_id);

        if ($response == 0)
        {
            echo 0;
        }else{
            echo json_encode($response);
        }

        return;
    }

    public function readAllTextsOf($from_user)
    {
        $to_user = $this->session->userdata("cid");
        $this->LoungeOtoChat_Model->readAllTextsOf($from_user, $to_user);

        return;
    }
}
