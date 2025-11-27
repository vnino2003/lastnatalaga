<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Overview</title>
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
        
      --card-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
      --card-shadow-lg: 0 4px 12px rgba(0, 0, 0, 0.12);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      display: flex;
      min-height: 100vh;
      background-color: var(--light-bg);
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', sans-serif;
      overflow-x: hidden;
    }

    /* Sidebar styles - keeping structure unchanged */
    .sidebar {
            width: 256px;
            background: #fff;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            overflow-y: auto;
            box-shadow: var(--card-shadow);
            padding: 24px 0;
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
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.25s ease;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background: var(--primary-light);
            color: var(--primary);
            border-left: 3px solid var(--primary);
            padding-left: 17px;
        }

        .sidebar-menu i {
            font-size: 1.1rem;
            width: 24px;
        }

        .sidebar-submenu {
            list-style: none;
            padding-left: 20px;
        }

        .sidebar-submenu li a {
            padding: 8px 20px;
            font-size: 0.9rem;
            color: var(--text-muted);
            transition: all 0.25s ease;
        }

        .sidebar-submenu li a:hover {
            color: var(--teal);
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
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--card-shadow-lg);
        }

        /* Main Content */
        .main-content {
            margin-left: 256px;
            width: calc(100% - 256px);
            min-height: 100vh;
            padding: 30px;
        }

        /* Header */
        .header {
            background: #fff;
            padding: 16px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: var(--card-shadow);
            border-radius: 12px;
            margin-bottom: 30px;
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
            transition: all 0.25s ease;
        }

        .header-toggle:hover {
            transform: scale(1.1);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-icon {
            font-size: 1.3rem;
            color: var(--text-muted);
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .header-icon:hover {
            color: var(--primary);
            transform: translateY(-2px);
        }

        .notification-badge {
            position: relative;
        }

        .badge-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--danger);
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
            background: linear-gradient(135deg, var(--primary), var(--teal));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: white;
            font-weight: 600;
        }

        .page-title {
      font-size: 32px;
      font-weight: 700;
      color: var(--secondary);
      margin-bottom: 30px;
      letter-spacing: -0.5px;
    }

    /* Enhanced stat cards with better shadows and spacing */
    .stat-cards-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }

    .stat-card {
      border-radius: 12px;
      padding: 24px;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      min-height: 160px;
      box-shadow: var(--card-shadow-lg);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: none;
      position: relative;
      overflow: hidden;
    }

    .stat-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: rgba(255, 255, 255, 0.3);
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .stat-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
    }

    .stat-card:hover::before {
      opacity: 1;
    }

        .stat-card-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .stat-card-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            background-color: rgba(255, 255, 255, 0.15);
            flex-shrink: 0;
        }

        .stat-card-label {
            font-size: 12px;
            font-weight: 600;
            opacity: 0.85;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-card-value {
            font-size: 32px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .stat-card-change {
            font-size: 12px;
            opacity: 0.8;
            margin-top: 12px;
            font-weight: 500;
        }

        .stat-card-teal {
            background: linear-gradient(135deg, #14B8A6 0%, #0D9488 100%);
        }

        .stat-card-orange {
            background: linear-gradient(135deg, #F59E0B 0%, #D97706 100%);
        }

        .stat-card-blue {
            background: linear-gradient(135deg, #3B82F6 0%, #1E40AF 100%);
        }

        .stat-card-green {
            background: linear-gradient(135deg, #10B981 0%, #059669 100%);
        }

        /* Small Stat Cards */
        .small-stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 16px;
            margin-bottom: 30px;
        }

        .small-stat-card {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            border: 1px solid var(--border-color);
            box-shadow: var(--card-shadow);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .small-stat-card:hover {
            border-color: var(--primary);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.12);
            transform: translateY(-4px);
        }

        .small-stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 12px;
        }

        .small-stat-icon-teal {
            background-color: var(--teal-light);
            color: var(--teal);
        }

        .small-stat-icon-blue {
            background-color: var(--primary-light);
            color: var(--primary);
        }

        .small-stat-icon-orange {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .small-stat-icon-green {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--success);
        }

        .small-stat-label {
            font-size: 11px;
            color: var(--text-muted);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            font-weight: 600;
        }

        .small-stat-value {
            font-size: 26px;
            font-weight: 700;
            color: var(--secondary);
            letter-spacing: -0.5px;
        }

        /* Charts Section */
        .charts-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .chart-card {
            background-color: white;
            border-radius: 12px;
            padding: 28px;
            border: 1px solid var(--border-color);
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
        }

        .chart-card:hover {
            border-color: var(--primary);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.12);
        }

        .chart-title {
            font-size: 16px;
            font-weight: 700;
            color: var(--secondary);
            margin-bottom: 20px;
            letter-spacing: -0.3px;
        }

        .chart-placeholder {
            width: 100%;
            height: 300px;
            background: linear-gradient(135deg, var(--primary-light), #F0F7FF);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 14px;
            font-weight: 500;
        }

        /* Table Section */
        .table-card {
            background-color: white;
            border-radius: 12px;
            border: 1px solid var(--border-color);
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: all 0.3s ease;
        }

        .table-card:hover {
            border-color: var(--primary);
            box-shadow: 0 8px 16px rgba(59, 130, 246, 0.12);
        }

        .table-header {
            padding: 28px;
            border-bottom: 1px solid var(--border-color);
            background: linear-gradient(to bottom, rgba(59, 130, 246, 0.02), transparent);
        }

        .table-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--secondary);
            letter-spacing: -0.3px;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead {
            background: linear-gradient(135deg, var(--primary-light), rgba(59, 130, 246, 0.05));
            border-bottom: 2px solid var(--border-color);
        }

        .table thead th {
            color: var(--primary-dark);
            font-weight: 700;
            font-size: 11px;
            text-transform: uppercase;
            padding: 16px 20px;
            border: none;
            letter-spacing: 0.6px;
        }

        .table tbody td {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            font-size: 13px;
            color: var(--secondary);
        }

        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table tbody tr:hover {
            background-color: var(--primary-light);
        }

        .order-id {
            color: var(--primary);
            font-weight: 700;
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
            gap: 8px;
        }

        .action-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--text-muted);
            transition: all 0.25s ease;
            font-size: 14px;
            font-weight: 500;
        }

        .action-icon:hover {
            background-color: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
        }

        /* Pagination */
        .pagination-container {
            padding: 20px 28px;
            border-top: 1px solid var(--border-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(59, 130, 246, 0.02);
        }

        .pagination-info {
            font-size: 13px;
            color: var(--text-muted);
            font-weight: 500;
        }

        .pagination {
            margin: 0;
        }

        .pagination .page-link {
            color: var(--primary);
            border-color: var(--border-color);
            font-size: 13px;
            font-weight: 600;
            transition: all 0.25s ease;
        }

        .pagination .page-link:hover {
            background-color: var(--primary-light);
            border-color: var(--primary);
            transform: translateY(-1px);
        }

        .pagination .page-item.active .page-link {
            background-color: var(--primary);
            border-color: var(--primary);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .charts-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 15px;
            }

            .page-title {
                font-size: 24px;
                margin-bottom: 20px;
            }

            .stat-cards-container {
                grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
                gap: 12px;
                margin-bottom: 20px;
            }

            .small-stats-container {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
                margin-bottom: 20px;
            }

            .table {
                font-size: 12px;
            }

            .table thead th,
            .table tbody td {
                padding: 12px;
            }

            .pagination-container {
                flex-direction: column;
                gap: 12px;
            }
        }

        @media (max-width: 576px) {
            .stat-cards-container {
                grid-template-columns: 1fr;
            }

            .small-stats-container {
                grid-template-columns: 1fr;
            }

            .action-icons {
                flex-direction: column;
            }

            .charts-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
       
  
<?php
$bestLabels = array_column($best_selling_products, 'product_name');
$bestData   = array_column($best_selling_products, 'total_sold');

$weeklyLabels = array_column($weekly_sales, 'date');
$weeklyData   = array_column($weekly_sales, 'total');

?>

<?= $this->call->view('/partials/sidebar') ?>

<div class="main-content">
    <h1 class="page-title">Dashboard Overview</h1>

    <!-- Main Stat Cards -->
    <div class="stat-cards-container">
        <div class="stat-card stat-card-teal">
            <div class="stat-card-header">
                <div>
                    <div class="stat-card-label">Today's Orders</div>
                    <div class="stat-card-value"><?= $total_orders ?></div>
                </div>
                <div class="stat-card-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
            </div>
            <div class="stat-card-change">↑ 12% from yesterday</div>
        </div>

        <div class="stat-card stat-card-orange">
            <div class="stat-card-header">
                <div>
                    <div class="stat-card-label">Total Revenue</div>
                    <div class="stat-card-value">$<?= number_format($total_revenue, 2) ?></div>
                </div>
                <div class="stat-card-icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
            </div>
            <div class="stat-card-change">↑ 8% from last month</div>
        </div>

        <div class="stat-card stat-card-blue">
            <div class="stat-card-header">
                <div>
                    <div class="stat-card-label">Orders Delivered</div>
                    <div class="stat-card-value"><?= $delivered_orders ?></div>
                </div>
                <div class="stat-card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
            </div>
            <div class="stat-card-change">↑ 5% from last month</div>
        </div>

        <div class="stat-card stat-card-teal">
            <div class="stat-card-header">
                <div>
                    <div class="stat-card-label">Processing Orders</div>
                    <div class="stat-card-value"><?= $processing_orders ?></div>
                </div>
                <div class="stat-card-icon">
                    <i class="fas fa-sync-alt"></i>
                </div>
            </div>
            <div class="stat-card-change">↓ 2% from previous</div>
        </div>

        <div class="stat-card stat-card-green">
            <div class="stat-card-header">
                <div>
                    <div class="stat-card-label">Pending Orders</div>
                    <div class="stat-card-value"><?= $pending_orders ?></div>
                </div>
                <div class="stat-card-icon">
                    <i class="fas fa-clock"></i>
                </div>
            </div>
            <div class="stat-card-change">↑ 15% from last month</div>
        </div>
    </div>

    <!-- Charts Section -->
      <div class="charts-container">
        <div class="chart-card">
            <h3 class="chart-title">Weekly Sales</h3>
            <canvas id="weeklySalesChart"></canvas>
        </div>

        <div class="chart-card">
            <h3 class="chart-title">Best Selling Products</h3>
            <canvas id="bestSellingChart"></canvas>
        </div>
    </div>
    <!-- Recent Orders Table -->
    <div class="table-card">
        <div class="table-header">
            <h3 class="table-title">Recent Orders</h3>
        </div>
        <div class="table-responsive">
           <table class="orders-table table">
    <thead>
        <tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Customer Name</th>
            <th>Amount</th>
            <th>Order Status</th>
            <th>Payment Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($recent_orders as $order): ?>
            <?php if(is_array($order)): ?>
                <tr>
                    <td class="order-id"><?= $order['order_id'] ?? '' ?></td>
                    <td><?= isset($order['created_at']) ? date('d M Y h:i A', strtotime($order['created_at'])) : '' ?></td>
                    <td><?= $order['customer_name'] ?? '' ?></td>
                    <td>$<?= isset($order['amount']) ? number_format($order['amount'], 2) : '0.00' ?></td>
                    <td>
                        <span class="badge-status
                            <?= ($order['status'] ?? '') === 'pending' ? 'badge-pending' : '' ?>
                            <?= ($order['status'] ?? '') === 'processing' ? 'badge-processing' : '' ?>
                            <?= ($order['status'] ?? '') === 'delivered' ? 'badge-delivered' : '' ?>
                            <?= ($order['status'] ?? '') === 'cancelled' ? 'badge-cancelled' : '' ?>
                        ">
                            <?= ucfirst($order['status'] ?? '') ?>
                        </span>
                    </td>
                    <td>
                        <span class="badge-status
                            <?= ($order['payment_status'] ?? '') === 'pending' ? 'badge-pending' : '' ?>
                            <?= ($order['payment_status'] ?? '') === 'processing' ? 'badge-processing' : '' ?>
                            <?= ($order['payment_status'] ?? '') === 'delivered' || ($order['payment_status'] ?? '') === 'paid' ? 'badge-delivered' : '' ?>
                            <?= ($order['payment_status'] ?? '') === 'cancelled' ? 'badge-cancelled' : '' ?>
                        ">
                            <?= ucfirst($order['payment_status'] ?? '') ?>
                        </span>
                    </td>
                    <td>
                        <div class="action-icons">
                            <button class="action-icon" title="View"><i class="fas fa-eye"></i></button>
                            <button class="action-icon" title="Edit"><i class="fas fa-edit"></i></button>
                            <button class="action-icon" title="Delete"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>

        </div>
    </div>
</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Add Chart.js initialization with PHP data -->
<script>
    // Weekly Sales Chart
 const weeklyCtx = document.getElementById('weeklySalesChart').getContext('2d');
new Chart(weeklyCtx, {
    type: 'line',
    data: {
        labels: <?= json_encode($weeklyLabels) ?>,
        datasets: [{
            label: 'Sales ($)',
            data: <?= json_encode($weeklyData) ?>,
            borderColor: '#3B82F6',
            backgroundColor: 'rgba(59,130,246,0.1)',
            fill: true,
            tension: 0.4,
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: true },
            tooltip: { mode: 'index', intersect: false }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});

const bestCtx = document.getElementById('bestSellingChart').getContext('2d');
new Chart(bestCtx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($bestLabels) ?>,
        datasets: [{
            label: 'Units Sold',
            data: <?= json_encode($bestData) ?>,
            backgroundColor: '#F59E0B',
            borderRadius: 8,
            borderSkipped: false
        }]
    },
    options: {
        responsive: true,
        plugins: { legend: { display: false } },
        scales: { y: { beginAtZero: true } }
    }
});

</script>

</body>
</html>
