<?php

class M_eposters extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getEpostersAll() {
        $this->db->select('*');
        $this->db->from('eposters e');
        $this->db->order_by("e.assigned_id", "ASC");
        $eposters = $this->db->get();
        if ($eposters->num_rows() > 0) {
            $return_array = array();
            foreach ($eposters->result() as $val) {
                $val->presenter = $this->common->get_presenter_eposters($val->presenter_id);
                $return_array[] = $val;
            }
            return $return_array;
        } else {
            return '';
        }
    }

    function getPresenterDetails() {
        $this->db->select('*');
        $this->db->from('presenter');
        $presenter = $this->db->get();
        if ($presenter->num_rows() > 0) {
            return $presenter->result();
        } else {
            return '';
        }
    }

    function edit_eposters($eposters_id) {
        $this->db->select('*');
        $this->db->from('eposters');
        $this->db->where("eposters_id", $eposters_id);
        $eposters = $this->db->get();
        if ($eposters->num_rows() > 0) {
            $result_sessions = $eposters->row();
            $result_sessions->eposters_presenter = $this->common->get_presenter_eposters($result_sessions->presenter_id);
            return $result_sessions;
        } else {
            return '';
        }
    }

    function createEposters() {
        $post = $this->input->post();
        if (!empty($post['sessions_tracks'])) {
            $sessions_tracks_id = implode(",", $post['sessions_tracks']);
        } else {
            $sessions_tracks_id = "";
        }
        $set = array(
            'presenter_id' => implode(",", $post['select_presenter_id']),
            'eposters_title' => trim($post['eposters_title']),
            'assigned_id' => trim($post['assigned_id']),
            'sessions_tracks_id' => $sessions_tracks_id,
            "reg_date" => date("Y-m-d h:i")
        );
        $this->db->insert("eposters", $set);
        $eposters_id = $this->db->insert_id();
        if ($eposters_id > 0) {
            if ($_FILES['eposters_photo']['name'] != "") {
                $_FILES['eposters_photo']['name'] = $_FILES['eposters_photo']['name'];
                $_FILES['eposters_photo']['type'] = $_FILES['eposters_photo']['type'];
                $_FILES['eposters_photo']['tmp_name'] = $_FILES['eposters_photo']['tmp_name'];
                $_FILES['eposters_photo']['error'] = $_FILES['eposters_photo']['error'];
                $_FILES['eposters_photo']['size'] = $_FILES['eposters_photo']['size'];
                $this->load->library('upload');
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('eposters_photo');
                $file_upload_name = $this->upload->data();
                $this->db->update('eposters', array('eposters_photo' => $file_upload_name['file_name']), array('eposters_id' => $eposters_id));
            }

            if ($_FILES['eposters_area_photo']['name'] != "") {
                $_FILES['eposters_area_photo']['name'] = $_FILES['eposters_area_photo']['name'];
                $_FILES['eposters_area_photo']['type'] = $_FILES['eposters_area_photo']['type'];
                $_FILES['eposters_area_photo']['tmp_name'] = $_FILES['eposters_area_photo']['tmp_name'];
                $_FILES['eposters_area_photo']['error'] = $_FILES['eposters_area_photo']['error'];
                $_FILES['eposters_area_photo']['size'] = $_FILES['eposters_area_photo']['size'];
                $this->load->library('upload');
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('eposters_area_photo');
                $file_upload_name = $this->upload->data();
                $this->db->update('eposters', array('eposters_area_photo' => $file_upload_name['file_name']), array('eposters_id' => $eposters_id));
            }
            return "1";
        } else {
            return "2";
        }
    }

    function set_upload_options() {
        $this->load->helper('string');
        $randname = random_string('numeric', '8');
        $config = array();
        $config['upload_path'] = './uploads/eposters/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = FALSE;
        $config['file_name'] = "eposters_" . $randname;
        return $config;
    }

    function generateRandomString($length = 8) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }

    function updateEposters() {
        $post = $this->input->post();
        if (!empty($post['sessions_tracks'])) {
            $sessions_tracks_id = implode(",", $post['sessions_tracks']);
        } else {
            $sessions_tracks_id = "";
        }
        $set = array(
            'presenter_id' => implode(",", $post['select_presenter_id']),
            'eposters_title' => trim($post['eposters_title']),
            'assigned_id' => trim($post['assigned_id']),
            'sessions_tracks_id' => $sessions_tracks_id,
            "reg_date" => date("Y-m-d h:i")
        );
        $this->db->update("eposters", $set, array("eposters_id" => $post['eposters_id']));
        $eposters_id = $post['eposters_id'];
        if ($eposters_id > 0) {
            if ($_FILES['eposters_photo']['name'] != "") {
                $_FILES['eposters_photo']['name'] = $_FILES['eposters_photo']['name'];
                $_FILES['eposters_photo']['type'] = $_FILES['eposters_photo']['type'];
                $_FILES['eposters_photo']['tmp_name'] = $_FILES['eposters_photo']['tmp_name'];
                $_FILES['eposters_photo']['error'] = $_FILES['eposters_photo']['error'];
                $_FILES['eposters_photo']['size'] = $_FILES['eposters_photo']['size'];
                $this->load->library('upload');
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('eposters_photo');
                $file_upload_name = $this->upload->data();
                $this->db->update('eposters', array('eposters_photo' => $file_upload_name['file_name']), array('eposters_id' => $eposters_id));
            }

            if ($_FILES['eposters_area_photo']['name'] != "") {
                $_FILES['eposters_area_photo']['name'] = $_FILES['eposters_area_photo']['name'];
                $_FILES['eposters_area_photo']['type'] = $_FILES['eposters_area_photo']['type'];
                $_FILES['eposters_area_photo']['tmp_name'] = $_FILES['eposters_area_photo']['tmp_name'];
                $_FILES['eposters_area_photo']['error'] = $_FILES['eposters_area_photo']['error'];
                $_FILES['eposters_area_photo']['size'] = $_FILES['eposters_area_photo']['size'];
                $this->load->library('upload');
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('eposters_area_photo');
                $file_upload_name = $this->upload->data();
                $this->db->update('eposters', array('eposters_area_photo' => $file_upload_name['file_name']), array('eposters_id' => $eposters_id));
            }
            return "1";
        } else {
            return "2";
        }
    }

    function delete_eposters($eposters_id) {
        $this->db->delete("eposters", array("eposters_id" => $eposters_id));
        return TRUE;
    }

    function get_poll_type() {
        $this->db->select('*');
        $this->db->from('poll_type');
        $poll_type = $this->db->get();
        if ($poll_type->num_rows() > 0) {
            return $poll_type->result();
        } else {
            return '';
        }
    }

    function view_eposters($eposters_id) {
        $this->db->select('*');
        $this->db->from('eposters e');
        $this->db->where("eposters_id", $eposters_id);
        $eposters = $this->db->get();
        if ($eposters->num_rows() > 0) {
            $result_sessions = $eposters->row();
            $result_sessions->eposters_presenter = $this->common->get_presenter_eposters($result_sessions->presenter_id);
            return $result_sessions;
        } else {
            return '';
        }
    }

    function getSessionTracks() {
        $this->db->select('*');
        $this->db->from('sessions_tracks');
        $sessions_tracks = $this->db->get();
        if ($sessions_tracks->num_rows() > 0) {
            return $sessions_tracks->result();
        } else {
            return '';
        }
    }

}
