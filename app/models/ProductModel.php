<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: ProductModel
 * 
 * Automatically generated via CLI.
 */
class ProductModel extends Model {
    protected $table = 'products';
    protected $primary_key = 'product_id';

    protected $fillable = [
        'name',
        'description',
        'stock',
        'product_image',
        'status',
        'created_at',
        'updated_at',
        'sku',
        'role'

    ];
    public function __construct()
    {
        parent::__construct();
    }
public function getAll($q = '', $records_per_page = null, $page = null)
{
    $baseQuery = $this->db->table('products p')
        ->left_join('product_categories pc', 'p.product_id = pc.product_id')
        ->left_join('categories c', 'pc.category_id = c.category_id');

    if (!empty($q)) {
        $baseQuery
            ->like('p.name', '%' . $q . '%')
            ->or_like('p.description', '%' . $q . '%')
            ->or_like('c.name', '%' . $q . '%');
    }

    $countQuery = clone $baseQuery;
    $countResult = $countQuery->select_count('DISTINCT p.product_id', 'count')->get();
    $data['total_rows'] = $countResult ? $countResult['count'] : 0;

    $dataQuery = $baseQuery
        ->select('
            p.*,
            GROUP_CONCAT(DISTINCT c.name SEPARATOR ", ") AS categories,
            GROUP_CONCAT(DISTINCT c.category_id SEPARATOR ",") AS category_ids
        ')
        ->group_by('p.product_id');

    // Apply pagination if needed
    if (!is_null($records_per_page) && !is_null($page)) {
        $dataQuery->pagination($records_per_page, $page);
    }

    $data['records'] = $dataQuery->get_all();

    return $data;
}


public function getProductByIdWithCategories($id)
{
    $this->db->table('products p');
    $this->db->select('p.*, c.category_id, c.name AS category_name, c.parent_id, parent.name AS parent_name');
    $this->db->left_join('product_categories pc', 'p.product_id = pc.product_id');
    $this->db->left_join('categories c', 'pc.category_id = c.category_id');
    $this->db->left_join('categories parent', 'c.parent_id = parent.category_id');
    $this->db->where('p.product_id', $id);

    return $this->db->get_all(); // multiple rows (for grouping later)
}

public function getAllCategories()
{
    $this->db->table('categories');
    $this->db->select('*');
    return $this->db->get_all();
}


public function deduct_stock($product_id, $quantity)
{
    // Get current stock
    $currentStock = $this->getProductStock($product_id);

    // Calculate new stock
    $newStock = max(0, $currentStock - $quantity);

    // Update the product
    return $this->update_stock($product_id, $newStock);
}

public function existingSKU($sku){
    $existingSku = $this->db->table($this->table)
    ->where('sku', $sku)
    ->get();
    return $existingSku;
}

public function getProductsByParentCategory($parent_id)
{
    // ✅ Get only ACTIVE subcategory IDs under the parent
    $subcategories = $this->db->table('categories')
        ->select('category_id')
        ->where('parent_id', $parent_id)
        ->where('status', 1) // ✅ include only active subcategories
        ->get_all();

    if (empty($subcategories)) {
        return [];
    }

    $subcategoryIds = array_column($subcategories, 'category_id');

    // ✅ Fetch products that belong to ACTIVE subcategories
    $this->db->table('products p');
    $this->db->select('
        p.*,
                 p.stock AS stock_quantity,

        GROUP_CONCAT(DISTINCT c.name SEPARATOR ", ") AS categories,
        GROUP_CONCAT(DISTINCT c.category_id SEPARATOR ",") AS category_ids
    ');
    $this->db->left_join('product_categories pc', 'p.product_id = pc.product_id');
    $this->db->left_join('categories c', 'pc.category_id = c.category_id');
    $this->db->in('c.category_id', $subcategoryIds);
    $this->db->where('p.status', 1); // ✅ only active products
    $this->db->group_by('p.product_id');

    return $this->db->get_all();
}


public function countProductsByCategory($category_id)
{
    $result = $this->db->table('product_categories pc')
        ->select_count('DISTINCT pc.product_id', 'total')
        ->left_join('products p', 'pc.product_id = p.product_id')
        ->where('pc.category_id', $category_id)
        ->where('p.status', 1) // optional: count only active products
        ->get();

    return isset($result['total']) ? (int)$result['total'] : 0;
}

public function getProductsByCategory($category_id)
{
    $this->db->table('products p');
    $this->db->select('
        p.*,
         p.stock AS stock_quantity,
        GROUP_CONCAT(DISTINCT c.name SEPARATOR ", ") AS categories,
        GROUP_CONCAT(DISTINCT c.category_id SEPARATOR ",") AS category_ids
    ');
    $this->db->left_join('product_categories pc', 'p.product_id = pc.product_id');
    $this->db->left_join('categories c', 'pc.category_id = c.category_id');
    $this->db->where('c.category_id', $category_id);
    $this->db->where('p.status', 1);
    $this->db->group_by('p.product_id');
    
    return $this->db->get_all();
}
public function getSubcategoriesWithProductCount($parent_id)
{
    return $this->db->table('categories c')
        ->select('
            c.category_id,
            c.name,
            c.parent_id,
            c.status,
            COUNT(DISTINCT CASE WHEN p.status = 1 THEN p.product_id END) AS product_count
        ')
        ->left_join('product_categories pc', 'c.category_id = pc.category_id')
        ->left_join('products p', 'pc.product_id = p.product_id')
        ->where('c.parent_id', $parent_id)
        ->where('c.status', 1) // ✅ only include active subcategories
        ->group_by('c.category_id')
        ->get_all();
}


    // public function get_product_by_id($id)
    // {
    //     return $this->db->table('products')
    //                     ->where('product_id', $id)
    //                     ->get(); // returns a single row
    // }

public function get_product_by_id($product_id) {
    return $this->db->table('products p')
        ->select('p.*, c.name AS category_name')
        ->left_join('product_categories pc', 'pc.product_id = p.product_id')
        ->left_join('categories c', 'c.category_id = pc.category_id')
        ->where('p.product_id', $product_id)
        ->get();
}


    public function getProductStock($product_id)
{
    $result = $this->db->table('products')
        ->select('stock')
        ->where('product_id', $product_id)
        ->get();

    return $result ? (int)$result['stock'] : 0;
}

public function getById($id) {
    return $this->db->table($this->table)
                    ->where('product_id', $id)
                    ->get();
}

public function update_stock($product_id, $newStock)
{
    return $this->db->table('products')
        ->where('product_id', $product_id)
        ->update(['stock' => $newStock]);
}



    // // Optional: Fetch single product with its categories
    // public function getProductByIdWithCategories($id)
    // {
    //     return $this->db->table('products p')
    //         ->select('p.*, GROUP_CONCAT(c.name SEPARATOR ", ") AS categories')
    //         ->left_join('product_categories pc', 'p.product_id = pc.product_id')
    //         ->left_join('categories c', 'pc.category_id = c.category_id')
    //         ->where('p.product_id', $id)
    //         ->group_by('p.product_id')
    //         ->get();
    // }

}