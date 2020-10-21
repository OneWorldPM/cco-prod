<?php

class M_dummy_user extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_dummy_user() {
        $this->db->select('*');
        $this->db->from('customer_master');
        $this->db->where("customer_type", "Dummy users");
        $this->db->order_by("cust_id", "DESC");
        $result = $this->db->get();
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return '';
        }
    }

    function add_dummy_user($post) {
        if ($post['cr_type'] == 'save') {
            if ($post['username'] != '' && $post['password'] != '') {
                $or_where = '(username = "' . trim($post['username']) . '")';
                $this->db->where($or_where);
                $customer = $this->db->get('customer_master');
                if ($customer->num_rows() > 0) { //Check Email or Phone exist with new User 
                    return "exist";
                } else {
                    $this->db->order_by("cust_id", "desc");
                    $row_data = $this->db->get("customer_master")->row();
                    if (!empty($row_data)) {
                        $reg_id = $row_data->cust_id;
                        $register_id = date("Y") . '-20' . $reg_id;
                    } else {
                        $register_id = date("Y") . '-200';
                    }
                    $set = array(
                        "register_id" => $register_id,
                        'first_name' => "",
                        'last_name' => "",
                        'email' => "",
                        'username' => $post['username'],
                        'password' => base64_encode($post['password']),
                        'customer_type' => 'Dummy users',
                        'member_status' => "guest-member",
                        'register_date' => date("Y-m-d h:i")
                    );
                    $this->db->insert("customer_master", $set);
                    $cust_id = $this->db->insert_id();
                    if ($cust_id > 0) {
                        return $cust_id;
                    } else {
                        return "error";
                    }
                }
            } else {
                return "error";
            }
        } else if ($post['cr_type'] == 'update') {
            if ($post['username'] != '' && $post['password'] != '') {
                $or_where = '(username = "' . trim($post['username']) . '")';
                $this->db->where($or_where);
                $this->db->where("cust_id <>", $post['cust_id']);
                $customer = $this->db->get('customer_master');
                if ($customer->num_rows() > 0) { //Check Email or Phone exist with new User 
                    return "exist";
                } else {
                    $set = array(
                        'username' => $post['username'],
                        'password' => base64_encode($post['password']),
                        'customer_type' => 'Dummy users'
                    );
                    $this->db->update("customer_master", $set, array("cust_id" => $post['cust_id']));
                    $cust_id = $post['cust_id'];
                    if ($cust_id > 0) {
                        return $cust_id;
                    } else {
                        return "error";
                    }
                }
            } else {
                return "error";
            }
        }
    }

}
