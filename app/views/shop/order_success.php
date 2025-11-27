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

    </head>

    <body>

        <!-- preloader -->
        <!-- preloader -->
        <div class="preloader">
            <div class="loader-ripple"><div></div><div></div></div>
        </div>
          <?= $this->call->view('/partials/header', $data); ?>

        

        <!-- Header -->
        <?php getErrors(); ?>
        <?php getMessage(); ?>

<main class="main">
    <div class="container py-5">
        <div class="success-container text-center">
            <div class="success-icon mb-3">&#10004;</div>
            <h2 class="fw-bold mb-3">Thank you for your order<?= isset($username) ? ', ' . htmlspecialchars($username) : ''; ?>!</h2>
            <p class="mb-4">Your order has been placed successfully. We will process it shortly.</p>

            <!-- <?php if (!empty($cartItems)): ?>
            <div class="card shadow-sm order-summary mx-auto">
                <div class="card-body">
                    <h5 class="card-title mb-3">Order Details</h5>
                    <ul class="list-group mb-3">
                        <?php foreach($cartItems as $item): ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <strong><?= htmlspecialchars($item['product_name'] ?? 'Product'); ?></strong>
                                    <div class="text-muted small">Qty: <?= $item['quantity'] ?? 1; ?></div>
                                </div>
                                <strong>₱<?= number_format($item['price'] * ($item['quantity'] ?? 1), 2); ?></strong>
                            </li>
                        <?php endforeach; ?>
                        <li class="list-group-item d-flex justify-content-between bg-light">
                            <strong>Total</strong>
                            <strong>₱<?= number_format($cartTotal ?? 0, 2); ?></strong>
                        </li>
                    </ul>

                    <?php if (!empty($paymentMethod)): ?>
                        <p class="text-muted mb-0"><strong>Payment Method:</strong> <?= strtoupper($paymentMethod); ?></p>
                    <?php endif; ?>

                    <?php if (!empty($shippingAddress)): ?>
                        <p class="text-muted"><strong>Shipping Address:</strong> <?= htmlspecialchars($shippingAddress); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php else: ?>
                <p class="text-muted">No items found in this order.</p>
            <?php endif; ?> -->

            <a href="<?= site_url('shop'); ?>" class="btn btn-primary mt-4">Back to Shop</a>
        </div>
    </div>
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
    <script>
    $(document).ready(function() {
        $('#payWithGcash').click(function() {
            // set payment method to gcash
            $('select[name="payment_method"]').val('gcash');
            // submit the form
            $(this).closest('form').submit();
        });
    });
    </script>

    <script src="https://js.paymongo.com/v1/paymongo.js"></script>


    </body>


    <!-- Mirrored from live.themewild.com/mocart/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:19:38 GMT -->
    </html>