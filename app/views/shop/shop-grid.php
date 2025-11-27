<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from live.themewild.com/mocart/shop-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:19:35 GMT -->
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

    <!-- css -->
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/style.css">
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NG618JX0N8"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-NG618JX0N8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NG618JX0N8');
</script>
<style>
.flying-img {
    border-radius: 50%;
    pointer-events: none;
}
</style>

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

    <!-- header area end --> <?php getErrors(); ?>
        <?php getMessage(); ?>


    <!-- mobile popup search -->
  
    <!-- mobile popup search end -->


    <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb">
            <div class="site-breadcrumb-bg" style="background: url(<?= base_url() ;?>/public/assets/img/breadcrumb/01.jpg)"></div>
            <div class="container">
                <div class="site-breadcrumb-wrap">
                    <h4 class="breadcrumb-title">Shop Grid One</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index-2.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Shop Grid One</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->


        <!-- shop-area -->
        <div class="shop-area bg-2 py-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="shop-sidebar">
                            <div class="shop-widget">
                                <div class="shop-search-form">
                                    <h4 class="shop-widget-title">Search</h4>
                                    <form action="#">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search">
                                            <button type="search"><i class="far fa-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
<div class="shop-widget">
    <h4 class="shop-widget-title">
        <?= !empty($parent) ? htmlspecialchars($parent['name']) : 'Categories'; ?>
    </h4>

    <ul class="shop-category-list">
        <?php if (!empty($subcategories)): ?>
            <!-- ✅ "All" Option -->
            <li>
                <a href="<?= site_url('shop-grid/' . $parent['category_id']); ?>">
                    All
                    <span>(
                        <?php
                            $total = 0;
                            foreach ($subcategories as $sub) {
                                $total += isset($sub['product_count']) ? $sub['product_count'] : 0;
                            }
                            echo $total;
                        ?>
                    )</span>
                </a>
            </li>

            <!-- ✅ Subcategories -->
      <?php foreach ($subcategories as $sub): ?>
    <?php if (!isset($sub['status']) || $sub['status'] != 1) continue; // skip inactive ?>
    <li>
        <a href="<?= site_url('shop-grid/' . $sub['category_id']); ?>">
            <?= htmlspecialchars($sub['name']); ?>
            <span>(<?= isset($sub['product_count']) ? $sub['product_count'] : 0; ?>)</span>
        </a>
    </li>
<?php endforeach; ?>

        <?php else: ?>
            <li><em>No subcategories available under this category.</em></li>
        <?php endif; ?>
    </ul>
</div>


              
            
                            <div class="shop-widget-banner mt-30 mb-50">
                                <div class="banner-img" style="background-image:url(<?= base_url() ;?>/public/assets/img/banner/shop-banner.jpg)"></div>
                                <div class="banner-content">
                                    <h6>Get <span>35% Off</span></h6>
                                    <h4>New Collection of Sunglassess</h4>
                                    <a href="#" class="theme-btn">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="col-md-12">
                            <div class="shop-sort">
                                <div class="shop-sort-box">
                                    <div class="shop-sorty-label">Sort By:</div>
                                    <select class="select">
                                        <option value="1">Default Sorting</option>
                                        <option value="5">Latest Items</option>
                                        <option value="2">Best Seller Items</option>
                                        <option value="3">Price - Low To High</option>
                                        <option value="4">Price - High To Low</option>
                                    </select>
                                    <div class="shop-sort-show">Showing 1-10 of 50 Results</div>
                                </div>
                                <div class="shop-sort-gl">
                                    <a href="shop-grid.html" class="shop-sort-grid active"><i class="far fa-grid-round-2"></i></a>
                                    <a href="shop-list.html" class="shop-sort-list"><i class="far fa-list-ul"></i></a>
                                </div>
                            </div>
                        </div>
                <div class="shop-item-wrap item-4">
    <div class="row g-4">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <?php
                    $stock = (int)($product['stock_quantity'] ?? 0);
                    $isOutOfStock = $stock <= 0;
                    $isLowStock = $stock > 0 && $stock <= 5;
                ?>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="product-item <?= $isOutOfStock ? 'opacity-75' : '' ?>">
                        <div class="product-img position-relative">
                        

                            <a href="<?= base_url('shop-single/' . $product['product_id']); ?>">
                                <img src="<?= base_url() . $product['product_image']; ?>" alt="image">
                            </a>

                            <!-- 🧾 Stock badge -->
                            <?php if ($isOutOfStock): ?>
                                <span class="badge bg-danger position-absolute top-0 end-0 m-2">Out of Stock</span>
                            <?php elseif ($isLowStock): ?>
                                <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">Low Stock (<?= $stock ?> left)</span>
                            <?php endif; ?>

                            <div class="product-action-wrap">
                                <div class="product-action">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quickview<?= $product['product_id']; ?>" title="Quick View">
                                        <i class="far fa-eye"></i>
                                    </a>
                                  <a href="#" class="add-to-wishlist" data-product-id="<?= $product['product_id']; ?>" title="Add To Wishlist">
    <i class="far fa-heart"></i>
