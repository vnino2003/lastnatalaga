<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: Products_Controller
 * 
 * Automatically generated via CLI.
 */
class Products_Controller extends Controller {
    public function __construct()
    {
        parent::__construct();
         $this->call->model('CategoryModel');
         $this->call->model('ProductModel');
         if (!$this->session->userdata('logged_in')) {
            redirect('/login');
            exit;
        }

        // Check if admin
        if ($this->session->userdata('role') !== 'admin') {
            redirect('/');
            exit;
        }
    }
    
    public function index() {

        $page = 1;
                if(isset($_GET['page']) && ! empty($_GET['page'])) {
                    $page = $this->io->get('page');
                }

                $q = '';
                if(isset($_GET['q']) && ! empty($_GET['q'])) {
                    $q = trim($this->io->get('q'));
                }

                $records_per_page = 3;

                // Get paginated data from model
                // $data['getAll'] = $this->User_Model->getAll(); 
                $all = $this->ProductModel->getAll($q, $records_per_page, $page);

                $data['getAll'] = $all['records'];
                $total_rows = $all['total_rows'];

                // Setup pagination appearance & behavior
                $this->pagination->set_options([
                    'first_link'     => '⏮ First',
                    'last_link'      => 'Last ⏭',
                    'next_link'      => 'Next →',
                    'prev_link'      => '← Prev',
                    'page_delimiter' => '&page='
                ]);

                $this->pagination->set_theme('bootstrap'); 
                $this->pagination->initialize($total_rows, $records_per_page, $page, 'admin/products?q='.$q );
                // site_url('admin').'?q='.$q ito yung error ko kanina, idk bakit 
                $data['page'] = $this->pagination->paginate();

                $data['categories'] = $this->CategoryModel->getAllCategoriesWithChildren();

                $this->call->view('/admin/products', $data);
}


   public function create_Product(){
    $this->form_validation
     ->name('sku')
            ->required()
            ->max_length(200)
        ->name('name')
            ->required()
            ->max_length(200)
        ->name('category_ids')
            ->required()
        ->name('price')
            ->required()
        ->name('stock')
            ->required()
        ->name('description')
            ->required()
            ->max_length(500);

    if ($this->form_validation->run() == FALSE) {
        $errors = $this->form_validation->get_errors();
        redirect('/products');
        return;
    }

    // ✅ Get form input first
    $name = $this->io->post('name');
    $category_ids = $this->io->post('category_ids'); // returns array
    $price = $this->io->post('price');
    $sku = $this->io->post('sku');
    $stock = $this->io->post('stock');
    $description = $this->io->post('description');
    $status = $this->io->post('status');
    $status = ($status == '1') ? 1 : 0;

    // ✅ Convert multiple category IDs into comma-separated string
    $category_ids_str = implode(',', $category_ids);

    // ✅ Handle product image upload
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['product_image'];

        $this->call->library('upload', $file);
        $this->upload
            ->set_dir('public/img/product_img')
            ->allowed_extensions(['jpg', 'jpeg', 'png', 'svg'])
            ->allowed_mimes(['image/jpeg', 'image/png', 'image/svg+xml'])
            ->max_size(5)
            ->encrypt_name();

        if ($this->upload->do_upload()) {
            $filename = $this->upload->get_filename();
            $product_image = 'public/img/product_img/' . $filename;
        } else {
            $errors = $this->upload->get_errors();
            $product_image = "uploads/default.png";
        }
    } else {
        $product_image = "uploads/default.png";
    }

    $existingSku = $this->ProductModel->existingSKU($sku);
    if($existingSku){
        setMessage('error', 'SKU already exists. Please choose a different SKU.');
        redirect('/admin/products');
    }
    $product_id = $this->ProductModel->insert([
        'name' => $name,
        'price' => $price,
        'stock' => $stock,
        'description' => $description,
        'product_image' => $product_image,
        'status' => $status,
        'sku' => $sku
    ]);

