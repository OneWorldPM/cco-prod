<?php


class LoungeOtoChat_Model extends CI_Model
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
        $chatTo = $this->input->post()['chat_to'];

        $data = array(
            'sponsor_id' => $sponsorId,
            'from_id' => $chatFrom,
            'to_id' => $chatTo,
            'text' => $chatText,
            'datetime' => date('Y-m-d H:i:s')
        );

        $this->db->insert('sponsor_oto_chat', $data);

        return $data;
    }

    public function getChatsUserToSponsor($cid)
    {
        $sponsorId = $this->input->post()['sponsor_id'];

        $this->db->select(
            "
            soc.*, 
            CONCAT(cm.first_name, ' ', cm.last_name) AS to_name,
            CONCAT(cm2.first_name, ' ', cm2.last_name) AS from_name,
            cm2.profile
            "
        );
        $this->db->from('sponsor_oto_chat soc');
        $this->db->join('customer_master cm', 'cm.cust_id = soc.to_id', 'left');
        $this->db->join('customer_master cm2', 'cm2.cust_id = soc.from_id', 'left');
        $this->db->where('soc.sponsor_id', $sponsorId);
        $this->db->where('(soc.to_id= '.$cid.' OR soc.from_id = '.$cid.')');
        $this->db->order_by('soc.datetime','asc');
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