</a>

                                    <a href="#" data-tooltip="tooltip" title="Add To Compare">
                                        <i class="far fa-arrows-repeat"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="product-content">
                            <h3 class="product-title">
                                <a href="<?= base_url('shop-single/' . $product['product_id']); ?>">
                                    <?= htmlspecialchars($product['name']); ?>
                                </a>
                            </h3>
                            <div class="product-rate">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <div class="product-bottom">
                                <div class="product-price">
                                    <span>₱<?= number_format($product['price'], 2); ?></span>
                                </div>

                                <?php if (!$isOutOfStock): ?>
                                
                                    <button type="button" 
                                        class="product-cart-btn add-to-cart" 
                                        data-product-id="<?= $product['product_id']; ?>" 
                                        data-product-image="<?= base_url() . $product['product_image']; ?>">
                                        <i class="far fa-shopping-bag"></i>
                                    </button>
                                <?php endif; ?>


                        </div>
                    </div>
                </div>
            </div>

              <div class="modal quickview fade" id="quickview<?= $product['product_id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-xmark"></i></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="quickview-img">
                                    <img src="<?= base_url() . $product['product_image']; ?>" alt="<?= htmlspecialchars($product['name']); ?>">
                                </div>  
                            </div>
                            <div class="col-lg-6">
                                <div class="quickview-content">
                                    <h4 class="quickview-title"><?= htmlspecialchars($product['name']); ?></h4>
                                    <div class="quickview-rating">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <span class="rating-count">(<?= $product['reviews_count'] ?? 0; ?> Customer Reviews)</span>
                                    </div>
                                    <div class="quickview-price">
                                        <h5>
                                            <?php if(!empty($product['original_price'])): ?>
                                                <del>₱<?= number_format($product['original_price'], 2); ?></del>
                                            <?php endif; ?>
                                            <span>₱<?= number_format($product['price'] ?? 0, 2); ?></span>
                                        </h5>
                                    </div>
                                    <ul class="quickview-list">
                                        <li>Brand:<span><?= htmlspecialchars($product['brand'] ?? 'N/A'); ?></span></li>
                                        <li>Category:<span><?= htmlspecialchars($product['categories'] ?? 'N/A'); ?></span></li>
                                        <li>Stock:<span class="stock"><?= ($product['stock'] > 0) ? 'Available' : 'Out of stock'; ?></span></li>
                                        <li>Code:<span><?= htmlspecialchars($product['sku']); ?></span></li>
                                    </ul>
                                    <div class="quickview-cart">
                                        <form action="<?= base_url('add-to-cart/'.$product['product_id']); ?>" method="POST">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="theme-btn">Add to cart</button>
                                        </form>
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
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12 text-center py-5">
            <h4>No products found in this category.</h4>
        </div>
    <?php endif; ?>
</div>

