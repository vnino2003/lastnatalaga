<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Customer_Controller extends Controller {
    public function __construct() {
        parent::__construct();
        $this->call->model('UserModel');
        $this->call->model('OrderModel');

        // only admins can view this
        // if (!$this->session->userdata('logged_in')) {
        //     redirect('/login');
        //     exit;
        // }

        // if ($this->session->userdata('role') !== 'admin') {
        //     redirect('/');
        //     exit;
        // }
    }
public function index()
{
    $page = isset($_GET['page']) ? $this->io->get('page') : 1;
    $q = isset($_GET['q']) ? trim($this->io->get('q')) : '';

    $records_per_page = 2; // adjust how many per page

    // 🧩 Fetch customers from model
    $all = $this->UserModel->get_all_customers($q, $records_per_page, $page);
    $data['customers'] = $all['records'];
    $total_rows = $all['total_rows'];

    // 🧩 Setup pagination
    $this->pagination->set_options([
        'first_link'     => '⏮ First',
        'last_link'      => 'Last ⏭',
        'next_link'      => 'Next →',
        'prev_link'      => '← Prev',
        'page_delimiter' => '&page='
    ]);

    $this->pagination->set_theme('bootstrap');
    $this->pagination->initialize($total_rows, $records_per_page, $page, 'admin/customer?q=' . $q);
    $data['page'] = $this->pagination->paginate();

    // 🧩 Pass query to view for search box value
    $data['q'] = $q;

    $this->call->view('/admin/customer', $data);
}

public function customer_Details($id)
{
    // Fetch user profile
    $user = $this->UserModel->get_customer_by_id($id);

    // Fetch actual orders of the user
    $orders = $this->OrderModel->getOrdersByUser($id);

    $data['user'] = $user;
    $data['orders'] = $orders;

    $this->call->view('/admin/customer_details', $data);
}


public function update_Profile($id)
{
    $user_id = $id;

    $this->form_validation
        ->name('first_name')->max_length(100)
        ->name('last_name')->max_length(100)
        ->name('gender')
        ->name('address')->max_length(255)
        ->name('phone_number')->max_length(15);

    if ($this->form_validation->run() == FALSE) {
        $errors = $this->form_validation->get_errors();
        setErrors($errors);
        redirect('/admin/customer_details/'.$user_id);
        return;
    }

    // ✅ Collect form inputs
    $first_name = $this->io->post('first_name');
    $last_name = $this->io->post('last_name');
    $gender = $this->io->post('gender');
$gender = ($gender === '') ? NULL : $gender; // ✅ convert empty to NULL

    $address = $this->io->post('address');
    $phone_number = $this->io->post('phone_number');

  
    // ✅ Update user profile
    $this->UserModel->update_profile($user_id, [
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'gender'     => $gender,
        'address'    => $address,
        'phone_number' => $phone_number,
    ]);


    setMessage('success', 'Profile updated successfully!');
    redirect('/admin/customer_details/' . $user_id);
}

public function update_profile_picture($id)
{
    // Fetch user to ensure they exist
    $user = $this->UserModel->get_customer_by_id($id);

    if (!$user) {
        show_error('User not found');
        return;
    }

    $profile_image = $user['profile_picture'];

    // Handle profile image upload
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['profile_picture'];

        // Load upload library
        $this->call->library('upload', $file);

        $this->upload
            ->set_dir('public/img/profile_pictures')
            ->allowed_extensions(['jpg', 'jpeg', 'png', 'svg'])
            ->allowed_mimes(['image/jpeg', 'image/png', 'image/svg+xml'])
            ->max_size(2)
            ->encrypt_name();

        if ($this->upload->do_upload()) {
            $filename = $this->upload->get_filename();
            $profile_image = 'public/img/profile_pictures/' . $filename;

            // ✅ Call model function instead of writing SQL here
            $this->UserModel->update_profile_picture($id, $profile_image);
        }
    }

    // Redirect back
    redirect('/admin/customer_details/' . $id);
}

public function delete_customer($id)
{
    $user = $this->UserModel->get_customer_by_id($id);

    if (!$user) {
        setMessage('error', 'Customer not found.');
        redirect('/admin/customer');
        return;
    }

    $deleted = $this->UserModel->delete($id);

    if ($deleted) {
        setMessage('success', 'Customer deleted successfully.');
    } else {
        setMessage('error', 'Failed to delete customer.');
    }

    redirect('/admin/customer');
}



}