<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from live.themewild.com/mocart/order-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:20:46 GMT -->
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
                    <h4 class="breadcrumb-title">Orders List</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index-2.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Orders List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- user orders list -->
        <div class="user-area bg-2 py-100">
            <div class="container">
       <?= $this->call->view('/partials/accout-sidebar', $data); ?>

                    <div class="col-lg-9">
                        <div class="user-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="user-card">
                                        <div class="user-card-header">
                                            <h4 class="user-card-title">Orders List</h4>
                                            <div class="user-card-header-right">
                                                <div class="user-card-filter">
                                                    <select class="select">
                                                        <option value="">Default</option>
                                                        <option value="1">Pending</option>
                                                        <option value="2">Processing</option>
                                                        <option value="3">Completed</option>
                                                        <option value="3">Cancelled</option>
                                                    </select>
                                                </div>
                                                <div class="user-card-search">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="Search...">
                                                        <i class="far fa-search"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table table-borderless text-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>#Order No</th>
                                                        <th>Purchased Date</th>
                                                        <th>Total</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                           <tbody>
<?php if (!empty($orders)): ?>
    <?php foreach ($orders as $order): ?>
        <?php
            // Pretty date
            $date = date("F d, Y", strtotime($order['created_at']));

            // Show nice order ID
            $orderNo = '#ORD' . str_pad($order['order_id'], 6, '0', STR_PAD_LEFT);

            // Status badge colors
            $status = strtolower($order['status']);
            $badgeClass = [
                'pending'    => 'badge-info',
                'processing' => 'badge-primary',
                'completed'  => 'badge-success',
                'cancelled'  => 'badge-danger',
            ][$status] ?? 'badge-secondary';
        ?>
        <tr>
            <td><span class="table-list-code"><?= $orderNo ?></span></td>

            <td><?= $date ?></td>

            <td>₱<?= number_format($order['total_amount'], 2) ?></td>

            <td><span><?= $status ?></span></td>

            <td>
                <div class="user-action-dropdown dropdown">
                    <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown">
                        <i class="far fa-ellipsis"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
<a class="dropdown-item" href="<?= site_url('/order/detail/' . $order['order_id']) ?>">
                                <i class="far fa-eye"></i> Order Details
                            </a>
                        </li>
                    </ul>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
        <tr>
            <td colspan="5" class="text-center">No orders found.</td>
        </tr>
<?php endif; ?>
</tbody>

                                            </table>
                                        </div>
                                        <!-- pagination -->
                                        <div class="pagination-area mt-4 mb-3">
                                            <div aria-label="Page navigation example">
                                                <ul class="pagination">
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Previous">
                                                            <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                                                        </a>
                                                    </li>
                                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                    <li class="page-item">
                                                        <a class="page-link" href="#" aria-label="Next">
                                                            <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- pagination end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- user orders list end -->

    </main>


    <!-- footer area -->

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

</body>


<!-- Mirrored from live.themewild.com/mocart/order-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:20:46 GMT -->
</html>