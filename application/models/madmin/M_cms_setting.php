<?php

class M_cms_setting extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function addCms() {
        $post = $this->input->post();
        $data = array(
            'title' => trim($post['title']),
            'description' => trim($post['description']));
        $this->db->insert('tbl_cms', $data);
        $cms_id = $this->db->insert_id();
        if ($cms_id > 0) {
            return "1";
        } else {
            return "2";
        }
    }

    function getCmsdata() {
        $this->db->select('*');
        $this->db->from('tbl_cms c');
        $this->db->order_by('c.cms_id', "ASC");
        $cms = $this->db->get();
        if ($cms->num_rows() > 0) {
            return $cms->result();
        } else {
            return false;
        }
    }

    function getCmsDetail($cms_id) {
        $this->db->select('*');
        $this->db->from('tbl_cms');
        $this->db->where("cms_id", $cms_id);
        $cms = $this->db->get();
        if ($cms->num_rows() > 0) {
            return $cms->row();
        } else {
            return '';
        }
    }

    function updateCms_setting() {
        $post = $this->input->post();

        $set = array(
            'title' => trim($post['title']),
            'description' => trim($post['description'])
        );
        $this->db->update("tbl_cms", $set, array("cms_id" => $post['cms_id']));
        $cms_id = $post['cms_id'];
        if ($cms_id > 0) {
            return "1";
        } else {
            return "2";
        }
    }

    function delete_cms($cms_id) {
        $cms_data = $this->db->get_where("tbl_cms", array("cms_id" => $cms_id));
        if (!empty($cms_data)) {
            $this->db->delete("tbl_cms", array("cms_id" => $cms_id));
        }
        return TRUE;
    }

}

?>