<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($product['name']) ?> - Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #e8f4f8;
            font-family: "Poppins", sans-serif;
            display: flex;
        }

        /* Sidebar Styles */
       .sidebar {
            width: 256px;
            background: #fff;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            box-shadow: 2px 0 8px rgba(0,0,0,0.05);
            padding: 24px 0;
        }
.sidebar-logo {
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 70px; /* Slightly taller for better spacing */
}

.sidebar-logo img {
    max-height: 100%;
    max-width: 80%;
    object-fit: contain; /* Keeps aspect ratio */
    display: block;
}

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin: 0;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #666;
            text-decoration: none;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: #e3f2fd;
            color: #2196F3;
            border-left: 3px solid #2196F3;
            padding-left: 17px;
        }

        .sidebar-menu i {
            font-size: 1.2rem;
            width: 24px;
        }

        .sidebar-submenu {
            list-style: none;
            padding-left: 20px;
        }

        .sidebar-submenu li a {
            padding: 8px 20px;
            font-size: 0.9rem;
            color: #888;
        }

        .sidebar-submenu li a:hover {
            color: #1abc9c;
            background: transparent;
            border-left: none;
            padding-left: 20px;
        }

        .sidebar-logout {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
        }

        .logout-btn {
            width: 100%;
            background: #2196F3;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #1976D2;
        }

        /* Main Content */
        .main-content {
            margin-left: 256px;
            width: calc(100% - 256px);
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: #fff;
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-toggle {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #2196F3;
            cursor: pointer;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-icon {
            font-size: 1.3rem;
            color: #666;
            cursor: pointer;
            transition: 0.3s;
        }

        .header-icon:hover {
            color: #2196F3;
        }

        .notification-badge {
            position: relative;
        }

        .badge-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }
        /* Main Content */
        .main-content {
            margin-left: 256px;
            width: calc(100% - 256px);
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: #fff;
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .header-toggle {
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #2196F3;
            cursor: pointer;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-icon {
            font-size: 1.3rem;
            color: #666;
            cursor: pointer;
            transition: 0.3s;
        }

        .header-icon:hover {
            color: #2196F3;
        }

       

        .notification-badge {
            position: relative;
        }

        .badge-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #dc3545;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        /* Content Area */
        .content {
            padding: 30px;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
        }

        /* Product Details Container */
        .product-details-container {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.05);
            padding: 40px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: start;
        }

      .product-image-section {
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f8f9fa; /* light neutral background */
    border-radius: 16px; /* rounded container */
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.product-img {
    width: 100%;
    max-width: 320px;
    height: auto;
    object-fit: contain;
    background-color: #ffffff; /* add clean white background inside image */
    border-radius: 12px;
    padding: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

        .product-info-section {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .product-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
        }

        .product-name {
            font-size: 1.75rem;
            font-weight: 700;
            color: #333;
            margin: 0;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-showing {
            background: #c8e6c9;
            color: #2196F3;
        }

        .status-inactive {
            background: #fde2e2;
            color: #dc3545;
        }

        .product-sku {
            color: #888;
            font-size: 0.95rem;
            margin: 0;
        }

        .product-status-text {
            color: #2196F3;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .product-price {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin: 0;
        }

        .product-meta {
            display: flex;
            gap: 20px;
            align-items: center;
            padding: 15px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .meta-label {
            color: #888;
            font-size: 0.9rem;
        }

        .meta-value {
            color: #333;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .product-description {
            color: #666;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .product-category {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .category-label {
            color: #333;
            font-weight: 600;
            font-size: 0.95rem;
        }

        .category-tags {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .category-tag {
            background: #e3f2fd;
            color: #1565c0;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
        }
        .category-hierarchy {
  display: flex;
  flex-direction: column;
  gap: 8px;
  background: #f9fafc;
  border-radius: 10px;
  padding: 12px 16px;
  border: 1px solid #e0e6ed;
}

.category-item {
  padding-bottom: 6px;
  border-bottom: 1px dashed #e5e5e5;
}

.category-item:last-child {
  border-bottom: none;
}

.subcategory-list {
  display: flex;
  flex-wrap: wrap;
  gap: 8px;
}

.subcategory-badge {
  background: #e3f2fd;
  color: #1565c0;
  border-radius: 6px;
  padding: 4px 10px;
  font-size: 0.85rem;
  display: inline-flex;
  align-items: center;
  transition: background 0.2s;
}

.subcategory-badge:hover {
  background: #bbdefb;
  color: #0d47a1;
}


        .edit-btn {
            background: #2196F3;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
            align-self: flex-start;
            text-decoration: none;
        }

        .edit-btn:hover {
            background: #1976D2;
            color: white;
        }

        .back-btn {
            color: #2196F3;
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .back-btn:hover {
            color: #1976D2;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                transform: translateX(-100%);
                transition: 0.3s;
                z-index: 1000;
            }

            .sidebar.active {
                width: 256px;
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .product-details-container {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .product-name {
                font-size: 1.5rem;
            }

            .product-price {
                font-size: 1.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
  
      <?= $this->call->view('/partials/sidebar') ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <button class="header-toggle" id="sidebarToggle">
                    <i class="bi bi-list"></i>
                </button>
            </div>
            <div class="header-right">
                <div class="header-icon">
                    <i class="bi bi-moon"></i>
                </div>
                <div class="header-icon notification-badge">
                    <i class="bi bi-bell"></i>
                    <span class="badge-count">12</span>
                </div>
                <div class="user-avatar">
                    <i class="bi bi-person"></i>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <a href="<?= site_url('admin/products') ;?>" class="back-btn">
                <i class="bi bi-arrow-left"></i> Back to Products
            </a>

            <h1 class="page-title">Product Details</h1>

            <div class="product-details-container">
                <!-- Product Image -->
                <div class="product-image-section">
                    <img src="<?= BASE_URL ?>/<?= htmlspecialchars($product['product_image']) ?>" 
                         alt="<?= htmlspecialchars($product['name']) ?>" class="product-img">
                </div>

                <!-- Product Info -->
                <div class="product-info-section">
                    <div>
                        <p class="product-status-text">
                            <span>Status:</span> <?= $product['status'] ? 'This product Showing' : 'This product Hidden' ?>
                        </p>
                        <h2 class="product-name"><?= htmlspecialchars($product['name']) ?></h2>
                        <p class="product-sku">SKU : <?= htmlspecialchars($product['product_id']) ?></p>
                    </div>

                    <p class="product-price">₱<?= number_format($product['price'], 2) ?></p>

                    <div class="product-meta">
                      
                        <div class="meta-item">
                            <span class="meta-label">QUANTITY:</span>
                             <?php if ($product['stock'] == 0): ?>
        <span class="badge bg-danger">Out of Stock</span>
    <?php elseif ($product['stock'] <= 5): ?>
        <span class="badge bg-warning text-dark">Low Stock (<?= $product['stock']; ?>)</span>
    <?php else: ?>
        <span class="badge bg-success"><?= $product['stock']; ?></span>
    <?php endif; ?>
                        </div>
                    </div>

                    <p class="product-description">
                        <?= nl2br(htmlspecialchars($product['description'])) ?>
                    </p>

             <div class="product-category mt-2">
  <h6 class="category-label mb-2 d-flex align-items-center gap-2">
    <i class="bi bi-diagram-3 text-primary"></i>
    <span>Category Hierarchy</span>
  </h6>

 <?php if (!empty($categories)): ?>
  <div class="category-hierarchy">
    <?php foreach ($categories as $group): ?>
      <div class="category-item mb-2">
        <div class="fw-semibold text-dark">
          <i class="bi bi-folder-fill text-warning me-1"></i>
          <?= htmlspecialchars($group['parent']['name']) ?>
          <?php if (in_array((int)$group['parent']['id'], $productCategoryIds, true)): ?>
            <span class="badge bg-success ms-2">selected</span>
          <?php endif; ?>
        </div>

        <?php if (!empty($group['children'])): ?>
          <div class="subcategory-list mt-1 ps-4">
            <?php foreach ($group['children'] as $child): ?>
              <span class="subcategory-badge d-inline-block me-2 mb-1">
                <i class="bi bi-caret-right-fill small text-secondary me-1"></i>
                <?= htmlspecialchars($child['name']) ?>
                <span class="badge bg-info text-dark ms-1 small">selected</span>
              </span>
            <?php endforeach; ?>
          </div>
        <?php else: ?>
          <?php if (!in_array((int)$group['parent']['id'], $productCategoryIds, true)): ?>
            <p class="text-muted small mb-0 ps-4">No subcategories selected</p>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php else: ?>
  <div class="alert alert-light border d-flex align-items-center gap-2 p-2 small mb-0" role="alert">
    <i class="bi bi-tag"></i> <span>Uncategorized</span>
  </div>
<?php endif; ?>

</div>



                     <button class="edit-btn" title="Edit" data-bs-toggle="modal" data-bs-target="#editProductModal<?= $product['product_id']; ?>">
                                                <i class="fas fa-edit">edit</i>
                                            </button>
                </div>
            </div>
        </div>
    </div>
   <div class="modal fade" id="editProductModal<?= $product['product_id']; ?>" tabindex="-1">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header bg-warning text-white">
                                                <h5 class="modal-title fw-semibold">
                                                    <i class="fas fa-edit me-2"></i> Edit Product
                                                </h5>
                                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                            </div>
                                            <input type="hidden" name="product_id" value="<?= $product['product_id']; ?>">
                                            <form action="<?= site_url('admin/update-products/'. $product['product_id']); ?>" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="current_image" value="<?= $product['product_image']; ?>">
                                                <div class="modal-body">
                                                    <div class="row g-3">
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Product Name</label>
                                                            <input type="text" class="form-control" name="name" value="<?= $product['name']; ?>" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Categories</label>
                                            <select class="form-select" name="category_ids[]" multiple required>
    <?php if (!empty($allCategories)): ?>
        <?php foreach ($allCategories as $group): ?>
            <optgroup label="<?= htmlspecialchars($group['parent']['name']); ?>">
                <option 
                    value="<?= $group['parent']['id']; ?>"
                    <?= in_array($group['parent']['id'], $productCategoryIds) ? 'selected' : ''; ?>>
                    <?= htmlspecialchars($group['parent']['name']); ?>
                </option>
                <?php foreach ($group['children'] as $child): ?>
                    <option 
                        value="<?= $child['category_id']; ?>"
                        <?= in_array($child['category_id'], $productCategoryIds) ? 'selected' : ''; ?>>
                        &nbsp;&nbsp;↳ <?= htmlspecialchars($child['name']); ?>
                    </option>
                <?php endforeach; ?>
            </optgroup>
        <?php endforeach; ?>
    <?php else: ?>
        <option disabled>No categories available</option>
    <?php endif; ?>
</select>


                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Price</label>
                                                            <input type="number" step="0.01" class="form-control" name="price" value="<?= $product['price']; ?>" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Stock</label>
                                                            <input type="number" class="form-control" name="stock" value="<?= $product['stock']; ?>" required>
                                                        </div>
                                                        <div class="col-12">
                                                            <label class="form-label fw-semibold">Description</label>
                                                            <textarea class="form-control" name="description" rows="3"><?= $product['description']; ?></textarea>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Product Image</label>
                                                            <input type="file" class="form-control" name="product_image" accept="image/*">
                                                            <img src="<?= base_url() . $product['product_image']; ?>" class="mt-2" style="width:80px;border-radius:6px;">
                                                        </div>
                                                        <div class="col-md-6 d-flex align-items-center">
                                                            <input type="hidden" name="status" value="0">
                                                            <label class="toggle-switch">
                                                                <input type="checkbox" name="status" value="1" <?= $product['status'] == 1 ? 'checked' : ''; ?>>
                                                                <span class="toggle-slider"></span>
                                                            </label>
                                                            <span style="margin-left: 8px;">Publish</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                                                        <i class="fas fa-times me-1"></i> Cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-warning text-white px-4">
                                                        <i class="fas fa-save me-1"></i> Update Product
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.getElementById('sidebarToggle');
            if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                sidebar.classList.remove('active');
            }
        });
    </script>
</body>
</html>
