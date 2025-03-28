<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('admin/User_model');
    }

    function index()
    {
        if (isUserLogin())
            $this->loadUserView();
    }

    function loadUserView()
    {
        if (isUserLogin())
            $this->template->set_layout('adminTemplate')->build('admin/user_view', '');
    }

    function addUser()
    {
        $formData = $this->input->post();
        $response = $this->User_model->addUser($formData);
        echo json_encode($response);
    }

    function getUsers()
    {
        $response = $this->User_model->getUsers();
        echo json_encode($response);
    }

    function getSpecificUser()
    {
        $id = $this->input->post('ID');
        $response = $this->User_model->getSpecificUser($id);
        echo json_encode($response);
    }


    function getSpecificPanelUser()
    {
        $id = $this->input->post('ID');
        $response = $this->User_model->getSpecificPanelUser($id);
        echo json_encode($response);
    }

    function editUser()
    {
        $formData = $this->input->post();
        $response = $this->User_model->editUser($formData);
        echo json_encode($response);
    }



    function editPanelUser()
    {
        $formData = $this->input->post();
        $response = $this->User_model->editPanelUser($formData);
        echo json_encode($response);
    }

    function userStatus()
    {
        $id = $this->input->post('ID');
        $status = $this->input->post('STATUS');
        $response = $this->User_model->userStatus($id, $status);
        echo json_encode($response);
    }

    function deleteUser()
    {
        $id = $this->input->post('ID');
        $response = $this->User_model->deleteUser($id);
        echo json_encode($response);
    }
}
