<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Order_Controller extends Controller {


       public function __construct() {
        parent::__construct();
        $this->call->model('AddressModel');
        $this->call->model('OrderModel');
        $this->call->model('CartModel');
        $this->call->model('OrderItemModel');
        $this->call->model('WishlistModel');
        
    }

    // Step 1: Checkout page (cart review & address selection)
    public function index() {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            setMessage('error', 'You must log in or register before proceeding to checkout.');
            redirect('login');
            return;
        }

        // ✅ Session data (always include)
        $sessionData = get_session_data($this);
        $isLoggedIn  = $sessionData['isLoggedIn'];
        $username    = $sessionData['username'];
        $role        = $sessionData['role'];
        $categories  = $sessionData['categories']; 
        $cartItems   = $sessionData['cartItems'] ?? []; 
        $cartTotal   = $sessionData['cartTotal'] ?? 0;
        $wishlistCount  = $sessionData['wishlistCount'] ?? 0; // Add wishlist count


        // Fetch user cart and recalc total
        $cart_items = $this->CartModel->get_user_cart($user_id);
            $orders = $this->OrderModel->getOrdersByUser($user_id);
            $user = $this->UserModel->get_customer_by_id($user_id);

  
        $cartTotal = 0;
        foreach ($cart_items as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }

        // Fetch saved addresses
        $addresses = $this->AddressModel->getAddressesByUser($user_id);

        $data = [
            'isLoggedIn'     => $isLoggedIn,
            'username'       => $username,
            'role'           => $role,
            'categories'     => $categories,
            'cartItems'      => $cart_items,
            'cartTotal'      => $cartTotal,
            'savedAddresses' => $addresses,
            'wishlistCount' => $wishlistCount,
              'orders'       => $orders,  
              'user'       =>  $user,  
        ];

        $this->call->view('/shop/order-list', $data);
    }

public function detail($order_id)
{
    $user_id = $this->session->userdata('user_id');
    if (!$user_id) {
        setMessage('error', 'You must log in or register before proceeding.');
        redirect('login');
        return;
    }

    // Session data
    $sessionData = get_session_data($this);
    $cartItems = $sessionData['cartItems'] ?? [];
    $wishlistCount = $sessionData['wishlistCount'] ?? 0;
            $user = $this->UserModel->get_customer_by_id($user_id);

    // Fetch the order details
    $order = $this->OrderModel->getOrderDetail($order_id);
    if (!$order || $order['user_id'] != $user_id) {
        setMessage('error', 'Order not found.');
        redirect('order-list');
        return;
    }

    // Fetch order items
    $order_items = $this->OrderModel->getOrderItems($order_id);

    // Calculate subtotal
    $subtotal = 0;
    foreach ($order_items as $item) {
        $subtotal += $item['amount'];
    }

    $data = [
        'isLoggedIn'   => $sessionData['isLoggedIn'],
        'username'     => $sessionData['username'],
        'role'         => $sessionData['role'],
        'categories'   => $sessionData['categories'],
        'cartItems'    => $cartItems,
        'wishlistCount'=> $wishlistCount,
        'order'        => $order,
        'order_items'  => $order_items,
        'subtotal'     => $subtotal,
        'user'     =>  $user ,
    ];

    $this->call->view('/shop/order-details', $data);
}




}