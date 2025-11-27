    <?php
    defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

    /**
     * Controller: Category_Controller
     * 
     * Automatically generated via CLI.
     */

    class Category_Controller extends Controller {
        public function __construct()
        {
            parent::__construct();
            $this->call->model('CategoryModel');
            if (!$this->session->userdata('logged_in')) {
            redirect('/login');
            exit;
        }
        if ($this->session->userdata('role') !== 'admin') {
            redirect('/');
            exit;
        }
        }


        public function index(){

        $page = 1;
        $page = isset($_GET['page']) ? $this->io->get('page') : 1;
        $q = isset($_GET['q']) ? trim($this->io->get('q')) : '';

        $records_per_page = 5;

        $all = $this->CategoryModel->getAll($q, $records_per_page, $page);
        $data['getAll'] = $all['records'];
        $total_rows = $all['total_rows'];

        $this->pagination->set_options([
                            'first_link'     => '⏮ First',
                            'last_link'      => 'Last ⏭',
                            'next_link'      => 'Next →',
                            'prev_link'      => '← Prev',
                            'page_delimiter' => '&page='
                        ]);

                        $this->pagination->set_theme('bootstrap'); 
        $this->pagination->initialize($total_rows, $records_per_page, $page, 'admin/category?q='.$q);
        $data['page'] = $this->pagination->paginate();

        $data['allCategories'] = $this->CategoryModel->getAllCategoriesWithChildren();
        $data['getAllCat'] = $this->CategoryModel->getAllCat();
        $this->call->view('/admin/categories', $data);

                }

        public function create_Category(){
            $this->form_validation
                ->name('name')
                    ->required()
                    ->max_length(200)
                ->name('description')
                    ->required()
                    ->max_length(100)
                ->name('sku')
                    ->required()   
                    ;

            if($this->form_validation->run() == FALSE) {
                $errors = $this->form_validation->get_errors();
            setErrors('$errors');
                redirect('/admin/category');
                return;
            }

            $name = $this->io->post('name');
            $description  = $this->io->post('description');
        $status = $this->io->post('status');
        $sku = $this->io->post('sku');
            $status = ($status == '1') ? 1 : 0;
            $parent_id = $this->io->post('parent_id') ?: NULL;

                    // Check existing email/username
            // if($this->UserModel->findByCategories_Name($name)) {
            //     setMessage('danger', 'Category already exists!');
            //     redirect('signup');
            //     return;
            // }


            if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['category_image']; 

                // Load upload library with file
                $this->call->library('upload', $file);

                $this->upload
                    ->set_dir('public/img/category_img') // siguraduhin na may uploads/ folder sa loob ng public/
                    ->allowed_extensions(['jpg','jpeg','png', 'svg'])
                    ->allowed_mimes(['image/jpeg','image/png', 'image/svg+xml'])
                    ->max_size(2)
                    ->encrypt_name();

                if ($this->upload->do_upload()) {
                    // Save relative path, not just filename
                    $filename   = $this->upload->get_filename();
                    $category_image = 'public/img/category_img/' . $filename;
                } else {
                    $errors = $this->upload->get_errors();
                    // setMessage('warning', implode(", ", $errors));

                    // default image path
                    $category_image = "uploads/default.png";
                }
            } else {
                $category_image = "uploads/default.png";
            }

                $existingSku = $this->CategoryModel->existingSKU($sku);
                if($existingSku){
                setMessage('error', 'SKU already exists. Please choose a different SKU.');
                redirect('/admin/category');
            }
                   
                    $this->CategoryModel->insert([
                        'name' => $name,
                        'description'  => $description,
                        'category_image'  => $category_image,
                        'status' => $status,
                        'sku' => $sku,
                        'parent_id' => $parent_id,

                    ]);

             setMessage('success', 'Category created successfully!');
    redirect('/admin/category');
        }


  public function update_Category($id) {
    // Get form input
     $isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

    if ($isAjax) {
        $input = json_decode(file_get_contents('php://input'), true);
        $status = isset($input['status']) ? ($input['status'] == 1 ? 1 : 0) : null;

        if ($status === null) {
            echo json_encode(['success' => false, 'message' => 'Invalid status']);
            return;
        }

        $this->CategoryModel->update($id, ['status' => $status]);
        echo json_encode(['success' => true]);
        return;
    }

    $name        = $this->io->post('name');
    $description = $this->io->post('description');
    $sku = $this->io->post('sku');
    $status      = $this->io->post('status') == '1' ? 1 : 0;

    // Validation
    $this->form_validation
        ->name('name')->required()->max_length(200)
        ->name('description')->required()->max_length(100);

    if ($this->form_validation->run() == FALSE) {
        $errors = $this->form_validation->get_errors();
        setErrors($errors);
        redirect('/admin/category');
        return;
    }

     $existingSku = $this->CategoryModel->existingSKU($sku);
                if($existingSku){
                setMessage('error', 'SKU already exists. Please choose a different SKU.');
                redirect('/admin/category');}
    // Get existing category data
    $category = $this->CategoryModel->find($id);
    if (!$category) {
        setErrors(['Category not found.']);
        redirect('/admin/category');
        return;
    }

    // Handle category image upload
    $category_image = $category['category_image']; // default to existing image
    if (isset($_FILES['category_image']) && $_FILES['category_image']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['category_image']; 

        $this->call->library('upload', $file);
        $this->upload
            ->set_dir('public/img/category_img')
            ->allowed_extensions(['jpg','jpeg','png', 'svg'])
            ->allowed_mimes(['image/jpeg','image/png', 'image/svg+xml'])
            ->max_size(2)
            ->encrypt_name();

        if ($this->upload->do_upload()) {
            $filename = $this->upload->get_filename();
            $category_image = 'public/img/category_img/' . $filename;
        }
    }
  $existingSku = $this->CategoryModel->existingSKU($sku);
                if($existingSku){
                setMessage('error', 'SKU already exists. Please choose a different SKU.');
                redirect('/admin/category');
            }
    // Update the category
    $this->CategoryModel->update($id, [
        'name'          => $name,
        'description'   => $description,
        'status'        => $status,
        'sku'        => $sku,
        'category_image'=> $category_image
    ]);

    setMessage('success', 'Category updated successfully!');
    redirect('/admin/category');
}



        public function view_subcategories($parent_id)
            {
                // Load subcategories that belong to this parent
                $data['parent'] = $this->CategoryModel->getById($parent_id);
                $data['subcategories'] = $this->CategoryModel->getSubcategories($parent_id);

                // Load the view (you can name it subcategories.php)
                $this->call->view('/admin/subCategories', $data);
            }

            public function delete_Category($id){
    // Check if category exists
   

   if ($this->CategoryModel->hasSubcategories($id)) {
        setMessage('warning', 'Cannot delete this category because it has subcategories.');
        redirect('/admin/category');
        return;
    }

    // Safe to delete
    $this->CategoryModel->delete($id);
    setMessage('success', 'Category deleted successfully!');
    redirect('/admin/category');
}
    }

    