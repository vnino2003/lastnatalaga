<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Welcome extends Controller {

    public function __construct()
    {
        parent::__construct();
        $this->call->model('AuthModel');
        $this->call->model('CategoryModel'); // ✅ Add this line
        $this->call->library('session');
        $this->call->model('UserModel'); // or whatever model you placed the get_customer_by_id() function in
        $this->call->model('AuthModel'); // or whatever model you placed the get_customer_by_id() function in

    }

 public function index()
    {
        // ✅ Load all session + category data from helper
        $sessionData = get_session_data($this);

        $isLoggedIn = $sessionData['isLoggedIn'];
        $username   = $sessionData['username'];
        $role       = $sessionData['role'];
        $categories = $sessionData['categories'];
         $cartItems  = $sessionData['cartItems'];
         $wishlistCount  = $sessionData['wishlistCount'] ?? 0; // Add wishlist count


        // ✅ If logged in
        if ($isLoggedIn) {
            // Redirect admin to dashboard
            if ($role === 'admin') {
                redirect('/admin/products');
                return; // stop further execution
            }

            // Normal user → show shop page
            $data = [
                'isLoggedIn' => $isLoggedIn,
                'username'   => $username,
                'role'       => $role,
                'categories' => $categories,
                'cartItems'  => $cartItems,
                        'wishlistCount' => $wishlistCount // pass wishlist count to view

            ];
            $this->call->view('/shop/index', $data);

        } else {
            // ✅ Not logged in → show shop page in guest mode
            $data = [
                'isLoggedIn' => false,
                'username'   => null,
                'role'       => null,
                'categories' => $categories
            ];
            $this->call->view('/shop/index', $data);
        }
    }


    public function about(){
           $sessionData = get_session_data($this);

        $isLoggedIn = $sessionData['isLoggedIn'];
        $username   = $sessionData['username'];
        $role       = $sessionData['role'];
        $categories = $sessionData['categories'];
         $cartItems  = $sessionData['cartItems'];
         $wishlistCount  = $sessionData['wishlistCount'] ?? 0; // Add wishlist count


        // ✅ If logged in
        if ($isLoggedIn) {
            // Redirect admin to dashboard
            if ($role === 'admin') {
                redirect('/admin/products');
                return; // stop further execution
            }

            // Normal user → show shop page
            $data = [
                'isLoggedIn' => $isLoggedIn,
                'username'   => $username,
                'role'       => $role,
                'categories' => $categories,
                'cartItems'  => $cartItems,
                        'wishlistCount' => $wishlistCount // pass wishlist count to view

            ];
            $this->call->view('/shop/about', $data);

        } else {
            // ✅ Not logged in → show shop page in guest mode
            $data = [
                'isLoggedIn' => false,
                'username'   => null,
                'role'       => null,
                'categories' => $categories
            ];
            $this->call->view('/shop/about', $data);



    }


}


 public function category(){
           $sessionData = get_session_data($this);

        $isLoggedIn = $sessionData['isLoggedIn'];
        $username   = $sessionData['username'];
        $role       = $sessionData['role'];
        $categories = $sessionData['categories'];
         $cartItems  = $sessionData['cartItems'];
         $wishlistCount  = $sessionData['wishlistCount'] ?? 0; // Add wishlist count


        // ✅ If logged in
        if ($isLoggedIn) {
            // Redirect admin to dashboard
            if ($role === 'admin') {
                redirect('/admin/products');
                return; // stop further execution
            }

            // Normal user → show shop page
            $data = [
                'isLoggedIn' => $isLoggedIn,
                'username'   => $username,
                'role'       => $role,
                'categories' => $categories,
                'cartItems'  => $cartItems,
                        'wishlistCount' => $wishlistCount // pass wishlist count to view

            ];
            $this->call->view('/shop/category', $data);

        } else {
            // ✅ Not logged in → show shop page in guest mode
            $data = [
                'isLoggedIn' => false,
                'username'   => null,
                'role'       => null,
                'categories' => $categories
            ];
            $this->call->view('/shop/category', $data);



    }


}




 public function contact(){
           $sessionData = get_session_data($this);

        $isLoggedIn = $sessionData['isLoggedIn'];
        $username   = $sessionData['username'];
        $role       = $sessionData['role'];
        $categories = $sessionData['categories'];
         $cartItems  = $sessionData['cartItems'];
         $wishlistCount  = $sessionData['wishlistCount'] ?? 0; // Add wishlist count


        // ✅ If logged in
        if ($isLoggedIn) {
            // Redirect admin to dashboard
            if ($role === 'admin') {
                redirect('/admin/products');
                return; // stop further execution
            }

            // Normal user → show shop page
            $data = [
                'isLoggedIn' => $isLoggedIn,
                'username'   => $username,
                'role'       => $role,
                'categories' => $categories,
                'cartItems'  => $cartItems,
                        'wishlistCount' => $wishlistCount // pass wishlist count to view

            ];
            $this->call->view('/shop/contact', $data);

        } else {
            // ✅ Not logged in → show shop page in guest mode
            $data = [
                'isLoggedIn' => false,
                'username'   => null,
                'role'       => null,
                'categories' => $categories
            ];
            $this->call->view('/shop/contact', $data);



    }


}








 public function profile()
    {
        // ✅ Load session data again (you can later move this to BaseController)
        $sessionData = get_session_data($this);

        $isLoggedIn = $sessionData['isLoggedIn'];
        $username   = $sessionData['username'];
        $role       = $sessionData['role'];
        $categories = $sessionData['categories'];

    $cartItems   = $sessionData['cartItems'];

        // ✅ Optional: Redirect guest to login
        if (!$isLoggedIn) {
            redirect('/login');
            return;
        }

      $user_id = $this->session->userdata('user_id');

    // ✅ Load user data from the database
    $user = $this->UserModel->get_customer_by_id($user_id);

    if (!$user) {
        show_error('User not found');
        return;
    }

    // ✅ Prepare all data for the view
    $data = [
        'isLoggedIn' => true,
        'username'   => $username,
        'role'       => $role,
        'categories' => $categories,
        'user'       => $user,
                    'cartItems'   => $cartItems 
 // <-- Pass user info here
    ];

    $this->call->view('/shop/profile', $data);
    }


public function update_profile()
{
    // ✅ Get current logged-in user ID from session
    $user_id = $this->session->userdata('user_id');

    if (!$user_id) {
        redirect('/login');
        return;
    }

    // ✅ Apply form validation (same as admin)
    $this->form_validation
        ->name('first_name')->max_length(100)
        ->name('last_name')->max_length(100)
        ->name('gender')
        ->name('address')->max_length(255)
        ->name('phone_number')->max_length(15);

    if ($this->form_validation->run() == FALSE) {
        $errors = $this->form_validation->get_errors();
        setErrors($errors);
        redirect('/profile');
        return;
    }

    // ✅ Collect form inputs
    $first_name   = $this->io->post('first_name');
    $last_name    = $this->io->post('last_name');
    $gender       = $this->io->post('gender');
    $gender       = ($gender === '') ? NULL : $gender; // Convert empty to NULL
    $address      = $this->io->post('address');
    $phone_number = $this->io->post('phone_number');

    // ✅ Update user profile
    $this->UserModel->update_profile($user_id, [
        'first_name'   => $first_name,
        'last_name'    => $last_name,
        'gender'       => $gender,
        'address'      => $address,
        'phone_number' => $phone_number
    ]);

    // ✅ Flash success message
    setMessage('success', 'Profile updated successfully!');
    redirect('/profile');
}
public function change_password()
{
    $user_id = $this->session->userdata('user_id');
    if (!$user_id) {
        redirect('/login');
        return;
    }

    $old_password     = $this->io->post('old_password');
    $new_password     = $this->io->post('new_password');
    $confirm_password = $this->io->post('confirm_password');

    // ✅ Fetch joined user data (includes password)
    $user = $this->UserModel->get_customer_by_id($user_id);

    if (!$user) {
        setMessage('danger', 'User not found.');
        redirect('/profile');
        return;
    }

    // ✅ Check old password from `users` table
    if (!password_verify($old_password, $user['password'])) {
        setMessage('danger', 'Old password is incorrect.');
        redirect('/profile');
        return;
    }

    if ($new_password !== $confirm_password) {
        setMessage('danger', 'New passwords do not match.');
        redirect('/profile');
        return;
    }

    // ✅ Update password in the `users` table
    $this->AuthModel->update($user_id, [
        'password' => password_hash($new_password, PASSWORD_DEFAULT)
    ]);

    setMessage('success', 'Password changed successfully!');
    redirect('/profile');
}


public function update_profile_picture()
{
    // ✅ Get logged-in user ID from session
    $user_id = $this->session->userdata('user_id');
    if (!$user_id) {
        redirect('/login');
        return;
    }

    // ✅ Fetch user to ensure they exist
    $user = $this->UserModel->get_customer_by_id($user_id);
    if (!$user) {
        show_error('User not found');
        return;
    }

    $profile_image = $user['profile_picture'];

    // ✅ Handle file upload
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['profile_picture'];

        // Load upload library
        $this->call->library('upload', $file);

        $this->upload
            ->set_dir('public/img/profile_pictures')
            ->allowed_extensions(['jpg', 'jpeg', 'png', 'svg'])
            ->allowed_mimes(['image/jpeg', 'image/png', 'image/svg+xml'])
            ->max_size(2)
            ->encrypt_name();

        if ($this->upload->do_upload()) {
            $filename = $this->upload->get_filename();
            $profile_image = 'public/img/profile_pictures/' . $filename;

            // ✅ Update in DB using your model
            $this->UserModel->update_profile_picture($user_id, $profile_image);

            setMessage('success', 'Profile picture updated successfully!');
        } else {
            setMessage('danger', 'Failed to upload image. Please try again.');
        }
    } else {
        setMessage('warning', 'No image selected.');
    }

    redirect('/profile');
}

