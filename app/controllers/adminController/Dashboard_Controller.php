    <?php
    defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

    class Dashboard_Controller extends Controller {

        public function __construct() {
            parent::__construct();
            $this->call->model('OrderModel');
            $this->call->model('AuthModel');
        }

        public function index() {
            $data = [];

            // Orders & revenue stats
        $data['total_revenue']      = $this->OrderModel->getTotalRevenuePaid() ?: 0; // Only paid
    $data['total_orders']       = $this->OrderModel->getTotalOrders() ?: 0;
    $data['pending_orders']     = $this->OrderModel->getOrdersCountByStatus('pending') ?: 0;
    $data['processing_orders']  = $this->OrderModel->getOrdersCountByStatus('processing') ?: 0;
    $data['delivered_orders']   = $this->OrderModel->getOrdersCountByStatus('delivered') ?: 0;

    // Weekly sales for chart (ensure array)
    $weekly_sales = $this->OrderModel->getWeeklySales();
    $data['weekly_sales'] = is_array($weekly_sales) ? $weekly_sales : [];

    // Best selling products (ensure array)
    $best_selling = $this->OrderModel->getBestSellingProducts();
    $data['best_selling_products'] = is_array($best_selling) ? $best_selling : [];

    // Recent orders (ensure array)
    $recent_orders = $this->OrderModel->getRecentOrders(6);
    $data['recent_orders'] = is_array($recent_orders) ? $recent_orders : [];

                    $data['verified_users'] = $this->AuthModel->getVerifiedUsersCount();

            $this->call->view('/admin/dashboard', $data);
        }
    }
