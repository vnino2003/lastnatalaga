<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Returns session data (login state, username, role, categories, cart, wishlist count)
 * for use in views or controllers.
 */
function get_session_data($controller) {
    $session = $controller->session;

    $controller->call->model('CategoryModel');
    $controller->call->model('CartModel');
    $controller->call->model('WishlistModel'); // Load Wishlist model

    $user_id = $session->userdata('user_id');

    // 🛒 Load cart depending on login state
    if ($user_id) {
        // Logged in → load from DB
        $cartItems = $controller->CartModel->get_user_cart($user_id);

        // ✅ Get wishlist count
        $wishlistCount = $controller->WishlistModel->getWishlistCount($user_id);
    } else {
        // Guest → load from session only, no wishlist
        $cartItems = $session->userdata('cart') ?? [];
        $wishlistCount = 0;
    }

    // 🧮 Calculate cart total
    $cartTotal = 0;
    foreach ($cartItems as $item) {
        $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
        $cartTotal += $item['price'] * $quantity;
    }

    return [
        'isLoggedIn'    => (bool) $session->userdata('logged_in'),
        'username'      => $session->userdata('username') ?? null,
        'role'          => $session->userdata('role') ?? null,
        'categories'    => $controller->CategoryModel->getParentCategoriesWithChildren(),
        'cartItems'     => $cartItems,
        'cartTotal'     => $cartTotal,
        'wishlistCount' => $wishlistCount
    ];
}
