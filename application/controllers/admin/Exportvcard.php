<?php

class Exportvcard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('madmin/m_vcard', 'mvcard');
        $this->load->library('vcard');
    }

    function _remap($param) {
        $this->index($param);
    }

    public function index($id) {
        $result = $this->mvcard->getData($id);

        $datavcard = $this->getvcard($result);

        if (is_array($datavcard)) {
            $this->vcard->vcard($datavcard);
        } else {
            $this->vcard->vcard();
        }

        $this->vcard->zipdownload();
    }

    function getvcard($result) {

        $datavcarddata = array();
        $datavcarddata['first_name'] = $result->first_name;
        $datavcarddata['last_name'] = $result->last_name;
        $datavcarddata['company'] = $result->specialty;
        $datavcarddata['email'] = $result->email;
        $datavcarddata['twitter'] = "https://twitter.com/" . $result->twitter_id;
        $datavcarddata['facebook'] = "https://facebook.com/" . $result->facebook_id;
        $datavcarddata['instagram'] = "https://instagram.com/" . $result->instagram_id;
        $datavcarddata['photo'] = base_url() . "uploads/customer_profile/" . $result->profile;
        $datavcarddata['website'] = "";
        return $datavcarddata;
    }

}

?>