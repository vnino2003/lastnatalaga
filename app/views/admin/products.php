<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Dashtar Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/notifications.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2196F3;
            --primary-light: #E3F2FD;
            --primary-dark: #1976D2;
            --secondary: #37474F;
            --light-bg: #E8F4F8;
            --border-color: #E0E7FF;
            --text-muted: #78909C;
            --success: #4CAF50;
            --warning: #FF9800;
            --danger: #F44336;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--light-bg);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }


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
            margin-left: 250px;
            padding: 0;
        }

        .topbar {
            background-color: #fff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border-color);
            box-shadow: 0 2px 4px rgba(33, 150, 243, 0.08);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .topbar-toggle {
            background: none;
            border: none;
            font-size: 24px;
            color: var(--primary);
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .topbar-toggle:hover {
            transform: scale(1.1);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .language-selector {
            background: none;
            border: none;
            color: var(--secondary);
            font-size: 13px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            transition: color 0.3s ease;
        }

        .language-selector:hover {
            color: var(--primary);
        }

        .theme-toggle {
            background: none;
            border: none;
            font-size: 20px;
            color: var(--text-muted);
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .theme-toggle:hover {
            color: var(--primary);
        }

        .notification-icon {
            position: relative;
            font-size: 20px;
            color: var(--text-muted);
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .notification-icon:hover {
            color: var(--primary);
        }

        .notification-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--danger);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: bold;
        }

        .user-avatar {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .user-avatar:hover {
            transform: scale(1.1);
        }

        /* Content Area */
        .content {
            padding: 30px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 30px;
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .btn-action {
            padding: 10px 18px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .btn-export {
            background-color: white;
            color: var(--text-muted);
            border: 1px solid var(--border-color);
        }

        .btn-export:hover {
            background-color: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-import {
            background-color: white;
            color: var(--text-muted);
            border: 1px solid var(--border-color);
        }

        .btn-import:hover {
            background-color: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-bulk {
            background-color: var(--warning);
            color: white;
        }

        .btn-bulk:hover {
            background-color: #F57C00;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 152, 0, 0.3);
        }

        .btn-delete {
            background-color: var(--danger);
            color: white;
        }

        .btn-delete:hover {
            background-color: #E53935;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(244, 67, 54, 0.3);
        }

        .btn-add {
            background-color: var(--primary);
            color: white;
        }

        .btn-add:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(33, 150, 243, 0.3);
        }

        /* Search and Filter */
        .search-filter-section {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
            align-items: center;
        }

        .search-box {
            flex: 1;
            min-width: 250px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 10px 15px 10px 40px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 13px;
            background-color: white;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
            outline: none;
        }

        .search-box i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 14px;
        }

        .btn-filter {
            background-color: var(--success);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-filter:hover {
            background-color: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
        }

        .btn-reset {
            background-color: white;
            color: var(--secondary);
            padding: 10px 20px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-reset:hover {
            background-color: var(--primary-light);
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Table */
        .table-container {
            background-color: white;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(33, 150, 243, 0.08);
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: linear-gradient(135deg, var(--primary-light), #F0F7FF);
            border-bottom: 2px solid var(--border-color);
        }

        .table thead th {
            color: var(--primary-dark);
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            padding: 15px;
            border: none;
            letter-spacing: 0.5px;
        }

        .table tbody td {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            font-size: 13px;
        }

        .table tbody tr:hover {
            background-color: var(--primary-light);
        }

        .product-image {
    width: 60px;
    height: 60px;
    background-color: #f9f9f9; /* light neutral background */
    border: 1px solid #e0e0e0; /* subtle border */
    border-radius: 8px; /* rounded corners for modern look */
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;
    object-fit: contain;
    filter: none; /* remove white inversion */
}


        .product-name {
            color: var(--primary);
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .product-name:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .badge-status {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-active {
            background-color: rgba(76, 175, 80, 0.1);
            color: var(--success);
        }

        .badge-inactive {
            background-color: rgba(244, 67, 54, 0.1);
            color: var(--danger);
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: 0.4s;
            border-radius: 24px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: 0.4s;
            border-radius: 50%;
        }

        input:checked + .toggle-slider {
            background-color: var(--primary);
        }

        input:checked + .toggle-slider:before {
            transform: translateX(26px);
        }

        .action-icons {
            display: flex;
            gap: 10px;
        }

        .action-icon {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            border: 1px solid var(--border-color);
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--text-muted);
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .action-icon:hover {
            background-color: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .action-icon a {
            color: inherit;
            text-decoration: none;
        }

        /* Modal */
        .modal-content {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(33, 150, 243, 0.15);
        }

        .modal-header {
            border-bottom: 1px solid var(--border-color);
            padding: 25px;
            background: linear-gradient(135deg, var(--primary-light), #F0F7FF);
        }

        .modal-header.bg-warning {
            background: linear-gradient(135deg, #FFE082, #FFD54F) !important;
        }

        .modal-header.bg-primary {
            background: linear-gradient(135deg, var(--primary-light), #E3F2FD) !important;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--secondary);
        }

        .modal-body {
            padding: 25px;
        }

        .form-label {
            font-weight: 600;
            color: var(--secondary);
            margin-bottom: 8px;
            font-size: 13px;
        }

        .form-control {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
            outline: none;
        }

        .form-control::placeholder {
            color: var(--text-muted);
        }

        .form-select {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 13px;
            transition: all 0.3s ease;
        }

        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
            outline: none;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 20px 25px;
            background-color: #FAFBFC;
        }

        .btn-secondary {
            background-color: white;
            color: var(--secondary);
            border: 1px solid var(--border-color);
            transition: all 0.3s ease;
        }

        .btn-secondary:hover {
            background-color: var(--primary-light);
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(33, 150, 243, 0.3);
        }

        .btn-warning {
            background-color: var(--warning);
            border-color: var(--warning);
            transition: all 0.3s ease;
        }

        .btn-warning:hover {
            background-color: #F57C00;
            border-color: #F57C00;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 152, 0, 0.3);
        }

        .modal-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 5px;
        }
        /* Responsive */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 200px;
            }

            .content {
                padding: 15px;
            }

            .page-title {
                font-size: 22px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-action {
                width: 100%;
                justify-content: center;
            }

            .search-filter-section {
                flex-direction: column;
            }

            .search-box {
                min-width: 100%;
            }
        }

        @media (max-width: 576px) {
            .main-content {
                margin-left: 0;
            }

            .table {
                font-size: 12px;
            }

            .table thead th,
            .table tbody td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <?= $this->call->view('/partials/sidebar') ?>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Topbar -->
        <div class="topbar">
            <div class="topbar-left">
                <button class="topbar-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="topbar-right">
                <button class="language-selector">
                    <span>GB</span>
                    <span>ENGLISH</span>
                </button>
                <button class="theme-toggle">
                    <i class="fas fa-moon"></i>
                </button>
                <div class="notification-icon">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">10</span>
                </div>
                <div class="user-avatar">JD</div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <h1 class="page-title">Products</h1>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn-action btn-export">
                    <i class="fas fa-download"></i>
                    Export
                </button>
                <button class="btn-action btn-import">
                    <i class="fas fa-upload"></i>
                    Import
                </button>
                <button class="btn-action btn-bulk">
                    <i class="fas fa-edit"></i>
                    Bulk Action
                </button>
                <button class="btn-action btn-">
                    <i class="fas fa-trash"></i>de lete
                    Delete
                </button>
                <button class="btn-action btn-add" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    <i class="fas fa-plus"></i>
                    Add Product
                </button>
            </div>

            <!-- Search and Filter -->
              <form action="" class="search-filter-section">
                       <?php
                        $q = '';
                        if(isset($_GET['q'])) {
                            $q = $_GET['q'];
                        }
                        ?>
                    <div class="search-box">
                        <i class="fas fa-search"></i>
                        <input type="text" name="q"  value="<?= html_escape($q); ?>" placeholder="Search by Product name">
                    </div>
                    <button class="btn-filter">Search</button>
                    <button class="btn-reset">Reset</button>
          
                </form>

            <?php getErrors(); ?>
            <?php getMessage(); ?>

            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>SKU</th>
                            <th>IMAGE</th>
                            <th>NAME</th>
                            <th>CATEGORY</th>
                            <th>PRICE</th>
                            <th>STOCK</th>
                            <th>STATUS</th>
                            <th>PUBLISHED</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($getAll)): ?>
                            <?php foreach($getAll as $product): ?>
                                <tr>
                                    <td><input type="checkbox" name="selected_products[]" value="<?= $product['product_id']; ?>"></td>
                                    <td><?= $product['sku']; ?></td>
                                    <td>
                                        <div class="product-image">
                                            <img src="<?= base_url() . $product['product_image']; ?>" alt="Product Image">
                                        </div>
                                    </td>
                                    <td><a href="#" class="product-name"><?= htmlspecialchars($product['name']); ?></a></td>
                                    <td>
                                        <?php if (!empty($product['categories'])): ?>
                                            <div style="display: flex; align-items: center; gap: 8px;">
                                                <i class="fas fa-tags" style="color: var(--success);"></i>
                                                <span><?= htmlspecialchars($product['categories']); ?></span>
                                            </div>
                                        <?php else: ?>
                                            <div style="color: var(--text-muted);">No Category</div>
                                        <?php endif; ?>
                                    </td>
                                    <td>$<?= number_format($product['price'], 2); ?></td>
<td>
    <?php if ($product['stock'] == 0): ?>
        <span class="badge bg-danger">Out of Stock</span>
    <?php elseif ($product['stock'] <= 5): ?>
        <span class="badge bg-warning text-dark">Low Stock (<?= $product['stock']; ?>)</span>
    <?php else: ?>
        <span class="badge bg-success"><?= $product['stock']; ?></span>
    <?php endif; ?>
</td>
                              <td>
    <span class="badge-status <?= $product['status'] ? 'badge-active' : 'badge-inactive'; ?>" id="status-badge-<?= $product['product_id']; ?>">
        <?= $product['status'] ? 'Active' : 'Inactive'; ?>
    </span>
</td>

                                    <td>
                                        <label class="toggle-switch">
                                            <input type="checkbox" <?= $product['status'] ? 'checked' : ''; ?> data-id="<?= $product['product_id']; ?>">
                                            <span class="toggle-slider"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="action-icons">
                                            <button class="action-icon" title="View">
                                                <a href="<?= site_url('admin/view-products/' . $product['product_id']);?>"><i class="fas fa-eye"></i></a>
                                            </button>
                                            <button class="action-icon" title="Edit" data-bs-toggle="modal" data-bs-target="#editProductModal<?= $product['product_id']; ?>">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="action-icon" title="Delete" " data-bs-toggle="modal" data-bs-target="#deleteProductModal<?= $product['product_id']; ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Edit Product Modal -->
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
    <label class="form-label fw-semibold">SKU</label>
    <input type="text" class="form-control" name="sku" value="<?= $product['sku']; ?>" placeholder="Enter product SKU" required>
</div>

                                                        <div class="col-md-6">
                                                            <label class="form-label fw-semibold">Categories</label>
                                                            <select class="form-select" name="category_ids[]" multiple required>
                                                                <?php 
                                                                $productCategoryIds = explode(',', $product['category_ids'] ?? '');
                                                                if (!empty($categories)): 
                                                                    foreach ($categories as $group): ?>
                                                                        <optgroup label="<?= htmlspecialchars($group['parent']['name']); ?>">
                                                                            <?php foreach ($group['children'] as $child): ?>
                                                                                <option value="<?= $child['category_id']; ?>" <?= in_array($child['category_id'], $productCategoryIds) ? 'selected' : ''; ?>>
                                                                                    &nbsp;&nbsp;↳ <?= htmlspecialchars($child['name']); ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        </optgroup>
                                                                <?php endforeach; endif; ?>
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

                                 <div class="modal fade" id="deleteProductModal<?=  $product['product_id']; ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?= site_url('admin/delete-product/' .  $product['product_id']); ?>">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this category?</p>
                        <input type="hidden" name="category_id" value=" $product['product_id']; ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-modal-submit btn-delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">No products found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                 <?php
              
                echo $page;
            ?>

            </div>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                     <div>
            <h5 class="modal-title">Add Product</h5>
            <p class="modal-subtitle">
              Add your product and necessary information from here
            </p>
          </div>`
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="<?= site_url('admin/create-products'); ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Product Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter product name" required>
                            </div>
                            <div class="col-md-6">
    <label class="form-label fw-semibold">SKU</label>
    <input type="text" class="form-control" name="sku" placeholder="Enter product SKU" required>
</div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Categories</label>
                                <select class="form-select" name="category_ids[]" multiple required>
                                    <?php if (!empty($categories)): ?>
                                        <?php foreach ($categories as $group): ?>
                                            <optgroup label="<?= htmlspecialchars($group['parent']['name']); ?>">
                                                <?php if (!empty($group['children'])): ?>
                                                    <?php foreach ($group['children'] as $child): ?>
                                                        <option value="<?= $child['category_id']; ?>">
                                                            &nbsp;&nbsp;↳ <?= htmlspecialchars($child['name']); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </optgroup>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="">No categories available</option>
                                    <?php endif; ?>
                                </select>
                                <small class="text-muted">Hold CTRL (Windows) or CMD (Mac) to select multiple categories.</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Price</label>
                                <input type="number" step="0.01" class="form-control" name="price" placeholder="Enter price" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Stock</label>
                                <input type="number" class="form-control" name="stock" placeholder="Enter stock quantity" required>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold">Description</label>
                                <textarea class="form-control" name="description" rows="3" placeholder="Enter product description"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Product Image</label>
                                <input type="file" class="form-control" name="product_image" accept="image/*" required>
                            </div>
                            <div class="col-md-6 d-flex align-items-center">
                                <input type="hidden" name="status" value="0">
                                <label class="toggle-switch">
                                    <input type="checkbox" name="status" value="1" checked>
                                    <span class="toggle-slider"></span>
                                </label>
                                <span style="margin-left: 8px;">Publish</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                           Cancel
                        </button>
                        <button type="submit" class="btn btn-primary px-4">
                           Add Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }

        function toggleSubmenu(event) {
            event.preventDefault();
            const submenu = event.target.closest('li').querySelector('.submenu');
            if (submenu) {
                submenu.classList.toggle('show');
            }
        }

        
    </script>
  <script>
document.querySelectorAll('.toggle-switch input[type="checkbox"]').forEach(toggle => {
    toggle.addEventListener('change', function() {
        const productId = this.dataset.id;
        const status = this.checked ? 1 : 0;
        console.log('Toggling product', productId, 'to', status);

        const badge = document.getElementById(`status-badge-${productId}`);
        badge.classList.remove('badge-active', 'badge-inactive');
        badge.classList.add(status ? 'badge-active' : 'badge-inactive');
        badge.textContent = status ? 'Active' : 'Inactive';

        fetch("<?= site_url('admin/update-products') ?>/" + productId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: JSON.stringify({ status: status })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Server response:', data);
            if (!data.success) {
                alert('Failed to update status');
                toggle.checked = !toggle.checked;
                badge.classList.remove('badge-active', 'badge-inactive');
                badge.classList.add(toggle.checked ? 'badge-active' : 'badge-inactive');
                badge.textContent = toggle.checked ? 'Active' : 'Inactive';
            }
        })
        .catch(err => {
            console.error(err);
            alert('An error occurred');
            toggle.checked = !toggle.checked;
        });
    });
});


</script>


</body>
</html>
