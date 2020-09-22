<?php

class GroupChat_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function newText()
    {
        $sponsorId = $this->input->post()['sponsor_id'];
        $userType = $this->session->userdata('userType');
        $userId = (empty($this->session->userdata('cid')))?'':$this->session->userdata('cid');
        $chatFrom = ($userType == 'sponsor')?'sponsor':$userId;
        $chatText = $this->input->post()['chat_text'];

        $data = array(
            'sponsor_id' => $sponsorId,
            'chat_from ' => $chatFrom,
            'chat_text' => $chatText,
            'datetime' => date('Y-m-d H:i:s')
        );

        $this->db->insert('sponsor_group_chat', $data);

        return $data;
    }

    public function clearChat()
    {
        if ($this->session->userdata('userType') == 'sponsor')
        {
            $sponsorId = $this->session->userdata('sponsors_id');

            $this->db->where('sponsor_id', $sponsorId);
            $this->db->delete('sponsor_group_chat');
        }

        return;
    }

    public function getAllChats($sponsorId)
    {
        $this->db->select(
            "
            sgc.*, 
            CONCAT(cm.first_name, ' ', cm.last_name) AS from_name,
            cm.profile
            "
        );
        $this->db->from('sponsor_group_chat sgc');
        $this->db->join('customer_master cm', 'cm.cust_id = sgc.chat_from', 'left');
        $this->db->where('sgc.sponsor_id', $sponsorId);
        $this->db->order_by('sgc.datetime','asc');
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }
}
