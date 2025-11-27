<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Checkout_Controller extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->model('AddressModel');
        $this->call->model('OrderModel');
        $this->call->model('CartModel');
        $this->call->model('OrderItemModel');
        $this->call->model('WishlistModel'); // Your Wishlist ORM model
        
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
          
    if (empty($cartItems)) {
        setMessage('error', 'Your cart is empty.');
        redirect('/cart');
        return;
    }

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
        ];

        $this->call->view('/shop/checkout-review', $data);
    }



public function checkout_address(){
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
            'wishlistCount' => $wishlistCount,
            'savedAddresses' => $addresses
        ];
        $this->call->view('/shop/checkout-address', $data);

}
public function save_address() {

    $user_id = $this->session->userdata('user_id');
    $sessionData = get_session_data($this);
    $wishlistCount = $sessionData['wishlistCount'] ?? 0;

    if (!$user_id) {
        setMessage('error', 'You must log in.');
        redirect('/login');
        return;
    }

    // Load saved addresses
    $addresses = $this->AddressModel->getAddressesByUser($user_id);

    // Check if choosing a saved address
    $saved_address_id = $this->io->post('saved_address', null);

    if (!empty($saved_address_id)) {

        // ✔ User selected an existing address
        $address_id = $saved_address_id;

    } else {

        // ✔ Validate new address
        $this->form_validation
            ->name('first_name')->required()->max_length(50)
            ->name('last_name')->required()->max_length(50)
            ->name('email')->required()->valid_email()->max_length(100)
            ->name('phone')->required()->max_length(20)
            ->name('address_line1')->required()->max_length(255)
            ->name('city')->required()->max_length(100)
            ->name('province')->required()->max_length(100)
            ->name('postal_code')->required()->max_length(20);

        if ($this->form_validation->run() == FALSE) {

            // Validation failed → rebuild page
            $data = [
                'isLoggedIn'     => $sessionData['isLoggedIn'],
                'username'       => $sessionData['username'],
                'role'           => $sessionData['role'],
                'categories'     => $sessionData['categories'],
                'cartItems'      => $sessionData['cartItems'] ?? [],
                'cartTotal'      => $sessionData['cartTotal'] ?? 0,
                'savedAddresses' => $addresses,
                'oldInput'       => $_POST,
                            'wishlistCount' => $sessionData['wishlistCount'] ?? 0,
                                        'savedAddresses' => $addresses,


            ];

            $this->call->view('/shop/checkout-address', $data);
            return;
        }

        // ✔ Insert new address
        $address_id = $this->AddressModel->insert([
            'user_id'       => $user_id,
            'first_name'    => $this->io->post('first_name'),
            'last_name'     => $this->io->post('last_name'),
            'email'         => $this->io->post('email'),
            'phone'         => $this->io->post('phone'),
            'address_line1' => $this->io->post('address_line1'),
            'address_line2' => $this->io->post('address_line2'),
            'city'          => $this->io->post('city'),
            'province'      => $this->io->post('province'),
            'postal_code'   => $this->io->post('postal_code'),
        ]);
    }

    // ✔ Save address ID to session for next step
    $this->session->set_userdata('checkout_address_id', $address_id);

    // FINAL: ✔ Always prepare $data para sa checkout-payment view
    $data = [
        'isLoggedIn'     => $sessionData['isLoggedIn'],
        'username'       => $sessionData['username'],
        'role'           => $sessionData['role'],
        'categories'     => $sessionData['categories'],
        'cartItems'      => $sessionData['cartItems'] ?? [],
        'cartTotal'      => $sessionData['cartTotal'] ?? 0,
        'address_id'     => $address_id,
        'wishlistCount'     => $wishlistCount
    ];

    // ✔ Proceed to payment page
    $this->call->view('/shop/checkout-payment', $data);
}




    // Step 2: Payment selection
    public function payment() {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id || !$this->session->userdata('checkout_address_id')) {
            setMessage('error', 'Please complete address first.');
            redirect('/checkout');
            return;
        }

        // ✅ Session data
        $sessionData = get_session_data($this);
        $isLoggedIn  = $sessionData['isLoggedIn'];
        $username    = $sessionData['username'];
        $role        = $sessionData['role'];
        $categories  = $sessionData['categories']; 
        $cartItems   = $sessionData['cartItems'] ?? []; 
        $cartTotal   = $sessionData['cartTotal'] ?? 0;
                            $wishlistCount  = $sessionData['wishlistCount'] ?? 0; // Add wishlist count

        $data = [
            'isLoggedIn' => $isLoggedIn,
            'username'   => $username,
            'role'       => $role,
            'categories' => $categories,
            'cartItems'  => $cartItems,
            'cartTotal'  => $cartTotal,
                    'wishlistCount'     => $wishlistCount

        ];

        $this->call->view('/shop/checkout_payment', $data);
    }

    // Step 2: Place order
