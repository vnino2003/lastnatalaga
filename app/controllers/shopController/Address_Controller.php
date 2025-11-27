<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Address_Controller extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->model('AddressModel');
    }


   public function index() {
    // ✅ Get session data
    $sessionData = get_session_data($this);

    $isLoggedIn = $sessionData['isLoggedIn'];
    $username   = $sessionData['username'];
    $role       = $sessionData['role'];
    $categories = $sessionData['categories'];
      $categories  = $sessionData['categories']; 
    $cartItems   = $sessionData['cartItems'];
             $wishlistCount  = $sessionData['wishlistCount'] ?? 0; // Add wishlist count


    // ✅ Optional: Redirect guest to login
    if (!$isLoggedIn) {
        redirect('/login');
        return;
    }

    // ✅ Get logged-in user ID
    $user_id = $this->session->userdata('user_id');

    // ✅ Load user data from the database
    $user = $this->UserModel->get_customer_by_id($user_id);
    if (!$user) {
        show_error('User not found');
        return;
    }

    // ✅ Get all addresses for the logged-in user
    $addresses = $this->AddressModel->getAddressesByUser($user_id);

    // ✅ Prepare all data for the view
    $data = [
        'isLoggedIn' => true,
        'username'   => $username,
        'role'       => $role,
        'categories' => $categories,
        'user'       => $user,        // user info for sidebar/profile
        'addresses'  => $addresses  ,
         'categories'  => $categories,
            'cartItems'   => $cartItems, // addresses for address list
            'wishlistCount'   => $wishlistCount   // addresses for address list
    ];

    // ✅ Pass all data to the view
    $this->call->view('/shop/address-list', $data);
}


    // Show add address form
    public function address() {
         $sessionData = get_session_data($this);

    $isLoggedIn = $sessionData['isLoggedIn'];
    $username   = $sessionData['username'];
    $role       = $sessionData['role'];
    $categories = $sessionData['categories'];
      $categories  = $sessionData['categories']; 
    $cartItems   = $sessionData['cartItems'];

    // ✅ Optional: Redirect guest to login
    if (!$isLoggedIn) {
        redirect('/login');
        return;
    }

    // ✅ Get logged-in user ID
    $user_id = $this->session->userdata('user_id');

    // ✅ Load user data from the database
    $user = $this->UserModel->get_customer_by_id($user_id);
    if (!$user) {
        show_error('User not found');
        return;
    }

    // ✅ Get all addresses for the logged-in user
    $addresses = $this->AddressModel->getAddressesByUser($user_id);

    // ✅ Prepare all data for the view
    $data = [
        'isLoggedIn' => true,
        'username'   => $username,
        'role'       => $role,
        'categories' => $categories,
        'user'       => $user,        // user info for sidebar/profile
        'addresses'  => $addresses  ,
         'categories'  => $categories,
            'cartItems'   => $cartItems   // addresses for address list
    ];
        $this->call->view('/shop/address-add', $data);
    }

    // Handle form submission
    public function insert_address() {

    // 1️⃣ Form validation
    $this->form_validation
        ->name('first_name')->required()->max_length(100)
        ->name('last_name')->required()->max_length(100)
        ->name('email')->required()->max_length(200)
        ->name('phone')->required()->max_length(50)
        ->name('address_line1')->required()->max_length(255)
        ->name('address_line2')->max_length(255)
        ->name('city')->required()->max_length(100)
        ->name('province')->required()->max_length(100)
        ->name('postal_code')->max_length(20);

    if ($this->form_validation->run() == FALSE) {
        $errors = $this->form_validation->get_errors();
        setErrors('$errors');
        redirect('/user/address-add');
        return;
    }

    // 2️⃣ Collect POST data
    $user_id = $this->session->userdata('user_id'); // logged-in user
    $first_name = $this->io->post('first_name');
    $last_name  = $this->io->post('last_name');
    $email      = $this->io->post('email');
    $phone      = $this->io->post('phone');
    $address_line1 = $this->io->post('address_line1');
    $address_line2 = $this->io->post('address_line2') ?: null;
    $city       = $this->io->post('city');
    $province   = $this->io->post('province');
    $postal_code = $this->io->post('postal_code') ?: null;

    // 3️⃣ Optional: check duplicate address for user
    // $existing = $this->AddressModel->find_existing($user_id, $address_line1, $city);
    // if ($existing) {
    //     setMessage('error', 'Address already exists!');
    //     redirect('/user/address-add');
    //     return;
    // }

    // 4️⃣ Insert into database
    $this->AddressModel->insert([
        'user_id' => $user_id,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'phone' => $phone,
        'address_line1' => $address_line1,
        'address_line2' => $address_line2,
        'city' => $city,
        'province' => $province,
        'postal_code' => $postal_code,
    ]);

    // 5️⃣ Success message & redirect
    setMessage('success', 'Address added successfully!');
    redirect('/user/address-list');
}

