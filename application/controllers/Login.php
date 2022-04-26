<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->common->set_timezone();
        $this->load->model('user/m_login', 'objlogin');
    }

    public function index() {
        $this->load->view('header');
        $this->load->view('login');
        $this->load->view('footer');
    }

    public function authentication() {
        $username = $this->input->post('email');
        $password = $this->input->post('password');

        if (strlen(trim(preg_replace('/\xb2\xa0/', '', $username))) == 0 || strlen(trim(preg_replace('/\xb2\xa0/', '', $password))) == 0) {
            $this->session->set_flashdata('msg', '<div class="col-md-12 text-red" style="padding: 0 0 10px 0;">Please enter Username or Password</div><br>');
            redirect('login');
        } else {
            $arr = array(
                'email' => $username,
                'password' => base64_encode($password)
            );
            $data = $this->objlogin->user_login($username,base64_encode($password));
            if ($data) {
                $token = $this->objlogin->update_user_token($data['cust_id']);
                $session = array(
                    'cid' => $data['cust_id'],
                    'cname' => $data['first_name'],
                    'fullname' => $data['first_name'] . ' ' . $data['last_name'],
                    'email' => $data['email'],
                    'token' => $token,
                    'userType' => 'user'
                );
                $this->session->set_userdata($session);
                redirect('sessions');
            } else {
                $this->session->set_flashdata('msg', '<div class="col-md-12 text-red" style="padding: 0 0 10px 0;">Username or Password is Wrong.</div><br>');
                redirect('login');
            }
        }
    }

    function register_login($cust_id) {
        $data = $this->objlogin->register_login($cust_id);
        if ($data) {
            $token = $this->objlogin->update_user_token($data['cust_id']);
            $session = array(
                'cid' => $data['cust_id'],
                'cname' => $data['first_name'],
                'fullname' => $data['first_name'] . ' ' . $data['last_name'],
                'email' => $data['email'],
                'token' => $token,
                'userType' => 'user'
            );
            $this->session->set_userdata($session);
            redirect('home');
        } else {
            redirect('login');
        }
    }

    function logout() {
        $this->session->unset_userdata('cid');
        $this->session->unset_userdata('cname');
        $this->session->unset_userdata('fullname');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('token');
        $this->session->unset_userdata('userType');
        header('location:' . base_url() . 'login');
    }

    function cco_authentication() {
        $token = $this->input->get('token');
        $response_array = json_decode(base64_decode(str_replace('_', '/', str_replace('-', '+', explode('.', $token)[1]))));

        if (isset($response_array) && !empty($response_array)) {
            $identifier = $response_array->identity->identifier;
            $member_id = substr($identifier, 4);
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://www.clinicaloptions.com/api/external?memberid=" . $member_id . "&SecurityToken=OUqrB8i6Bc002GZGtZHod49QVBdPjEo4qu1vxnHWmnhe5MSf7kW1v62yXhINaal7JK3tuC3Z0gBuGEpwh8l5SQ%3D%3D",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_SSL_VERIFYPEER => FALSE,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $member_array = json_decode($response);
            if (isset($member_array) && !empty($member_array)) {
                $or_where = '(email = "' . $member_array->emailAddress . '")';
                $this->db->where($or_where);
                $customer = $this->db->get('customer_master');

                if ($customer->num_rows() > 0) {
                    $user_details = $customer->row();
                    $set_update_array = array(
                        'first_name' => $member_array->firstName,
                        'last_name' => $member_array->lastName,
                        'email' => $member_array->emailAddress,
                        'specialty' => $member_array->specialty,
                        'degree' => $member_array->degree,
                        'city' => $response_array->identity->city,
                        'zipcode' => $response_array->identity->zip,
                        'state' => $response_array->identity->state,
                        'country' => $response_array->identity->country,
                        'topic' => $member_array->topics,
                        'identifier_id' => $response_array->identity->identifier,
                        'customer_session' => $response_array->session,
                        'iat' => $response_array->iat,
                        'exp' => $response_array->exp,
                        'aud' => json_encode($response_array->aud),
                        'jti' => $response_array->jti
                    );
                    $this->db->update("customer_master", $set_update_array, array("cust_id" => $user_details->cust_id));
                    $token = $this->objlogin->update_user_token($user_details->cust_id);
                    $session = array(
                        'cid' => $user_details->cust_id,
                        'cname' => $user_details->first_name,
                        'fullname' => $user_details->first_name . " " . $user_details->last_name,
                        'email' => $user_details->email,
                        'token' => $token,
                        'userType' => 'user'
                    );
                    $this->session->set_userdata($session);
                    $sessions = $this->db->get_where('sessions', array('sessions_id' => $response_array->session));
                    if ($sessions->num_rows() > 0) {
                        redirect('sessions/attend/' . $response_array->session);
                    } else {
//                        redirect('home');
                        echo '<div style="align-content:center; text-align:center; margin-top: 10%">
    <img src="https://yourconference.live/CCO/front_assets/images/YCL_logo.png">
    <h1 style="text-align:center">There is an error in the session number</h1>
</div>';
                    }
                } else {
                    $this->db->order_by("cust_id", "desc");
                    $row_data = $this->db->get("customer_master")->row();
                    if (!empty($row_data)) {
                        $reg_id = $row_data->cust_id;
                        $register_id = date("Y") . '-20' . $reg_id;
                    } else {
                        $register_id = date("Y") . '-200';
                    }
                    $set = array(
                        "register_id" => $register_id,
                        'first_name' => ($member_array->firstName == '')?'_Empty_':$member_array->firstName,
                        'last_name' => ($member_array->lastName == '')?'_Empty_':$member_array->lastName,
                        'email' => $member_array->emailAddress,
                        'password' => base64_encode(123),
                        'specialty' => $member_array->specialty,
                        'degree' => $member_array->degree,
                        'city' => $response_array->identity->city,
                        'zipcode' => $response_array->identity->zip,
                        'state' => $response_array->identity->state,
                        'country' => $response_array->identity->country,
                        'topic' => $member_array->topics,
                        'identifier_id' => $response_array->identity->identifier,
                        'customer_session' => $response_array->session,
                        'iat' => $response_array->iat,
                        'exp' => $response_array->exp,
                        'aud' => json_encode($response_array->aud),
                        'jti' => $response_array->jti,
                        'address' => "",
                        'register_date' => date("Y-m-d h:i")
                    );
                    $this->db->insert("customer_master", $set);
                    $cust_id = $this->db->insert_id();
                    $user_details = $this->db->get_where("customer_master", array("cust_id" => $cust_id))->row();
                    if (!empty($user_details)) {
                        $token = $this->objlogin->update_user_token($user_details->cust_id);
                        $session = array(
                            'cid' => $user_details->cust_id,
                            'cname' => $user_details->first_name,
                            'fullname' => $user_details->first_name . " " . $user_details->last_name,
                            'email' => $user_details->email,
                            'token' => $token,
                            'userType' => 'user'
                        );
                        $this->session->set_userdata($session);
                        $sessions = $this->db->get_where('sessions', array('sessions_id' => $response_array->session));
                        if ($sessions->num_rows() > 0) {
                            redirect('sessions/attend/' . $response_array->session);
                        } else {
//                            redirect('home');
                            echo '<div style="align-content:center; text-align:center; margin-top: 10%">
    <img src="https://yourconference.live/CCO/front_assets/images/YCL_logo.png">
    <h1 style="text-align:center">There is an error in the session number</h1>
</div>';
                        }
                    }
                }
            }else{
                echo "User details not received from CCO";
            }
        }
    }

    public function unauthorizedUser($session_id, $token)
    {
        if ($token != 'Q0NPVW5hdXRob3JpemVkVXNlclRva2Vu')
        {
            redirect('login');
        }

        $this->db->select('cust_id');
        $this->db->from('customer_master');
        $this->db->where('is_unauthorized', 1);
        $this->db->limit(1);
        $this->db->order_by('cust_id', 'DESC');
        $last_unauthorized = $this->db->get();

        if ($last_unauthorized->num_rows() > 0) {
            $cust_id = ($last_unauthorized->result()[0]->cust_id)+1;
            $email = "unauthorized_user_{$cust_id}@yourconference.live";
            $set = array(
                'first_name' => "Learner_{$cust_id}",
                'last_name' => "Learner_{$cust_id}",
                'email' => $email,
                'country' => 'Unknown',
                'password' => base64_encode('unauthorized123#'),
                'is_unauthorized' => 1,
                'register_date' => date("Y-m-d h:i")
            );
            $this->db->insert("customer_master", $set);
        } else {
            $cust_id = 0;
            $email = "unauthorized_user_{$cust_id}@yourconference.live";
            $set = array(
                'first_name' => "Learner_{$cust_id}",
                'last_name' => "Learner_{$cust_id}",
                'email' => $email,
                'country' => 'Unknown',
                'password' => base64_encode('unauthorized123#'),
                'is_unauthorized' => 1,
                'register_date' => date("Y-m-d h:i")
            );
            $this->db->insert("customer_master", $set);
        }

        $cust_id = $this->db->insert_id();

        $token = $this->objlogin->update_user_token($cust_id);
        $session = array(
            'cid' => $cust_id,
            'cname' => "Learner_{$cust_id}",
            'fullname' => "Learner_{$cust_id}",
            'email' => $email,
            'token' => $token,
            'userType' => 'user'
        );
        $this->session->set_userdata($session);
        $sessions = $this->db->get_where('sessions', array('sessions_id' => $session_id));
        if ($sessions->num_rows() > 0) {
            redirect('sessions/attend/' . $session_id);
        }
        else
        {
            echo '
                    <div style="align-content:center; text-align:center; margin-top: 10%">
                    <img src="https://yourconference.live/CCO/front_assets/images/YCL_logo.png">
                    <h1 style="text-align:center">Session ID '.$session_id.' not found in our database.</h1>
                    <h2 style="text-align:center">Please contact system administrator.</h2>
                    </div>';
        }

    }

}
