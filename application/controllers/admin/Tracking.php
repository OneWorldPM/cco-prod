<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tracking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        if ($login_type != 'admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_tracking', 'mtracking');
    }

    public function index() {
        $data['sessions'] = $this->mtracking->getSessionsAll();
        $this->load->view('admin/header');
        $this->load->view('admin/tracking_sessions', $data);
        $this->load->view('admin/footer');
    }

    public function view_poll($sessions_id) {
        $data['poll_data'] = $this->mtracking->get_poll_details($sessions_id);
        $this->load->view('admin/header');
        $this->load->view('admin/tracking_sessions_view_poll', $data);
        $this->load->view('admin/footer');
    }

    public function view_question_answer($sessions_id) {
        $data['result_data'] = $this->mtracking->get_question_list($sessions_id);

        $this->load->view('admin/header');
        $this->load->view('admin/tracking_sessions_view_question_answer', $data);
        $this->load->view('admin/footer');
    }

    function view_result($sessions_poll_question_id) {
        $data['poll_report'] = $this->mtracking->view_result($sessions_poll_question_id);
        $data['poll_tracking'] = $this->mtracking->poll_tracking($sessions_poll_question_id);
        $this->load->view('admin/header');
        $this->load->view('admin/tracking_view_result', $data);
        $this->load->view('admin/footer');
    }

    function view_sessions_history($sessions_id) {
        $data['view_sessions_history'] = $this->mtracking->get_view_sessions_history($sessions_id);
        $this->load->view('admin/header');
        $this->load->view('admin/view_sessions_history', $data);
        $this->load->view('admin/footer');
    }

    function export_all_tracking_csv(){
       $getAllInfo=$this->mtracking->getExportAllTracking();
       $file_name = 'LES_Tracking_Report/'.date('Y-m-d').'.csv';
       header("Content-Description: File Transfer"); 
       header("Content-Disposition: attachment; filename=$file_name"); 
       header("Content-Type: application/csv;");
       $file = fopen('php://output', 'w');
       $header = array('','SessionsID',"User",'IP Address','Operating System','Browser','Resolution', 'Entry Time', 'End Time'); 
       fputcsv($file, $header);
       $extra_columns = array('column1' => " ");
       foreach ($getAllInfo->result_array() as $value)
       { 
           $csv_data = array_merge($extra_columns,$value);
           fputcsv($file,$csv_data); 
       }
       fclose($file); 
       exit; 
    }
}
