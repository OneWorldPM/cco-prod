<?php

class SessionGroupChat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('user/SessionGroupChat_Model', 'SessionGroupChatModel');

    }

    public function newText()
    {
        $data= $this->SessionGroupChatModel->newText();

        echo json_encode($data);
    }
    public function getTexts(){
       $data= $this->SessionGroupChatModel->getTexts();

       if($data)$data=array_reverse($data);
        echo json_encode($data);

    }

}
