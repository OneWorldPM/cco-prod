<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $this->load->model('mobile/m_register', 'mobileRegister');
        $this->load->model('user/m_login', 'objlogin');

    }

    public function index() {

        $this->load->view('mobile/templates/header');
        $this->load->view('mobile/register');
        $this->load->view('mobile/templates/footer');
    }

    public function register_user(){

        $result = $this->mobileRegister->add_customer();
        if ($result == "exist") {
            header('location:' . base_url() . 'mobile/register?msg=A'); //email or phone already Exist
        } else if ($result == "error") {
            header('location:' . base_url() . 'mobile/register?msg=E'); //Some Error
        } else {
            $cust_id = $result;
            $user_details = $this->db->get_where("customer_master", array("cust_id" => $cust_id))->row();
            $token = $this->objlogin->update_user_token($cust_id);
            $session = array(
                'cid' => $user_details->cust_id,
                'cname' => $user_details->first_name,
                'fullname' => $user_details->first_name . ' ' . $user_details->last_name,
                'email' => $user_details->email,
                'token' => $token,
                'userType' => 'user',
                'isMobileUser'=>$user_details->isMobileUser
            );
            $this->session->set_userdata($session);
            redirect('mobile/sessions/view/'.$this->session->userdata('sess_id'));

        }
    }


}
