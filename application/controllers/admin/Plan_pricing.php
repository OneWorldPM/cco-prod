<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Plan_pricing extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_plan_pricing', 'mplanpricing');
    }

    public function index() {
        $data['plan_pricing'] = $this->mplanpricing->get_plan_pricing();
        $this->load->view('admin/header');
        $this->load->view('admin/plan_pricing', $data);
        $this->load->view('admin/footer');
    }

    public function add_plan_pricing() {
        $post = $this->input->post();
        if (!empty($post)) {
            $res = $this->mplanpricing->add_plan_pricing($post);
            if ($res) {
                header('Location: ' . base_url() . 'admin/plan_pricing?msg=S');
            } else {
                header('Location: ' . base_url() . 'admin/plan_pricing?msg=E');
            }
        }
    }

    public function getPlanPricingById($pid) {
        $q = $this->db->get_where('plan_pricing', array('plan_pricing_id' => $pid));
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

    public function deletePlanPricing($pid) {
        $this->db->delete('plan_pricing', array('plan_pricing_id' => $pid));
        header('Location: ' . base_url() . 'admin/plan_pricing?msg=D');
    }

}
