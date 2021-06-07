<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Live_support_chat extends CI_Controller {
    function __construct() {
        parent::__construct();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
    }

    function index() {

        $data['status'] = $this->status();

        $this->load->view('admin/header');
        $this->load->view('admin/live-support-chat', $data);
        $this->load->view('admin/footer');
    }

    public function status()
    {
        $this->db->select('status');
        $this->db->from('live_support_chat_status');
        $this->db->where('name', 'isOn');
        $status = $this->db->get();
        if ($status->num_rows() > 0) {
            return $status->row()->status;
        } else {
            return 0;
        }
    }

    public function toggleStatus($status)
    {
        $set = array(
            'status' => $status
        );
        $this->db->update("live_support_chat_status", $set, array('name' => 'isOn'));
        if($this->db->affected_rows() > 0){
            echo json_encode(array('status'=>'success'));
        }else{
            echo json_encode(array('status'=>'failed'));
        }
    }

    public function allChats($user_id)
    {
        $sql =
            "
            SELECT lsc.*
            FROM live_support_chat as lsc
            WHERE 
                  (
                      (lsc.chat_from_type = 'attendee' AND lsc.from_id = '{$user_id}') 
                          OR 
                      (lsc.chat_from_type = 'admin' AND lsc.to_id = '{$user_id}')
                  ) 
            ";

        $chats = $this->db->query($sql);
        if ($chats->num_rows() > 0)
            return $chats->result_array();

        return array();
    }

    public function allChatsJSON($user_id)
    {
        echo json_encode($this->allChats($user_id));
    }

    public function newText()
    {
        $text = $this->input->post('chat_text');
        $to_id = $this->input->post('to_id');

        $admin_id = $this->session->userdata('aid');

        $chat = array
        (
            'chat_from_type' => 'admin',
            'from_id' => $admin_id,
            'to_id' => $to_id,
            'text' => $text,
            'date_time' => date('Y-m-d H:i:s')
        );

        $this->db->insert('live_support_chat', $chat);

        if ($this->db->affected_rows() > 0) {
            echo json_encode(array('status'=>'success'));
        } else {
            echo json_encode(array('status'=>'failed'));
        }
    }
}
?>
