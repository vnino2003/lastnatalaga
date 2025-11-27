
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - Dashtar Admin</title>
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

        .toggle-btn {
            background-color: white;
            color: var(--secondary);
            padding: 8px 16px;
            border: 1px solid var(--border-color);
            border-radius: 20px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s ease;
        }

        .toggle-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
            box-shadow: 0 4px 12px rgba(33, 150, 243, 0.3);
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

        .category-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .category-name {
            color: var(--primary);
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .category-name:hover {
            color: var(--primary-dark);
            text-decoration: underline;
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

        .modal-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--secondary);
        }

        .modal-subtitle {
            font-size: 13px;
            color: var(--text-muted);
            margin-top: 5px;
        }

        .modal-body {
            padding: 25px;
        }

        .form-group {
            margin-bottom: 20px;
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
        }  .badge-status {
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

        .upload-area {
            border: 2px dashed var(--border-color);
            border-radius: 8px;
            padding: 40px 20px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .upload-area:hover {
            border-color: var(--primary);
            background-color: var(--primary-light);
        }

        .upload-icon {
            font-size: 32px;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .upload-text {
            color: var(--secondary);
            font-weight: 600;
            margin-bottom: 5px;
        }

        .upload-hint {
            font-size: 12px;
            color: var(--text-muted);
        }

        .parent-badge {
            display: inline-block;
            background-color: var(--primary-light);
            color: var(--primary-dark);
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 500;
        }

        .modal-footer {
            border-top: 1px solid var(--border-color);
            padding: 20px 25px;
            background-color: #FAFBFC;
        }

        .btn-modal-cancel {
            background-color: white;
            color: var(--secondary);
            border: 1px solid var(--border-color);
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-modal-cancel:hover {
            background-color: var(--primary-light);
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-modal-submit {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-modal-submit:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(33, 150, 243, 0.3);
        }
        
        .category-image {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 0 50% 50% 50%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .category-image img {
            width: 60%;
            height: 60%;
            object-fit: contain;
            filter: brightness(0) invert(1);
        }

        /* Hierarchy styling for parent/child categories */
        .category-row.parent-category > td {
            background-color: #F0F7FF;
            font-weight: 600;
        }

        .category-row.child-category > td {
            background-color: #FAFBFC;
            padding-left: 0 !important;
        }

        .category-row.child-category td:nth-child(4) {
            padding-left: 60px !important;
        }

        .category-hierarchy-indent {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-right: 8px;
        }

        .hierarchy-icon {
            color: var(--primary);
            font-size: 12px;
        }

        .parent-indicator {
            display: inline-block;
            background-color: var(--primary);
            color: white;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: 600;
            margin-left: 8px;
        }

        .child-indicator {
            display: inline-block;
            background-color: var(--text-muted);
            color: white;
            padding: 2px 8px;
            border-radius: 3px;
            font-size: 10px;
            font-weight: 600;
            margin-left: 8px;
        }

        /* New horizontal subcategory styling */
       .subcategories-list {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 8px;
    padding-top: 8px;
    border-top: 1px solid #e0e0e0;
}

.subcategory-item {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    color: var(--text-muted);
    font-size: 12px;
    font-weight: 400;

    /* 4 items per row */
    flex: 0 0 calc(25% - 9px);
    box-sizing: border-box;
}

/* Only show the first 4 items */
.subcategory-item:nth-child(n+5) {
    display: none;
}

.subcategory-item a {
    color: var(--primary);
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.subcategory-item a:hover {
    color: var(--primary-dark);
    text-decoration: underline;
}

.subcategory-dash {
    color: var(--text-muted);
}


        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

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
            .sidebar {
                position: fixed;
                left: -250px;
                z-index: 1000;
                transition: left 0.3s ease;
            }

            .sidebar.show {
                left: 0;
            }

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
            <h1 class="page-title">Category</h1>

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
                <button class="btn-action btn-delete">
                    <i class="fas fa-trash"></i>
                    Delete
                </button>
                <button class="btn-action btn-add" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    <i class="fas fa-plus"></i>
                    Add Category
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
                        <input type="text" name="q"  value="<?= html_escape($q); ?>" placeholder="Search by Category name">
                    </div>
                    <button class="btn-filter">Search</button>
                    <button class="btn-reset">Reset</button>
                    <button type="button" class="toggle-btn active" id="viewToggle" data-view="all">
                        <span id="toggleLabel">All</span>
                        <i class="fas fa-toggle-on"></i>
                    </button>
                </form>
  <?php getErrors(); ?>
        <?php getMessage(); ?>
            <!-- Table -->
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>SKU</th>
                            <th>ICON</th>
                            <th>NAME</th>
                            <th>DESCRIPTION</th>
                            <th>STATUS</th>
                            <th>PUBLISHED</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
<?php 
$parentCategories = [];
$childCategories = [];

foreach($getAll as $category): 
    $parentId = $category['category_id'];
    $children = isset($allCategories[$parentId]['children']) 
                ? $allCategories[$parentId]['children'] 
                : [];
?>

<tr class="category-row parent-category">
    <td><input type="checkbox"></td>
    <td><?= html_escape($category['sku']); ?></td>
    <td>
        <div class="category-image">
            <img src="<?= base_url() . $category['category_image']; ?>" alt="Category Icon">
        </div>
    </td>
    <td>
        <a href="<?= site_url('admin/subcategory/'.$category['category_id']); ?>" class="category-name"><?= html_escape($category['name']); ?></a>
        <span class="parent-indicator">PARENT</span>

          <?php if(!empty($children)): ?>
                <div class="subcategories-list">
                    <?php foreach($children as $child): ?>
                        <div class="subcategory-item">
                            <span class="subcategory-dash">–</span>
                            <a href="#" class="category-name"><?= html_escape($child['name']); ?></a>
                        </div>
                    <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </td>
    <td><?= html_escape($category['description']); ?></td>
    <td> <span id="status-badge-<?= $category['category_id']; ?>" class="<?= $category['status'] == 1 ? 'badge-active' : 'badge-inactive'; ?>" style="margin-left:8px; font-size:12px;">
        <?= $category['status'] == 1 ? 'Active' : 'Inactive'; ?>
    </span> </td>
    <td>
        <label class="toggle-switch">
            <input type="checkbox" class="toggle-status" data-id="<?= $category['category_id']; ?>" <?= $category['status'] == 1 ? 'checked' : ''; ?>>
            <span class="toggle-slider"></span>
        </label>
    </td>
    <td>
        <div class="action-icons">
            <button class="action-icon" title="View">
                <i class="fas fa-eye"></i>
            </button>
            <button class="action-icon" data-bs-toggle="modal" data-bs-target="#editCategoryModal<?= $category['category_id']; ?>" title="Edit">
                <i class="fas fa-edit"></i>
            </button>
           <button class="action-icon delete-btn" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal<?= $category['category_id']; ?>" title="Delete">
    <i class="fas fa-trash"></i>
</button>

        </div>
    </td>
</tr>

<!-- Delete Category Modal -->
<div class="modal fade" id="deleteCategoryModal<?= $category['category_id']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="deleteCategoryForm" method="POST" action="<?= site_url('admin/delete-category/' . $category['category_id']); ?>">
        <div class="modal-header">
          <h5 class="modal-title">Delete Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this category?</p>
          <input type="hidden" name="category_id" id="deleteCategoryId">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn-modal-submit btn-delete">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- Edit Modal for this Category -->
<div class="modal fade" id="editCategoryModal<?= $category['category_id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?= site_url('admin/update-category/' . $category['category_id']); ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-2">
                        <label>Sku</label>
                        <input type="text" name="sku" value="<?= html_escape($category['sku']); ?>" class="form-control" required>
                    </div>
                      <div class="form-group mb-2">
                        <label>Name</label>
                        <input type="text" name="name" value="<?= html_escape($category['name']); ?>" class="form-control" required>
                    </div>
                    <div class="form-group mb-2">
                        <label>Description</label>
                        <textarea name="description" class="form-control" rows="4" required><?= html_escape($category['description']); ?></textarea>
                    </div>
                    <div class="form-group mb-2">
                        <label>Parent Category</label>
                        <select name="parent_id" class="form-select">
                            <option value="">None (Main Category)</option>
                            <?php foreach ($getAll as $cat): ?>
                                <?php if (empty($cat['parent_id']) && $cat['category_id'] != $category['category_id']): ?>
                                    <option value="<?= $cat['category_id'] ?>" <?= $category['parent_id'] == $cat['category_id'] ? 'selected' : ''; ?>>
                                        <?= htmlspecialchars($cat['name']) ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
   <div class="form-group mb-2">
                        <label class="form-label">Current Image</label>
                        <div class="mb-2">
                            <?php if(!empty($category['category_image'])): ?>
                                <img src="<?= base_url() . $category['category_image']; ?>" alt="Category Image" style="width:80px;height:80px;border-radius:8px;object-fit:cover;">
                            <?php else: ?>
                                <p>No image uploaded.</p>
                            <?php endif; ?>
                        </div>
                        <label class="form-label">Change Image (optional)</label>
                        <input type="file" name="category_image" class="form-control" accept="image/png, image/jpeg, image/svg+xml">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div>
                            <input type="hidden" name="status" value="0">
                            <label class="toggle-switch">
                                <input type="checkbox" name="status" value="1" <?= $category['status'] == 1 ? 'checked' : ''; ?>>
                                <span class="toggle-slider"></span>
                            </label>
                            <span style="margin-left: 8px;">Publish</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                              <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Cancel</button>

                    <button type="submit" class="btn-modal-submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php endforeach; ?>
</tbody>

                </table>
                   <?php
              
                echo $page;
            ?>
            </div>
        </div>
    </div>

    <!-- Add Category Modal -->
 <div class="modal fade" id="addCategoryModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="<?= site_url('admin/create-category'); ?>" method="POST" enctype="multipart/form-data">
        <div class="modal-header">
          <div>
            <h5 class="modal-title">Add Category</h5>
            <p class="modal-subtitle">
              Add your Product category and necessary information from here
            </p>
          </div>
          <select class="form-select" style="width: auto; margin-left: auto;">
            <option>en</option>
            <option>es</option>
            <option>fr</option>
          </select>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
    <div class="modal-body">
         
        <div class="modal-body">
             <div class="form-group">
            <label class="form-label">Sku</label>
            <input type="text" class="form-control" name="sku" placeholder="Sku`" required>
          </div>
          <div class="form-group">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Category title" required>
          </div>

          <div class="form-group">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="4" placeholder="Category Description" required></textarea>
          </div>

       

          <div class="form-group">
            <label class="form-label">Status</label>
            <div>

            <input type="hidden" name="status" value="0">

              <label class="toggle-switch">
                <input type="checkbox" name="status" value="1" checked>
                <span class="toggle-slider"></span>
              </label>
              <span style="margin-left: 8px;">Publish</span>
            </div>
          </div>
        
          <div class="form-group">
            <label class="form-label">Parent Category</label>
            <select name="parent_id" class="form-select">
            <option value="">None (Main Category)</option>
            <?php foreach ($getAllCat as $cat): ?>
                <?php if (empty($cat['parent_id'])): // only show parents ?>
                <option value="<?= $cat['category_id'] ?>"><?= htmlspecialchars($cat['name']) ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
            </select>

            </div>


          <div class="form-group">
            <label class="form-label">Category Image</label>
            <input type="file" name="category_image" class="form-control"accept="image/png, image/jpeg, image/svg+xml">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn-modal-submit">Add Category</button>
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

        const viewToggle = document.getElementById('viewToggle');
        const toggleLabel = document.getElementById('toggleLabel');
        let currentView = 'all';

        viewToggle.addEventListener('click', function(e) {
            e.preventDefault();
            
            currentView = currentView === 'all' ? 'parents' : 'all';
            
            // Update button appearance
            if(currentView === 'parents') {
                viewToggle.classList.remove('active');
                toggleLabel.textContent = 'Parents Only';
                viewToggle.querySelector('i').classList.remove('fa-toggle-on');
                viewToggle.querySelector('i').classList.add('fa-toggle-off');
            } else {
                viewToggle.classList.add('active');
                toggleLabel.textContent = 'All';
                viewToggle.querySelector('i').classList.remove('fa-toggle-off');
                viewToggle.querySelector('i').classList.add('fa-toggle-on');
            }
            
            const subcategoryLists = document.querySelectorAll('.subcategories-list');
            subcategoryLists.forEach(list => {
                if(currentView === 'parents') {
                    list.style.display = 'none';
                } else {
                    list.style.display = 'flex';
                }
            });
        });
    </script>
        <script>
document.querySelectorAll('.toggle-status').forEach(toggle => {
    toggle.addEventListener('change', function() {
        const categoryId = this.dataset.id;
        const status = this.checked ? 1 : 0;
        console.log('Toggling category', categoryId, 'to', status);

        const badge = document.getElementById(`status-badge-${categoryId}`);
        badge.classList.remove('badge-active', 'badge-inactive');
        badge.classList.add(status ? 'badge-active' : 'badge-inactive');
        badge.textContent = status ? 'Active' : 'Inactive';

        fetch("<?= site_url('admin/update-category') ?>/" + categoryId, {
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
