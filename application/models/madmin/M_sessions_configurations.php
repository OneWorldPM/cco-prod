<?php

class M_sessions_configurations extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getSessionTypes() {
        $this->db->select('*');
        $this->db->from('sessions_type');
        $sessions_type = $this->db->get();
        if ($sessions_type->num_rows() > 0) {
            return $sessions_type->result();
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

    function add_configurations($post) {
        $sessions_type = $this->db->get("sessions_type")->result();
        if (isset($sessions_type) && !empty($sessions_type)) {
            foreach ($sessions_type as $key => $val) {
                $key++;
                if ($post['session_types_' . $key] != "") {
                    $set_array = array(
                        'sessions_type' => $post['session_types_' . $key],
                    );
                    $this->db->update("sessions_type", $set_array, array("sessions_type_id" => $val->sessions_type_id));
                } else {
                    $this->db->update("sessions_type", array("sessions_type" => ""), array("sessions_type_id" => $val->sessions_type_id));
                }
            }
        }

        $sessions_tracks = $this->db->get("sessions_tracks")->result();
        if (isset($sessions_tracks) && !empty($sessions_tracks)) {
            foreach ($sessions_tracks as $key => $val) {
                $key++;
                if ($post['session_tracks_' . $key] != "") {
                    $set_array = array(
                        'sessions_tracks' => $post['session_tracks_' . $key],
                    );
                    $this->db->update("sessions_tracks", $set_array, array("sessions_tracks_id" => $val->sessions_tracks_id));
                } else {
                    $this->db->update("sessions_tracks", array("sessions_tracks" => ""), array("sessions_tracks_id" => $val->sessions_tracks_id));
                }
            }
        }
        return TRUE;
    }

}

?>
