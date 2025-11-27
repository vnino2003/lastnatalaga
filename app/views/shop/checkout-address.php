<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Checkout - Delivery Address">
    <meta name="keywords" content="">

    <title>Checkout - Delivery Address</title>

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

        .form-divider {
            text-align: center;
            margin: 1.5rem 0;
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-secondary);
            position: relative;
        }

        .form-divider::before,
        .form-divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 40%;
            height: 1px;
            background: var(--neutral-border);
        }

        .form-divider::before {
            left: 0;
        }

        .form-divider::after {
            right: 0;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .form-col {
            display: flex;
            flex-direction: column;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .required {
            color: var(--warning);
        }

        .form-control {
            padding: 0.75rem;
            border: 1px solid var(--neutral-border);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: all var(--transition);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(9, 132, 227, 0.1);
        }

        .form-select {
            padding: 0.75rem;
            border: 1px solid var(--neutral-border);
            border-radius: 8px;
            background-color: var(--white);
            font-size: 0.95rem;
            cursor: pointer;
            transition: all var(--transition);
        }

        .form-select:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(9, 132, 227, 0.1);
        }

        .address-select {
            width: 100%;
        }

        .new-address-form {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease-out;
        }

        .new-address-form.active {
            max-height: 1200px;
            overflow: visible;
            margin-top: 1rem;
        }

        .checkout-actions {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--neutral-border);
            display: flex;
            gap: 1rem;
        }

        .btn-checkout {
            flex: 1;
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

            .form-row {
                grid-template-columns: 1fr;
            }

            .checkout-actions {
                flex-direction: column;
            }

            .btn-checkout {
                width: 100%;
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
                    <div class="progress-step active">
                        <div class="step-number">2</div>
                        <div class="step-label">Address</div>
                    </div>
                    <div class="progress-line"></div>
                    <div class="progress-step">
                        <div class="step-number">3</div>
                        <div class="step-label">Payment</div>
                    </div>
                </div>
            </div>

            <div class="checkout-header">
                <div class="container-fluid">
                    <h1 class="checkout-title">Delivery Address</h1>
                    <p class="checkout-subtitle">Where should we deliver your order?</p>
                </div>
            </div>

            <div class="checkout-content">
                <div class="container-fluid">
                    <div class="row g-4">

                        <!-- Center: Address Form -->
                        <div class="col-lg-8 offset-lg-2">

                            <form action="<?= site_url('checkout/proceed-payment'); ?>" method="POST" class="checkout-form">

                                <!-- Delivery Address Section -->
                                <div class="checkout-card form-card">
                                    <h3 class="section-title"><i class="fas fa-map-marker-alt"></i>Delivery Address</h3>

                                    <div class="address-selection">
                                        <label class="form-label">Use Saved Address</label>
                                        <select name="saved_address" class="form-select address-select" id="savedAddressSelect">
                                            <option value="">-- Add New Address --</option>
                                            <?php if (!empty($savedAddresses)): ?>
                                                <?php foreach ($savedAddresses as $addr): ?>
                                                    <option value="<?= $addr['id']; ?>">
                                                        <?= htmlspecialchars($addr['first_name'] . ' ' . $addr['last_name'] . ' • ' . $addr['city']); ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </select>
                                    </div>

                                    <!-- New Address Form -->
                                    <div class="new-address-form" id="newAddressForm">
                                        <div class="form-divider">
                                            <span>Add New Address</span>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-col">
                                                <label class="form-label">First Name <span class="required">*</span></label>
                                                <input type="text" name="first_name" class="form-control" placeholder="John">
                                            </div>
                                            <div class="form-col">
                                                <label class="form-label">Last Name <span class="required">*</span></label>
                                                <input type="text" name="last_name" class="form-control" placeholder="Doe">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-col">
                                                <label class="form-label">Email <span class="required">*</span></label>
                                                <input type="email" name="email" class="form-control" placeholder="john@example.com">
                                            </div>
                                            <div class="form-col">
                                                <label class="form-label">Phone <span class="required">*</span></label>
                                                <input type="tel" name="phone" class="form-control" placeholder="+63 9XX XXX XXXX">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-col">
                                                <label class="form-label">Street Address <span class="required">*</span></label>
                                                <input type="text" name="address_line1" class="form-control" placeholder="123 Main Street">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-col">
                                                <label class="form-label">Apartment, suite, etc. (optional)</label>
                                                <input type="text" name="address_line2" class="form-control" placeholder="Apt 4B">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-col">
                                                <label class="form-label">City <span class="required">*</span></label>
                                                <input type="text" name="city" class="form-control" placeholder="Manila">
                                            </div>
                                            <div class="form-col">
                                                <label class="form-label">Province <span class="required">*</span></label>
                                                <input type="text" name="province" class="form-control" placeholder="Metro Manila">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-col">
                                                <label class="form-label">Postal Code <span class="required">*</span></label>
                                                <input type="text" name="postal_code" class="form-control" placeholder="1200">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="checkout-actions">
                                    <a href="<?= site_url('checkout'); ?>" class="btn btn-secondary btn-checkout">
                                        <i class="fas fa-arrow-left"></i>
                                        <span>Back</span>
                                    </a>
                                   <button type="submit" class="btn btn-primary btn-checkout">
    <span>Continue to Payment</span>
    <i class="fas fa-arrow-right"></i>
</button>

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
    <script>
    $(document).ready(function() {
        $('#savedAddressSelect').change(function() {
            if($(this).val() === '') {
                $('#newAddressForm').addClass('active');
            } else {
                $('#newAddressForm').removeClass('active');
            }
        });
    });
    </script>

</body>

</html>
