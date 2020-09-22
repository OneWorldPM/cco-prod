<?php

class VideoChatApi extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function engageSponsor($sponsorId)
    {
        $result = $this->db->select('*')->get_where('sponsor_video_chat_engager', array("sponsors_id"=>$sponsorId));
        if ($result->num_rows() > 0) {
            $data = array(
                'sponsors_id' => $sponsorId,
                'engage_status' => 'true'
            );
            $this->db->where('sponsors_id', $sponsorId);
            $this->db->update('sponsor_video_chat_engager', $data);
        } else {
            $data = array(
                'sponsors_id' => $sponsorId,
                'engage_status' => 'true'
            );
            $this->db->insert('sponsor_video_chat_engager', $data);
        }

        return;

    }

    public function releaseSponsor($sponsorId)
    {
        $result = $this->db->select('*')->get_where('sponsor_video_chat_engager', array("sponsors_id"=>$sponsorId));
        if ($result->num_rows() > 0) {
            $data = array(
                'sponsors_id' => $sponsorId,
                'engage_status' => 'false'
            );
            $this->db->where('sponsors_id', $sponsorId);
            $this->db->update('sponsor_video_chat_engager', $data);
        } else {
            $data = array(
                'sponsors_id' => $sponsorId,
                'engage_status' => 'false'
            );
            $this->db->insert('sponsor_video_chat_engager', $data);
        }

        return;

    }

    public function sponsorVideoEngageStatus($sponsorId)
    {
        $result = $this->db->select('*')->get_where('sponsor_video_chat_engager', array("sponsors_id"=>$sponsorId));
        if ($result->num_rows() > 0) {
            print_r($result); exit;
            $data = array(
                'sponsors_id' => $sponsorId,
                'engage_status' => 'false'
            );
            $this->db->where('sponsors_id', $sponsorId);
            $this->db->update('sponsor_video_chat_engager', $data);
        } else {
            return 'false';
        }

        return;

    }

}
