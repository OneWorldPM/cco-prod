<?php


class SessionGroupChat_Model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function newText()
    {

        $userId=$this->session->userdata('aid')?$this->session->userdata('aid'):$this->session->userdata('cid');
        $userName=$this->session->userdata('aname')?$this->session->userdata('aname'):$this->session->userdata('fullname');
        $message = htmlspecialchars($this->input->post()['message']);
        $sessionId=$this->input->post()['sessionId'];


        $data = array(
            'user_id' => $userId,
            'user_name' => $userName,
            'message' => $message,
            'session_id' => $sessionId
        );

        $this->db->insert('session_group_chat', $data);

        return $data;
    }
    public function getTexts(){
        $query = $this->db->query("SELECT * FROM session_group_chat ORDER BY id DESC LIMIT 15");
        $result = $query->result_array();
        
        return $result;
    }

}
