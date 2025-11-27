<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Dashtar Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
            --delivered: #26C6DA;
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

        /* Sidebar */
        

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
            color: var(--primary);
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
            color: var(--primary);
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
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            cursor: pointer;
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
            justify-content: flex-end;
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

        .btn-download {
            background-color: var(--success);
            color: white;
        }

        .btn-download:hover {
            background-color: #45a049;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
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

        /* Search and Filter */
        .search-filter-section {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
            align-items: center;
        }

        .search-box {
            flex: 0 0 200px;
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

        .filter-select {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 13px;
            background-color: white;
            transition: all 0.3s ease;
            min-width: 150px;
        }

        .filter-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
            outline: none;
        }

        .date-input {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 13px;
            background-color: white;
            transition: all 0.3s ease;
        }

        .date-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
            outline: none;
        }

        .date-group {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .date-label {
            font-size: 12px;
            color: var(--secondary);
            font-weight: 600;
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
            height: fit-content;
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
            height: fit-content;
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

        .invoice-no {
            color: var(--secondary);
            font-weight: 600;
        }

        .customer-name {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
        }

        .customer-name:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .badge-status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .badge-pending {
            background-color: rgba(255, 152, 0, 0.15);
            color: var(--warning);
        }

        .badge-delivered {
            background-color: rgba(38, 198, 218, 0.15);
            color: var(--delivered);
        }

        .badge-cancelled {
            background-color: rgba(244, 67, 54, 0.15);
            color: var(--danger);
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

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
                width: calc(100% - 200px);
            }

            .content {
                padding: 15px;
            }

            .page-title {
                font-size: 22px;
            }

            .search-filter-section {
                flex-direction: column;
                align-items: stretch;
            }

            .search-box,
            .filter-select,
            .date-group {
                width: 100%;
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
                width: 100%;
            }

            .table {
                font-size: 12px;
            }

            .table thead th,
            .table tbody td {
                padding: 10px;
            }

            .action-buttons {
                flex-direction: column;
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
                <button class="header-toggle" onclick="toggleSidebar()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="header-right">
                <button class="header-icon">
                    <i class="fas fa-globe"></i>
                </button>
                <button class="header-icon">
                    <i class="fas fa-moon"></i>
                </button>
                <div class="notification-badge">
                    <i class="fas fa-bell header-icon"></i>
                    <span class="badge-count">10</span>
                </div>
                <div class="user-avatar">JD</div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <h1 class="page-title">Orders</h1>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn-action btn-download">
                    <i class="fas fa-download"></i>
                    Download All Orders
                </button>
            </div>

            <!-- Search and Filter -->
            <div class="search-filter-section">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search by Customer N">
                </div>

                <select class="filter-select">
                    <option>Status</option>
                    <option>Pending</option>
                    <option>Delivered</option>
                    <option>Cancelled</option>
                </select>

                <select class="filter-select">
                    <option>Order limits</option>
                    <option>Last 7 days</option>
                    <option>Last 30 days</option>
                    <option>Last 90 days</option>
                </select>

                <select class="filter-select">
                    <option>Method</option>
                    <option>Cash</option>
                    <option>Card</option>
                    <option>Bank Transfer</option>
                </select>
            </div>

            <!-- Date Range -->
            <div class="search-filter-section">
                <div class="date-group">
                    <label class="date-label">Start Date</label>
                    <input type="date" class="date-input" placeholder="dd/mm/yyyy">
                </div>

                <div class="date-group">
                    <label class="date-label">End Date</label>
                    <input type="date" class="date-input" placeholder="dd/mm/yyyy">
                </div>

                <button class="btn-filter">Filter</button>
                <button class="btn-reset">Reset</button>
            </div>

            <!-- Table -->
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>ORDER TIME</th>
                            <th>CUSTOMER NAME</th>
                            <th>METHOD</th>
                            <th>AMOUNT</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
<tbody>
    <?php if (!empty($orders)): ?>
        <?php foreach ($orders as $order): ?>

            <?php 
                // STATUS BADGE COLOR
                $statusClass = '';
                if ($order['status'] === 'pending') $statusClass = 'badge-pending';
                elseif ($order['status'] === 'delivered') $statusClass = 'badge-delivered';
                elseif ($order['status'] === 'cancelled') $statusClass = 'badge-cancelled';
            ?>

            <tr>
                <td class="invoice-no">
                    #<?= $order['id'] ?>
                </td>

                <td>
                    <?= date("M d, Y h:i A", strtotime($order['created_at'])) ?>
                </td>

                <?php
$customer_name = trim(
    ($order['first_name'] ?? '') . ' ' . ($order['last_name'] ?? '')
);

if (empty($customer_name)) {
    $customer_name = $order['username'] ?? 'No Name';
}
?>
<td>
    <span class="customer-name"><?= ucfirst($customer_name) ?></span>
</td>


                <td>
                    <?= strtoupper($order['payment_method']) ?>
                </td>

                <td>
                    ₱<?= number_format($order['total_amount'], 2) ?>
                </td>

                <td>
                    <span class="badge-status <?= $statusClass ?>">
                        <?= ucfirst($order['status']) ?>
                    </span>
                </td>

                <td>
                    <div class="action-icons">
                        <a href="<?= site_url('admin/order/' . $order['id']) ?>" class="action-icon">
                            <i class="fas fa-eye"></i>
                        </a>

                        <a href="<?= site_url('admin/orders/delete/' . $order['id']) ?>" 
                           class="action-icon"
                           onclick="return confirm('Delete this order?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>

        
            </tr>

        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="8" class="text-center py-3">
                No orders found.
            </td>
        </tr>
    <?php endif; ?>
</tbody>

                </table>
                <div class="mt-3">
    <?= $page ?>
</div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }
    </script>
</body>
</html>