// Show edit form
public function edit($id) {
    $sessionData = get_session_data($this);

    $isLoggedIn = $sessionData['isLoggedIn'];
    $username   = $sessionData['username'];
    $role       = $sessionData['role'];
    $categories = $sessionData['categories'];
    $cartItems  = $sessionData['cartItems'];
    $user_id = $this->session->userdata('user_id');

    // ✅ Optional: Redirect guest to login
    if (!$isLoggedIn) {
        redirect('/login');
        return;
    }
    $user = $this->UserModel->get_customer_by_id($user_id);
    if (!$user) {
        show_error('User not found');
        return;
    }
   $address = $this->AddressModel->getAddressByUser($user_id); // use the $id from the edit($id) method

// ✅ Check if the address exists and belongs to the logged-in user
if (!$address || $address['user_id'] != $user_id) {
    setMessage('error', 'Address not found!');
    redirect('/address-list');
    return;

    }  $data = [
        'isLoggedIn' => true,
        'username'   => $username,
        'role'       => $role,
        'categories' => $categories,
        'cartItems'  => $cartItems,
        'user'       => $user,
        'address'    => $address
    ];

    // ✅ Load edit view
    $this->call->view('/shop/address-edit', $data);
}

// Handle update
public function update_address($id) {
    $user_id = $this->session->userdata('user_id');

    // Validation (same as before)
    $this->form_validation
        ->name('first_name')->required()->max_length(100)
        ->name('last_name')->required()->max_length(100)
        ->name('email')->required()->max_length(200)
        ->name('phone')->required()->max_length(50)
        ->name('address_line1')->required()->max_length(255)
        ->name('address_line2')->max_length(255)
        ->name('city')->required()->max_length(100)
        ->name('province')->required()->max_length(100)
        ->name('postal_code')->max_length(20);

    if ($this->form_validation->run() == FALSE) {
        setErrors($this->form_validation->get_errors());
        redirect("/user/address-edit/$id");
        return;
    }

    // Collect data
    $this->AddressModel->update($id, [
        'first_name'    => $this->io->post('first_name'),
        'last_name'     => $this->io->post('last_name'),
        'email'         => $this->io->post('email'),
        'phone'         => $this->io->post('phone'),
        'address_line1' => $this->io->post('address_line1'),
        'address_line2' => $this->io->post('address_line2') ?: null,
        'city'          => $this->io->post('city'),
        'province'      => $this->io->post('province'),
        'postal_code'   => $this->io->post('postal_code') ?: null,
    ]);

  
        setMessage('success', 'Address updated successfully!');
    

    redirect('/address-list');
}

public function delete_address($id) {
    $user_id = $this->session->userdata('user_id');

    // Delete the specific address
    $this->AddressModel->delete($id, $user_id); // pass both id and user_id for security

    setMessage('success', 'Address deleted successfully!');
    redirect('address-list');
}


    // List all addresses
 
}
