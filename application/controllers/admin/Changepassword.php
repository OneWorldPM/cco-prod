<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Changepassword extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->common->set_timezone();
                $login_type = $this->session->userdata('aname');
                if($login_type != 'admin'){
                    redirect('admin/alogin');
                }
	}
      
	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/changepassword');
		$this->load->view('admin/footer');
	}
	
	public function updatePassword(){
	    $post = $this->input->post();
	    $oldpassword = $this->getOldPassword();
	    if($oldpassword != ''){
	       if($oldpassword == $post['opassword']){
	           $this->db->update('admin',array('password'=>$post['cpassword']),array('admin_id'=>1));
	           header('location:' . base_url() . 'admin/changepassword?msg=S');
	       }else{
	           header('location:' . base_url() . 'admin/changepassword?msg=NM');
	       }
	    }else{
	         header('location:' . base_url() . 'admin/changepassword?msg=E');
	    }
	}
	
	public function getOldPassword(){
	    $result = $this->db->get_where('admin',array('admin_id'=>'1'));
        return ($result->num_rows() > 0) ? $result->row()->password : '';
	}
}