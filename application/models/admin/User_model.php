<?php

Defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    function getUsers()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function addUser($data)
    {
        $email = $data['email'];
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return array("message" => "Email  Already Exists.", "status" => "0");
        }
        $data = array(
            'firstName' => ucfirst($data['firstName']),
            'lastName' => ucfirst($data['lastName']),
            //'userName' => $data['userName'],
            'pass' => md5($data['pass']),
            'dob' => $data['dob'],
            'gender' => $data['gender'],
           'email' => $data['email'],
           
          
        );

        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0) {
            return array("message" => "You are Successfully registered.", "status" => "1");
        } else {
            return array("message" => "Registration failed. Please try again.", "status" => "0");
        }
    }

    function getSpecificUser($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    function getSpecificPanelUser($id)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    public function editUser($data)
    {
        $id = $data['id'];
        $pass = $data['pass'];
        $email = $data['email'];
    
        // Check if the username already exists and is not the current user's username
        $this->db->where('email', $email);
        $this->db->where('id !=', $id);
        $existingUser = $this->db->get('user')->row_array();
    
        if ($existingUser) {
            return array("message" => "Email already exists.", "status" => "0");
        }
    
        $dataToUpdate = array(
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'dob' => $data['dob'],
            'gender' => $data['gender'],
            //'userName' => $userName, 
             'email' => $data['email'], 
            
        );
    
        if (!empty($pass)) {
            $dataToUpdate['pass'] = md5($pass);
        }
    
        $this->db->where('id', $id);
        $update = $this->db->update('user', $dataToUpdate);
    
        if ($update) {
            $response = array("message" => "User Successfully Updated.", "status" => "1");
        } else {
            $response = array("message" => "Operation Failed.", "status" => "0");
        }
    
        return $response;
    }
    

    public function editPanelUser($data)
    {
        $id = $data['id'];
        $pass = $data['pass'];
        $dataToUpdate = array(
            'name' => $data['fullname']
        );

        if (!empty($pass)) {
            $dataToUpdate['pass'] = md5($pass);
        }

        $this->db->where('id', $id);
        $update = $this->db->update('admin', $dataToUpdate);

        if ($update) {
            $response = array("message" => "User Successfully Updated.", "status" => "1");
        } else {
            $response = array("message" => "Operation Failed.", "status" => "0");
        }
        return $response;
    }

    function userStatus($id, $status)
    {
        
        $data = array(
            'isActive' => (int) $status
        );

        $this->db->where('id', $id);
        $query = $this->db->update('user', $data);
        

        if ($query) {
            return array("message" => "User Successfully Updated.", "status" => "1");
        } else {
            return array("message" => "Operation Failed.", "status" => "0");
        }
    }

    function deleteUser($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('user');

        if ($query) {
            return array("message" => "user Successfully Deleted.", "status" => "1");
        } else {
            return array("message" => "Operation Failed.", "status" => "0");
        }
    }
}
