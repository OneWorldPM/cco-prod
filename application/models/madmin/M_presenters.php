<?php

class M_presenters extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_presenters() {
        $this->db->select('*');
        $this->db->from('presenter');
        $presenter = $this->db->get();
        if ($presenter->num_rows() > 0) {
            return $presenter->result();
        } else {
            return '';
        }
    }

    function add_presenters($post) {
        if ($post['cr_type'] == 'save') {
            $or_where = '(email = "' . trim($post['email']) . '")';
            $this->db->where($or_where);
            $presenter = $this->db->get('presenter');
            if ($presenter->num_rows() > 0) {
                return '';
            } else {
                $data = array(
                    'first_name' => $post['first_name'],
                    'last_name' => $post['last_name'],
                    'presenter_name' => $post['first_name'] . ' ' . $post['last_name'],
                    'title' => $post['title'],
                    'degree' => $post['degree'],
                    'specialty' => $post['specialty'],
                    'designation' => $post['designation'],
                    'bio' => $post['bio'],
                    'company_name' => $post['company_name'],
                    'email' => $post['email'],
                    'password' => $post['password'],
                    'facebook' => $post['facebook'],
                    'linkin' => $post['linkin'],
                    'twitter' => $post['twitter'],
                    'reg_date' => date("Y-m-d h:i:s")
                );
                $this->db->insert('presenter', $data);
                $pid = $this->db->insert_id();
                if ($pid > 0) {
                    if ($_FILES['presenter_photo']['name'] != "") {
                        $_FILES['presenter_photo']['name'] = $_FILES['presenter_photo']['name'];
                        $_FILES['presenter_photo']['type'] = $_FILES['presenter_photo']['type'];
                        $_FILES['presenter_photo']['tmp_name'] = $_FILES['presenter_photo']['tmp_name'];
                        $_FILES['presenter_photo']['error'] = $_FILES['presenter_photo']['error'];
                        $_FILES['presenter_photo']['size'] = $_FILES['presenter_photo']['size'];
                        $this->load->library('upload');
                        $this->upload->initialize($this->set_upload_options());
                        $this->upload->do_upload('presenter_photo');
                        $file_upload_name = $this->upload->data();
                        $this->db->update('presenter', array('presenter_photo' => $file_upload_name['file_name']), array('presenter_id' => $pid));
                    }
                    return $pid;
                } else {
                    return '';
                }
            }
        } else if ($post['cr_type'] == 'update') {
            $or_where = '(email = "' . trim($post['email']) . '")';
            $this->db->where($or_where);
            $this->db->where("presenter_id <>", $post['presenter_id']);
            $presenter = $this->db->get('presenter');
            if ($presenter->num_rows() > 0) {
                return '';
            } else {
                $set_array = array(
                    'first_name' => $post['first_name'],
                    'last_name' => $post['last_name'],
                    'presenter_name' => $post['first_name'] . ' ' . $post['last_name'],
                    'designation' => $post['designation'],
                    'title' => $post['title'],
                    'degree' => $post['degree'],
                    'specialty' => $post['specialty'],
                    'bio' => $post['bio'],
                    'company_name' => $post['company_name'],
                    'password' => $post['password'],
                    'facebook' => $post['facebook'],
                    'linkin' => $post['linkin'],
                    'twitter' => $post['twitter'],
                    'email' => $post['email']
                );
                $this->db->update('presenter', $set_array, array('presenter_id' => $post['presenter_id']));
                if ($post['presenter_id'] > 0) {
                    if ($_FILES['presenter_photo']['name'] != "") {
                        $_FILES['presenter_photo']['name'] = $_FILES['presenter_photo']['name'];
                        $_FILES['presenter_photo']['type'] = $_FILES['presenter_photo']['type'];
                        $_FILES['presenter_photo']['tmp_name'] = $_FILES['presenter_photo']['tmp_name'];
                        $_FILES['presenter_photo']['error'] = $_FILES['presenter_photo']['error'];
                        $_FILES['presenter_photo']['size'] = $_FILES['presenter_photo']['size'];
                        $this->load->library('upload');
                        $this->upload->initialize($this->set_upload_options());
                        $this->upload->do_upload('presenter_photo');
                        $file_upload_name = $this->upload->data();
                        $this->db->update('presenter', array('presenter_photo' => $file_upload_name['file_name']), array('presenter_id' => $post['presenter_id']));
                    }
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
    }

    function set_upload_options() {
        $this->load->helper('string');
        $randname = random_string('numeric', '8');
        $config = array();
        $config['upload_path'] = './uploads/presenter_photo/';
        $config['allowed_types'] = 'jpg|png';
        $config['overwrite'] = FALSE;
        $config['file_name'] = "presenter_" . $randname;
        return $config;
    }

}
