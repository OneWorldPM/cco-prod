<?php

class VchatRoom extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $this->load->model('user/m_sponsor', 'objsponsor');
    }

    public function join($sponsorId)
    {
        $data = array('sponsor' => $this->objsponsor->viewSponsorData($sponsorId));

        $this->load->view('header');
        $this->load->view('sponsor/vchat_room', $data);
        $this->load->view('footer');
    }
}
