<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class OrderItemModel extends Model {

    protected $table = 'order_items';

    // Fillable fields for insert/update
    protected $fillable = [
        'order_id',    // Link to orders table
        'user_id',     // ID of the user who placed the order
        'product_id',  // Product ID
        'quantity',    // Quantity ordered
        'price',       // Price per item
        'subtotal'     // quantity * price
    ];

      public function getByOrderId($order_id) {
        return $this->db->table($this->table)
                        ->where('order_id', $order_id)
                        ->get_all();
    }


    public function getTrendingProducts($limit = 10)
{
    return $this->db->table('order_items oi')
        ->select("
            p.product_id,
            p.name,
            p.price,
            p.product_image,
            p.stock,
            SUM(oi.quantity) AS total_sold
        ")
        ->join('products p', 'p.product_id = oi.product_id')
        ->join('orders o', 'o.id = oi.order_id')
        ->where('o.payment_status', 'paid')   // only count paid orders
        ->group_by('p.product_id')
        ->order_by('total_sold', 'DESC')
        ->limit($limit)
        ->get_all();
}


}