// Step 2: Place order
public function place_order() {
    $user_id = $this->session->userdata('user_id');
    $address_id = $this->session->userdata('checkout_address_id');

    if (!$user_id || !$address_id) {
        setMessage('error', 'Missing checkout info.');
        redirect('/checkout');
        return;
    }

    $cartItems = $this->CartModel->get_user_cart($user_id);
    if (empty($cartItems)) {
        setMessage('error', 'Your cart is empty.');
        redirect('/cart');
        return;
    }

    // Compute total
    $cartTotal = 0;
    foreach ($cartItems as $item) {
        $cartTotal += $item['price'] * $item['quantity'];
    }

    // Validate payment method
    $payment_method = $this->io->post('payment_method');
    if (!in_array($payment_method, ['cod','gcash'])) {
        setMessage('error', 'Invalid payment method.');
        redirect('/checkout/payment');
        return;
    }

    // 🚨 IF GCASH → NO ORDER INSERT YET
    if ($payment_method === 'gcash') {
        $this->session->set_userdata('gcash_temp_order', [
            'user_id'    => $user_id,
            'address_id' => $address_id,
            'total'      => $cartTotal
        ]);
        redirect('/gcash/sandbox');
        return;
    }

    // -------------------------
    // ✔ COD → INSERT ORDER NOW
    // -------------------------
    $order_id = $this->OrderModel->insert([
        'user_id'        => $user_id,
        'address_id'     => $address_id,
        'total_amount'   => $cartTotal,
        'payment_status' => 'pending',
        'status'         => 'pending',
        'payment_method' => 'cod',
        'created_at'     => date('Y-m-d H:i:s'),
        'updated_at'     => date('Y-m-d H:i:s')
    ]);

    // Insert order items + stock deduction
    foreach ($cartItems as $item) {
        $this->OrderItemModel->insert([
            'order_id'   => $order_id,
            'product_id' => $item['product_id'],
            'quantity'   => $item['quantity'],
            'price'      => $item['price'],
            'subtotal'   => $item['price'] * $item['quantity']
        ]);

        // ✅ Deduct stock
        $this->ProductModel->deduct_stock($item['product_id'], $item['quantity']);
    }

    // Clear cart
    $this->CartModel->clearCart($user_id);

    // -------------------------
    // ✅ Send order confirmation email using session
    // -------------------------
    $user_email = $this->session->userdata('email');
    $username   = $this->session->userdata('username');

    $result = sendMail(
        $user_email,
        $username,
        'Order Confirmation #' . $order_id,
        '/shop/order_email', // your email view
        [
            'username'       => $username,
            'order_id'       => $order_id,
            'cartItems'      => $cartItems,
            'cartTotal'      => $cartTotal,
            'payment_method' => $payment_method
        ]
    );

    if (!$result['status']) {
        log_message('error', 'Order email failed: ' . $result['message']);
    }

    setMessage('success', 'Order placed successfully! Check your email for confirmation.');
    redirect('/order-success');
}


//     // Step 3: GCash sandbox
//  public function gcash_sandbox() {

//     // Get temp session
//     $temp = $this->session->userdata('gcash_temp_order');

//     if (!$temp) {
//         setMessage('error', 'Invalid or expired GCASH session.');
//         redirect('/checkout');
//         return;
//     }

//     // Session data
//     $sessionData = get_session_data($this);

//     $user_id    = $temp['user_id'];
//     $address_id = $temp['address_id'];
//     $cartTotal  = $temp['total'];

//     // Get cart
//     $cartItems = $this->CartModel->get_user_cart($user_id);

//     $data = [
//         'isLoggedIn' => $sessionData['isLoggedIn'],
//         'username'   => $sessionData['username'],
//         'role'       => $sessionData['role'],
//         'categories' => $sessionData['categories'],
//         'cartItems'  => $cartItems,
//         'cartTotal'  => $cartTotal,
//         'address_id' => $address_id
//     ];

//     $this->call->view('/shop/gcash_sandbox', $data);
// }


//     // Step 3: Complete GCash payment
// public function gcash_complete() {

//     $temp = $this->session->userdata('gcash_temp_order');

//     if (!$temp) {
//         setMessage('error', 'Session expired. Please try again.');
//         redirect('/checkout');
//         return;
//     }

//     $user_id    = $temp['user_id'];
//     $address_id = $temp['address_id'];
//     $cartTotal  = $temp['total'];

//     $cartItems = $this->CartModel->get_user_cart($user_id);

//     // Insert order
//     $order_id = $this->OrderModel->insert([
//         'user_id'        => $user_id,
//         'address_id'     => $address_id,
//         'total_amount'   => $cartTotal,
//         'payment_status' => 'paid',
//         'status'         => 'processing',
//         'payment_method' => 'gcash',
//         'created_at'     => date('Y-m-d H:i:s'),
//         'updated_at'     => date('Y-m-d H:i:s')
//     ]);

//     // Insert order items
//     foreach ($cartItems as $item) {
//         $this->OrderItemModel->insert([
//             'order_id'   => $order_id,
//             'product_id' => $item['product_id'],
//             'quantity'   => $item['quantity'],
//             'price'      => $item['price'],
//             'subtotal'   => $item['price'] * $item['quantity']
//         ]);
//     }

//     // Clear cart & temp session
//     $this->CartModel->clearCart($user_id);
//     $this->session->unset_userdata('gcash_temp_order');

//     setMessage('success', 'Payment successful!');
//     redirect('/order-success');
// }

    // Order success page
    public function order_success() {
        // ✅ Session data
        $sessionData = get_session_data($this);
        $isLoggedIn  = $sessionData['isLoggedIn'];
        $username    = $sessionData['username'];
        $role        = $sessionData['role'];
        $categories  = $sessionData['categories']; 
        $cartItems   = $sessionData['cartItems'] ?? []; 
        $cartTotal   = $sessionData['cartTotal'] ?? 0;
                            $wishlistCount  = $sessionData['wishlistCount'] ?? 0; // Add wishlist count


        $data = [
            'isLoggedIn' => $isLoggedIn,
            'username'   => $username,
            'role'       => $role,
            'categories' => $categories,
            'cartItems'  => $cartItems,
            'cartTotal'  => $cartTotal,
            'wishlistCount'  => $wishlistCount,
        ];

        $this->call->view('/shop/order_success', $data);
    }

}
