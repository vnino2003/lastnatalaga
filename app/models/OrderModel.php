<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class OrderModel extends Model {

        protected $table = 'orders';

    // 1️⃣ Fillable fields for insert/update
    protected $fillable = [
        'user_id',         // FK to users table
        'address_id',      // FK to addresses table
        'total_amount',    // total price of the order
        'payment_status',   // enum('pending','paid','failed')
        'status',          // enum('pending','processing','shipped','delivered','cancelled')
        'payment_method',  // enum('gcash','cod')
        'created_at',
        'updated_at'
    ];
public function get_all_orders($q = '', $records_per_page = null, $page = null)
{
    // Base query with user_profiles join
    $baseQuery = $this->db->table('orders o')
        ->join('users u', 'o.user_id = u.id')
        ->left_join('user_profiles up', 'up.profile_id = u.id');  // JOIN user_profiles

    // Search filter
    if (!empty($q)) {
        $baseQuery
            ->like('up.first_name', '%' . $q . '%')
            ->or_like('up.last_name', '%' . $q . '%')
            ->or_like('o.payment_status', '%' . $q . '%')
            ->or_like('o.status', '%' . $q . '%');
    }

    // Count query
    $countQuery = clone $baseQuery;
    $countResult = $countQuery
        ->select_count('DISTINCT o.id', 'count')
        ->get();

    $data['total_rows'] = $countResult ? $countResult['count'] : 0;

    // Fetch paginated data
    $dataQuery = $baseQuery
        ->select('
            o.id,
            o.total_amount,
            o.payment_status,
            o.status,
            o.payment_method,
            o.created_at,
            up.first_name,
            up.last_name,
            u.username
        ')
        ->group_by('o.id');

    if (!is_null($records_per_page) && !is_null($page)) {
        $dataQuery->pagination($records_per_page, $page);
    }

    $data['records'] = $dataQuery->get_all();

    return $data;
}


    public function getById($id) {
        return $this->db->table($this->table)
                        ->where('id', $id)
                        ->get(); // Returns single row
    }

     public function getByIdAndUser($order_id, $user_id) {
        return $this->db->table($this->table)
                        ->where('id', $order_id)
                        ->where('user_id', $user_id)
                        ->get();
    }
 public function getOrderDetail($order_id)
{
    return $this->db->table('orders o')
        ->select("
            o.*,
            u.username,
            u.email,

            up.first_name AS customer_first_name,
            up.last_name AS customer_last_name,

            a.first_name AS address_first_name,
            a.last_name AS address_last_name,
            a.email AS address_email,
            a.phone AS address_phone,
            a.address_line1,
            a.address_line2,
            a.city,
            a.province,
            a.postal_code
        ")
        ->join('users u', 'u.id = o.user_id')
        ->left_join('user_profiles up', 'up.user_id = u.id')
        ->left_join('addresses a', 'a.id = o.address_id')
        ->where('o.id', $order_id)
        ->get();   // return only 1 row
}
public function getOrdersByUser($user_id)
{
    // Fetch orders with total amount, status, date, and item count
    return $this->db->table('orders o')
        ->select("
            o.id AS order_id,
            o.created_at,
            o.total_amount,
            o.status,
            (SELECT COUNT(*) FROM order_items oi WHERE oi.order_id = o.id) AS item_count
        ")
        ->where('o.user_id', $user_id)
        ->order_by('o.created_at', 'DESC')
        ->get_all();
}

    /** ---------------------------------------------
     * GET ITEMS OF A SPECIFIC ORDER
     * --------------------------------------------- */
  public function getOrderItems($order_id)
{
    return $this->db->table('order_items oi')
        ->select("
            oi.*,
            p.name AS title,
            (oi.quantity * oi.price) AS amount
        ")
        ->join('products p', 'p.product_id = oi.product_id')
        ->where('oi.order_id', $order_id)
        ->get_all();
}


    // Get latest order of a user
    public function getLatestByUser($user_id) {
        return $this->db->table($this->table)
                        ->where('user_id', $user_id)
                        ->order_by('created_at', 'DESC')
                        ->limit(1)
                        ->get();
    }


public function updateOrder($id, $data) {
    return $this->db->table($this->table)
                    ->where('id', $id)
                    ->update($data);
}

public function getTotalRevenuePaid() {
    $result = $this->db->table($this->table)
        ->select('SUM(total_amount) as total')
        ->where('payment_status', 'paid')
        ->get()
    ;

    return $result['total'] ?? 0;
}

// Total orders
public function getTotalOrders() {
    $result = $this->db->table($this->table)
        ->select('COUNT(*) as total')
        ->get()
    ;

    return $result['total'] ?? 0;
}

// Orders count by status
public function getOrdersCountByStatus($status) {
    $result = $this->db->table($this->table)
        ->select('COUNT(*) as total')
        ->where('status', $status)
        ->get()
    ;

    return $result['total'] ?? 0;
}

// Recent orders
public function getRecentOrders($limit = 6)
{
    return $this->db->table('orders AS o')
        ->select('o.id AS order_id, o.created_at, o.total_amount AS amount, o.status, o.payment_status, COALESCE(CONCAT(up.first_name, " ", up.last_name), u.username) AS customer_name')
        ->left_join('users AS u', 'o.user_id = u.id')
        ->left_join('user_profiles AS up', 'u.id = up.user_id')
        ->order_by('o.created_at', 'DESC')
        ->limit($limit)
        ->get_all();
}

public function getWeeklySales() {
    $sevenDaysAgo = date('Y-m-d H:i:s', strtotime('-7 days'));

    $result = $this->db->table($this->table)
        ->select('DATE(created_at) AS date, SUM(total_amount) AS total')
        ->where('payment_status', 'paid')
        ->where('created_at', '>=', $sevenDaysAgo)
        ->group_by('DATE(created_at)')
        ->order_by('DATE(created_at)', 'ASC')
        ->get_all(); // LavaLust returns array

    if (empty($result)) return [];

    return array_map(function($row) {
        return [
            'date' => $row['date'],
            'total' => floatval($row['total'])
        ];
    }, $result);
}public function getBestSellingProducts() {
    $result = $this->db->table('order_items oi')
        ->select('p.name AS product_name, SUM(oi.quantity) AS total_sold')
        ->join('products p', 'oi.product_id = p.product_id')
        ->join('orders o', 'oi.order_id = o.id')
        ->where('o.payment_status', 'paid')
        ->group_by('p.product_id')
        ->order_by('total_sold', 'DESC')
        ->limit(5)
        ->get_all();

    if (empty($result)) return [];

    return array_map(function($row) {
        return [
            'product_name' => $row['product_name'],
            'total_sold'   => intval($row['total_sold'])
        ];
    }, $result);
}



}
