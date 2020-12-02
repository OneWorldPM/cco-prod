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
    }

    function generateRandomString($length = 6) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function get_plan_pricing() {
        $this->db->select('*');
        $this->db->from('plan_pricing');
        $plan_pricing = $this->db->get();
        if ($plan_pricing->num_rows() > 0) {
            return $plan_pricing->result();
        } else {
            return '';
        }
    }

    function get_user_profile_details($reg_id) {
        $this->db->select('*');
        $this->db->from('customer_master');
        $this->db->where('cust_id', $reg_id);
        $user = $this->db->get();
        if ($user->num_rows() > 0) {
            return $user->row();
        } else {
            return '';
        }
    }

    function update_user() {
        $post = $this->input->post();
        $cust_id = $post['cust_id'];
        $set = array(
            'first_name' => trim($post['first_name']),
            'last_name' => trim($post['last_name']),
            'specialty' => trim($post['specialty']),
            'topic' => trim($post['topic']),
            'zipcode' => trim($post['zipcode']),
            'phone' => trim($post['cell_phone']),
            'address' => $post['address'] . " " . $post['address_2'],
            'city' => trim($post['city']),
            'state' => trim($post['state']),
            'country' => trim($post['country']),
        );
        $this->db->update("customer_master", $set, array('cust_id' => $cust_id));
        if ($_FILES['profile']['size'] != 0) {
            $config = array(
                'upload_path' => './uploads/customer_profile/',
                'allowed_types' => "jpg|png|jpeg",
                'overwrite' => TRUE
            );
            $this->load->library('upload', $config);
            $_FILES["profile"]['name'] = $_FILES['profile']['name'];
            $_FILES["profile"]['type'] = $_FILES['profile']['type'];
            $_FILES["profile"]['tmp_name'] = $_FILES['profile']['tmp_name'];
            $_FILES["profile"]['error'] = $_FILES['profile']['error'];
            $_FILES["profile"]['size'] = $_FILES['profile']['size'];
            $file_name = "profile_" . $this->generateRandomString();
            $config['file_name'] = $file_name;
            $this->upload->initialize($config);
            $this->upload->do_upload("profile");
            $imageDetailArray = $this->upload->data();
            $this->db->set('profile', $imageDetailArray['file_name'])->where('cust_id', $cust_id)->update('customer_master');
        }

//        if ($_FILES['upload_vcard']['size'] != 0) {
//            $config = array(
//                'upload_path' => './uploads/upload_vcard/',
//                'allowed_types' => "*",
//                'overwrite' => TRUE
//            );
//            $this->load->library('upload', $config);
//            $_FILES["upload_vcard"]['name'] = $_FILES['upload_vcard']['name'];
//            $_FILES["upload_vcard"]['type'] = $_FILES['upload_vcard']['type'];
//            $_FILES["upload_vcard"]['tmp_name'] = $_FILES['upload_vcard']['tmp_name'];
//            $_FILES["upload_vcard"]['error'] = $_FILES['upload_vcard']['error'];
//            $_FILES["upload_vcard"]['size'] = $_FILES['upload_vcard']['size'];
//            $file_name = "vcard_" . $this->generateRandomString();
//            $config['file_name'] = $file_name;
//            $this->upload->initialize($config);
//            $this->upload->do_upload("upload_vcard");
//            $imageDetailArray = $this->upload->data();
//            $this->db->set('v_card', $imageDetailArray['file_name'])->where('cust_id', $cust_id)->update('customer_master');
//        }
        return $cust_id;
    }

    public function update_registration_type() {
        $post = $this->input->post();
        $cust_id = $post['cust_id'];
        $set = array(
            'plan_id' => trim($post['plan_name']),
        );
        $this->db->update("customer_master", $set, array('cust_id' => $cust_id));
        return $cust_id;
    }

    public function get_user_payment_details($reg_id) {
        $this->db->select('*');
        $this->db->from('customer_master c');
        $this->db->join('plan_pricing p', 'c.plan_id=p.plan_pricing_id');
        $this->db->where('cust_id', $reg_id);
        $user = $this->db->get();
        if ($user->num_rows() > 0) {
            return $user->row();
        } else {
            return '';
        }
    }

    public function pay_payment() {
        $post = $this->input->post();
        $cust_id = $post['cust_id'];
        $this->db->select('*');
        $this->db->from('customer_master');
        $this->db->where('cust_id', $cust_id);
        $user = $this->db->get();
        if ($user->num_rows() > 0) {
//            $user_data = $user->row();
//            $from = 'admin@yourconference.live';
//            $subject = 'Your Registration for the 2020 Virtual Meeting';
//            $message = '<p><img src="' . base_url() . 'front_assets/images/logo_new.png"></p><p>Thank you for registering for the meeting.</p> 
//                               <div><table>
//                                    <tr>
//                                        <td>' . $post['plan_name'] . '</td>
//                                        <td>' . $post['member_price'] . '</td>
//                                    </tr>
//                                     <tr style="border-bottom: 1px solid">
//                                        <td>Registration ID#' . $user_data->register_id . '</td>
//                                        <td>' . $post['total_discount'] . '</td>
//                                    </tr>
//                                    <tr>
//                                        <td><b>Tax(4%)</b></td>
//                                        <td>' . $post['total_tax'] . '</td>
//                                    </tr>
//                                    <tr>
//                                        <td><b>Total</b></td>
//                                        <td>' . $post['total_payment'] . '</td>
//                                    </tr>
//                                    </table></b>';
//            $this->common->sendEmail($from, $user_data->email, $subject, $message);
        }
        return $cust_id;
    }

    public function get_promo_code_details() {
        $post = $this->input->post();
        $this->db->select('*');
        $this->db->from('promo_code');
        $this->db->where('promo_code', $post['promo_code']);
        $promo_code = $this->db->get();
        if ($promo_code->num_rows() > 0) {
            return $promo_code->row();
        } else {
            return '';
        }
    }

    public function get_cms_details($cms_id) {
        $this->db->select('*');
        $this->db->from('tbl_cms');
        $this->db->where('cms_id', $cms_id);
        $tbl_cms = $this->db->get();
        if ($tbl_cms->num_rows() > 0) {
            return $tbl_cms->row();
        } else {
            return '';
        }
    }

}
