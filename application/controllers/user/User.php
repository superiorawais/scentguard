<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model');
    }

    function index()
    {
        //if ($this->isLogin())
            $this->loadHomeView();
    }

    function loadSignUpView()
    {
        if ($this->isLogin())
            $this->template->set_layout('loginTemplate')->build('user/signup_view', '');
    }

    function loadHomeView()
    {
        //if(isset($_SESSION['userId']))
            $this->template->set_layout('userTemplate')->build('user/home_view', '');
    }


    function loadLoginView()
    {
        if ($this->isLogin())
            $this->template->set_layout('loginTemplate')->build('user/login_view', '');
    }


    function signUp()
    {
        $formData = $this->input->post();
  
            $response = $this->User_model->signUp($formData);
            echo json_encode($response);
        
    }


    function login()
    {
        $formData = $this->input->post();
        $response = $this->User_model->login($formData);
        echo json_encode($response);
    }

  

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    function getLoggedInUser()
    {
        $response = $this->User_model->getLoggedInUser();
        echo json_encode($response);
    }

    function updateProfile()
    {
        $formData = $this->input->post();
        $response = $this->User_model->updateProfile($formData);
        echo json_encode($response);
    }

    function isLogin()
    {
        if (isset($_SESSION['userId']))
            redirect('home');
        else
            return true;
    }
}
