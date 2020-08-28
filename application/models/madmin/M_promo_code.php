<?php

class M_promo_code extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_promo_code() {
        $this->db->select('*');
        $this->db->from('promo_code');
        $promo_code = $this->db->get();
        if ($promo_code->num_rows() > 0) {
            return $promo_code->result();
        } else {
            return '';
        }
    }

    function add_promo_code($post) {

        if ($post['cr_type'] == 'save') {
            $data = array(
                'promo_code' => $post['promo_code'],
                'discount' => $post['discount']
            );
            $this->db->insert('promo_code', $data);
            $pid = $this->db->insert_id();
            if ($pid) {
                return $pid;
            } else {
                return '';
            }
        } else if ($post['cr_type'] == 'update') {
            $set_array = array(
                'promo_code' => $post['promo_code'],
                'discount' => $post['discount']
            );
            $this->db->update('promo_code', $set_array, array('promo_code_id' => $post['promo_code_id']));
            if ($this->db->affected_rows()) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

}
