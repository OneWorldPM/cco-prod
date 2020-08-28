<?php

class M_vcard extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getData($id) {
        $result = $this->db->get_where('customer_master', array('cust_id' => $id));
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return '';
        }
    }

}

?>