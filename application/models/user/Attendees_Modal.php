<?php

class Attendees_Modal extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function searchAttendees($searchTerm)
    {
        $users = $query = $this->db->query("SELECT * FROM `customer_master` WHERE first_name LIKE '%{$searchTerm}%' OR last_name LIKE '%{$searchTerm}%' LIMIT 6");
        if ($users->num_rows() > 0) {
            return $users->result_array();
        } else {
            return false;
        }
    }

}
