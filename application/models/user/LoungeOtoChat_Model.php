<?php


class LoungeOtoChat_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function newText()
    {
        $chatFrom = $this->input->post()['chat_from'];
        $chatText = $this->input->post()['chat_text'];
        $chatTo = $this->input->post()['chat_to'];

        $data = array(
            'from_id' => $chatFrom,
            'to_id' => $chatTo,
            'text' => $chatText,
            'datetime' => date('Y-m-d H:i:s')
        );

        $this->db->insert('lounge_oto_chat', $data);

        return $data;
    }

    public function getChatsUserToUser($cid)
    {
        $currentUser = $this->session->userdata("cid");

        $this->db->select(
            "
            loc.*, 
            CONCAT(cm.first_name, ' ', cm.last_name) AS to_name,
            CONCAT(cm2.first_name, ' ', cm2.last_name) AS from_name,
            cm2.profile
            "
        );
        $this->db->from('lounge_oto_chat loc');
        $this->db->join('customer_master cm', 'cm.cust_id = loc.to_id', 'left');
        $this->db->join('customer_master cm2', 'cm2.cust_id = loc.from_id', 'left');
        $this->db->where('(loc.to_id= '.$currentUser.' AND loc.from_id = '.$cid.') OR (loc.to_id= '.$cid.' AND loc.from_id = '.$currentUser.')');
        $this->db->order_by('loc.datetime','asc');
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

    public function checkForUnreadChat($user_id)
    {
        $this->db->select('from_id');
        $this->db->from('lounge_oto_chat');
        $this->db->where('marked_read', 0);
        $this->db->where('to_id', $user_id);
        $this->db->group_by('from_id');
        $query = $this->db->get();

        if($query->num_rows() != 0)
        {
            foreach($query->result_array() as $row)
            {
                $newMsgsFrom[] = $row['from_id'];
            }

            return $newMsgsFrom;
        }
        else
        {
            return 0;
        }
    }

    public function readAllTextsOf($from_user, $to_user)
    {
        $this->db->set('marked_read', 1);
        $this->db->where('from_id', $from_user);
        $this->db->where('to_id', $to_user);
        $this->db->update('lounge_oto_chat');

        return;
    }
}
