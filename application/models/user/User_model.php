<?php

Defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function signUp($data)
    {

        $email = $data['email'];
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return array("message" => "Email Already Exists.", "status" => "0");
        }
        $data = array(
            'firstName' => ucfirst($data['firstName']),
            'lastName' => ucfirst($data['lastName']),
            'email' => $data['email'],
            'pass' => md5($data['pass']),
            'dob' => $data['dob'],
            'gender'=>$data['gender']
          
        );

        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0) {
            return array("message" => "You are Successfully registered.", "status" => "1");
        } else {
            return array("message" => "Registration failed. Please try again.", "status" => "0");
        }
    }

    public function getUserById($userId)
    {
        // Get user data
        $this->db->where('id', $userId);
        $query = $this->db->get('user');

        if ($query->num_rows() > 0) {
            $userData = $query->row_array();


            $this->db->where('parentId', $userId);
            $cardQuery = $this->db->get('card');

            if ($cardQuery->num_rows() > 0) {
                $cardData = $cardQuery->result_array();
                // Add card data to user data
                $userData['card'] = $cardData;
            } else {
                $userData['card'] = []; // No card data found
            }

            return $userData;
        } else {
            return null;
        }
    }

    public function getLoggedInUser()
    {
        $userId = $this->session->userdata('userId');

        if (!$userId) {
            return null;
        }

        $query = $this->db->get_where('user', array('id' => $userId));

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function login($data)
    {
        $email = $data['email'];
    
        $pass = md5($data['pass']);

        $this->db->where('email' , $email );
        $this->db->where('pass', $pass);
        $this->db->where('isActive', '1');
        $query = $this->db->get('user');

        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $this->session->set_userdata('userId', $result['id']);
            $this->session->set_userdata('firstName', $result['firstName']);
            $this->session->set_userdata('lastName', $result['lastName']);
            $this->session->set_userdata('pass', $result['pass']);
            $this->session->set_userdata('gender', $result['gender']);
            return array("message" => 'Successfully Logged in.', "status" => '1');
        } else {
            return array("message" => 'Login Failed! Id or Password Invalid.', "status" => '0');
        }
    }

    
    public function updateProfile($data)
    {
        $userId = $this->session->userdata('userId');

        // Prepare the data to be updated
        $updateData = array(
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'dob' => $data['dob'],
            // 'email' => $data['email'],
               
        );

        // Check if Id is set and needs to be updated
        if (isset($data['email'])) {
            // Check if the new Id already exists in the database
            $this->db->where('email', $data['email']);
            $this->db->where('id !=', $userId); // Exclude the current user
            $query = $this->db->get('user');

            if ($query->num_rows() > 0) {
                return array("message" => "Email already exists.", "status" => "0");
            } else {
                $updateData['email'] = $data['email'];
            }
        }

        // Check if password is set and needs to be updated
        if (!empty($data['pass'])) {
            $updateData['pass'] = md5($data['pass']);
        }

        // Perform the update
        $this->db->where('id', $userId);
        $update = $this->db->update('user', $updateData);

        if ($update) {
            return array("message" => "Profile successfully updated.", "status" => "1");
        } else {
            return array("message" => "Update failed.", "status" => "0");
        }
    }


    
}
