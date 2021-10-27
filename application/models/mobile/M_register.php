<?php

class M_register extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function add_customer() {
        $post = $this->input->post();
        if ($post['email'] != '' && $post['password'] != '') {
            $or_where = '(email = "' . trim($post['email']) . '")';
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
                    'email' => trim($post['email']),
                    'country' => $post['country'],
                    'password' => base64_encode($post['password']),
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