</div>


                        <!-- pagination -->
                        <div class="pagination-area mt-50">
                            <div aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><i class="far fa-arrow-left"></i></span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                 
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="far fa-arrow-right"></i></span>
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
        <!-- shop-area end -->

    </main>


    <!-- footer area -->
    <footer class="footer-area ft-bg">
        <div class="footer-widget">
            <div class="container">
                <div class="row footer-widget-wrapper pt-100 pb-40">
                    <div class="col-md-6 col-lg-3">
                        <div class="footer-widget-box about-us">
                            <a href="index-2.html" class="footer-logo">
                                <img src="<?= base_url() ;?>/public/assets/img/logo/logo-light.png" alt="">
                            </a>
                            <p class="mb-3">
                                We are many variations of the passages available but the majoro have suffered alteration
                                injected.
                            </p>
                            <ul class="footer-contact">
                                <li><a href="tel:+21236547898"><i class="far fa-phone"></i>+2 123 654 7898</a></li>
                                <li><i class="far fa-map-marker-alt"></i>25/B Milford Road, New York</li>
                                <li><a href="https://live.themewild.com/cdn-cgi/l/email-protection#a7cec9c1c8e7c2dfc6cad7cbc289c4c8ca"><i
                                            class="far fa-envelope"></i><span class="__cf_email__" data-cfemail="21484f474e614459404c514d440f424e4c">[email&#160;protected]</span></a></li>
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
                                <img src="<?= base_url() ;?>/public/assets/img/payment/visa.svg" alt="">
                                <img src="<?= base_url() ;?>/public/assets/img/payment/mastercard.svg" alt="">
                                <img src="<?= base_url() ;?>/public/assets/img/payment/amex.svg" alt="">
                                <img src="<?= base_url() ;?>/public/assets/img/payment/discover.svg" alt="">
                                <img src="<?= base_url() ;?>/public/assets/img/payment/paypal.svg" alt="">
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


    <!-- modal quick shop-->
 
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//code.tidio.co/kjujtootgkm084zra3bgnb8p9e7puzpu.js" async></script>



<script>
    $(document).on('click', '.add-to-cart', function(e) {
    e.preventDefault();

    let button      = $(this);
    let productId   = button.data('product-id');
    let productImg  = button.data('product-image'); // Already passed via data attribute
    let cartIcon    = $('.dropdown-cart .list-item-icon');

    // ✅ Fly-to-cart animation
    let flyingImg = $('<img />', {
        src: productImg,
        class: 'flying-img',
        css: {
            width: '50px',
            height: '50px',
            position: 'absolute',
            zIndex: 1000,
            borderRadius: '5px'
        }
    }).appendTo('body');

    let imgPos  = button.offset();
    let cartPos = cartIcon.offset();

    flyingImg.css({ top: imgPos.top, left: imgPos.left });

    flyingImg.animate({
        top: cartPos.top,
        left: cartPos.left,
        width: 20,
        height: 20,
        opacity: 0.5
    }, 800, 'swing', function() {
        flyingImg.remove();
    });

    // ✅ AJAX add to cart
  $.post("<?= site_url('ajax-add-to-cart'); ?>", { product_id: productId }, function(res) {
        let data = JSON.parse(res);

        if (data.status === 'success') {
            // ✔ Update only the number beside cart icon immediately
            $('.dropdown-cart .list-item-icon span').text(data.cart_count);

            // ✔ Reload the full header cart dropdown (items + total)
          $.get("<?= site_url('cart-partial'); ?>", function(cartHtml) {
    $('.dropdown-cart').replaceWith(cartHtml);
});

        }
    });
});

</script>
<script>
$(document).on('click', '.add-to-wishlist', function(e) {
    e.preventDefault();

    let button = $(this);
    let productId = button.data('product-id');
    let icon = button.find('i');

    // 💖 Simple "pop" animation
    icon.addClass('animate-wishlist');
    setTimeout(() => icon.removeClass('animate-wishlist'), 600);

    // ✅ AJAX call to insert wishlist
    $.post("<?= site_url('wishlist/insert'); ?>", { product_id: productId }, function(res) {
        let data = JSON.parse(res);
        if (data.status === 'success') {
            // Optional: show a toast or update wishlist count
            console.log('Added to wishlist!');
        } else {
            console.log('Already in wishlist or error.');
        }
    });
});
</script>

<style>
/* Heart pop animation */
@keyframes wishlist-pop {
    0% { transform: scale(1); color: #000; }
    30% { transform: scale(1.4); color: #ff4c68; }
    60% { transform: scale(1.2); color: #ff4c68; }
    100% { transform: scale(1); color: #ff4c68; }
}
.animate-wishlist {
    animation: wishlist-pop 0.6s forwards;
}
</style>

</body>


<!-- Mirrored from live.themewild.com/mocart/shop-grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:19:37 GMT -->
</html>