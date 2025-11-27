<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Checkout - Payment">
    <meta name="keywords" content="">

    <title>Checkout - Payment</title>

    <link rel="icon" type="image/x-icon" href="<?= base_url() ;?>/public/assets/img/logo/favicon.png">

    <!-- CSS -->
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/style.css">
    <style>
        :root {
            --primary: #2d3436;
            --primary-light: #636e72;
            --accent: #0984e3;
            --accent-light: #74b9ff;
            --success: #27ae60;
            --warning: #f39c12;
            --neutral-bg: #f5f6fa;
            --neutral-border: #dfe6e9;
            --text-primary: #2d3436;
            --text-secondary: #636e72;
            --white: #ffffff;
            --shadow-sm: 0 2px 8px rgba(45, 52, 54, 0.08);
            --shadow-md: 0 4px 16px rgba(45, 52, 54, 0.12);
            --transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .checkout-main {
            background: linear-gradient(135deg, #f5f6fa 0%, #ffffff 100%);
            min-height: 100vh;
            padding: 2rem 0;
        }

        .checkout-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .checkout-progress {
            margin-bottom: 3rem;
            animation: slideDown 0.6s ease-out;
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .progress-steps {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--neutral-bg);
            border: 2px solid var(--neutral-border);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: var(--text-secondary);
            transition: all var(--transition);
        }

        .progress-step.active .step-number {
            background: var(--accent);
            color: var(--white);
            border-color: var(--accent);
            box-shadow: 0 0 0 8px rgba(9, 132, 227, 0.1);
        }

        .progress-step.completed .step-number {
            background: var(--success);
            color: var(--white);
            border-color: var(--success);
        }

        .step-label {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-secondary);
            transition: color var(--transition);
        }

        .progress-step.active .step-label {
            color: var(--accent);
        }

        .progress-line {
            flex: 1;
            height: 2px;
            background: var(--neutral-border);
            max-width: 100px;
        }

        .checkout-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .checkout-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            animation: fadeInUp 0.6s ease-out 0.1s both;
        }

        .checkout-subtitle {
            font-size: 1rem;
            color: var(--text-secondary);
            animation: fadeInUp 0.6s ease-out 0.2s both;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .checkout-card {
            background: var(--white);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid var(--neutral-border);
            box-shadow: var(--shadow-sm);
            transition: all var(--transition);
            animation: fadeInUp 0.6s ease-out 0.2s both;
        }

        .checkout-card:hover {
            box-shadow: var(--shadow-md);
        }

        .section-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .payment-options {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .payment-option {
            cursor: pointer;
        }

        .payment-option input[type="radio"] {
            display: none;
        }

        .payment-box {
            padding: 1.25rem;
            border: 2px solid var(--neutral-border);
            border-radius: 8px;
            transition: all var(--transition);
            background: var(--white);
        }

        .payment-option input[type="radio"]:checked + .payment-box {
            border-color: var(--accent);
            background: rgba(9, 132, 227, 0.08);
            box-shadow: 0 0 0 4px rgba(9, 132, 227, 0.1);
        }

        .payment-box:hover {
            border-color: var(--accent);
        }

        .payment-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .payment-header i {
            font-size: 1.25rem;
            color: var(--accent);
        }

        .payment-desc {
            font-size: 0.85rem;
            color: var(--text-secondary);
            margin: 0;
        }

        .order-summary {
            background: var(--neutral-bg);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
            color: var(--text-secondary);
        }

        .summary-row span:last-child {
            font-weight: 600;
            color: var(--text-primary);
        }

        .summary-divider {
            height: 1px;
            background: var(--neutral-border);
            margin: 1rem 0;
        }

        .total-row {
            font-size: 1.1rem;
            margin-bottom: 0;
        }

        .total-amount {
            font-size: 1.5rem !important;
            color: var(--accent) !important;
            font-weight: 700;
        }

        .checkout-actions {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--neutral-border);
            display: flex;
            gap: 1rem;
            flex-direction: column;
        }

        .btn-checkout {
            width: 100%;
            padding: 1rem;
            font-weight: 600;
            font-size: 1rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            transition: all var(--transition);
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--accent);
            color: var(--white);
        }

        .btn-primary:hover {
            background: #0770d1;
            box-shadow: 0 8px 24px rgba(9, 132, 227, 0.3);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: transparent;
            color: var(--accent);
            border: 2px solid var(--accent);
        }

        .btn-secondary:hover {
            background: rgba(9, 132, 227, 0.08);
        }

        .reassurance-message {
            background: rgba(39, 174, 96, 0.08);
            border-left: 4px solid var(--success);
            padding: 1rem;
            border-radius: 8px;
            margin-top: 2rem;
        }

        .reassurance-message p {
            margin: 0;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .reassurance-message strong {
            color: var(--success);
        }

        @media (max-width: 768px) {
            .checkout-main {
                padding: 1rem 0;
            }

            .checkout-card {
                padding: 1.5rem;
                margin-bottom: 1.5rem;
            }

            .progress-steps {
                gap: 0.75rem;
            }

            .progress-line {
                max-width: 50px;
            }

            .step-label {
                display: none;
            }

            .checkout-title {
                font-size: 1.5rem;
            }

            .checkout-subtitle {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>

    <div class="preloader">
        <div class="loader-ripple"><div></div><div></div></div>
    </div>

    <!-- Header -->
    <?= $this->call->view('/partials/header', $data); ?>
    <?php getErrors(); ?>
    <?php getMessage(); ?>

    <main class="checkout-main">
        <div class="checkout-container">

            <!-- Step Progress Indicator -->
            <div class="checkout-progress">
                <div class="progress-steps">
                    <div class="progress-step completed">
                        <div class="step-number"><i class="fas fa-check"></i></div>
                        <div class="step-label">Review</div>
                    </div>
                    <div class="progress-line"></div>
                    <div class="progress-step completed">
                        <div class="step-number"><i class="fas fa-check"></i></div>
                        <div class="step-label">Address</div>
                    </div>
                    <div class="progress-line"></div>
                    <div class="progress-step active">
                        <div class="step-number">3</div>
                        <div class="step-label">Payment</div>
                    </div>
                </div>
            </div>

            <div class="checkout-header">
                <div class="container-fluid">
                    <h1 class="checkout-title">Complete Payment</h1>
                    <p class="checkout-subtitle">Choose your payment method</p>
                </div>
            </div>

            <div class="checkout-content">
                <div class="container-fluid">
                    <div class="row g-4">

                        <!-- Left: Order Summary -->
                        <div class="col-lg-4">
                            <div class="checkout-card">
                                <h3 class="section-title"><i class="fas fa-receipt"></i>Order Summary</h3>
                                <div class="order-summary">
                                    <div class="summary-row">
                                        <span>Subtotal</span>
                                        <span>₱<?= number_format($cartTotal, 2); ?></span>
                                    </div>
                                    <div class="summary-row">
                                        <span>Shipping</span>
                                        <span>₱0.00</span>
                                    </div>
                                    <div class="summary-row">
                                        <span>Tax</span>
                                        <span>₱0.00</span>
                                    </div>
                                    <div class="summary-divider"></div>
                                    <div class="summary-row total-row">
                                        <span>Total</span>
                                        <span class="total-amount">₱<?= number_format($cartTotal, 2); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Payment Options -->
                        <div class="col-lg-8">

<form action="<?= site_url('checkout/place-order'); ?>" method="POST" class="checkout-form">

                                <!-- Payment Method Section -->
                                <div class="checkout-card form-card">
                                    <h3 class="section-title"><i class="fas fa-credit-card"></i>Payment Method</h3>

                                    <div class="payment-options">
                                        <label class="payment-option">
                                            <input type="radio" name="payment_method" value="cod" required>
                                            <div class="payment-box">
                                                <div class="payment-header">
                                                    <i class="fas fa-money-bill-wave"></i>
                                                    <span>Cash on Delivery</span>
                                                </div>
                                                <p class="payment-desc">Pay when your order arrives at your doorstep</p>
                                            </div>
                                        </label>

                                        <label class="payment-option">
                                            <input type="radio" name="payment_method" value="gcash" required>
                                            <div class="payment-box">
                                                <div class="payment-header">
                                                    <i class="fas fa-mobile-alt"></i>
                                                    <span>GCash</span>
                                                </div>
                                                <p class="payment-desc">Fast and secure mobile payment via GCash</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="checkout-actions">
                                    <a href="<?= site_url('checkout/proceed-to-address'); ?>" class="btn btn-secondary btn-checkout">
                                        <i class="fas fa-arrow-left"></i>
                                        <span>Back</span>
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-checkout">
                                        <span>Complete Purchase</span>
                                        <i class="fas fa-check-circle"></i>
                                    </button>
                                </div>

                                <!-- Reassurance Message -->
                                <div class="reassurance-message">
                                    <p><strong>Your information is secure.</strong> We use industry-leading encryption to protect your data.</p>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- footer area -->
    <footer class="footer-area ft-bg">
        <?= $this->call->view('/partials/footer', $data); ?>
    </footer>

    <a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>

    <!-- JS -->
    <script src="<?= base_url() ;?>/public/assets/js/jquery-3.7.1.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ;?>/public/assets/js/main.js"></script>

</body>

</html>
