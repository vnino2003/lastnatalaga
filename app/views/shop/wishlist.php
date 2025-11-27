<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from live.themewild.com/mocart/wishlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:19:37 GMT -->
<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- title -->
    <title>Mocart</title>
<link rel="stylesheet" href="<?= BASE_URL ;?>/public/assets/css/notifications.css">

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

    <!-- header area end --> <?php getErrors(); ?>
        <?php getMessage(); ?>

    <!-- header area end -->


    <!-- mobile popup search end -->


    <main class="main">

        <!-- breadcrumb -->
        <div class="site-breadcrumb">
            <div class="site-breadcrumb-bg" style="background: url(<?= base_url() ;?>/public/assets/img/breadcrumb/01.jpg)"></div>
            <div class="container">
                <div class="site-breadcrumb-wrap">
                    <h4 class="breadcrumb-title">My Wishlist</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="index-2.html"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">My Wishlist</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->

<?= $this->call->view('/partials/accout-sidebar', $data); ?>

        <!-- user wishlist -->
       
                    <div class="col-lg-9">
                        <div class="user-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="user-card">
                                        <h4 class="user-card-title">My Wishlist</h4>
                              <div class="row g-4 mt-20">
    <?php if (!empty($wishlistItems)): ?>
        <?php foreach ($wishlistItems as $item): ?>
            
            <?php
                $stock = (int)($item['stock_quantity'] ?? 0);
                $isOutOfStock = $stock <= 0;
                $isLowStock = $stock > 0 && $stock <= 5;
            ?>

            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="product-item <?= $isOutOfStock ? 'opacity-75' : '' ?>">
                    
                    <div class="product-img position-relative">

                        <a href="<?= site_url('shop/product/' . $item['product_id']); ?>">
                                <img src="<?= base_url() . $item['product_image']; ?>" alt="image">
                        </a>

                        <!-- STOCK BADGE -->
                        <?php if ($isOutOfStock): ?>
                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">Out of Stock</span>
                        <?php elseif ($isLowStock): ?>
                            <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">
                                Low Stock (<?= $stock ?> left)
                            </span>
                        <?php endif; ?>

                        <!-- HOVER ACTIONS -->
                        <div class="product-action-wrap">
                            <div class="product-action">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#quickview<?= $item['product_id']; ?>">
                                    <i class="far fa-eye"></i>
                                </a>

                                <!-- REMOVE FROM WISHLIST -->
<form action="<?= site_url('wishlist/remove/' . $item['product_id']); ?>" method="POST" class="d-inline">
    <button type="submit" class="btn btn-link p-0 m-0 remove-wishlist" title="Remove">
        <i class="far fa-xmark"></i>
    </button>
</form>



                                <!-- (Optional) Compare -->
                                <a href="#" title="Add To Compare">
                                    <i class="far fa-arrows-repeat"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="product-content">
                        <h3 class="product-title">
                            <a href="<?= site_url('shop/product/' . $item['product_id']); ?>">
                                <?= htmlspecialchars($item['product_name']); ?>
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
                                <span>₱<?= number_format($item['price'], 2); ?></span>
                            </div>

                            <?php if (!$isOutOfStock): ?>
                                <button 
                                    type="button"
                                    class="product-cart-btn add-to-cart"
                                    data-product-id="<?= $item['product_id']; ?>"
                                    data-product-image="<?= base_url('uploads/' . $item['product_image']); ?>">
                                    <i class="far fa-shopping-bag"></i>
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-12"><p>Your wishlist is empty.</p></div>
    <?php endif; ?>
</div>

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
        <!-- user wishlist end -->

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
function removeWishlistItem(productId) {
    fetch('<?= site_url('wishlist/remove'); ?>', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'product_id=' + productId
    })
    .then(() => location.reload());
}

function addToCart(productId) {
    fetch('<?= site_url('cart/add'); ?>', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'product_id=' + productId
    })
    .then(() => location.reload());
}
</script>

</body>


<!-- Mirrored from live.themewild.com/mocart/wishlist.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:19:38 GMT -->
</html>