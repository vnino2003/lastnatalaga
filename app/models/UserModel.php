<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UserModel extends Model {
    protected $table = 'user_profiles';
    protected $primary_key = 'profile_id';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'gender',
        'address',
        'phone_number',
        'profile_picture'
    ];

    public function __construct() {
        parent::__construct();
    }
public function get_all_customers($q = null, $records_per_page = null, $page = null)
{
    $query = $this->db->table('user_profiles up')
        ->join('users u', 'up.user_id = u.id')
        ->where('u.role', 'user'); // ✅ Only user accounts

    // ✅ Apply search filter if provided
    if (!empty($q)) {
        $query->like('up.first_name', '%'.$q.'%')
              ->or_like('up.last_name', '%'.$q.'%')
              ->or_like('u.email', '%'.$q.'%');
    }

    $countQuery = clone $query;
    $data['total_rows'] = $countQuery->select_count('*', 'count')->get()['count'];

    $query->group_by('up.profile_id');

    $query->select('
        up.profile_id,
        up.user_id,
        up.first_name,
        up.last_name,
        up.gender,
        up.address,
        up.phone_number,
        up.profile_picture,
        u.email,
        u.username,
        u.is_verified,
        u.role,
        u.created_at
    ');

    if (!is_null($records_per_page) && !is_null($page)) {
        $query->pagination($records_per_page, $page);
    }

    $data['records'] = $query->get_all();

    return $data;
}


public function get_customer_by_id($id)
{
    return $this->db->table('user_profiles up')
        ->join('users u', 'up.user_id = u.id')
        ->select('up.*, u.email, u.username, u.password, u.is_verified, u.role, u.created_at') // ✅ added password
        ->where('up.user_id', $id)
        ->get();
}

public function update_profile_picture($user_id, $file_path)
{
    return $this->db->table('user_profiles')
                    ->where('user_id', $user_id)
                    ->update(['profile_picture' => $file_path]);
}

public function update_profile($user_id, $data)
{
    return $this->db->table($this->table)
    ->where('user_id', $user_id)
    ->update($data);
}

public function delete($user_id)
{
    // Start transaction
    $this->db->transaction();

    try {
        // Delete from user_profiles
        $this->db->table('user_profiles')
                 ->where('user_id', $user_id)
                 ->delete();

        // Delete from users
        $this->db->table('users')
                 ->where('id', $user_id)
                 ->delete();

        // Commit transaction
        $this->db->commit();

        return true; // success
    } catch (Exception $e) {
        // Rollback if anything fails
        $this->db->rollback();
        return false; // failure
    }
}







}
