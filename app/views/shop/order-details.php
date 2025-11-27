<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from live.themewild.com/mocart/address-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:20:46 GMT -->
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
                    <h4 class="breadcrumb-title">Address List</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index-2.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Address List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- user address list -->
            <?= $this->call->view('/partials/accout-sidebar', $data); ?>
        <div class="col-lg-9">
                        <div class="user-wrapper">
                            <div class="row">
                            <div class="col-lg-12">
    <div class="user-card user-order-detail">
        <div class="user-card-header">
            <h4 class="user-card-title">Order Details (#<?= $order['id']; ?>)</h4>
            <div class="user-card-header-right">
                <a href="order-list.html" class="theme-btn"><span class="fas fa-arrow-left"></span>All Orders</a>
            </div> 
        </div>

        <div class="table-responsive">
            <table class="table table-borderless text-nowrap">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
        
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($order_items as $item): ?>
                    <tr>
                        <td>
                            <div class="table-list-info">
                                <a href="#">
                                    <div class="table-list-img">
                                        <img src="<?= $item['product_image'] ?? 'assets/img/product/default.png'; ?>" alt="">
                                    </div>
                                    <div class="table-list-content">
                                        <h6><?= $item['title']; ?></h6>
                                        <!-- <span>Item ID: #<?= $item['order_item_id'] ?? $item['id']; ?></span> -->
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td><?= $item['quantity']; ?></td>
                 
                        <td>$<?= number_format($item['amount'], 2); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="order-detail-content">
                    <h5>Shipping Address</h5>
                    <p><i class="far fa-location-dot"></i> 
                        <?= $order['address_line1']; ?>
                        <?php if(!empty($order['address_line2'])): ?>
                            , <?= $order['address_line2']; ?>
                        <?php endif; ?>
                        , <?= $order['city']; ?>, <?= $order['province']; ?>, <?= $order['postal_code']; ?>
                    </p>
                    <p><i class="fas fa-user"></i> <?= $order['address_first_name'] ?? $order['customer_first_name'] ?> <?= $order['address_last_name'] ?? $order['customer_last_name'] ?></p>
                    <p><i class="fas fa-phone"></i> <?= $order['address_phone'] ?? 'N/A'; ?></p>
                    <p><i class="fas fa-envelope"></i> <?= $order['address_email'] ?? $order['email']; ?></p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="order-detail-content">
                    <h5>Order Summary</h5>
                    <ul>
                        <li>Subtotal<span>$<?= number_format($subtotal, 2); ?></span></li>
                        <li>Shipping<span>Free</span></li>
                        <li>Discount<span>$<?= number_format($order['discount'] ?? 0, 2); ?></span></li>
                        <li>Tax<span>$<?= number_format($order['tax'] ?? 0, 2); ?></span></li>
                        <li>Total<span>$<?= number_format($order['total_amount'], 2); ?></span></li>
                    </ul>
                    <p class="mt-4">Paid by <?= ucfirst($order['payment_method']); ?></p>
                </div>
            </div>
        </div>
    </div> <!-- end user-card -->
</div> <!-- end col-lg-12 -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- user address list end -->

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


<!-- Mirrored from live.themewild.com/mocart/address-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:20:46 GMT -->
</html>