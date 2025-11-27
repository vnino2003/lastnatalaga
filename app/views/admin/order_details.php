<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Detail - Dashtar Admin</title>
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

        .main-content {
            margin-left: 256px;
            width: calc(100% - 256px);
            min-height: 100vh;
        }

        .header {
            background: #fff;
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            flex-wrap: wrap;
            gap: 10px;
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
            z-index: 1000;
        }

        .sidebar-logo {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 70px;
        }

        .sidebar-logo img {
            max-height: 100%;
            max-width: 80%;
            object-fit: contain;
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

        .order-header {
            background: white;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(33, 150, 243, 0.08);
        }

        .invoice-title-section {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 30px;
            gap: 20px;
            flex-wrap: wrap;
        }

        .invoice-title {
            font-size: 24px;
            font-weight: 700;
            color: var(--secondary);
        }

        .status-section {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .status-label {
            font-size: 12px;
            font-weight: 600;
            color: var(--secondary);
            text-transform: uppercase;
        }

        .badge-status {
            padding: 8px 16px;
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

        .badge-processing {
            background-color: rgba(33, 150, 243, 0.15);
            color: var(--primary);
        }

        .badge-success {
            background-color: rgba(76, 175, 80, 0.15);
            color: var(--success);
        }

        .badge-danger {
            background-color: rgba(244, 67, 54, 0.15);
            color: var(--danger);
        }

        .status-dropdown {
            border: 1px solid var(--border-color);
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 13px;
            background-color: white;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .status-dropdown:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--primary-light);
            outline: none;
        }

        .invoice-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-block {
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid var(--primary);
        }

        .info-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
        }

        .info-value {
            font-size: 16px;
            color: var(--secondary);
            font-weight: 600;
            word-break: break-word;
        }

        .info-value.email {
            font-size: 13px;
            color: var(--primary);
            text-decoration: none;
        }

        .info-value.email:hover {
            text-decoration: underline;
        }

        .account-section {
            background: white;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(33, 150, 243, 0.08);
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .account-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .account-card {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid var(--primary);
        }

        .account-card-title {
            font-size: 13px;
            font-weight: 700;
            color: var(--primary);
            text-transform: uppercase;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .account-field {
            margin-bottom: 15px;
        }

        .account-label {
            font-size: 11px;
            font-weight: 700;
            color: var(--secondary);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .account-value {
            font-size: 14px;
            color: var(--secondary);
            word-break: break-word;
        }

        .account-value.email {
            color: var(--primary);
        }

        .account-value.email:hover {
            text-decoration: underline;
        }

        .products-section {
            background: white;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(33, 150, 243, 0.08);
            overflow-x: auto;
        }

        .table {
            margin-bottom: 0;
            min-width: 500px;
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
            white-space: nowrap;
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

        .payment-summary {
            background: white;
            padding: 30px;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            box-shadow: 0 2px 8px rgba(33, 150, 243, 0.08);
            margin-bottom: 25px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 0;
        }

        .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
            flex-wrap: wrap;
            gap: 10px;
        }

        .summary-item:last-child {
            border-bottom: none;
        }

        .summary-label {
            font-size: 13px;
            font-weight: 600;
            color: var(--secondary);
        }

        .summary-value {
            font-size: 16px;
            font-weight: 700;
            color: var(--secondary);
        }

        .summary-value.total {
            color: var(--danger);
            font-size: 20px;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
            margin-top: 30px;
            flex-wrap: wrap;
        }

        .btn-primary-custom {
            background-color: var(--primary);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex: 1;
            min-width: 140px;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(33, 150, 243, 0.3);
            color: white;
        }

        .btn-secondary-custom {
            background-color: white;
            color: var(--secondary);
            padding: 12px 24px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex: 1;
            min-width: 140px;
        }

        .btn-secondary-custom:hover {
            background-color: var(--primary-light);
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-danger-custom {
            background-color: var(--danger);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            flex: 1;
            min-width: 140px;
        }

        .btn-danger-custom:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(244, 67, 54, 0.3);
        }

        .back-button {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .back-button:hover {
            color: var(--primary-dark);
        }

        .content {
            padding: 30px;
        }

        /* Improved responsive design with mobile-first approach */
        @media (max-width: 1024px) {
            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .sidebar {
                position: fixed;
                left: -256px;
                transition: left 0.3s ease;
                z-index: 1000;
            }

            .sidebar.show {
                left: 0;
            }

            .header-toggle {
                display: block;
            }

            .invoice-info-grid {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                gap: 15px;
            }

            .info-block {
                padding: 15px;
            }

            .account-info-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-primary-custom,
            .btn-secondary-custom,
            .btn-danger-custom {
                width: 100%;
                flex: none;
                min-width: auto;
            }
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }

            .header {
                padding: 12px 20px;
            }

            .order-header,
            .account-section,
            .products-section,
            .payment-summary {
                padding: 20px;
                margin-bottom: 20px;
            }

            .invoice-title {
                font-size: 20px;
            }

            .section-title {
                font-size: 14px;
            }

            .invoice-info-grid {
                grid-template-columns: 1fr;
                gap: 15px;
                margin-bottom: 20px;
            }

            .table {
                font-size: 12px;
                min-width: auto;
            }

            .table thead th,
            .table tbody td {
                padding: 10px;
            }

            .products-section {
                overflow-x: auto;
            }

            .summary-item {
                padding: 12px 0;
            }

            .status-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .status-label {
                font-size: 10px;
            }

            .badge-status,
            .status-dropdown {
                font-size: 11px;
            }

            .header-right {
                gap: 15px;
            }

            .header-icon {
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .content {
                padding: 15px;
            }

            .header {
                padding: 10px 15px;
            }

            .order-header,
            .account-section,
            .products-section,
            .payment-summary {
                padding: 15px;
                margin-bottom: 15px;
                border-radius: 8px;
            }

            .invoice-title {
                font-size: 18px;
            }

            .section-title {
                font-size: 13px;
                margin-bottom: 15px;
                padding-bottom: 10px;
            }

            .invoice-title-section {
                gap: 10px;
                margin-bottom: 20px;
            }

            .invoice-info-grid {
                grid-template-columns: 1fr;
                gap: 12px;
                margin-bottom: 15px;
            }

            .info-block {
                padding: 12px;
            }

            .info-label {
                font-size: 10px;
            }

            .info-value {
                font-size: 14px;
            }

            .account-card {
                padding: 15px;
            }

            .account-field {
                margin-bottom: 10px;
            }

            .account-label {
                font-size: 10px;
            }

            .account-value {
                font-size: 13px;
            }

            .table {
                font-size: 11px;
            }

            .table thead th,
            .table tbody td {
                padding: 8px;
            }

            .summary-item {
                padding: 10px 0;
                font-size: 12px;
            }

            .summary-label {
                font-size: 12px;
            }

            .summary-value {
                font-size: 14px;
            }

            .summary-value.total {
                font-size: 16px;
            }

            .action-buttons {
                gap: 8px;
                margin-top: 20px;
            }

            .btn-primary-custom,
            .btn-secondary-custom,
            .btn-danger-custom {
                padding: 10px 16px;
                font-size: 12px;
            }

            .back-button {
                font-size: 14px;
                margin-bottom: 15px;
            }

            .header-right {
                gap: 12px;
            }

            .header-icon {
                font-size: 1rem;
            }

            .user-avatar {
                width: 32px;
                height: 32px;
                font-size: 12px;
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
                    <i class="fas fa-moon"></i>
                </button>
                <div style="position: relative;">
                    <i class="fas fa-bell header-icon"></i>
                    <span style="position: absolute; top: -8px; right: -8px; background: #dc3545; color: white; border-radius: 50%; width: 20px; height: 20px; display: flex; align-items: center; justify-content: center; font-size: 0.75rem; font-weight: 700;">5</span>
                </div>
                <div class="user-avatar">JD</div>
            </div>
        </div>
     <?php getErrors(); ?>
            <?php getMessage(); ?>
        <!-- Content -->
        <div class="content">
          <a href="<?= $back_url ?>" class="back-button">
    <i class="fas fa-arrow-left"></i> Back
</a>


            <!-- Restructured to prioritize Order Information first -->
            <!-- Order Header -->
          <!-- Order Header -->
<div class="order-header">
    <div class="invoice-title-section">
        <div>
            <div class="invoice-title">Order Information</div>
        </div>
       <div class="status-section">
    <span class="status-label">Order Status:</span>
    <?php
        $statusClass = [
            'pending' => 'badge-pending',
            'processing' => 'badge-processing',
            'delivered' => 'badge-delivered',
            'cancelled' => 'badge-cancelled'
        ];
        $currentStatus = $order['status'];
        $statusBadgeClass = $statusClass[$currentStatus] ?? 'badge-pending';
    ?>
    <span class="badge-status <?= $statusBadgeClass ?>" id="statusBadge"><?= ucfirst($currentStatus) ?></span>
<select class="status-dropdown" id="statusDropdown" onchange="updateStatus(<?= $order['id'] ?>)" 
    <?= ($order['status'] == 'delivered' || $order['status'] == 'cancelled') ? 'disabled' : '' ?>>
    <option value="pending" <?= $currentStatus=='pending'?'selected':'' ?>>Pending</option>
    <option value="processing" <?= $currentStatus=='processing'?'selected':'' ?>>Processing</option>
    <option value="delivered" <?= $currentStatus=='delivered'?'selected':'' ?>>Delivered</option>
    <option value="cancelled" <?= $currentStatus=='cancelled'?'selected':'' ?>>Cancelled</option>
</select>


</div>

<div class="status-section" style="margin-top:10px;">
    <span class="status-label">Payment Status:</span>
    <?php
        $paymentClass = [
            'pending' => 'badge-pending',
            'paid' => 'badge-success',
            'failed' => 'badge-danger'
        ];
        $currentPayment = $order['payment_status'];
        $paymentBadgeClass = $paymentClass[$currentPayment] ?? 'badge-pending';
    ?>
<span id="paymentBadge" class="badge-status <?= $order['payment_status']=='paid'?'badge-success':'badge-danger' ?>">
    <?= ucfirst($order['payment_status']) ?>
</span></div>
    </div>

    <!-- Order Details Grid -->
    <div class="invoice-info-grid">
        <div class="info-block">
            <div class="info-label">Order ID</div>
            <div class="info-value">#<?= $order['id'] ?></div>
        </div>
        <div class="info-block">
            <div class="info-label">Date</div>
            <div class="info-value"><?= date('d M, Y', strtotime($order['created_at'] ?? 'now')) ?></div>
        </div>
        <div class="info-block">
            <div class="info-label">Total Amount</div>
            <div class="info-value" style="color: var(--danger); font-size: 20px;">$<?= number_format($order['total_amount'], 2) ?></div>
        </div>
        <div class="info-block">
            <div class="info-label">Payment Method</div>
            <div class="info-value"><?= ucfirst($order['payment_method'] ?? 'N/A') ?></div>
        </div>
    </div>
</div>

<!-- Customer & Address Info -->
<div class="account-section">
    <h3 class="section-title"><i class="fas fa-user-circle"></i> Shipping Information</h3>
    
    <div class="account-info-grid">
        <!-- Customer Details -->
        <div class="account-card">
            <div class="account-card-title"><i class="fas fa-user"></i> Customer Details</div>
            
            <div class="account-field">
                <div class="account-label">First Name</div>
                <div class="account-value"><?= $order['address_first_name'] ?></div>
            </div>
            <div class="account-field">
                <div class="account-label">Last Name</div>
                <div class="account-value"><?= $order['address_last_name'] ?></div>
            </div>
            <div class="account-field">
                <div class="account-label">Email Address</div>
                <div class="account-value"><a href="mailto:<?= $order['email'] ?>" class="email"><?= $order['address_email'] ?></a></div>
            </div>
             <div class="account-field">
                <div class="account-label">Phone</div>
                <div class="account-value"><?= $order['address_phone'] ?></div>
            </div>
        </div>

        <!-- Shipping / Billing Address -->
        <div class="account-card">
            <div class="account-card-title"><i class="fas fa-map-marker-alt"></i> Address</div>
            
            <div class="account-field">
                <div class="account-label">Address Line 1</div>
                <div class="account-value"><?= $order['address_line1'] ?></div>
            </div>
            <div class="account-field">
                <div class="account-label">Address Line 2</div>
                <div class="account-value"><?= $order['address_line2'] ?></div>
            </div>
            <div class="account-field">
                <div class="account-label">City</div>
                <div class="account-value"><?= $order['city'] ?></div>
            </div>
            <div class="account-field">
                <div class="account-label">Province</div>
                <div class="account-value"><?= $order['province'] ?></div>
            </div>
            <div class="account-field">
                <div class="account-label">Postal Code</div>
                <div class="account-value"><?= $order['postal_code'] ?></div>
            </div>
        </div>
    </div>
</div>

<!-- Products Table -->
<div class="products-section">
    <h3 class="section-title"><i class="fas fa-box"></i> Order Items</h3>
    <table class="table">
        <thead>
            <tr>
                <th>SR.</th>
                <th>Product Title</th>
                <th>Quantity</th>
                <th>Item Price</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($items as $index => $item): ?>
            <tr>
                <td><?= $index+1 ?></td>
                <td><?= $item['title'] ?></td>
                <td><?= $item['quantity'] ?></td>
                <td>$<?= number_format($item['price'], 2) ?></td>
                <td style="color: var(--danger); font-weight: 600;">$<?= number_format($item['amount'], 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Payment Summary -->
<div class="payment-summary">
    <h3 class="section-title"><i class="fas fa-receipt"></i> Payment Summary</h3>
    <div class="summary-grid">
        <div>
            <div class="summary-item">
                <span class="summary-label">Subtotal:</span>
                <span class="summary-value">$<?= number_format($order['subtotal'], 2) ?></span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Shipping Cost:</span>
                <span class="summary-value">$0.00</span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Discount:</span>
                <span class="summary-value">$0.00</span>
            </div>
            <div class="summary-item">
                <span class="summary-label">Tax:</span>
                <span class="summary-value">$0.00</span>
            </div>
            <div class="summary-item" style="border-bottom: 2px solid var(--primary); margin-top: 10px; padding-top: 15px;">
                <span class="summary-label" style="font-size: 14px;">Total Amount:</span>
                <span class="summary-value total">$<?= number_format($order['total_amount'], 2) ?></span>
            </div>
        </div>
    </div>
</div>


            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn-primary-custom">
                    <i class="fas fa-file-pdf"></i> Download Invoice
                </button>
                <button class="btn-primary-custom">
                    <i class="fas fa-envelope"></i> Send Email
                </button>
                <button class="btn-secondary-custom">
                    <i class="fas fa-print"></i> Print
                </button>
                <button class="btn-danger-custom">
                    <i class="fas fa-trash"></i> Delete Order
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('show');
        }function updateStatus(orderId) {
    const dropdown = document.getElementById('statusDropdown');
    const selectedStatus = dropdown.value;
    const badge = document.getElementById('statusBadge'); 
    const paymentBadge = document.getElementById('paymentBadge');

    // Update badge text & class in real-time
    badge.classList.remove('badge-pending', 'badge-processing', 'badge-delivered', 'badge-cancelled');
    switch(selectedStatus) {
        case 'pending': badge.classList.add('badge-pending'); badge.textContent = 'Pending'; break;
        case 'processing': badge.classList.add('badge-processing'); badge.textContent = 'Processing'; break;
        case 'delivered': badge.classList.add('badge-delivered'); badge.textContent = 'Delivered'; break;
        case 'cancelled': badge.classList.add('badge-cancelled'); badge.textContent = 'Cancelled'; break;
    }

    // Disable dropdown immediately if Delivered or Cancelled is selected   
    if(selectedStatus == 'delivered' || selectedStatus == 'cancelled') {
        dropdown.disabled = true;
    }

    // AJAX request to update in DB
    fetch('<?= site_url("/admin/order/update-status/") ?>' + orderId, {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({status: selectedStatus})
    })
    .then(response => response.json())
    .then(data => {
        if(data.success) {
            console.log(data.message);

            // Update payment badge dynamically from server response
            paymentBadge.classList.remove('badge-pending', 'badge-success', 'badge-danger');
            switch(data.payment_status) {
                case 'paid':
                    paymentBadge.classList.add('badge-success');
                    paymentBadge.textContent = 'Paid';
                    break;
                case 'pending':
                    paymentBadge.classList.add('badge-pending');
                    paymentBadge.textContent = 'Pending';
                    break;
                case 'failed':
                    paymentBadge.classList.add('badge-danger');
                    paymentBadge.textContent = 'Failed';
                    break;
            }
        } else {
            alert('Failed to update order');
        }
    })
    .catch(error => console.error('Error:', error));
}



    </script>
</body>
</html>
