<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class CartModel extends Model {

      protected $table = 'cart';
    protected $primary_key = 'cart_id';
//    protected $fillable = [
//     'username',
//     'email',
//     'password',
//     'is_verified',
//     'verification_token',
//     'verification_expires',
//     'reset_token',
//     'reset_expires'
// ];

    public function add_item($user_id, $product_id, $quantity)
    {
        // Check if product already exists in cart
        $existing = $this->db->table('cart')
            ->where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->get();

        if ($existing) {
            // Update quantity
            $new_qty = $existing['quantity'] + $quantity;
            $this->db->table('cart')
                ->where('cart_id', $existing['cart_id'])
                ->update(['quantity' => $new_qty]);
        } else {
            // Insert new
            $this->db->table('cart')->insert([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
        }
    }

    public function update_quantity($cart_id, $quantity)
{
    return $this->db->table('cart')
        ->where('cart_id', $cart_id)
        ->update(['quantity' => $quantity]);
}

public function clearCart($user_id)
{
    return $this->db->table('cart')
        ->where('user_id', $user_id)
        ->delete();
}

public function get_user_cart($user_id)
{
    return $this->db->table('cart')
        ->select('
            cart.*, 
            products.name AS product_name, 
            products.price, 
            products.product_image, 
products.stock AS stock_quantity,
            categories.name AS category_name
        ')
        ->join('products', 'products.product_id = cart.product_id')
        ->left_join('product_categories', 'product_categories.product_id = products.product_id')
        ->left_join('categories', 'categories.category_id = product_categories.category_id')
        ->where('cart.user_id', $user_id)
        ->where('categories.status', 1) // ✅ only active categories
        ->get_all();
}

 public function getTotalAmount($user_id = null)
    {
        $total = 0;

        if ($user_id) {
            // Logged-in user → fetch from DB
            $cartItems = $this->get_user_cart($user_id);
            foreach ($cartItems as $item) {
                $total += ($item['price'] * $item['quantity']);
            }
        } else {
            // Guest → fetch from session
            $cart = $_SESSION['cart'] ?? [];
            foreach ($cart as $item) {
                $total += ($item['price'] * $item['quantity']);
            }
        }

        return $total;
    }

    public function remove_item($cart_id)
    {
        return $this->db->table('cart')->where('cart_id', $cart_id)->delete();
    }

    public function save_guest_cart_to_user($user_id, $session_cart)
{
    if (empty($session_cart)) {
        return;
    }

    foreach ($session_cart as $item) {
        // check if this product already exists in user's cart
        $exists = $this->db->table('cart')  
            ->where('user_id', $user_id)
            ->where('product_id', $item['product_id'])
            ->get();

        if ($exists) {
            // If already exists → update quantity
            $this->db->table('cart')
                ->where('user_id', $user_id)
                ->where('product_id', $item['product_id'])
                ->update([
                    'quantity' => $exists['quantity'] + ($item['quantity'] ?? 1)
                ]);
        } else {
            // Else insert new item
            $this->db->table('cart')->insert([
                'user_id' => $user_id,
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'] ?? 1,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
public function get_category_name($product_id) {
    $row = $this->db->table('product_categories pc')
        ->select('c.name')
        ->left_join('categories c', 'c.category_id = pc.category_id')
        ->where('pc.product_id', $product_id)
        ->where('c.status', 1)
        ->get();
    
    return $row['name'] ?? null;
}


}
