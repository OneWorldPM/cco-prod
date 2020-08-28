<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $post = $this->input->post();
        $this->db->select('first_name,last_name,email');
        $this->db->from('customer_master');
        $this->db->where("cust_id", $post['user_id']);
        $customer_master = $this->db->get();
        if ($customer_master->num_rows() > 0) {
            $return_array = array("status" => "success", "msg" => "Get User Details", "result" => $customer_master->row());
        } else {
            $return_array = array("status" => "error", "msg" => "Not found");
        }
        echo json_encode($return_array);
    }

}
