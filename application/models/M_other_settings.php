<?php

class M_other_settings extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    function updatePresenterTimezone(){
        $post = $this->input->post();
        $this->db->where('id', 1);
        $result = $this->db->update('presenter_timezone', array('timezone'=>$post['presenterTimezone']));
        if($result > 0){
            return array('status' => 200, 'msg'=>'presenter timezone update success');
        }else
            return array('status' => 400, 'msg'=>'presenter timezone update failed');
    }

    function getPresenterTimezone(){
        return $this->db->get('presenter_timezone')->result()[0]->timezone;
    }
}