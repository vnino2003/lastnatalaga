<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from live.themewild.com/mocart/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:20:46 GMT -->
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- title -->
    <title>Mocart</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ;?>/public/assets/img/logo/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- css -->
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/style.css">
            <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/notifications.css">
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NG618JX0N8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NG618JX0N8');
</script>
</head>

<body>

    <!-- preloader -->
    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- preloader end -->

<?= $this->call->view('/partials/header', $data); ?>
    <!-- header area -->
 <?php getErrors(); ?>
        <?php getMessage(); ?>
    <!-- mobile popup search end -->


    <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb">
            <div class="site-breadcrumb-bg" style="background: url(<?= base_url() ;?>/public/assets/img/breadcrumb/01.jpg)"></div>
            <div class="container">
                <div class="site-breadcrumb-wrap">
                    <h4 class="breadcrumb-title">My Profile</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index-2.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">My Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- user profile -->
<?= $this->call->view('/partials/accout-sidebar', $data); ?>

                    <div class="col-lg-9">
                        <div class="user-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="user-card">
                                        <h4 class="user-card-title">Profile Info</h4>
                                        <div class="user-form">
                                        <form action="<?= site_url('/update-profile');?>" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name"
                    value="<?= htmlspecialchars($user['first_name'] ?? ''); ?>" placeholder="First Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name"
                    value="<?= htmlspecialchars($user['last_name'] ?? ''); ?>" placeholder="Last Name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Gender</label>
        <select name="gender" class="form-control" required>
    <option value="" disabled <?= empty($user['gender']) ? 'selected' : '' ?>>Select Gender</option>
    <option value="Male" <?= $user['gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
    <option value="Female" <?= $user['gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
</select>


            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" name="phone_number"
                    value="<?= htmlspecialchars($user['phone_number'] ?? ''); ?>" placeholder="Phone Number">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address"
                    value="<?= htmlspecialchars($user['address'] ?? ''); ?>" placeholder="Address">
            </div>
        </div>
    </div>
    <button type="submit" class="theme-btn">
        <span class="far fa-user"></span> Update Profile
    </button>
</form>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="user-card">
                                        <h4 class="user-card-title">Change Password</h4>
                                        <div class="col-lg-12">
                                            <div class="user-form">
                                             <form action="<?= site_url('/change-password'); ?>" method="POST">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Old Password</label>
                <input type="password" class="form-control" name="old_password" placeholder="Old Password" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>New Password</label>
                <input type="password" class="form-control" name="new_password" placeholder="New Password" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Re-Type Password</label>
                <input type="password" class="form-control" name="confirm_password" placeholder="Re-Type Password" required>
            </div>
        </div>
    </div>
    <button type="submit" class="theme-btn"><span class="far fa-key"></span> Change Password</button>
</form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- user profile end -->

    </main>


    <!-- footer area -->
    <footer class="footer-area ft-bg">
        <?= $this->call->view('/partials/footer', $data); ?>
    </footer>
    <!-- footer area end -->


    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>
    <!-- scroll-top end -->


    <!-- js -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?= base_url() ;?>/public/assets/js/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/modernizr.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/jquery.appear.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/jquery.easing.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/counter-up.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/jquery-ui.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/countdown.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/wow.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/main.js"></script>
    <script src="//code.tidio.co/kjujtootgkm084zra3bgnb8p9e7puzpu.js" async></script>

<script>
  const profileInput = document.getElementById('profileInput');
  const profileImage = document.getElementById('userProfileImage');
  const profileForm  = document.getElementById('userProfilePicForm');

  // ✅ Preview the selected image immediately
  profileInput.addEventListener('change', function() {
    const file = this.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = e => {
      profileImage.src = e.target.result;
    };
    reader.readAsDataURL(file);

    // ✅ Auto-submit the form after selecting an image
    profileForm.submit();
  });
</script>
<script/>document.addEventListener('DOMContentLoaded', function() {
  const sidebarList = document.querySelector('.sidebar-list');
  
  if (!sidebarList) return;
  
  const links = sidebarList.querySelectorAll('a');
  
  links.forEach(link => {
    link.addEventListener('click', function(e) {
      if (this.hasAttribute('data-bs-toggle')) {
        e.preventDefault();
        e.stopPropagation();
      }
      
      links.forEach(l => l.classList.remove('active'));
      
      this.classList.add('active');
    });
  });
  
  if (links.length > 0) {
    links[0].classList.add('active');
  }
});

</script>
</body>


<!-- Mirrored from live.themewild.com/mocart/profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:20:46 GMT -->
</html>