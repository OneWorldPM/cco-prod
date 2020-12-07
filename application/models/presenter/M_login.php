<?php
class M_login extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function user_login($login_data) {
        $result = $this->db->select('*')->get_where('presenter', $login_data);
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return '';
        }
    }

    function setnewpassword($post){
        $data = array(
            'password' => (trim($post['conf_password']))
        );
        $this->db->update('presenter', $data, array('presenter_id' => base64_decode($post['cid'])));
        return 1;
    }



}
