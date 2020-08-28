<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Promo_code extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_promo_code', 'mpromocode');
    }

    public function index() {
        $data['promo_code'] = $this->mpromocode->get_promo_code();
        $this->load->view('admin/header');
        $this->load->view('admin/promo_code', $data);
        $this->load->view('admin/footer');
    }

    public function add_promo_code() {
        $post = $this->input->post();
        if (!empty($post)) {
            $res = $this->mpromocode->add_promo_code($post);
            if ($res) {
                header('Location: ' . base_url() . 'admin/promo_code?msg=S');
            } else {
                header('Location: ' . base_url() . 'admin/promo_code?msg=E');
            }
        }
    }

    public function getPromoCodeById($pid) {
        $q = $this->db->get_where('promo_code', array('promo_code_id' => $pid));
        if ($q->num_rows() > 0) {
            $plan = $q->row();
            $data['msg'] = 'success';
            $data['data'] = $plan;
        } else {
            $data['msg'] = 'error';
            $data['data'] = 'Record not found please try again later!';
        }
        echo json_encode($data);
    }

    public function deletePromoCode($pid) {
        $this->db->delete('promo_code', array('promo_code_id' => $pid));
        header('Location: ' . base_url() . 'admin/promo_code?msg=D');
    }

}
