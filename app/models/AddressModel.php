<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AddressModel extends Model {

  protected $table = 'addresses';
    protected $primary_key = 'id';
    
    // 1️⃣ Fillable fields for insert/update
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'address_line1',
        'address_line2',
        'city',
        'province',
        'postal_code'
    ];
    public function __construct() {
        parent::__construct();
    }
    
        public function getById($address_id) {
        return $this->db->table($this->table)
                        ->where('id', $address_id)
                        ->get();
    }

    public function getAddressesByUser($user_id) {
    return $this->db
                ->table('addresses')
                ->where('user_id', $user_id)
                ->get_all();
}

 public function getAddressByUser($user_id) {
    return $this->db
                ->table('addresses')
                ->where('user_id', $user_id)
                ->get();
}
    // Insert new address
    // public function insert_address($data) {
    //     $sql = "INSERT INTO addresses 
    //             (user_id, address_line1, address_line2, city, province, postal_code) 
    //             VALUES (?, ?, ?, ?, ?, ?)";
    //     $this->db->query($sql, [
    //         $data['user_id'],
    //         $data['address_line1'],
    //         $data['address_line2'],
    //         $data['city'],
    //         $data['province'],
    //         $data['postal_code']
    //     ]);
    //     return $this->db->insert_id();
    // }

    // Get addresses for a specific user
    public function get_user_addresses($user_id) {
        $sql = "SELECT * FROM addresses WHERE user_id = ? ORDER BY created_at DESC";
        return $this->db->query($sql, [$user_id])->fetch_all();
    }

    // Optional: get a single address by ID
public function get_address($id) {
    return $this->db
                ->table($this->table)
                ->where('id', $id)
                ->get(); // get() returns a single row
}

}
