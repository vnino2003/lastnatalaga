<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
/**
 * ------------------------------------------------------------------
 * LavaLust - an opensource lightweight PHP MVC Framework
 * ------------------------------------------------------------------
 *
 * MIT License
 *
 * Copyright (c) 2020 Ronald M. Marasigan
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package LavaLust
 * @author Ronald M. Marasigan <ronald.marasigan@yahoo.com>
 * @since Version 1
 * @link https://github.com/ronmarasigan/LavaLust
 * @license https://opensource.org/licenses/MIT MIT License
 */

/*
| -------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------
| Here is where you can register web routes for your application.
|
|
*/

$router->get('/', 'shopController/Welcome::index');


// Login / Logout
$router->get('/login', 'authController/Login_Controller::Login_Form');
$router->post('/login', 'authController/Login_Controller::loginUser');
$router->get('/logout', 'authController/Login_Controller::logout');

//register
$router->get('/register', 'authController/Register_Controller::Register_Form');
$router->post('/register', 'authController/Register_Controller::createUser');


$router->post('/setup-admin', 'authController/Register_Controller::createAdmin');
$router->get('/setup-admin', 'authController/Register_Controller::AdminRegister_Form');

    $router->get('/register/googleRedirect', 'authController/Register_Controller::googleRedirect');
$router->get('/register/googleCallback', 'authController/Register_Controller::googleCallback');

$router->get('/login/googleRedirect', 'authController/Login_Controller::googleRedirect');
$router->get('/login/googleCallback', 'authController/Login_Controller::googleCallback');



$router->get('/verify-email', 'authController/Register_Controller::verifyEmail');


// Forgot Password
$router->get('/forgot-password', 'authController/Login_Controller::forgotPasswordForm');
$router->post('/forgot-password', 'authController/Login_Controller::forgotPassword');

// Reset Password
$router->get('/reset-password', 'authController/Login_Controller::resetPasswordForm');
$router->post('/reset-password', 'authController/Login_Controller::resetPassword');



//shop
$router->get('/profile', 'shopController/Welcome::profile');
$router->post('/update-profile', 'shopController/Welcome::update_profile');
$router->post('/change-password', 'shopController/Welcome::change_password');
$router->post('/update-profile-picture', 'shopController/Welcome::update_profile_picture');
$router->get('/shop-grid/{id}', 'shopController/Welcome::shop_grid');
$router->get('/about', 'shopController/Welcome::about');
$router->get('/contact', 'shopController/Welcome::contact');
$router->get('/category', 'shopController/Welcome::category');


//cart
$router->post('/add-to-cart/{id}', 'shopController/Cart_Controller::add_to_cart');
$router->post('/ajax-add-to-cart', 'shopController/Cart_Controller::ajax_add_to_cart');
$router->get('/cart', 'shopController/Cart_Controller::view_cart');
$router->get('/remove-item/{cart_id}', 'shopController/Cart_Controller::remove_item');
$router->get('/cart-partial', 'shopController/Cart_Controller::cart_partial');
$router->post('/ajax-update-cart', 'shopController/Cart_Controller::ajax_update_cart');

//wishlist
$router->get('/wishlist', 'shopController/Wishlist_Controller::index');
$router->post('wishlist/insert', 'shopController/Wishlist_Controller::insert');
$router->post('wishlist/remove/{id}', 'shopController/Wishlist_Controller::remove');

//order
$router->get('/order-list', 'shopController/Order_Controller::index');
$router->get('/order/detail/{id}', 'shopController/Order_Controller::detail');


//checkout
// Step 1: Review cart & shipping
$router->get('/checkout', 'shopController/Checkout_Controller::index');

// Step 1 form submission → save address
$router->get('/checkout/checkout-address', 'shopController/Checkout_Controller::checkout_address');
$router->post('/checkout/proceed-payment', 'shopController/Checkout_Controller::save_address');

// Step 2: Payment selection
$router->get('/checkout/payment', 'shopController/Checkout_Controller::payment');

// Step 2 form submission → place order
$router->post('/checkout/place-order', 'shopController/Checkout_Controller::place_order');

// // Step 3: GCash payment sandbox
// $router->get('/checkout/gcash_sandbox', 'shopController/Checkout_Controller::gcash_sandbox');

// // Step 3 form submission → complete GCash payment
// $router->post('/checkout/gcash_complete', 'shopController/Checkout_Controller::gcash_complete');

// Step 3: GCash payment sandbox
$router->get('/gcash/sandbox', 'shopController/Gcash_Controller::sandbox');
$router->get('/gcash/process', 'shopController/Gcash_Controller::process'); // NEW
$router->get('/gcash/complete', 'shopController/Gcash_Controller::complete');




// Order success page (after COD or GCash)
$router->get('/order-success', 'shopController/Checkout_Controller::order_success');


// Complete GCash payment (simulation)
$router->post('/checkout/gcash_complete', 'shopController/Checkout_Controller::gcash_complete');

//addrress
//addrress
$router->get('/address-add', 'shopController/Address_Controller::address');
$router->post('/address-add', 'shopController/Address_Controller::insert_address');
$router->get('/address-list', 'shopController/Address_Controller::index');
$router->get('/address-edit/{id}', 'shopController/Address_Controller::edit');
$router->post('/address-edit/{id}', 'shopController/Address_Controller::update_address');
$router->post('/address-delete/{id}', 'shopController/Address_Controller::delete_address');


$router->group('/admin', function() use ($router){
    //Category
    $router->get('/category', 'adminController/Category_Controller::index');
    $router->post('/create-category', 'adminController/Category_Controller::create_Category');
    $router->post('/delete-category/{id}', 'adminController/Category_Controller::delete_Category');
    $router->post('/update-category/{id}', 'adminController/Category_Controller::update_Category');
    //subcategory
    $router->get('/subcategory/{parent_id}/', 'adminController/Category_Controller::view_subcategories');

    //products
    $router->get('/products', 'adminController/Products_Controller::index');
    $router->post('/create-products', 'adminController/Products_Controller::create_Product');
    $router->post('/update-products/{product_id}', 'adminController/Products_Controller::update_Product');
        $router->post('/delete-product/{id}', 'adminController/Products_Controller::delete_Product');
    $router->get('/view-products/{id}', 'adminController/Products_Controller::view_Product');

    //customer

     $router->get('/customer', 'adminController/Customer_Controller::index');
     $router->get('/customer_details/{id}', 'adminController/Customer_Controller::customer_Details');
     $router->post('/update-customer/{id}', 'adminController/Customer_Controller::update_Profile');
    $router->post('/update-profile-picture/{id}', 'adminController/Customer_Controller::update_profile_picture');
    $router->post('/delete-customer/{id}', 'adminController/Customer_Controller::delete_customer');


     //dashboard

    $router->get('/dashboard', 'adminController/Dashboard_Controller::index');

    //order
        $router->get('/order', 'adminController/Order_Controller::index');
        $router->get('/order/{id}', 'adminController/Order_Controller::view');
        $router->get('/order/{id}', 'adminController/Order_Controller::view');
        $router->post('/order/update-status/{id}', 'adminController/Order_Controller::update_status');
$router->post('/order/update-status/{id}', 'adminController/Order_Controller::update_status');




});



