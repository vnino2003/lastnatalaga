<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from live.themewild.com/mocart/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:20:39 GMT -->
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- title -->
    <title>Mocart - Multipurpose eCommerce HTML5 Template</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ;?>/public/assets/img/logo/favicon.png">
        <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/notifications.css">

    <!-- css -->
    <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/style.css">
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
 <?=   $this->call->view('/partials/header', $data)  ;?>
    <!-- header area end -->


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

        <!-- breadcrumb -->
        <div class="site-breadcrumb">
            <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ;?>/public/assets/img/breadcrumb/01.jpg)"></div>
            <div class="container">
                <div class="site-breadcrumb-wrap">
                    <h4 class="breadcrumb-title">Login</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index-2.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Login</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


  <?php getErrors(); ?>
        <?php getMessage(); ?>
        <!-- login area -->
        <div class="login-area py-100">
            <div class="container">
                <div class="col-md-7 col-lg-5 mx-auto">
                    <div class="login-form">
                        <div class="login-header">
                            <img src="<?= BASE_URL ;?>/public/assets/img/logo/logo.png" alt="">
                            <p>Login with your mocart account</p>
                        </div>
                        <form action="<?= site_url('login');?>" method="POST">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Your Password">
                            </div>
                            <div class="form-group mt-3">
    <div class="g-recaptcha" data-sitekey="6LctdRwsAAAAAI0yCoLnapOhLNwP8-lLXG8r7Upm"></div>
</div>
                            <div class="d-flex justify-content-between mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                                <a href="<?= site_url('forgot-password'); ?>" class="forgot-pass">Forgot Password?</a>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Login</button>
                            </div>
                            
                        </form>
                        <div class="login-footer">
                            <p>Don't have an account? <a href="<?= site_url('register') ;?>">Register.</a></p>
                            <div class="social-login">
                                <span class="social-divider">or</span>
                                <p>Continue with social media</p>
                                <div class="social-login-list">
                                    <a href="#" class="fb-auth"><i class="fab fa-facebook-f"></i> Facebook</a>
<a href="<?= site_url('login/googleRedirect'); ?>" class="gl-auth">
    <i class="fab fa-google"></i> Login with Google
</a>

                                    <a href="#" class="tw-auth"><i class="fab fa-x-twitter"></i> Twitter</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login area end -->

    </main>


    <!-- footer area -->
    <footer class="footer-area ft-bg">
        <div class="footer-widget">
            <div class="container">
                <div class="row footer-widget-wrapper pt-100 pb-40">
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-widget-box about-us">
                            <a href="index-2.html" class="footer-logo">
                                <img src="<?= BASE_URL ;?>/public/assets/img/logo/logo-light.png" alt="">
                            </a>
                            <p class="mb-3">
                                We are many variations of the passages available but the majoro have suffered alteration
                                injected.
                            </p>
                            <ul class="footer-contact">
                                <li><a href="tel:+21236547898"><i class="far fa-phone"></i>+2 123 654 7898</a></li>
                                <li><i class="far fa-map-marker-alt"></i>25/B Milford Road, New York</li>
                                <li><a href="https://live.themewild.com/cdn-cgi/l/email-protection#97fef9f1f8d7f2eff6fae7fbf2b9f4f8fa"><i
                                            class="far fa-envelope"></i><span class="__cf_email__" data-cfemail="f29b9c949db2978a939f829e97dc919d9f">[email&#160;protected]</span></a></li>
                                <li><i class="far fa-clock"></i>Mon-Fri (9.00AM - 8.00PM)</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Quick Links</h4>
                            <ul class="footer-list">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="help.html">Delivery Info</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                                <li><a href="blog.html">Update News</a></li>
                                <li><a href="testimonial.html">Our Testimonials</a></li>
                                <li><a href="terms.html">Terms Of Service</a></li>
                                <li><a href="privacy.html">Privacy policy</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Browse Category</h4>
                            <ul class="footer-list">
                                <li><a href="shop-grid.html">Accessories</a></li>
                                <li><a href="shop-grid.html">Home & Garden</a></li>
                                <li><a href="shop-grid.html">Electronics</a></li>
                                <li><a href="shop-grid.html">Health & Beauty</a></li>
                                <li><a href="shop-grid.html">Grocery & Market</a></li>
                                <li><a href="shop-grid.html">Toy & Games</a></li>
                                <li><a href="shop-grid.html">Babies & Moms</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-2">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Support Center</h4>
                            <ul class="footer-list">
                                <li><a href="faq.html">FAQ's</a></li>
                                <li><a href="help.html">How To Buy</a></li>
                                <li><a href="help.html">Support Center</a></li>
                                <li><a href="order-track.html">Track Your Order</a></li>
                                <li><a href="return.html">Returns Policy</a></li>
                                <li><a href="affiliate.html">Our Affiliates</a></li>
                                <li><a href="contact.html">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-widget-box list">
                            <h4 class="footer-widget-title">Get Mobile App</h4>
                            <p>Mocart App is now available on App Store & Google Play.</p>
                            <div class="footer-download">
                                <h5>Download Our Mobile App</h5>
                                <div class="footer-download-btn">
                                    <a href="#">
                                        <i class="fab fa-google-play"></i>
                                        <div class="download-btn-info">
                                            <span>Get It On</span>
                                            <h6>Google Play</h6>
                                        </div>
                                    </a>
                                    <a href="#">
                                        <i class="fab fa-app-store"></i>
                                        <div class="download-btn-info">
                                            <span>Get It On</span>
                                            <h6>App Store</h6>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="footer-payment mt-20">
                                <span>We Accept:</span>
                                <img src="<?= BASE_URL ;?>/public/assets/img/payment/visa.svg" alt="">
                                <img src="<?= BASE_URL ;?>/public/assets/img/payment/mastercard.svg" alt="">
                                <img src="<?= BASE_URL ;?>/public/assets/img/payment/amex.svg" alt="">
                                <img src="<?= BASE_URL ;?>/public/assets/img/payment/discover.svg" alt="">
                                <img src="<?= BASE_URL ;?>/public/assets/img/payment/paypal.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="copyright-wrap">
                    <div class="row">
                        <div class="col-12 col-lg-6 align-self-center">
                            <p class="copyright-text">
                                &copy; Copyright <span id="date"></span> <a href="index-2.html"> Mocart </a> All Rights
                                Reserved.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6 align-self-center">
                            <div class="footer-social">
                                <span>Follow Us:</span>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-x-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->


    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>
    <!-- scroll-top end -->


    <!-- js -->
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="<?= BASE_URL ;?>/public/assets/js/jquery-3.7.1.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/modernizr.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/isotope.pkgd.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/jquery.appear.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/jquery.easing.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/owl.carousel.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/counter-up.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/jquery-ui.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/jquery.nice-select.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/countdown.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/wow.min.js"></script>
    <script src="<?= BASE_URL ;?>/public/assets/js/main.js"></script>
    <script src="//code.tidio.co/kjujtootgkm084zra3bgnb8p9e7puzpu.js" async></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>


<!-- Mirrored from live.themewild.com/mocart/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:20:39 GMT -->
</html>
