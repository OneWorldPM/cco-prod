<?php
class M_stripe_key_setting extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
     function stripeKeySetting() {
        $query = $this->db->get_where('stripe_key_setting', array('stripe_key_setting_id' => '1'));
        return $query->row();
    }
    function updateStripeKeySetting($accountkey, $secret_key) {
        $data = array(
            'account_key' => $accountkey,
            'secret_key' => $secret_key
        );
        $this->db->update('stripe_key_setting', $data, array('stripe_key_setting_id' => '1'));
        return 1;
    }
 }   
?>
