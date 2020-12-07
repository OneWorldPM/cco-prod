<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Forgotpassword extends CI_Controller {

    public function __construct() {
        parent::__construct();
         $this->common->set_timezone();
          $this->load->model('user/m_forgotpassword', 'objforgotpassword');
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('forgotpassword');
        $this->load->view('footer');
    }

    public function checkEmail() {
        $email = $this->input->post('email');
        $this->db->where('email', trim($email));
        $customer = $this->db->get('customer_master');
        if ($customer->num_rows() > 0) { //Check Email or Phone exist with new Use
            $result['msg'] = 'exist';
            echo json_encode($result);
        } else {
            $result['msg'] = 'notexist';
            echo json_encode($result);
        }
    }

    public function sendEmail() {
        $email = $this->input->post('email');
        $this->db->where('email', trim($email));
        $customer = $this->db->get('customer_master');
        if ($customer->num_rows() > 0) { //Check Email or Phone exist with new Use
            $cust_data = $customer->row();
            $from = 'support@devtesting.club';
            $subject = 'Forgot Password';
            $link = base_url() . 'forgotpassword/changePassword?id=' . base64_encode($cust_data->cust_id);

            $message = "<p>Hello,<br><br>Please use below link to reset your account Password</p><br><br>" . $link . "<br><br>Best Regards,<br>Conference Team";
            $this->common->sendEmail($from, trim($cust_data->email), $subject, $message);
            $result['msg'] = 'sendemail';
            echo json_encode($result);
        } else {
            $result['msg'] = 'error';
            echo json_encode($result);
        }
    }

    public function changePassword() {
        $data['customer_id'] = $this->input->get('id');

        $this->load->view('header');
        $this->load->view('changeforgotpassword', $data);
        $this->load->view('footer');
    }

    public function passwordChange() {
        $post = $this->input->post();
        if (!empty($post)) {
            $this->objforgotpassword->setnewpassword($post);
            header('location:' . base_url() . 'login');
        } else {
            header('location:' . base_url() . 'login');
        }
    }

}
