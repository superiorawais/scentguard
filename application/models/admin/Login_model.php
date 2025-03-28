<?php

Defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{

    public function login($data)
    {
        $email = $data['email'];
        $pass = $data['pass'];

        $this->db->where('email', $email);
        $this->db->where('pass', md5($pass));
        $this->db->where('isActive', '1');
        $query = $this->db->get('admin');

        //echo $this->db->last_query();

        if ($query->num_rows() > 0) {
            $result = $query->row_array();

            $this->session->set_userdata('user_id', $result['id']);
            $this->session->set_userdata('admin_id', $result['id']); // for login check
            $this->session->set_userdata('email', $result['email']);
            $this->session->set_userdata('fullName', $result['fullName']);
            $response = array("message" => 'Successfully Login.', "status" => '1');
        } else {
            $response = array("message" => 'Login Failed.', "status" => '0');
        }
       return $response;
    }
}
