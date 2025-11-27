<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class WishlistModel extends Model {
    protected $table = 'wishlist';
    protected $primary_key = 'id';
    protected $fillable = [
        'user_id',
        'product_id',
        'created_at'
    ];

    public function existsForUser($user_id, $product_id)
    {
        return $this->db->table($this->table)
                        ->where('user_id', $user_id)
                        ->where('product_id', $product_id)
                        ->get(); // returns first match or null
    }

public function remove_item($user_id, $product_id)
{
    return $this->db->table($this->table)
                    ->where('user_id', $user_id)
                    ->where('product_id', $product_id)
                    ->delete();
}


   public function getWishlistCount($user_id)
    {
        return $this->db->table($this->table)
                        ->where('user_id', $user_id)
                        ->select_count('id', 'total')
                        ->get()['total'] ?? 0;
    }
    public function get_user_wishlist($user_id)
{
    return $this->db->table('wishlist')
        ->select('
            wishlist.*, 
            products.name as product_name, 
            products.price, 
              products.product_image, 
            products.status AS product_status,
            products.stock AS stock_quantity,
            categories.name AS category_name
        ')
        ->join('products', 'products.product_id = wishlist.product_id')
        ->left_join('product_categories', 'product_categories.product_id = products.product_id')
        ->left_join('categories', 'categories.category_id = product_categories.category_id')
        ->where('wishlist.user_id', $user_id)
        ->where('categories.status', 1) // ✅ only active categories
        ->get_all();
}


}