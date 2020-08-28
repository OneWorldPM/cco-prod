<?php

class M_plan_pricing extends CI_Model {

    function __construct() {
        parent::__construct();
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

    function add_plan_pricing($post) {

        if ($post['cr_type'] == 'save') {
            $data = array(
                'plan_name' => $post['plan_name'],
                'member_price' => $post['member_price'],
                'non_member_price' => $post['non_member_price'],
                'color_code' => $post['color_code']
            );

            $this->db->insert('plan_pricing', $data);
            $pid = $this->db->insert_id();
            if ($pid) {
                return $pid;
            } else {
                return '';
            }
        } else if ($post['cr_type'] == 'update') {
            $set_array = array(
                'plan_name' => $post['plan_name'],
                'member_price' => $post['member_price'],
                'non_member_price' => $post['non_member_price'],
                'color_code' => $post['color_code']
            );
            $this->db->update('plan_pricing', $set_array, array('plan_pricing_id' => $post['plan_pricing_id']));
            if ($this->db->affected_rows()) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

}
