<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: CategoryModel
 * 
 * Automatically generated via CLI.
 */
class CategoryModel extends Model {
    protected $table = 'categories';
    protected $primary_key = 'category_id';

    protected $fillable = [
        'name',
        'description',
        'created_at',
        'status',
        'category_image',
        'sku'
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function getAll($q, $records_per_page = null, $page = null) {
    if (is_null($page)) {
        return $this->db->table($this->table)
                        ->where_null('parent_id') // ✅ Only parent categories
                        ->get_all();
    } else {
        $query = $this->db->table($this->table)
                          ->where_null('parent_id');

        if (!empty($q)) {
            $query->like('name', '%'.$q.'%')
                  ->or_like('description', '%'.$q.'%');
        }

        $countQuery = clone $query;

        $data['total_rows'] = $countQuery->select_count('*', 'count')
                                         ->get()['count'];

        $data['records'] = $query->pagination($records_per_page, $page)
                                 ->get_all();

        return $data;
    }


      }

      public function getAllCat(){
                     return $this->db->table($this->table)->get_all();

      }
      public function getById($category_id)
        {
            return $this->db->table('categories')
                            ->where('category_id', $category_id)
                            ->get();
        }

        public function getSubcategories($parent_id)
        {
            return $this->db->table('categories')
                            ->where('parent_id', $parent_id)
                            ->get_all();
        }

        // CategoryModel.php
 public function getAllCategoriesWithChildren() {
    $this->db->table($this->table);
    $categories = $this->db->get_all();

    $grouped = [];

    foreach ($categories as $cat) {
        if (empty($cat['parent_id'])) {
            // This is a parent category
            $grouped[$cat['category_id']] = [
                'parent' => $cat,
                'children' => []
            ];
        }
    }

    // Add subcategories to their parents
    foreach ($categories as $cat) {
        if (!empty($cat['parent_id']) && isset($grouped[$cat['parent_id']])) {
            $grouped[$cat['parent_id']]['children'][] = $cat;
        }
    }

    return $grouped;
}
public function existingSKU($sku){
    $existingSku = $this->db->table($this->table)
    ->where('sku', $sku)
    ->get();
    return $existingSku;
}

    public function getCategoriesByProduct($product_id)
{
    return $this->db
        ->table('product_categories pc')
        ->select('c.category_id, c.name, c.parent_id, p.name as parent_name')
        ->join('categories c', 'c.category_id = pc.category_id')
        ->join('categories p', 'p.category_id = c.parent_id', 'LEFT')
        ->where('pc.product_id', $product_id)
        ->get()
        ->getResultArray();
}

    public function hasSubcategories($category_id)
    {
        $subcategories = $this->getSubcategories($category_id);
        return !empty($subcategories);
    }
public function getParentCategoriesWithChildren()
{
    // Get all active parent categories
    $parents = $this->db->table('categories AS c')
        ->select('c.category_id, c.name, c.category_image')
        ->where('c.status', 1)
        ->where_null('c.parent_id')
        ->order_by('c.created_at', 'DESC')
        ->get_all();

    // Get all active subcategories
    $children = $this->db->table('categories AS c')
        ->select('c.category_id, c.name, c.category_image, c.parent_id')
        ->where('c.status', 1)
        ->where_not_null('c.parent_id')
        ->get_all();

    // Group subcategories under their parent_id
    $grouped = [];
    foreach ($children as $child) {
        $grouped[$child['parent_id']][] = $child;
    }

    // Attach subcategories to parents
    foreach ($parents as &$parent) {
        $parent['subcategories'] = $grouped[$parent['category_id']] ?? [];
    }

    return $parents;
}



}