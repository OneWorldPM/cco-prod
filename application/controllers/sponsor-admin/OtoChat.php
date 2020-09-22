<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class OtoChat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $login_type = $this->session->userdata('userType');
        if ($login_type == '') {
            redirect(base_url());
        }

        $this->load->model('sponsor/OtoChat_Model', 'otoChatModel');
    }

    public function newText()
    {
        $data = $this->otoChatModel->newText();
        echo json_encode($data);
        return;
    }

    public function getChatsUserToSponsor($cid)
    {
        $data = $this->otoChatModel->getChatsUserToSponsor($cid);
        echo json_encode($data);
        return;
    }
}
