<?php

class LoungeGroupChat_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function newText()
    {
        $chatFrom = $this->session->userdata('cid');
        $chatText = $this->input->post()['chat_text'];

        $data = array(
            'chat_from ' => $chatFrom,
            'chat_text' => $chatText,
            'datetime' => date('Y-m-d H:i:s')
        );

        $this->db->insert('lounge_group_chat', $data);

        return $data;
    }

    public function clearChat()
    {
        if ($this->session->userdata('userType') == 'sponsor')
        {
            $sponsorId = $this->session->userdata('sponsors_id');

            $this->db->where('sponsor_id', $sponsorId);
            $this->db->delete('lounge_group_chat');
        }

        return;
    }

    public function getAllChats()
    {
        $this->db->select(
            "
            lgc.*, 
            CONCAT(cm.first_name, ' ', cm.last_name) AS from_name,
            cm.profile
            "
        );
        $this->db->from('lounge_group_chat lgc');
        $this->db->join('customer_master cm', 'cm.cust_id = lgc.chat_from', 'left');
        $this->db->order_by('lgc.datetime','asc');
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
