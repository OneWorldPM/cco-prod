<?php

class M_dashboard extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function getAvailableCredits() {
        $credit_wallet = $this->db->get_where("credit_wallet", array("cust_id" => $this->session->userdata("cid")));
        if ($credit_wallet->num_rows() > 0) {
            return $credit_wallet->row()->total_credit;
        } else {
            return 0;
        }
    }
    
    function getAddedProjectData($project_id){
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where(array("project_id" =>$project_id));
        $project = $this->db->get();
        if ($project->num_rows() > 0) {
            $res_array = array();
            $res_array = $project->row();
            $res_array->question_answer = $this->common->get_question($res_array->project_id);
            return $res_array;
        } else {
            return '';
        }  
    }
      
    function addNewProject($post) {
        $set = array(
            'cust_id' => $this->session->userdata("cid"),
            'title' => trim($post['title']),
            'description' => trim($post['description']),
            'about_project' => trim($post['about_project']),
            'project_goal' => trim($post['project_goal']),
            'project_video' => trim($post['watch_video']),
            'project_status' => 1,
            "create_date" => date("y-m-d h:i")
        );
        $this->db->insert("project", $set);
        $project_id = $this->db->insert_id();
        if ($project_id > 0) {
            $credit_wallet = $this->db->get_where("credit_wallet", array("cust_id" => $this->session->userdata("cid")))->row();
            $total_questions = count($post["questions"]);
            $total_questions = $total_questions - 1;
            if (!empty($credit_wallet)) {
                if ($credit_wallet->total_credit >= $total_questions) {
                    $remaining_credits = $credit_wallet->total_credit - $total_questions;
                    $this->db->update("credit_wallet", array("total_credit" => $remaining_credits), array("cust_id" => $this->session->userdata("cid")));
                    $this->db->insert("credits_use_history", array("credits" => $total_questions, "cust_id" => $this->session->userdata("cid"), "credit_date" => date("Y-m-d h:i")));
                }
            }
            if (!empty($post["questions"])) {
                foreach ($post["questions"] as $value) {
                    $ins_array = array(
                        'project_id' => $project_id,
                        'cust_id' => $this->session->userdata("cid"),
                        'question' => $value
                    );
                    $this->db->insert("project_question", $ins_array);
                }
            }

            if ($_FILES['project_image']['name'] != "") {
                $_FILES['project_image']['name'] = $_FILES['project_image']['name'];
                $_FILES['project_image']['type'] = $_FILES['project_image']['type'];
                $_FILES['project_image']['tmp_name'] = $_FILES['project_image']['tmp_name'];
                $_FILES['project_image']['error'] = $_FILES['project_image']['error'];
                $_FILES['project_image']['size'] = $_FILES['project_image']['size'];
                $this->load->library('upload');
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('project_image');
                $file_upload_name = $this->upload->data();
                $this->db->update('project', array('project_photo' => $file_upload_name['file_name']), array('project_id' => $project_id));
            }
            return $project_id;
        } else {
            return "";
        }
    }

    function set_upload_options() {
        $this->load->helper('string');
        $randname = random_string('numeric', '8');
        $config = array();
        $config['upload_path'] = './uploads/project/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['overwrite'] = FALSE;
        $config['file_name'] = "project_" . $randname;
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

    function view_answer_section() {
        $post = $this->input->post();
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where(array("project_id" => $post['project_id']));
        $project = $this->db->get();
        if ($project->num_rows() > 0) {
            $res_array = array();
            $res_array = $project->row();
            $res_array->question_answer = $this->common->get_question_answer($res_array->project_id);
            return $res_array;
        } else {
            return '';
        }
    }

    function questions_answers_helpful() {
        $post = $this->input->post();
        if ($post['type'] == "not_helpful") {
            $set = array("questions_answer_status" => 2);
        } else {
            $set = array("questions_answer_status" => 1);
        }
        $this->db->update("questions_answers", $set, array("questions_answers_id" => $post['questions_answers_id']));
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where(array("project_id" => $post['project_id']));
        $project = $this->db->get();
        if ($project->num_rows() > 0) {
            $res_array = array();
            $res_array = $project->row();
            $res_array->question_answer = $this->common->get_question_answer($res_array->project_id);
            return $res_array;
        } else {
            return '';
        }
    }

    function addNewQuestion($post) {
        $credit_wallet = $this->db->get_where("credit_wallet", array("cust_id" => $this->session->userdata("cid")))->row();
        $total_questions = 1;
        if (!empty($credit_wallet)) {
            if ($credit_wallet->total_credit >= $total_questions) {
                $remaining_credits = $credit_wallet->total_credit - $total_questions;
                $this->db->update("credit_wallet", array("total_credit" => $remaining_credits), array("cust_id" => $this->session->userdata("cid")));
                $this->db->insert("credits_use_history", array("credits" => $total_questions, "cust_id" => $this->session->userdata("cid"), "credit_date" => date("Y-m-d h:i")));
                $ins_array = array(
                    'project_id' => $post['project_id'],
                    'cust_id' => $this->session->userdata("cid"),
                    'question' => $post['new_question']
                );
                $this->db->insert("project_question", $ins_array);
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}
