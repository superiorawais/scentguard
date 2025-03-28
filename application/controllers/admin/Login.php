<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Login_model');
    }

    function index() {
        if ($this->isLogin())
            $this->loadLoginView();
    }

    function loadLoginView() {
        if ($this->isLogin())
        $this->template->set_layout('adminTemplate2')->build('admin/login_view', '');
    }

    function login() {
        $formData = $this->input->post();
        $response = $this->Login_model->login($formData);
        echo json_encode($response);
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('admin/Login');
    }

    function isLogin() {
        if (isset($_SESSION['user_id']))
            redirect('admin/User');
        else
            return true;
    }

}
