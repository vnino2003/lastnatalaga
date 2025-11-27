<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_Controller extends Controller {

    public function __construct() {
        parent::__construct();
        $this->call->model('UserModel');
    }

    public function index() {
        $page = isset($_GET['page']) ? $this->io->get('page') : 1;
        $q = isset($_GET['q']) ? trim($this->io->get('q')) : '';

        $records_per_page = 5;

        // ✅ Use correct model
        $all = $this->UserModel->getAllProfiles($q, $records_per_page, $page);

        $data['profiles'] = $all['records'] ?? [];
        $total_rows = $all['total_rows'] ?? 0;

        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);

        $this->pagination->set_theme('bootstrap'); 
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'admin/customer?q='.$q);
        $data['page'] = $this->pagination->paginate();
            

        $this->call->view('/admin/customer', $data);
    }
}
