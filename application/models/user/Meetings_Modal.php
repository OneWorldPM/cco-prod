<?php

class Meetings_Modal extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    public function newMeeting()
    {
        $host = $this->session->userdata('cid');
        $topic = $this->input->post('topic');
        $from = $this->input->post('from');
        $to = $this->input->post('to');
        $attendees = $this->input->post('attendees');

        $data = array(
            'host' => $host,
            'topic' => $topic,
            'meeting_from' => $from,
            'meeting_to' => $to
        );

        if($this->db->insert('lounge_meetings', $data))
        {
            $meeting_id = $this->db->insert_id();

            foreach ( $attendees as $attendee){
                $attendees_list[] = array(
                    'meeting_id' => $meeting_id,
                    'attendee_id'=> $attendee
                );
            }
            if ($this->db->insert_batch('lounge_meeting_attendees', $attendees_list))
                return true;
        }

        return false;
    }

    public function getMeetings($user)
    {
        $meetings = $query = $this->db->query("
                                        SELECT DISTINCT lm.*, CONCAT(cm.first_name, ' ', cm.last_name) AS host_name
                                        FROM lounge_meetings lm
                                        LEFT JOIN lounge_meeting_attendees lma ON lm.id = lma.meeting_id
                                        LEFT JOIN customer_master cm ON lm.host = cm.cust_id
                                        WHERE lm.host = '{$user}' OR lma.attendee_id = '{$user}'
                                        ");
        if ($meetings->num_rows() > 0) {

            foreach ($meetings->result() as $meeting)
            {
                $meeting->attendees = $this->getAttendeesPerMeet($meeting->id);
            }
            return $meetings->result();
        } else {
            return false;
        }
    }

    public function getAttendeesPerMeet($meeting_id)
    {
        $users = $query = $this->db->query("
                                        SELECT attendee_id 
                                        FROM lounge_meeting_attendees
                                        WHERE meeting_id = '{$meeting_id}'
                                        ");
        if ($users->num_rows() > 0) {
            return $users->result_array();
        } else {
            return '';
        }
    }

    public function identityValidation($meeting_id, $attendee_id)
    {
        $users = $query = $this->db->query("
                                        SELECT lm.id 
                                        FROM lounge_meetings lm
                                        LEFT JOIN lounge_meeting_attendees lma ON lm.id = lma.meeting_id
                                        WHERE (lm.host = '{$attendee_id}' OR lma.attendee_id = '{$attendee_id})') 
                                              AND lm.id = '{$meeting_id}'
                                        ");
        if ($users->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getMeetingDetails($meeting_id)
    {
        $meetings = $query = $this->db->query("
                                        SELECT DISTINCT lm.*, CONCAT(cm.first_name, ' ', cm.last_name) AS host_name
                                        FROM lounge_meetings lm
                                        LEFT JOIN lounge_meeting_attendees lma ON lm.id = lma.meeting_id
                                        LEFT JOIN customer_master cm ON lm.host = cm.cust_id
                                        WHERE lm.id = '{$meeting_id}'
                                        ");
        if ($meetings->num_rows() > 0) {

            foreach ($meetings->result() as $meeting)
            {
                $meeting->attendees = $this->getAttendeesPerMeet($meeting->id);
            }
            return $meetings->result()[0];
        } else {
            return false;
        }
    }

}
