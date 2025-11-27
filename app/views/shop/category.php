<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from live.themewild.com/mocart/category-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:20:39 GMT -->
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
                    <h4 class="breadcrumb-title">Category Two</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index-2.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Category Two</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- category area -->
      <div class="category-area ca-2 py-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <span class="site-title-tagline">Our Category</span>
                    <h2 class="site-title">Our Popular <span>Category</span></h2>
                </div>
            </div>
        </div>

        <div class="row g-3">

            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $cat): ?>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="category-item">
                            <a href="<?= site_url('shop-grid/' . $cat['category_id']); ?>">
                                <div class="category-info">
                                    <div class="icon">
                                        <img src="<?= base_url() . '/' . $cat['category_image']; ?>" 
                                             alt="<?= htmlspecialchars($cat['name']); ?>">
                                    </div>
                                    <div class="content">
                                        <h4><?= htmlspecialchars($cat['name']); ?></h4>

                                        <!-- Optional: Show product count if your DB has it -->
                                        <?php if (!empty($cat['item_count'])): ?>
                                            <p><?= $cat['item_count']; ?> Items</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php else: ?>
                <p>No active categories available.</p>
            <?php endif; ?>

        </div>

    </div>
</div>

        <!-- category area end-->

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


<!-- Mirrored from live.themewild.com/mocart/category-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:20:39 GMT -->
</html>