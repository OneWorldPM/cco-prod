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
        echo json_encode($data);
        return;
    }

    public function getChatsUserToUser($cid)
    {
        $data = $this->LoungeOtoChat_Model->getChatsUserToUser($cid);
        echo json_encode($data);
        return;
    }
}
