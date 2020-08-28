<?php

class SponsorLogin extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function validate($login_data) {
        $result = $this->db->select('*')->get_where('sponsor_credentials', $login_data);
        if ($result->num_rows() > 0) {
            return $result->row_array();
        } else {
            return false;
        }
    }

}
