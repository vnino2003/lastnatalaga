<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from live.themewild.com/mocart/address-add.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:20:46 GMT -->
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- title -->
    <title>Mocart - Multipurpose eCommerce HTML5 Template</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ;?>/public/assets/img/logo/favicon.png">

    <!-- css -->
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/style.css">

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


    <!-- header area -->
          <?= $this->call->view('/partials/header', $data); ?>

    <!-- header area end -->


    <!-- mobile popup search -->
   
    <!-- mobile popup search end -->


    <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb">
            <div class="site-breadcrumb-bg" style="background: url(<?= base_url() ;?>/public/assets/img/breadcrumb/01.jpg)"></div>
            <div class="container">
                <div class="site-breadcrumb-wrap">
                    <h4 class="breadcrumb-title">Address Add</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index-2.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Address Add</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->

      <?= $this->call->view('/partials/accout-sidebar', $data); ?>

        <!-- user address add -->
     
                    <div class="col-lg-9">
                        <div class="user-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="user-card">
                                        <div class="user-card-header">
                                            <h4 class="user-card-title">Add New Address</h4>
                                            <div class="user-card-header-right">
                                                <a href="address-list.html" class="theme-btn"><span class="fas fa-arrow-left"></span>Address List</a>
                                            </div>
                                        </div>
                                        <div class="user-form">
                                      <form action="<?= site_url('/address-add') ;?>" method="POST">
     <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="first_name" placeholder="First Name" required 
                       value="<?= $address['first_name'] ?? '' ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required
                       value="<?= $address['last_name'] ?? '' ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email Address" required
                       value="<?= $address['email'] ?? '' ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" name="phone" placeholder="Phone Number" required
                       value="<?= $address['phone'] ?? '' ?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Address Line 1</label>
                <input type="text" class="form-control" name="address_line1" placeholder="Street, House No." required
                       value="<?= $address['address_line1'] ?? '' ?>">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Address Line 2</label>
                <input type="text" class="form-control" name="address_line2" placeholder="Apartment, Suite, etc."
                       value="<?= $address['address_line2'] ?? '' ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name="city" placeholder="City" required
                       value="<?= $address['city'] ?? '' ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Province</label>
                <input type="text" class="form-control" name="province" placeholder="Province" required
                       value="<?= $address['province'] ?? '' ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Postal Code</label>
                <input type="text" class="form-control" name="postal_code" placeholder="Postal Code"
                       value="<?= $address['postal_code'] ?? '' ?>">
            </div>
        </div>
    </div>
    <button type="submit" class="theme-btn">
        <span class="far fa-save"></span> <?= isset($address) ? 'Update Address' : 'Save Address'; ?>
    </button>
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
        <!-- user address add end -->

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

</body>


<!-- Mirrored from live.themewild.com/mocart/address-add.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:20:46 GMT -->
</html>