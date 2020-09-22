<?php

class VideoChatApi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('sponsor/VideoChatApi_Model', 'VideoChatApi');
    }

    public function engageSponsor()
    {
        $roomId = $this->input->post('roomId');
        $sponsorId = $this->input->post('sponsorId');

        $this->VideoChatApi->engageSponsor($sponsorId);

        return;
    }

    public function releaseSponsor()
    {
        $roomId = $this->input->post('roomId');
        $sponsorId = $this->input->post('sponsorId');

        $this->VideoChatApi->releaseSponsor($sponsorId);

        return;
    }

    public function sponsorVideoEngageStatus()
    {
        $roomId = $this->input->post('roomId');
        $sponsorId = $this->input->post('sponsorId');

        echo $this->VideoChatApi->sponsorVideoEngageStatus($sponsorId);
        return;

    }
}
