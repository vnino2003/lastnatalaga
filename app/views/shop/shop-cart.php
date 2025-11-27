<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from live.themewild.com/mocart/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:19:38 GMT -->
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
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NG618JX0N8');
</script>
</head>

<body>

    <!-- preloader -->
     <!-- preloader -->
    <div class="preloader">
        <div class="loader-ripple"><div></div><div></div></div>
    </div>

    <!-- Header -->
    <?= $this->call->view('/partials/header', $data); ?>
    <?php getErrors(); ?>
    <?php getMessage(); ?>

    <main class="main">
        <!-- Breadcrumb -->
        <div class="site-breadcrumb">
            <div class="site-breadcrumb-bg" style="background: url(<?= base_url(); ?>/public/assets/img/breadcrumb/01.jpg)"></div>
            <div class="container">
                <div class="site-breadcrumb-wrap">
                    <h4 class="breadcrumb-title">Shop Cart</h4>
                    <ul class="breadcrumb-menu">
                        <li><a href="<?= site_url(); ?>"><i class="far fa-home"></i> Home</a></li>
                        <li class="active">Shop Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb -->

        <!-- Shop Cart -->
        <div class="shop-cart py-100">
            <div class="container">
                <div class="shop-cart-wrap">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                       <tbody>
<?php if (!empty($cartItems)): ?>
    <?php 
        $total = 0;
        $outOfStockExists = false; // track any OOS items
        foreach ($cartItems as $item):
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;

            // Stock logic
            $stock = $item['stock_quantity'] ?? 0;
            $isLow = ($stock > 0 && $stock <= 5);
            $isOut = ($stock <= 0);
            if ($isOut) $outOfStockExists = true;
    ?>
<tr class="<?= $isOut ? 'table-danger' : ($isLow ? 'table-warning' : '') ?>" 
    data-stock="<?= $stock; ?>" data-id="<?= $item['cart_id'] ?? $item['product_id']; ?>">            <td>
                <div class="shop-cart-img">
                    <a href="#">
                        <img src="<?= base_url() . ($item['product_image'] ?? $item['image']); ?>" alt="">
                    </a>
                </div>
            </td>
            <td>
                <div class="shop-cart-content">
                    <h5 class="shop-cart-name">
                        <a href="#"><?= htmlspecialchars($item['product_name'] ?? 'Unnamed Product'); ?></a>
                    </h5>
                    <div class="shop-cart-info">
<p><span>Category:</span> <?= htmlspecialchars($item['category_name'] ?? $item['name'] ?? 'N/A'); ?></p>
                        <?php if ($isOut): ?>
                            <span class="badge bg-danger">Out of Stock</span>
                        <?php elseif ($isLow): ?>
                            <span class="badge bg-warning text-dark">Only <?= $stock ?> left!</span>
                        <?php else: ?>
                            <span class="badge bg-success">In Stock</span>
                        <?php endif; ?>
                    </div>
                </div>
            </td>
            <td>
                <div class="shop-cart-price">
                    <span>₱<?= number_format($item['price'], 2); ?></span>
                </div>
            </td>
<td>
    <div class="shop-cart-qty">
        <button class="minus-btn" data-id="<?= $item['cart_id'] ?? $item['product_id']; ?>" <?= $isOut ? 'disabled' : '' ?>><i class="fal fa-minus"></i></button>
        <input class="quantity" type="text" value="<?= $item['quantity']; ?>" disabled>
        <button class="plus-btn" data-id="<?= $item['cart_id'] ?? $item['product_id']; ?>" <?= $isOut ? 'disabled' : '' ?>><i class="fal fa-plus"></i></button>
    </div>
</td>

                <div class="shop-cart-subtotal">
                    <span>₱<?= number_format($subtotal, 2); ?></span>
                </div>
            </td>
            <td>
                <a href="<?= site_url('remove-item/' . ($item['cart_id'] ?? $item['product_id'])); ?>" 
                   class="shop-cart-remove">
                    <i class="far fa-times"></i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="6" class="text-center py-4">Your cart is empty.</td>
    </tr>
