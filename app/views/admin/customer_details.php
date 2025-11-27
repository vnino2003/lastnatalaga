<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Profile - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
          <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/notifications.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    
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

    .main-content { margin-left: 250px; }

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

    .page-title {
      font-size: 28px;
      font-weight: 700;
      color: var(--secondary);
      margin: 30px 0;
    }

    .profile-card {
      background-color: white;
      border-radius: 12px;
      border: 1px solid var(--border-color);
      box-shadow: 0 2px 8px rgba(33,150,243,0.08);
      margin-bottom: 30px;
    }

    .profile-header {
      background: linear-gradient(135deg, var(--primary-light), #F0F7FF);
      padding: 30px;
      display: flex;
      align-items: center;
      gap: 30px;
    }

    .profile-picture {
      width: 120px;
      height: 120px;
      border-radius: 12px;
      border: 3px solid var(--primary);
      object-fit: cover;
    }

    .profile-info h2 { font-size: 24px; font-weight: 700; color: var(--secondary); }
    .profile-info p { color: var(--text-muted); margin: 0; font-size: 14px; }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 25px;
    }

    .info-item { border-left: 3px solid var(--primary); padding-left: 15px; }
    .info-label { font-size: 12px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; }
    .info-value { font-size: 16px; font-weight: 500; color: var(--secondary); }

    .status-badge {
      display: inline-block;
      padding: 6px 12px;
      border-radius: 20px;
      font-size: 12px;
      font-weight: 600;
    }
    .status-verified { background-color: #C8E6C9; color: #2E7D32; }
    .status-unverified { background-color: #FFCCBC; color: #D84315; }

    .btn-back {
      background-color: white;
      color: var(--primary);
      border: 1px solid var(--primary);
      padding: 8px 16px;
      border-radius: 6px;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 20px;
      transition: 0.3s;
    }

    .btn-back:hover { background-color: var(--primary-light); }

    @media (max-width: 768px) {
      .main-content { margin-left: 0; padding: 15px; }
      .profile-header { flex-direction: column; text-align: center; }
    }
  </style>
</head>
<body>

  <!-- Sidebar -->
  <?= $this->call->view('/partials/sidebar') ?>

  <div class="main-content">
    <div class="topbar">
      <h4 class="m-0 fw-semibold">Admin Dashboard</h4>
      <div class="user-avatar bg-primary text-white p-2 rounded-circle">AD</div>
    </div>

    <div class="content px-4">
      <a href="<?= site_url('/admin/customer');?>" class="btn-back">
        <i class="fas fa-arrow-left"></i> Back to Customers
      </a>

      <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="page-title">User Profile</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
          <i class="fas fa-edit me-1"></i> Edit Profile
        </button>
      </div>

  <?php getErrors(); ?>
        <?php getMessage(); ?>
      <!-- Profile Card -->
      <div class="profile-card">
       <div class="profile-header">
<form id="profilePicForm" action="<?= site_url('admin/update-profile-picture/' . $user['user_id']); ?>" 
      method="POST" enctype="multipart/form-data" style="position: relative; display: inline-block;">
  <img src="<?=  base_url() . $user['profile_picture'] ?>" 
       alt="Profile Picture" 
       class="profile-picture" 
       id="profileImage"
       style="cursor: pointer;">

  <input type="file" name="profile_picture" id="profileInput" accept="image/*" style="display: none;">
</form>
  <div class="profile-info">
    <h2><?= $user['first_name'] . ' ' . $user['last_name'] ?></h2>
    <p>Customer ID: CUST-<?= str_pad($user['user_id'], 3, '0', STR_PAD_LEFT) ?></p>
    <p>Joined: <?= date('M d, Y', strtotime($user['created_at'])) ?></p>
  </div>
</div>


        <div class="profile-body p-4"> 
          <div class="info-grid">
            <div class="info-item"><div class="info-label">Email</div><div class="info-value"><?= $user['email'] ?></div></div>
            <div class="info-item"><div class="info-label">First Name</div><div class="info-value"><?= $user['first_name'] ?></div></div>
            <div class="info-item"><div class="info-label">Last Name</div><div class="info-value"><?= $user['last_name'] ?></div></div>
            <div class="info-item"><div class="info-label">Username</div><div class="info-value"><?= $user['username'] ?></div></div>
            <div class="info-item"><div class="info-label">Phone</div><div class="info-value"><?= $user['phone_number'] ?></div></div>
            <div class="info-item"><div class="info-label">Gender</div><div class="info-value"><?= $user['gender'] ? ucfirst($user['gender']) : '—' ?></div></div>
            <div class="info-item"><div class="info-label">Address</div><div class="info-value"><?= $user['address'] ?></div></div>
            <div class="info-item"><div class="info-label">Verification</div>
              <div class="info-value">
                <span class="status-badge <?= $user['is_verified'] ? 'status-verified' : 'status-unverified' ?>">
                  <?= $user['is_verified'] ? 'Verified' : 'Not Verified' ?>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Order History -->
 <div class="table-container">
    <h3 class="table-title">Order History</h3>
    <table class="table">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Date</th>
          <th>Total</th>
          <th>Status</th>
          <th>Items</th>
          <th>Action</th> <!-- New column for See More -->
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($orders)): foreach($orders as $order): ?>
          <tr>
            <td>#<?= str_pad($order['order_id'], 5, '0', STR_PAD_LEFT) ?></td>
            <td><?= date('M d, Y', strtotime($order['created_at'])) ?></td>
            <td>$<?= number_format($order['total_amount'], 2) ?></td>
            <td>
              <span class="status-badge" style="background-color: <?= $order['status']=='completed'?'#C8E6C9':'#FFF9C4' ?>; color: <?= $order['status']=='completed'?'#2E7D32':'#F57F17' ?>;">
                <?= ucfirst($order['status']) ?>
              </span>
            </td>
            <td><?= $order['item_count'] ?> item(s)</td>  
            <td>
              <a href="<?= site_url('admin/order/' . $order['order_id']) ?>" class="btn btn-sm btn-primary">See More</a>
            </td>
          </tr>
        <?php endforeach; else: ?>
          <tr><td colspan="6" class="text-center">No orders found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
</div>

    </div>
  </div>

  <!-- Edit Profile Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">    
      <div class="modal-content border-0 shadow">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title" id="editProfileModalLabel"><i class="fas fa-user-edit me-2"></i>Edit Profile</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?= site_url('admin/update-customer/' . $user['user_id']); ?>" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">First Name</label>
              <input type="text" name="first_name" value="<?= $user['first_name'] ?>" class="form-control" >
            </div>
            <div class="mb-3">
              <label class="form-label">Last Name</label>
              <input type="text" name="last_name" value="<?= $user['last_name'] ?>" class="form-control" >
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" value="<?= $user['email'] ?>" class="form-control" >
            </div>
            <div class="mb-3">
              <label class="form-label">Phone Number</label>
              <input type="text" name="phone_number" value="<?= $user['phone_number'] ?>" class="form-control">
            </div>
            <div class="mb-3">
              <label class="form-label">Address</label>
              <textarea name="address" class="form-control" rows="2"><?= $user['address'] ?></textarea>
            </div>
                  <div class="mb-3">
      <label class="form-label">Gender</label>
    <div class="mb-3">
  <label class="form-label">Gender</label>
  <select name="gender" class="form-select">
    <option value="" <?= empty($user['gender']) ? 'selected' : '' ?>>Select gender</option>
    <option value="male" <?= (!empty($user['gender']) && $user['gender'] == 'male') ? 'selected' : '' ?>>Male</option>
    <option value="female" <?= (!empty($user['gender']) && $user['gender'] == 'female') ? 'selected' : '' ?>>Female</option>
  </select>
</div>

    </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
document.getElementById('profileImage').addEventListener('click', function() {
  document.getElementById('profileInput').click();
});

document.getElementById('profileInput').addEventListener('change', function() {
  if (this.files && this.files[0]) {
    // Optional preview
    const img = document.getElementById('profileImage');
    img.src = URL.createObjectURL(this.files[0]);

    // Auto-submit the form
    document.getElementById('profilePicForm').submit();
  }
});
</script>

</body>
</html>
