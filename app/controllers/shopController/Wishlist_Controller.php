<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Wishlist_Controller extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->model('UserModel'); // For user data
        $this->call->model('WishlistModel'); // Your Wishlist ORM model
    }

    public function index() {
    $user_id = $this->session->userdata('user_id');
          $sessionData = get_session_data($this);

        $isLoggedIn = $sessionData['isLoggedIn'];
        $username   = $sessionData['username'];
        $role       = $sessionData['role'];
        $categories = $sessionData['categories'];
         $cartItems  = $sessionData['cartItems'];
         $wishlistCount  = $sessionData['wishlistCount'] ?? 0; // Add wishlist count
    if (!$user_id) {
        setMessage('error', 'You must log in to view your wishlist.');
        redirect('/login');
        return;
    }
    $user = $this->UserModel->get_customer_by_id($user_id);

    // ✅ Fetch wishlist items
    $wishlistItems = $this->WishlistModel->get_user_wishlist($user_id);

    $data = [
        'wishlistItems' => $wishlistItems,
               'isLoggedIn' => $isLoggedIn,
                'username'   => $username,
                'role'       => $role,
                        'user'       => $user,

                'categories' => $categories,
                'cartItems'  => $cartItems,
                        'wishlistCount' => $wishlistCount 
    ];

    $this->call->view('/shop/wishlist', $data);
}

    public function insert() {
        $user_id = $this->session->userdata('user_id');

        // 🚫 Force login for guests
        if (!$user_id) {
            setMessage('error', 'You must log in to add items to your wishlist.');
            redirect('/login');
            return;
        }

        $product_id = $this->io->post('product_id');

        // ✅ Check if product already in wishlist
        $existing = $this->WishlistModel->existsForUser($user_id, $product_id);
        if ($existing) {
            setMessage('info', 'This item is already in your wishlist.');
            redirect('/shop'); // Or wherever you want to redirect
            return;
        }

        // ✅ Insert new wishlist entry
        $this->WishlistModel->insert([
            'user_id'    => $user_id,
            'product_id' => $product_id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        setMessage('success', 'Item added to your wishlist.');
        redirect('/shop'); // Redirect to shop or wishlist page
    }

   public function remove($product_id) {
    $user_id = $this->session->userdata('user_id');

    if (!$user_id) {
        setMessage('error', 'You must log in to remove items from your wishlist.');
        redirect('/login');
        return;
    }

    $deleted = $this->WishlistModel->remove_item($user_id, $product_id);

    if ($deleted) {
        setMessage('success', 'Item removed from your wishlist.');
    } else {
        setMessage('error', 'This item is not in your wishlist.');
    }

    redirect('/wishlist');
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
}
