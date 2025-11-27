<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: AuthModel
 * 
 * Automatically generated via CLI.
 */
class AuthModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';
   protected $fillable = [
    'username',
    'email',
    'password',
    'is_verified',
    'verification_token',
    'verification_expires',
    'reset_token',
    'reset_expires'
];

public function findByToken($token) {
    return $this->db->table('users')->where('verification_token', $token)->get();
}

public function findByResetToken($token) {
    return $this->db->table('users')->where('reset_token', $token)->get();
}

 // Find user by email
    public function findByEmail($email) {
    return $this->db->table($this->table)
                    ->where('email', $email)
                    ->get();
                    
    }
public function getFirstAdmin() {
    $admin = $this->db->table($this->table)
                      ->where('role', 'admin')
                      ->get(); // get returns first matching row

    return $admin; // returns null if no admin exists
}


    // Find user by username
    public function findByUsername($username) {
 return $this->db->table($this->table)
 ->where('username', $username)
                         ->get();
                        
    }
public function activateUser($id) {
    return $this->db->table('users')->where('id', $id)->update(['is_verified' => 1]);
}

public function newUser(){
    return $id =  $this->db->last_id();
}

// AuthModel.php
public function getVerifiedUsersCount() {
    $result = $this->db->table($this->table)
        ->where('is_verified', 1)
        ->select_count('id', 'total')
        ->get();
    return $result['total'] ?? 0;
}

    public function __construct()
    {
        parent::__construct();
    }
}