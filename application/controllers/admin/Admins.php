<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Admins extends CI_Controller {
    public function __construct() {
        parent::__construct();
         $this->common->set_timezone();
        $login_type = $this->session->userdata('aname');
        $role = $this->session->userdata('role');
        if ($login_type != 'admin' || $role != 'super_admin') {
            redirect('admin/alogin');
        }
        $this->load->model('madmin/m_login', 'admins');
    }

    public function index() {

        $admins = $this->getAdmins();
        if (!$admins)
            return;
        $data['admins'] = $admins;

        $this->load->view('admin/header');
        $this->load->view('admin/admins', $data);
        $this->load->view('admin/footer');
    }

    public function getAdmins()
    {
        $result = $this->db->get('admin');
        if($result->num_rows() > 0){
            return $result->result_array();
        }else{
            return false;
        }
    }

    public function addAdmin()
    {
        $response = false;

        $admin_details = array(
            'username' => $this->input->post()['username'],
            'email' => $this->input->post()['email'],
            'password' => $this->input->post()['password'],
            'role' => $this->input->post()['role']
        );

        if ($this->db->insert('admin', $admin_details))
            $response = true;

        echo $response;
        return;
    }

    public function editAdmin()
    {
        $response = false;

        $admin_details = array(
            'username' => $this->input->post()['username'],
            'email' => $this->input->post()['email'],
            'password' => $this->input->post()['password'],
            'role' => $this->input->post()['role']
        );

        $this->db->where('admin_id', $this->input->post()['admin_id']);

        if ($this->db->update('admin', $admin_details))
            $response = true;

        echo $response;
        return;
    }

    public function removeAdmin($adminId)
    {
        $response = false;
        if ($this->db->delete('admin', array('admin_id' => $adminId)))
            $response = true;

        echo $response;
        return;
    }

}
