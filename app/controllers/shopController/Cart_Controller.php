<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Cart_Controller extends Controller {

    public function __construct() {
        parent::__construct();

        // ✅ Load required models
        $this->call->model('CartModel');
        $this->call->model('ProductModel');
        $this->call->model('CategoryModel');


    }

    // 🛍 Add product to cart
public function add_to_cart($product_id, $redirect = true)
{
    $product = $this->ProductModel->get_product_by_id($product_id);
    if (!$product) {
        show_error('Product not found');
        return;
    }

    $user_id = $this->session->userdata('user_id');
    $stock = $product['stock_quantity'] ?? $product['stock'] ?? 0;

    if ($user_id) {
        // Logged-in user
        $existing = $this->CartModel->get_user_cart($user_id);
        $alreadyInCart = null;
        foreach ($existing as $item) {
            if ($item['product_id'] == $product_id) {
                $alreadyInCart = $item;
                break;
            }
        }

        $currentQty = $alreadyInCart['quantity'] ?? 0;
        if ($currentQty >= $stock) {
            if ($redirect) {
                setMessage('error', 'Cannot add more. Stock limit reached.');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Stock limit reached']);
            }
            return;
        }

        $this->CartModel->add_item($user_id, $product_id, 1);
    } 
    else {
        // Guest user
        $cart = $this->session->userdata('cart') ?? [];
        $currentQty = $cart[$product_id]['quantity'] ?? 0;

        if ($currentQty >= $stock) {
            if ($redirect) {
                setMessage('error', 'Cannot add more. Stock limit reached.');
                redirect($_SERVER['HTTP_REFERER']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Stock limit reached']);
            }
            return;
        }

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
        } else {
            $cart[$product_id] = [
                'product_id'     => $product_id,
                'product_name'   => $product['product_name'] ?? $product['name'] ?? 'Unnamed Product',
                'category_name'  => $product['category_name'] ?? 'N/Ad',
                'price'          => $product['price'],
                'product_image'  => $product['product_image'],
                'stock_quantity' => $stock,
                'quantity'       => 1
            ];
        }

        $this->session->set_userdata('cart', $cart);
    }

    if ($redirect) {
        setMessage('success', 'Cart updated successfully!');
        redirect($_SERVER['HTTP_REFERER']);
    }
}


public function ajax_add_to_cart()
{
    $product_id = $this->io->post('product_id');
    if (!$product_id) {
        echo json_encode(['status' => 'error', 'message' => 'Product ID missing']);
        return;
    }

    $this->add_to_cart($product_id, false); // Don't redirect

    $cartCount = 0;
    if ($this->session->userdata('user_id')) {
        $cartCount = count($this->CartModel->get_user_cart($this->session->userdata('user_id')));
    } else {
        $cartCount = count($this->session->userdata('cart') ?? []);
    }

    echo json_encode(['status' => 'success', 'cart_count' => $cartCount]);
}

    // 🧺 View Cart Page
    public function view_cart()
    {
           $sessionData = get_session_data($this);
    $isLoggedIn  = $sessionData['isLoggedIn'];
    $username    = $sessionData['username'];
    $role        = $sessionData['role'];
    $categories  = $sessionData['categories']; 
    $cartItems   = $sessionData['cartItems']; // 🛒 ADD THIS LINE
                            $wishlistCount  = $sessionData['wishlistCount'] ?? 0; // Add wishlist count

    $cartTotal   = $sessionData['cartTotal'];

        $user_id = $this->session->userdata('user_id');
        $cart_items = [];

        if ($user_id) {
            $cart_items = $this->CartModel->get_user_cart($user_id);
        } else {
            $cart_items = $this->session->userdata('cart') ?? [];
        }

        $data = [
            'isLoggedIn'  => $isLoggedIn,
            'username'    => $username,
            'role'        => $role,
            'categories'  => $categories,
            'cartItems'   => $cartItems, 
            'wishlistCount'   => $wishlistCount 
        ];

        $this->call->view('/shop/shop-cart', $data);
    }
public function ajax_update_cart()
{
    $cart_id = $this->io->post('cart_id');
    $action  = $this->io->post('action');

    if(!$cart_id || !in_array($action, ['increase','decrease'])){
        echo json_encode(['status'=>'error','message'=>'Invalid request']);
        return;
    }

    $user_id = $this->session->userdata('user_id');
    $cartItem = null;

    if($user_id){
        $cartItem = $this->CartModel->get_user_cart($user_id);
        foreach($cartItem as $item){
            if(($item['cart_id'] ?? $item['product_id']) == $cart_id){
                $cartItem = $item;
                break;
            }
        }
    } else {
        $cart = $this->session->userdata('cart') ?? [];
        $cartItem = $cart[$cart_id] ?? null;
    }

    if(!$cartItem){
        echo json_encode(['status'=>'error','message'=>'Item not found']);
        return;
    }

    $quantity = $cartItem['quantity'];
    $stock = $cartItem['stock_quantity'] ?? 100;
if ($action === 'increase') {
    if ($quantity < $stock) {
        $quantity++;
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Stock limit reached']);
        return;
    }
} elseif ($action === 'decrease' && $quantity > 1) {
    $quantity--;
}

    // Update DB or session
    if($user_id){
        $this->CartModel->update_quantity($cart_id, $quantity);
        $cartItems = $this->CartModel->get_user_cart($user_id);
    } else {
        $cart[$cart_id]['quantity'] = $quantity;
        $this->session->set_userdata('cart', $cart);
        $cartItems = $cart;
    }

    // Prepare response
    $cartData = [
        'items' => [],
        'total' => 0,
        'count' => count($cartItems)
    ];

foreach($cartItems as $item){
    $id = $item['cart_id'] ?? $item['product_id'];
    $subtotal = $item['price'] * $item['quantity'];

    $cartData['items'][$id] = [
        'quantity'   => $item['quantity'],
        'subtotal'   => $subtotal,
        'price'      => $item['price'],
        'name'       => $item['product_name'] ?? $item['name'],
        'image'      => site_url() . ($item['product_image'] ?? $item['image']),
        'removeUrl'  => site_url('remove-item/' . $id)
    ];

    $cartData['total'] += $subtotal;
}



    echo json_encode(['status'=>'success','cartData'=>$cartData]);
}

    // ❌ Remove item from cart
  public function remove_item($id)
{
    // If the user is logged in → remove from database
    if ($this->session->userdata('user_id')) {
        $this->call->model('CartModel');
        $this->CartModel->remove_item($id);
    } 
    // Else → guest user, remove from session
    else {
        $cart = $this->session->userdata('cart') ?? [];

        if (isset($cart[$id])) {
            unset($cart[$id]);
            $this->session->set_userdata('cart', $cart);
        }
    }

    // Redirect back to previous page
    redirect($_SERVER['HTTP_REFERER']);
}




public function cart_partial()
{
    $sessionData = get_session_data($this);
    $cartItems = $sessionData['cartItems'] ?? [];
    $cartTotal = $sessionData['cartTotal'] ?? 0;

    // 🧠 If cartItems are empty, reload them from DB
    if (empty($cartItems)) {
        if (is_user_logged_in()) { // for logged in users
            $userId = $_SESSION['user_id'];
            $cartItems = $this->CartModel->getCartItemsByUserId($userId);
        } else { // for guest users
            $guestId = $_SESSION['guest_id'] ?? null;

            if ($guestId) {
                $cartItems = $this->CartModel->getCartItemsByGuestId($guestId);
            }
        }

        // Compute total again
        $cartTotal = 0;
        foreach ($cartItems as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }

        // ✅ Re-store to session for next reload
        $_SESSION['cartItems'] = $cartItems;
        $_SESSION['cartTotal'] = $cartTotal;
    }

    $data = [
        'cartItems' => $cartItems,
        'cartTotal' => $cartTotal
    ];

    $this->call->view('/partials/cart-dropdown', $data);
}


}
