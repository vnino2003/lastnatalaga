        <?php
        defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

        /**
         * Controller: Category_Controller
         * 
         * Automatically generated via CLI.
         */

        class Order_Controller extends Controller {
            public function __construct()
            {
                        parent::__construct();   // ← REQUIRED

                        $this->call->model('OrderModel');


            }

        public function index()
    {
        $page = isset($_GET['page']) ? $this->io->get('page') : 1;
        $q = isset($_GET['q']) ? trim($this->io->get('q')) : '';

        $records_per_page = 5;

        // Fetch data
        $all = $this->OrderModel->get_all_orders($q, $records_per_page, $page);
        $data['orders'] = $all['records'];
        $total_rows = $all['total_rows'];

        // Pagination settings
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);

        $this->pagination->set_theme('bootstrap');
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'admin/order?q=' . $q);

        $data['page'] = $this->pagination->paginate();
        $data['q'] = $q;

        $this->call->view('/admin/order', $data);
    }
    public function view($id)
    {
        $this->call->model('OrderModel');

        // Fetch order header
        $data['order'] = $this->OrderModel->getOrderDetail($id);

        // Fetch items
        $data['items'] = $this->OrderModel->getOrderItems($id);

        if (!$data['order']) {
            show_404();
        }

        // 🔥 Compute subtotal from order items
        $subtotal = 0;
        foreach ($data['items'] as $item) {
            $subtotal += ($item['quantity'] * $item['price']);
        }

        // 🔥 Add computed subtotal and total to $order array
        $data['order']['subtotal'] = $subtotal;
        $data['order']['total_amount'] = $subtotal; // since no shipping/tax/discount

        $data['order']['status'] = $data['order']['status'] ?? 'pending';
        $data['order']['payment_status'] = $data['order']['payment_status'] ?? 'pending';

        // 👇 Add back_url dynamically
        $data['back_url'] = $_SERVER['HTTP_REFERER'] ?? '/orders'; // default to orders page

        // Load view
        $this->call->view('/admin/order_details', $data);
    }

    public function update_status($id) {
        $input = json_decode(file_get_contents("php://input"), true);
        $status = $input['status'];

        $updateData = ['status' => $status];

        $order = $this->OrderModel->getById($id);

        // Payment status logic
        if ($order['payment_method'] == 'cod') {
            if ($status == 'delivered') {
                $updateData['payment_status'] = 'paid';
            } elseif ($status == 'cancelled') {
                $updateData['payment_status'] = 'pending';
            }
        } else { // Online payments
            if ($status == 'delivered') {
                $updateData['payment_status'] = 'paid';
            } elseif ($status == 'cancelled') {
                $updateData['payment_status'] = 
                    ($order['payment_status'] == 'paid') ? 'failed' : 'pending';
            }
        }

        $updated = $this->OrderModel->updateOrder($id, $updateData);

     if ($updated) {

    // Fetch correct order + user data, not session
    $orderInfo = $this->OrderModel->getOrderDetail($id);

    $email = $orderInfo['email'];
    $username = $orderInfo['username'];

    // If name exists in user_profiles, use that
    if (!empty($orderInfo['customer_first_name'])) {
        $username = $orderInfo['customer_first_name'] . ' ' . $orderInfo['customer_last_name'];
    }

    $msg = "Your order #$id status has been updated to <b>$status</b>.";

    $result = sendMail(
        $email,
        $username,
        "Order Update #$id",
        "/shop/order_status_email",
        [
            'username' => $username,
            'order_id' => $id,
            'status'   => $status,
            'message'  => $msg
        ]
    );

    if (!$result['status']) {
        log_message("error", "Status update email failed: " . $result['message']);
    }

    // Return updated data to AJAX
    $updatedOrder = $this->OrderModel->getById($id);

    echo json_encode([
        'success' => true,
        'message' => 'Order updated successfully',
        'status' => $updatedOrder['status'],
        'payment_status' => $updatedOrder['payment_status']
    ]);
}
    }



        }