<?php endif; ?>
</tbody>

                                    </table>
                                </div>
                            </div>

                            <div class="shop-cart-footer">
                                <div class="row">
                                    <div class="col-md-7 col-lg-6">
                                        <div class="shop-cart-coupon">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Your Coupon Code">
                                                <button class="theme-btn" type="submit">Apply Coupon</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5 col-lg-6">
                                        <div class="shop-cart-btn text-md-end">
                                            <a href="<?= site_url('shop-grid'); ?>" class="theme-btn">
                                                <span class="fas fa-arrow-left"></span> Continue Shopping
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cart Summary -->
                        <div class="col-lg-4">
                            <div class="shop-cart-summary">
                                <h5>Cart Summary</h5>
                                <ul>
                                    <li><strong>Sub Total:</strong> <span>₱<?= number_format($total ?? 0, 2); ?></span></li>
                                    <li><strong>Discount:</strong> <span>₱0.00</span></li>
                                    <li><strong>Shipping:</strong> <span>Free</span></li>
                                    <li class="shop-cart-total"><strong>Total:</strong> <span>₱<?= number_format($total ?? 0, 2); ?></span></li>
                                </ul>
                                <div class="text-end mt-40">
<a href="<?= site_url('checkout'); ?>" class="theme-btn">
                                        Checkout Now <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Summary -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Shop Cart -->
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
<script>
$(document).ready(function(){

    function updateCartDisplay(cartData) {
        $('.shop-cart-subtotal').each(function(){
            const row = $(this).closest('tr');
            const id = row.data('id');

            if(cartData.items[id]) {
                const quantity = cartData.items[id].quantity;
                const stock = parseInt(row.data('stock'));
                const subtotal = cartData.items[id].subtotal;

                row.find('.quantity').val(quantity);
                row.find('.shop-cart-subtotal span').text('₱' + subtotal.toFixed(2));

                // Disable buttons based on stock and quantity
                row.find('.plus-btn').prop('disabled', quantity >= stock);
                row.find('.minus-btn').prop('disabled', quantity <= 1);
            }
        });

        // Update cart summary
        $('.shop-cart-summary li.shop-cart-total span').text('₱' + cartData.total.toFixed(2));
        $('.shop-cart-summary li strong:contains("Sub Total") + span').text('₱' + cartData.total.toFixed(2));

        // Update header cart count and total
        $('.dropdown-cart .list-item .list-item-icon span').text(cartData.count || 0);
        $('.dropdown-cart .list-item-info h6').text('₱' + (cartData.total || 0).toFixed(2));
        $('.dropdown-cart .dropdown-cart-header span').text(cartData.count || 0);
        $('.dropdown-cart .dropdown-cart-bottom .total-amount').text('₱' + (cartData.total || 0).toFixed(2));
    }

    // Disable plus buttons initially if stock already reached
    $('tr').each(function(){
        const row = $(this);
        const stock = parseInt(row.data('stock'));
        const quantity = parseInt(row.find('.quantity').val());
        row.find('.plus-btn').prop('disabled', quantity >= stock);
        row.find('.minus-btn').prop('disabled', quantity <= 1);
    });

    // Handle plus/minus
    $('.plus-btn, .minus-btn').click(function(){
        const btn = $(this);
        const cartId = btn.data('id');
        const action = btn.hasClass('plus-btn') ? 'increase' : 'decrease';
        const row = btn.closest('tr');
        const stock = parseInt(row.data('stock'));
        const currentQty = parseInt(row.find('.quantity').val());

        // Prevent local overclick beyond stock
        if (action === 'increase' && currentQty >= stock) {
            btn.prop('disabled', true);
            return;
        }

        $.ajax({
            url: '<?= site_url("ajax-update-cart"); ?>',
            type: 'POST',
            data: { cart_id: cartId, action: action },
            dataType: 'json',
            success: function(res){
                if(res.status === 'success'){
                    updateCartDisplay(res.cartData);
                }
            }
        });
    });

});
</script>



</body>


<!-- Mirrored from live.themewild.com/mocart/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:19:38 GMT -->
</html>