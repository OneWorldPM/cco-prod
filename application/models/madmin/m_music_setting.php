<?php

class M_music_setting extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function get_music_setting() {
        $query = $this->db->get_where('music_setting');
        return $query->row();
    }

    function update_music_setting() {
      
        $_FILES['music']['name'] = $_FILES['music']['name'];
        $_FILES['music']['type'] = $_FILES['music']['type'];
        $_FILES['music']['tmp_name'] = $_FILES['music']['tmp_name'];
        $_FILES['music']['error'] = $_FILES['music']['error'];
        $_FILES['music']['size'] = $_FILES['music']['size'];
        $this->load->library('upload');
        $this->upload->initialize($this->set_upload_options());
        $this->upload->do_upload('music');
        $file_upload_name = $this->upload->data();
        
        $this->db->update('music_setting', array('music_setting' => $file_upload_name['file_name']));
        return 1;
    }

    function set_upload_options() {
        $this->load->helper('string');
        $randname = random_string('numeric', '8');
        $config = array();
        $config['upload_path'] = './uploads/music/';
        $config['allowed_types'] = '*';
        $config['overwrite'] = FALSE;
        $config['file_name'] = "music_" . $randname;
        return $config;
    }

}

?>
