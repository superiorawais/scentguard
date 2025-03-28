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

    function loadProfileView()
    {
        if (isWebUserLogin())
            $userId = $this->session->userdata('id');
            $this->User_model->insertRemindersForGoal($userId);
        $data['childern'] =  $this->User_model->getChildernByParentId($userId);
        $data['goals'] =  $this->User_model->getGoalByChildId($userId);
        $data['user'] =  $this->User_model->getUserById($userId);
        $data['requests'] =  $this->User_model->getRequestsByParentId($userId);
        $data['myRequests'] =  $this->User_model->getRequestsByChildId($userId);
        $data['childLogs'] =  $this->User_model->getTransactionLogByChildId($userId);
        $data['parentLogs'] =  $this->User_model->getTransactionLogByParentId($userId);
        $data['products'] =  $this->User_model->getProducts();
        $data['reminders']= $this->User_model->getReminders($userId);


// echo "<pre/>";
// print_r($data['user']);

        $cart = $this->session->userdata('cart');
        if (!$cart || empty($cart))
            $cart = array();
        $data['cart'] = $cart;

        $this->template->set_layout('userTemplate')->build('user/profile_view', $data);
    }

    function updateRequestStatus()
    {
        $formData = $this->input->post();
        $response = $this->User_model->updateRequestStatus($formData);
        echo json_encode($response);
    }

    function updateReminderStatus()
    {
        $response = $this->User_model->updateReminderStatus();
        echo json_encode($response);
    }

    

    function deleteCard()
    {
        $formData = $this->input->post();
        $response = $this->User_model->deleteCard($formData);
        echo json_encode($response);
    }

    function getOrderDetailByOrderNUmber()
    {
        $formData = $this->input->post();
        $response = $this->User_model->getOrderDetailByOrderNUmber($formData);
        echo json_encode($response);
    }


    function getReminders()
    {
         
$childId=$this->session->userdata('id');
        $response = $this->User_model->getReminders($childId);
        echo json_encode($response);
    }


    function signUp()
    {
        $formData = $this->input->post();
  
            $response = $this->User_model->signUp($formData);
            echo json_encode($response);
        
    }

    function addMoney()
    {
        $formData = $this->input->post();
        $response = $this->User_model->addMoney($formData);
        echo json_encode($response);
    }

    public function addToCart()
    {
        // Get product ID from POST data
        $productId = $this->input->post('productId');

        // Validate product ID
        if (empty($productId) || !is_numeric($productId)) {
            $response = array(
                'status' => '0',
                'message' => 'Invalid product ID'
            );
            echo json_encode($response);
            return;
        }

        // Get product details from the database
        $product = $this->User_model->getProductById($productId);

        if (!$product) {
            $response = array(
                'status' => '0',
                'message' => 'Product not found'
            );
            echo json_encode($response);
            return;
        }

        // Get the current cart from the session
        $cart = $this->session->userdata('cart');
        if (!$cart) {
            $cart = array();
        }

        // Check if product is already in the cart
        $productExists = false;
        foreach ($cart as &$item) {
            if ($item['productId'] == $productId) {
                $item['quantity'] += 1;
                $productExists = true;
                break;
            }
        }

        // If product is not in the cart, add it
        if (!$productExists) {
            $cart[] = array(
                'productId' => $productId,
                'productName' => $product->name,
                'productPrice' => $product->price,
                'productImage' => $product->image,
                'quantity' => 1
            );
        }

        // Update the cart in the session
        $this->session->set_userdata('cart', $cart);

        // Return the updated cart
        $response = array(
            'status' => '1',
            'message' => 'Product added to cart successfully',
            'cart' => $cart
        );

        echo json_encode($response);
    }


    public function checkout()
    {

        $cart = $this->session->userdata('cart');
        $response = $this->User_model->checkout($cart);
        echo json_encode($response);

    }

    public function updateCartQuantity()
    {
        $productId = $this->input->post('productId');
        $action = $this->input->post('action');
        
        $cart = $this->session->userdata('cart');
    
        foreach ($cart as $key => &$item) {
            if ($item['productId'] == $productId) {
                if ($action == 'increment') {
                    $item['quantity']++;
                } elseif ($action == 'decrement' && $item['quantity'] > 1) {
                    $item['quantity']--;
                } elseif ($action == 'remove' || ($action == 'decrement' && $item['quantity'] == 1)) {
                    unset($cart[$key]);
                }
                break;
            }
        }
    
        $cart = array_values($cart);
    
        $this->session->set_userdata('cart', $cart);
    
        echo json_encode(['message'=>'Cart updated successfully','status' => '1', 'cart' =>  $cart]);
    }
    




    function addGoal()
    {
        $formData = $this->input->post();
        $response = $this->User_model->addGoal($formData);
        echo json_encode($response);
    }

    function addGoalMoney()
    {
        $formData = $this->input->post();
        $response = $this->User_model->addGoalMoney($formData);
        echo json_encode($response);
    }


    function requestMoney()
    {
        $formData = $this->input->post();
        $response = $this->User_model->requestMoney($formData);
        echo json_encode($response);
    }


    function addParentMoney()
    {
        $formData = $this->input->post();
        $response = $this->User_model->addParentMoney($formData);
        echo json_encode($response);
    }

    function addCard()
    {
        $formData = $this->input->post();
        $response = $this->User_model->addCard($formData);
        echo json_encode($response);
    }



    function withdrawMoney()
    {
        $formData = $this->input->post();
        $response = $this->User_model->withdrawMoney($formData);
        echo json_encode($response);
    }

    function login()
    {
        $formData = $this->input->post();
        $response = $this->User_model->login($formData);
        echo json_encode($response);
    }


    function addChild()
    {
        $formData = $this->input->post();
        $response = $this->User_model->addChild($formData);
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
