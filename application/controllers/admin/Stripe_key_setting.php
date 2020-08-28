<?php
class Stripe_key_setting extends CI_Controller {
    function __construct() {
        parent::__construct();
        $login_type = $this->session->userdata('aname');
                if($login_type != 'admin'){
                    redirect('admin/alogin');
                }
        $this->load->model('madmin/m_stripe_key_setting','stripekeysetting');
    }

    function index() {
            $data['stripekey'] = $this->stripekeysetting->stripeKeySetting();
            $this->load->view('admin/header');
            $this->load->view('admin/Stripe-Key-Setting',$data);
            $this->load->view('admin/footer');
    }
     

    function updateStripeKeySetting() {
        $accountkey = $this->input->post('accountkey');
        $secret_key = $this->input->post('secret_key');
        $result = $this->stripekeysetting->updateStripeKeySetting($accountkey, $secret_key);
        if($result){
        header('location:' . site_url() . 'admin/stripe_key_setting?msg=U');
        }
    }

}

?>
