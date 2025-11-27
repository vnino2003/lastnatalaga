<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Customers - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/notifications.css">

  <style>
    :root {
      --primary: #2196F3;
      --primary-light: #E3F2FD;
      --primary-dark: #1976D2;
      --secondary: #37474F;
      --border-color: #E0E7FF;
      --light-bg: #E8F4F8;
      --text-muted: #78909C;
    }

    body {
      background-color: var(--light-bg);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .main-content {
      margin-left: 250px;
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
    .page-title {
      font-size: 28px;
      font-weight: 700;
      color: var(--secondary);
      margin: 30px 0;
    }

    .table-container {
      background-color: white;
      border-radius: 12px;
      border: 1px solid var(--border-color);
      overflow: hidden;
      box-shadow: 0 2px 8px rgba(33, 150, 243, 0.08);
    }

    .table thead {
      background: linear-gradient(135deg, var(--primary-light), #F0F7FF);
    }

    .status-badge {
      display: inline-block;
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }

    .status-verified {
      background-color: #C8E6C9;
      color: #2E7D32;
    }

    .status-unverified {
      background-color: #FFCCBC;
      color: #D84315;
    }

    .table thead th {
      color: var(--primary-dark);
      font-weight: 600;
      font-size: 13px;
      text-transform: uppercase;
      padding: 15px;
    }

    .table tbody td {
      padding: 15px;
      border-bottom: 1px solid var(--border-color);
      font-size: 14px;
      vertical-align: middle;
    }

    .table tbody tr:hover {
      background-color: var(--primary-light);
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
    }

    .action-icon:hover {
      background-color: var(--primary-light);
      color: var(--primary);
      border-color: var(--primary);
    }

    /* Modal */
    .modal-content {
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

    .modal-body {
      padding: 25px;
    }

    .form-label {
      font-weight: 600;
      color: var(--secondary);
    }

    .btn-primary {
      background-color: var(--primary);
      border-color: var(--primary);
    }

    .btn-primary:hover {
      background-color: var(--primary-dark);
    }

    .btn-secondary {
      background-color: white;
      color: var(--secondary);
      border: 1px solid var(--border-color);
    }

    .btn-secondary:hover {
      background-color: var(--primary-light);
      color: var(--primary);
      border-color: var(--primary);
    }

    @media (max-width: 768px) {
      .main-content { margin-left: 0; padding: 15px; }
    }
  </style>
</head>
<body>

      <?= $this->call->view('/partials/sidebar') ?>
    <?php getErrors(); ?>
    <?php getMessage(); ?>
  <div class="main-content">
    <div class="topbar">
      <h4 class="m-0 fw-semibold">Admin Dashboard</h4>
      <div class="user-avatar bg-primary text-white p-2 rounded-circle">AD</div>
    </div>
  <?php getErrors(); ?>
    <?php getMessage(); ?>
    <div class="content px-4">
      <h1 class="page-title">Customers</h1>

    <form method="GET" class="mb-3 d-flex">
    <input type="text" name="q" class="form-control me-2" placeholder="Search customers..." value="<?= htmlspecialchars($q ?? '') ?>">
    <button class="btn btn-primary">Search</button>
</form>

        <table class="table">
          <thead>
            <tr>
              <th><input type="checkbox"></th>
              <th>Customer ID</th>
              <th>Joined</th>
              <th>Email</th>
              <th>Phone Number</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
     <tbody>
        <?php if(!empty($customers)): ?>
            <?php foreach($customers as $cust): ?>
            <tr>
                <td><input type="checkbox"></td>
                <td><?= 'CUST-' . str_pad($cust['user_id'], 3, '0', STR_PAD_LEFT) ?></td>
                                <td><?= date('M d, Y', strtotime($cust['created_at'] ?? date('Y-m-d'))) ?></td>
                <td><?= $cust['email'] ?></td>
                <td><?= $cust['phone_number'] ?></td>

                <td> <span class="status-badge <?= $cust['is_verified'] ? 'status-verified' : 'status-unverified' ?>">
                  <?= $cust['is_verified'] ? 'Verified' : 'Not Verified' ?>
                </span></td>
                <td>
                    <div class="action-icons">
<button class="action-icon" title="View">
  <a href="<?= site_url('admin/customer_details/'.$cust['user_id']); ?>">
    <i class="fas fa-eye"></i>
  </a>
</button>


<button class="action-icon delete-btn" 
        data-bs-toggle="modal" 
        data-bs-target="#deleteCustomerModal<?= $cust['user_id']; ?>" 
        title="Delete">
    <i class="fas fa-trash"></i>
</button>
                    </div>
                </td>
            </tr>
            <div class="modal fade" id="deleteCustomerModal<?= $cust['user_id']; ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= site_url('admin/delete-customer/' . $cust['user_id']); ?>">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Delete Customer</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete this customer?</p>
          <input type="hidden" name="user_id" value="<?= $cust['user_id']; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="8" class="text-center">No customers found.</td></tr>
        <?php endif; ?>
    </tbody>
</table>


        </table>
  <?php
              
                echo $page;
            ?>

      </div>
    </div>
  </div>

  <!-- View Customer Modal -->
  <div class="modal fade" id="viewCustomerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">View Customer</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p><strong>ID:</strong> CUST-001</p>
          <p><strong>Name:</strong> John Doe</p>
          <p><strong>Email:</strong> john.doe@example.com</p>
          <p><strong>Phone:</strong> +63 912 345 6789</p>
          <p><strong>Joined:</strong> Jan 5, 2025</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit Customer Modal -->
  <div class="modal fade" id="editCustomerModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Edit Customer</h5>
          <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" value="john.doe@example.com">
            </div>
            <div class="mb-3">
              <label class="form-label">Phone Number</label>
              <input type="text" class="form-control" value="+63 912 345 6789">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button class="btn btn-primary">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Customer Modal -->
 <!-- Delete Customer Modal -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
