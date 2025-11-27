<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from live.themewild.com/mocart/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:19:38 GMT -->
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
        <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/notifications.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- css -->
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/style.css">
<!-- Google tag (gtag.js) -->
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


    <!-- header area -->
<?= $this->call->view('/partials/header', $data); ?>
    <!-- header area end -->
 <?php getErrors(); ?>
        <?php getMessage(); ?>

    <!-- mobile popup search -->
    <div class="search-popup">
        <button class="close-search"><span class="far fa-times"></span></button>
        <form action="#">
            <div class="form-group">
                <input type="search" name="search-field" class="form-control" placeholder="Search Here..." required>
                <button type="submit"><i class="far fa-search"></i></button>
            </div>
        </form>
    </div>
    <!-- mobile popup search end -->


    <main class="main">

        <!-- hero slider -->
        <div class="hero-section hs-1 mt-30">
            <div class="container">
                <div class="hero-slider owl-carousel owl-theme">
                    <div class="hero-single">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="hero-content">
                                        <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Start
                                            From $15.99</h6>
                                        <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                            Explore The Trendy <span>products</span> for you.
                                        </h1>
                                        <p data-animation="fadeInLeft" data-delay=".75s">
                                            There are many variations of passages orem psum available but the majority
                                            have suffered alteration in some form by injected humour.
                                        </p>
                                        <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                            <a href="shop-grid.html" class="theme-btn">Shop Now<i
                                                    class="fas fa-arrow-right"></i></a>
                                            <a href="about.html" class="theme-btn theme-btn2">Learn More<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="hero-right" data-animation="fadeInRight" data-delay=".25s">
                                        <div class="hero-img">
                                            <div class="hero-img-price">
                                                <span>Price</span>
                                                <span>$250</span>
                                            </div>
                                            <img src="<?= base_url() ;?>/public/assets/img/hero/01.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-single">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="hero-content">
                                        <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Start
                                            From $15.99</h6>
                                        <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                            Explore The Trendy <span>products</span> for you.
                                        </h1>
                                        <p data-animation="fadeInLeft" data-delay=".75s">
                                            There are many variations of passages orem psum available but the majority
                                            have suffered alteration in some form by injected humour.
                                        </p>
                                        <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                            <a href="shop-grid.html" class="theme-btn">Shop Now<i
                                                    class="fas fa-arrow-right"></i></a>
                                            <a href="about.html" class="theme-btn theme-btn2">Learn More<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="hero-right" data-animation="fadeInRight" data-delay=".25s">
                                        <div class="hero-img">
                                            <div class="hero-img-price">
                                                <span>Price</span>
                                                <span>$250</span>
                                            </div>
                                            <img src="<?= base_url() ;?>/public/assets/img/hero/02.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-single">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="hero-content">
                                        <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Start
                                            From $15.99</h6>
                                        <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                            Explore The Trendy <span>products</span> for you.
                                        </h1>
                                        <p data-animation="fadeInLeft" data-delay=".75s">
                                            There are many variations of passages orem psum available but the majority
                                            have suffered alteration in some form by injected humour.
                                        </p>
                                        <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                            <a href="shop-grid.html" class="theme-btn">Shop Now<i
                                                    class="fas fa-arrow-right"></i></a>
                                            <a href="about.html" class="theme-btn theme-btn2">Learn More<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="hero-right" data-animation="fadeInRight" data-delay=".25s">
                                        <div class="hero-img">
                                            <div class="hero-img-price">
                                                <span>Price</span>
                                                <span>$250</span>
                                            </div>
                                            <img src="<?= base_url() ;?>/public/assets/img/hero/03.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hero-single">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="hero-content">
                                        <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Start
                                            From $15.99</h6>
                                        <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                            Explore The Trendy <span>products</span> for you.
                                        </h1>
                                        <p data-animation="fadeInLeft" data-delay=".75s">
                                            There are many variations of passages orem psum available but the majority
                                            have suffered alteration in some form by injected humour.
                                        </p>
                                        <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                            <a href="shop-grid.html" class="theme-btn">Shop Now<i
                                                    class="fas fa-arrow-right"></i></a>
                                            <a href="about.html" class="theme-btn theme-btn2">Learn More<i
                                                    class="fas fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="hero-right" data-animation="fadeInRight" data-delay=".25s">
                                        <div class="hero-img">
                                            <div class="hero-img-price">
                                                <span>Price</span>
                                                <span>$250</span>
                                            </div>
                                            <img src="<?= base_url() ;?>/public/assets/img/hero/04.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- hero slider end -->


        <!-- category area -->
      <div class="category-area pt-80 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12 wow fadeInDown" data-wow-delay=".25s">
                <div class="site-heading-inline">
                    <h2 class="site-title">Top Category</h2>
                    <a href="<?= base_url('categories'); ?>">View More <i class="fas fa-angle-double-right"></i></a>
                </div>
            </div>
        </div>

        <div class="category-slider owl-carousel owl-theme wow fadeInUp" data-wow-delay=".25s">
            <?php if (!empty($categories)): ?>
                <?php foreach ($categories as $cat): ?>
                    <div class="category-item">
                        <a href="<?= site_url('shop-grid/' . $cat['category_id']); ?>">
                            <div class="category-info">
                                <div class="icon">
                                    <img src="<?= base_url() . '/' . $cat['category_image']; ?>" alt="<?= htmlspecialchars($cat['name']); ?>">
                                </div>
                                <div class="content">
                                    <h4><?= htmlspecialchars($cat['name']); ?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No active categories available.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

        <!-- category area end-->


 
        <!-- small banner end -->


        <!-- trending item -->

        <!-- trending item end -->


        <!-- feature area -->
        <div class="feature-area pb-100">
            <div class="container wow fadeInUp" data-wow-delay=".25s">
                <div class="feature-wrap">
                    <div class="row g-0">
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <img src="<?= base_url() ;?>/public/assets/img/icon/delivery-2.svg" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4>Free Delivery</h4>
                                    <p>Orders Over $120</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <img src="<?= base_url() ;?>/public/assets/img/icon/refund.svg" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4>Get Refund</h4>
                                    <p>Within 30 Days Returns</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <img src="<?= base_url() ;?>/public/assets/img/icon/payment.svg" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4>Safe Payment</h4>
                                    <p>100% Secure Payment</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="feature-item">
                                <div class="feature-icon">
                                    <img src="<?= base_url() ;?>/public/assets/img/icon/support.svg" alt="">
                                </div>
                                <div class="feature-content">
                                    <h4>24/7 Support</h4>
                                    <p>Feel Free To Call Us</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- feature area end -->


        <!-- popular item -->
  
        <!-- popular item end -->


        <!-- brand area -->
    
        <!-- brand area end -->


        <!-- big banner -->
        <div class="big-banner">
            <div class="container wow fadeInUp" data-wow-delay=".25s">
                <div class="banner-wrap" style="background-image: url(<?= base_url() ;?>/public/assets/img/banner/big-banner.jpg);">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="banner-content">
                                <div class="banner-info">
                                    <h6>Mega Collections</h6>
                                    <h2>Huge Sale Up To <span>40%</span> Off</h2>
                                    <p>at our outlet stores</p>
                                </div>
                                <a href="shop-grid.html" class="theme-btn">Shop Now<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- big banner end -->


        <!-- featured item -->

        <!-- featured item end -->


        <!-- video area -->
        <div class="video-area pt-100">
            <div class="container-fluid px-0">
                <div class="video-content" style="background-image: url(<?= base_url() ;?>/public/assets/img/video/01.jpg);">
                    <div class="video-wrapper">
                        <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=jLS3DrTJrpI">
                            <i class="fas fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- video area end -->


        <!-- product list -->
        <!-- <div class="product-list py-100">
            <div class="container wow fadeInUp" data-wow-delay=".25s">
                <div class="row g-4">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="product-list-box border">
                            <h2 class="product-list-title">On sale</h2>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="<?= base_url() ;?>/public/assets/img/product/e1.png" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Apple Blue Airpod</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="<?= base_url() ;?>/public/assets/img/product/e3.png" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Apple Blue Airpod</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="<?= base_url() ;?>/public/assets/img/product/e7.png" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Apple Blue Airpod</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="product-list-box border">
                            <h2 class="product-list-title">Best Seller</h2>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="<?= base_url() ;?>/public/assets/img/product/a12.png" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Apple Blue Airpod</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="<?= base_url() ;?>/public/assets/img/product/a13.png" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Apple Blue Airpod</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="<?= base_url() ;?>/public/assets/img/product/a14.png" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Apple Blue Airpod</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                        <div class="product-list-box border">
                            <h2 class="product-list-title">Top Rated</h2>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="<?= base_url() ;?>/public/assets/img/product/d1.png" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Apple Blue Airpod</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="<?= base_url() ;?>/public/assets/img/product/d2.png" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Apple Blue Airpod</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                            <div class="product-list-item">
                                <div class="product-list-img">
                                    <a href="shop-single.html"><img src="<?= base_url() ;?>/public/assets/img/product/d3.png" alt="#"></a>
                                </div>
                                <div class="product-list-content">
                                    <h4><a href="shop-single.html">Apple Blue Airpod</a></h4>
                                    <div class="product-list-rate">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <div class="product-list-price">
                                        <del>60.00</del><span>$40.00</span>
                                    </div>
                                </div>
                                <a href="#" class="product-list-btn" data-bs-placement="left" data-tooltip="tooltip"
                                    title="Add To Cart"><i class="far fa-shopping-bag"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- product list end -->


        <!-- deal area -->
        <div class="deal-area pt-50 pb-50">
            <div class="deal-text-shape">Deal</div>
            <div class="container">
                <div class="deal-wrap wow fadeInUp" data-wow-delay=".25s">
                    <div class="deal-slider owl-carousel owl-theme">
                        <div class="deal-item">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="deal-content">
                                        <div class="deal-info">
                                            <span>Weekly Deal</span>
                                            <h1>Best Deal For This Week</h1>
                                            <p>There are many variations of passages available but the majority have
                                                suffered alteration in some form
                                                by injected humour, or randomised words which don't look even slightly
                                                believable.</p>
                                        </div>
                                        <div class="deal-countdown">
                                            <div class="countdown" data-countdown="2027/12/30"></div>
                                        </div>
                                        <a href="shop-grid.html" class="theme-btn theme-btn2">Shop Now <i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="deal-img">
                                        <img src="<?= base_url() ;?>/public/assets/img/deal/01.png" alt="">
                                        <div class="deal-discount">
                                            <span>35%</span>
                                            <span>off</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="deal-item">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="deal-content">
                                        <div class="deal-info">
                                            <span>Weekly Deal</span>
                                            <h1>Best Deal For This Week</h1>
                                            <p>There are many variations of passages available but the majority have
                                                suffered alteration in some form
                                                by injected humour, or randomised words which don't look even slightly
                                                believable.</p>
                                        </div>
                                        <div class="deal-countdown">
                                            <div class="countdown" data-countdown="2027/12/30"></div>
                                        </div>
                                        <a href="shop-grid.html" class="theme-btn theme-btn2">Shop Now <i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="deal-img">
                                        <img src="<?= base_url() ;?>/public/assets/img/deal/02.png" alt="">
                                        <div class="deal-discount">
                                            <span>35%</span>
                                            <span>off</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="deal-item">
                            <div class="row align-items-center">
                                <div class="col-lg-6">
                                    <div class="deal-content">
                                        <div class="deal-info">
                                            <span>Weekly Deal</span>
                                            <h1>Best Deal For This Week</h1>
                                            <p>There are many variations of passages available but the majority have
                                                suffered alteration in some form
                                                by injected humour, or randomised words which don't look even slightly
                                                believable.</p>
                                        </div>
                                        <div class="deal-countdown">
                                            <div class="countdown" data-countdown="2027/12/30"></div>
                                        </div>
                                        <a href="shop-grid.html" class="theme-btn theme-btn2">Shop Now <i
                                                class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="deal-img">
                                        <img src="<?= base_url() ;?>/public/assets/img/deal/03.png" alt="">
                                        <div class="deal-discount">
                                            <span>35%</span>
                                            <span>off</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- deal area end -->


        <!-- best seller -->
      
        <!-- best seller end -->


        <!-- gallery-area -->
        <div class="gallery-area pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Our Gallery</span>
                            <h2 class="site-title">Let's Check Our Photo <span>Gallery</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row g-4 popup-gallery">
                    <div class="col-md-4 col-lg-3">
                        <div class="gallery-item wow fadeInDown" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="<?= base_url() ;?>/public/assets/img/gallery/02.jpg" alt="">
                                <a class="popup-img gallery-link" href="<?= base_url() ;?>/public/assets/img/gallery/02.jpg"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="gallery-item wow fadeInDown" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="<?= base_url() ;?>/public/assets/img/gallery/03.jpg" alt="">
                                <a class="popup-img gallery-link" href="<?= base_url() ;?>/public/assets/img/gallery/03.jpg"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="gallery-item gallery-btn-active wow fadeInDown" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="<?= base_url() ;?>/public/assets/img/gallery/01.jpg" alt="">
                                <a class="popup-img gallery-link" href="<?= base_url() ;?>/public/assets/img/gallery/01.jpg"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-6">
                        <div class="gallery-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="<?= base_url() ;?>/public/assets/img/gallery/06.jpg" alt="">
                                <a class="popup-img gallery-link" href="<?= base_url() ;?>/public/assets/img/gallery/06.jpg"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="gallery-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="<?= base_url() ;?>/public/assets/img/gallery/04.jpg" alt="">
                                <a class="popup-img gallery-link" href="<?= base_url() ;?>/public/assets/img/gallery/04.jpg"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-3">
                        <div class="gallery-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="gallery-img">
                                <img src="<?= base_url() ;?>/public/assets/img/gallery/05.jpg" alt="">
                                <a class="popup-img gallery-link" href="<?= base_url() ;?>/public/assets/img/gallery/05.jpg"><i
                                        class="fal fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- gallery-area end -->


        <!-- testimonial area -->
        <div class="testimonial-area ts-bg py-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Testimonials</span>
                            <h2 class="site-title text-white">What Our Client Say's <span>About Us</span></h2>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slider owl-carousel owl-theme wow fadeInUp" data-wow-delay=".25s">
                    <div class="testimonial-item">
                        <div class="testimonial-author">
                            <div class="testimonial-author-img">
                                <img src="<?= base_url() ;?>/public/assets/img/testimonial/01.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Sylvia H Green</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                                There are many variations of long passages available but the content majority have
                                suffered to the editor page when looking at its layout alteration in some injected.
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="testimonial-quote-icon"><img src="<?= base_url() ;?>/public/assets/img/icon/quote.svg" alt=""></div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-author">
                            <div class="testimonial-author-img">
                                <img src="<?= base_url() ;?>/public/assets/img/testimonial/02.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Gordo Novak</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                                There are many variations of long passages available but the content majority have
                                suffered to the editor page when looking at its layout alteration in some injected.
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="testimonial-quote-icon"><img src="<?= base_url() ;?>/public/assets/img/icon/quote.svg" alt=""></div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-author">
                            <div class="testimonial-author-img">
                                <img src="<?= base_url() ;?>/public/assets/img/testimonial/03.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Reid E Butt</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                                There are many variations of long passages available but the content majority have
                                suffered to the editor page when looking at its layout alteration in some injected.
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="testimonial-quote-icon"><img src="<?= base_url() ;?>/public/assets/img/icon/quote.svg" alt=""></div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-author">
                            <div class="testimonial-author-img">
                                <img src="<?= base_url() ;?>/public/assets/img/testimonial/04.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Parker Jimenez</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                                There are many variations of long passages available but the content majority have
                                suffered to the editor page when looking at its layout alteration in some injected.
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="testimonial-quote-icon"><img src="<?= base_url() ;?>/public/assets/img/icon/quote.svg" alt=""></div>
                    </div>
                    <div class="testimonial-item">
                        <div class="testimonial-author">
                            <div class="testimonial-author-img">
                                <img src="<?= base_url() ;?>/public/assets/img/testimonial/05.jpg" alt="">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>Heruli Nez</h4>
                                <p>Customer</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <p>
                                There are many variations of long passages available but the content majority have
                                suffered to the editor page when looking at its layout alteration in some injected.
                            </p>
                        </div>
                        <div class="testimonial-rate">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="testimonial-quote-icon"><img src="<?= base_url() ;?>/public/assets/img/icon/quote.svg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- testimonial area end -->


        <!-- blog area -->
        <div class="blog-area py-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-delay=".25s">
                        <div class="site-heading text-center">
                            <span class="site-title-tagline">Our Blog</span>
                            <h2 class="site-title">Our Latest News & <span>Blog</span></h2>
                        </div>
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="<?= base_url() ;?>/public/assets/img/blog/01.jpg" alt="Thumb">
                                <span class="blog-date"><i class="far fa-calendar-alt"></i> Aug 12, 2025</span>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 2.5k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="blog-single-sidebar.html">There are many variations of passage available majority suffered.</a>
                                </h4>
                                <p>There are many variations available the majority have suffered alteration randomised
                                    words.</p>
                                <a class="theme-btn" href="blog-single-sidebar.html">Read More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInDown" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="<?= base_url() ;?>/public/assets/img/blog/02.jpg" alt="Thumb">
                                <span class="blog-date"><i class="far fa-calendar-alt"></i> Aug 15, 2025</span>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 3.1k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="blog-single-sidebar.html">Contrary to popular belief making simply random text latin.</a>
                                </h4>
                                <p>There are many variations available the majority have suffered alteration randomised
                                    words.</p>
                                <a class="theme-btn" href="blog-single-sidebar.html">Read More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="blog-item-img">
                                <img src="<?= base_url() ;?>/public/assets/img/blog/03.jpg" alt="Thumb">
                                <span class="blog-date"><i class="far fa-calendar-alt"></i> Aug 18, 2025</span>
                            </div>
                            <div class="blog-item-info">
                                <div class="blog-item-meta">
                                    <ul>
                                        <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                        <li><a href="#"><i class="far fa-comments"></i> 1.6k Comments</a></li>
                                    </ul>
                                </div>
                                <h4 class="blog-title">
                                    <a href="blog-single-sidebar.html"> If you are going use passage you need sure there middle
                                        text.</a>
                                </h4>
                                <p>There are many variations available the majority have suffered alteration randomised
                                    words.</p>
                                <a class="theme-btn" href="blog-single-sidebar.html">Read More<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- blog area end -->


        <!-- newsletter area -->
        <div class="newsletter-area pb-100">
            <div class="container wow fadeInUp" data-wow-delay=".25s">
                <div class="newsletter-wrap">
                    <div class="row">
                        <div class="col-lg-6 mx-auto">
                            <div class="newsletter-content">
                                <h3>Get <span>20%</span> Off Discount Coupon</h3>
                                <p>By Subscribe Our Newsletter</p>
                                <div class="subscribe-form">
                                    <form action="#">
                                        <input type="email" class="form-control" placeholder="Your Email Address">
                                        <button class="theme-btn" type="submit">
                                            Subscribe <i class="far fa-paper-plane"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter area end -->


        <!-- instagram-area -->
        <div class="instagram-area pb-100">
            <div class="container wow fadeInUp" data-wow-delay=".25s">
                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="site-heading text-center">
                            <h2 class="site-title">Instagram <span>@mocart</span></h2>
                        </div>
                    </div>
                </div>
                <div class="instagram-slider owl-carousel owl-theme">
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="<?= base_url() ;?>/public/assets/img/instagram/01.jpg" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="<?= base_url() ;?>/public/assets/img/instagram/02.jpg" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="<?= base_url() ;?>/public/assets/img/instagram/03.jpg" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="<?= base_url() ;?>/public/assets/img/instagram/04.jpg" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="<?= base_url() ;?>/public/assets/img/instagram/05.jpg" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="<?= base_url() ;?>/public/assets/img/instagram/06.jpg" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="instagram-item">
                        <div class="instagram-img">
                            <img src="<?= base_url() ;?>/public/assets/img/instagram/07.jpg" alt="Thumb">
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- instagram-area end -->

    </main>


    <!-- footer area -->
    <footer class="footer-area ft-bg">
        <?= $this->call->view('/partials/footer', $data); ?>
    </footer>
    <!-- footer area end -->


    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>
    <!-- scroll-top end -->


    <!-- modal quick shop-->
    <div class="modal quickview fade" id="quickview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="quickview" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="far fa-xmark"></i></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-img">
                                <img src="<?= base_url() ;?>/public/assets/img/product/e1.png" alt="#">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="quickview-content">
                                <h4 class="quickview-title">Apple Blue Airpod</h4>
                                <div class="quickview-rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <span class="rating-count"> (4 Customer Reviews)</span>
                                </div>
                                <div class="quickview-price">
                                    <h5><del>$860</del><span>$740</span></h5>
                                </div>
                                <ul class="quickview-list">
                                    <li>Brand:<span>Apple</span></li>
                                    <li>Category:<span>Healthcare</span></li>
                                    <li>Stock:<span class="stock">Available</span></li>
                                    <li>Code:<span>789FGDF</span></li>
                                </ul>
                                <div class="quickview-cart">
                                    <a href="#" class="theme-btn">Add to cart</a>
                                </div>
                                <div class="quickview-social">
                                    <span>Share:</span>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-x-twitter"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal quick shop end -->


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


<!-- Mirrored from live.themewild.com/mocart/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:19:40 GMT -->
</html>