    // ✅ Save multiple categories into `product_categories`
    if (!empty($category_ids)) {
        foreach ($category_ids as $cat_id) {
            $this->db->table('product_categories')->insert([
                'product_id' => $product_id,
                'category_id' => $cat_id
            ]);
        }
    }
    setMessage('success', 'na add na ni acha ang product.');
    redirect('/admin/products');
}

        public function update_Product($id) {
            $product_id = $id;
            // Check for AJAX
  $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

    if ($isAjax) {
        // Read JSON body
        $input = json_decode(file_get_contents('php://input'), true);

        if (!isset($input['status'])) {
            echo json_encode(['success' => false, 'message' => 'Missing status']);
            exit;
        }

        $status = $input['status'] ? 1 : 0;

        try {
            $this->ProductModel->update($product_id, ['status' => $status]);
            echo json_encode(['success' => true]);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        exit;
    }

            $this->form_validation
                ->name('name')->required()->max_length(200)
                ->name('price')->required()
                ->name('stock')->required()
                ->name('sku')->required()
                ->name('description')->required()->max_length(500);

            if ($this->form_validation->run() == FALSE) {
                    $errors = $this->form_validation->get_errors();

                  setErrors($errors);
                redirect('/admin/products');
                return;
            }

            $name = $this->io->post('name');
            $price = $this->io->post('price');
            $stock = $this->io->post('stock');
            $description = $this->io->post('description');
            $sku = $this->io->post('sku');
            $status = $this->io->post('status') == '1' ? 1 : 0;
            $category_ids = $this->io->post('category_ids');
            $category_ids_str = implode(',', $category_ids);

            // Handle new image (optional)
            $product_image = $this->io->post('current_image'); // default to old image
            if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['product_image'];

                $this->call->library('upload', $file);
                $this->upload
                    ->set_dir('public/img/product_img')
                    ->allowed_extensions(['jpg','jpeg','png','svg'])
                    ->allowed_mimes(['image/jpeg','image/png','image/svg+xml'])
                    ->max_size(5)
                    ->encrypt_name();

                if ($this->upload->do_upload()) {
                    $filename = $this->upload->get_filename();
                    $product_image = 'public/img/product_img/' . $filename;
                }
            }

    $existingSku = $this->ProductModel->existingSKU($sku);
    if($existingSku){
        setMessage('error', 'SKU already exists. Please choose a different SKU.');
        redirect('/admin/products');
    }
            // ✅ Update product info
            $this->ProductModel->update($product_id, [
                'name' => $name,
                'price' => $price,
                'stock' => $stock,
                'description' => $description,
                'product_image' => $product_image,
                'status' => $status,
                'sku' => $sku
            ]);

            // ✅ Update category relationships
            $this->db->table('product_categories')->where('product_id', $product_id)->delete();
            foreach ($category_ids as $cat_id) {
                $this->db->table('product_categories')->insert([
                    'product_id' => $product_id,
                    'category_id' => $cat_id
                ]);
            }
                setMessage('success', 'Category updated successfully!');

            redirect('/admin/products');
        }
public function view_Product($id)
{
    $result = $this->ProductModel->getProductByIdWithCategories($id);

    if (empty($result)) {
        show_404();
        return;
    }

    $product = $result[0];

    // All categories
    $allCategories = $this->ProductModel->getAllCategories();

    // Get product's current category IDs
    $productCategoryIds = [];
    foreach ($result as $row) {
        if (!empty($row['category_id'])) {
            $productCategoryIds[] = (int)$row['category_id'];
        }
    }
    $productCategoryIds = array_values(array_unique($productCategoryIds));

    // --- Build full grouped list for dropdown (always complete) ---
    $allCategoriesGrouped = [];
    foreach ($allCategories as $cat) {
        if (empty($cat['parent_id'])) {
            $allCategoriesGrouped[$cat['category_id']] = [
                'parent' => ['id' => $cat['category_id'], 'name' => $cat['name']],
                'children' => []
            ];
        }
    }
    foreach ($allCategories as $cat) {
        if (!empty($cat['parent_id']) && isset($allCategoriesGrouped[$cat['parent_id']])) {
            $allCategoriesGrouped[$cat['parent_id']]['children'][] = [
                'category_id' => $cat['category_id'],
                'name' => $cat['name']
            ];
        }
    }

    // --- Build related categories only for product details ---
    $relatedCategories = [];
    foreach ($allCategoriesGrouped as $parentId => $group) {
        $parentSelected = in_array($group['parent']['id'], $productCategoryIds);
        $selectedChildren = [];

        foreach ($group['children'] as $child) {
            if (in_array($child['category_id'], $productCategoryIds)) {
                $selectedChildren[] = $child;
            }
        }

        // Include only if parent or any child is selected
        if ($parentSelected || !empty($selectedChildren)) {
            $relatedCategories[$parentId] = [
                'parent' => $group['parent'],
                'children' => $selectedChildren
            ];
        }
    }

    // Pass data to view
    $data['product'] = $product;
    $data['categories'] = $relatedCategories;         // ✅ only parent+child related to product
    $data['allCategories'] = $allCategoriesGrouped;   // ✅ full list for dropdown
    $data['productCategoryIds'] = $productCategoryIds;

    $this->call->view('/admin/product_details', $data);
}


public function delete_Product($id){
        $this->ProductModel->delete($id);
    setMessage('success', 'Product deleted successfully!');
    redirect('/admin/products');
}

}