public function shop_grid($category_id)
{
    // ✅ Load session + category + cart data
    $sessionData = get_session_data($this);
    $isLoggedIn  = $sessionData['isLoggedIn'];
    $username    = $sessionData['username'];
    $role        = $sessionData['role'];
    $categories  = $sessionData['categories']; 
    $cartItems   = $sessionData['cartItems']; // 🛒 ADD THIS LINE
    $cartTotal   = $sessionData['cartTotal'];
    $wishlistCount  = $sessionData['wishlistCount'] ?? 0; // Add wishlist count



    $this->call->model('ProductModel');

    $parent = null;
    $subcategories = [];
    $isSubcategory = false;

    // 🔍 Detect whether the clicked category is a parent or subcategory
    foreach ($categories as $cat) {
        if ($cat['category_id'] == $category_id) {
            // ✅ Parent category clicked
            $parent = $cat;
            $subcategories = $this->ProductModel->getSubcategoriesWithProductCount($cat['category_id']);
            break;
        }

        // ✅ If clicked category is a subcategory
        foreach ($cat['subcategories'] as $sub) {
            if ($sub['category_id'] == $category_id) {
                $parent = $cat; // parent of this subcategory
                $isSubcategory = true;
                $subcategories = $this->ProductModel->getSubcategoriesWithProductCount($cat['category_id']);
                break 2;
            }
        }
    }

    if (!$parent) {
        show_error('Category not found.');
        return;
    }

    // ✅ Fetch products based on what was clicked
    if ($isSubcategory) {
        $products = $this->ProductModel->getProductsByCategory($category_id);
    } else {
        $products = $this->ProductModel->getProductsByParentCategory($category_id);
    }

    // ✅ Pass everything (including cartItems)
    $data = [
        'isLoggedIn'    => $isLoggedIn,
        'username'      => $username,
        'role'          => $role,
        'categories'    => $categories,
        'parent'        => $parent,
        'subcategories' => $subcategories,
        'products'      => $products,
        'cartItems'     => $cartItems, // 🛒 include for header
        'wishlistCount'     => $wishlistCount // 🛒 include for header
    ];

    $this->call->view('/shop/shop-grid', $data);
}





}
