<?php

class M_register extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function add_customer() {
        $post = $this->input->post();
        if ($post['username'] != '' && $post['last_name'] != '') {
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
                    'first_name' => trim($post['first_name']),
                    'last_name' => trim($post['last_name']),
                    'username' => trim($post['username']),
                    'email' => trim($post['email']),
                    'country' => $post['country'],
                    'password' => base64_encode(strtolower($post['last_name'])),
                    'register_date' => date("Y-m-d h:i"),
                    'isMobileUser' => 1,
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
    }


}
