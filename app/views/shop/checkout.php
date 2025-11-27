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

        <!-- css -->
        <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/all-fontawesome.min.css">
        <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/animate.min.css">
        <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/magnific-popup.min.css">
        <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/jquery-ui.min.css">
        <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/nice-select.min.css">
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-NG618JX0N8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NG618JX0N8');
</script>
        <link rel="stylesheet" href="<?= base_url() ;?>/public/assets/css/style.css">
        <style>
            /* Enhanced Checkout UI Styles */
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

/* Main Checkout Container */
.checkout-main {
  background: linear-gradient(135deg, #f5f6fa 0%, #ffffff 100%);
  min-height: 100vh;
  padding: 2rem 0;
}

.checkout-container {
  max-width: 1400px;
  margin: 0 auto;
}

/* Progress Indicator */
.checkout-progress {
  margin-bottom: 3rem;
  animation: slideDown 0.6s ease-out;
}

@keyframes slideDown {
  from {
    opacity: 0;
    transform: translateY(-20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
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

/* Checkout Header */
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
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Card Styles */
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

.card-header-custom {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.5rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid var(--neutral-border);
}

.card-title {
  font-size: 1.25rem;
  font-weight: 700;
  color: var(--text-primary);
  margin: 0;
}

.btn-expand {
  background: none;
  border: none;
  font-size: 1rem;
  color: var(--accent);
  cursor: pointer;
  padding: 0.5rem;
  transition: transform var(--transition);
}

.btn-expand:hover {
  transform: scale(1.1);
}

.btn-expand.collapsed {
  transform: rotate(180deg);
}

/* Cart Review Section */
.cart-review {
  max-height: 600px;
  overflow-y: auto;
  animation: expandIn 0.4s ease-out;
}

@keyframes expandIn {
  from {
    opacity: 0;
    max-height: 0;
  }
  to {
    opacity: 1;
    max-height: 600px;
  }
}

.cart-items-list {
  margin-bottom: 1.5rem;
}

.hesitation-zone {
  padding: 1rem;
  margin-bottom: 0.75rem;
  background: var(--neutral-bg);
  border-radius: 8px;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  transition: all var(--transition);
}

.hesitation-zone:hover {
  background: var(--accent-light);
  background: rgba(9, 132, 227, 0.08);
  transform: translateX(4px);
}

.item-details {
  flex: 1;
}

.item-name {
  font-weight: 600;
  color: var(--text-primary);
  margin: 0 0 0.5rem 0;
  font-size: 0.95rem;
}

.item-meta {
  font-size: 0.85rem;
  color: var(--text-secondary);
  margin: 0;
}

.qty-badge {
  background: var(--accent);
  color: var(--white);
  padding: 0.25rem 0.5rem;
  border-radius: 4px;
  font-weight: 600;
}

.item-price {
  text-align: right;
  min-width: 100px;
}

.price-amount {
  font-weight: 700;
  font-size: 1rem;
  color: var(--text-primary);
  margin: 0;
}

.unit-price {
  font-size: 0.8rem;
  margin: 0.25rem 0 0 0;
}

/* Order Summary */
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

.shipping-badge,
.tax-badge {
  font-size: 0.8rem;
  background: var(--warning);
  background: rgba(243, 156, 18, 0.1);
  color: var(--warning);
  padding: 0.25rem 0.5rem;
  border-radius: 4px;
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

/* Trust Signals */
.trust-signals {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 1rem;
  padding-top: 1.5rem;
  border-top: 1px solid var(--neutral-border);
  text-align: center;
}

.trust-item {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 0.5rem;
  font-size: 0.85rem;
  color: var(--text-secondary);
}

.trust-item i {
  font-size: 1.5rem;
  color: var(--success);
}

/* Form Styles */
.form-card {
  margin-bottom: 2rem;
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

/* Payment Options */
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

/* Action Buttons */
.checkout-actions {
  margin-top: 2rem;
  padding-top: 2rem;
  border-top: 1px solid var(--neutral-border);
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

.btn-primary:active {
  transform: translateY(0);
}

.btn-secondary {
  background: transparent;
  color: var(--accent);
  border: 2px solid var(--accent);
}

.btn-secondary:hover {
  background: rgba(9, 132, 227, 0.08);
}

.btn-lg {
  padding: 1rem;
}

.alternative-text {
  text-align: center;
  color: var(--text-secondary);
  margin: 1rem 0;
  font-size: 0.9rem;
}

.btn-back-to-shopping {
  display: block;
  text-align: center;
  color: var(--accent);
  text-decoration: none;
  font-weight: 600;
  margin-top: 1rem;
  padding: 0.5rem;
  transition: all var(--transition);
}

.btn-back-to-shopping:hover {
  color: #0770d1;
  transform: translateX(-4px);
}

/* Reassurance Message */
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

/* Hide new address form initially */
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

/* Responsive Design */
@media (max-width: 1024px) {
  .checkout-title {
    font-size: 2rem;
  }

  .trust-signals {
    grid-template-columns: 1fr;
  }
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

  .cart-items-list {
    margin-bottom: 1rem;
  }
}

/* Animations */
@keyframes pulse {
  0%, 100% {
    opacity: 1;
  }
  50% {
    opacity: 0.8;
  }
}

.hesitation-zone {
  animation: slideInLeft 0.5s ease-out;
}

@keyframes slideInLeft {
  from {
    opacity: 0;
    transform: translateX(-20px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}

        </style>
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

  
    <main class="checkout-main">
        <div class="checkout-container">
            
            <!-- Step Progress Indicator -->
            <div class="checkout-progress">
                <div class="progress-steps">
                    <div class="progress-step active">
                        <div class="step-number">1</div>
                        <div class="step-label">Review</div>
                    </div>
                    <div class="progress-line"></div>
                    <div class="progress-step">
                        <div class="step-number">2</div>
                        <div class="step-label">Deliver</div>
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
                    <h1 class="checkout-title">Confirm Your Order</h1>
                    <p class="checkout-subtitle">Take your time. We're here to help.</p>
                </div>
            </div>

            <div class="checkout-content">
                <div class="container-fluid">
                    <div class="row g-4">
                        
                        <!-- Left: Cart Review & Details -->
                        <div class="col-lg-6">
                            
                            <!-- Order Review Card with expandable items -->
                            <div class="checkout-card review-card">
                                <div class="card-header-custom">
                                    <h3 class="card-title">Your Order</h3>
                                    <button type="button" class="btn-expand" id="expandCart" data-expanded="true">
                                        <i class="fas fa-chevron-up"></i>
                                    </button>
                                </div>

                                <div class="cart-review" id="cartReview">
                                    <div class="cart-items-list">
                                        <?php foreach($cartItems as $item): ?>
                                            <div class="cart-item-row hesitation-zone">
                                                <div class="item-details">
                                                    <p class="item-name"><?= htmlspecialchars($item['product_name']); ?></p>
                                                    <p class="item-meta">Qty: <span class="qty-badge"><?= $item['quantity']; ?></span></p>
                                                </div>
                                                <div class="item-price">
                                                    <p class="price-amount">₱<?= number_format($item['price'] * $item['quantity'], 2); ?></p>
                                                    <p class="unit-price text-muted">@ ₱<?= number_format($item['price'], 2); ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <!-- Order Summary with visual breakdown -->
                                    <div class="order-summary">
                                        <div class="summary-row">
                                            <span>Subtotal</span>
                                            <span>₱<?= number_format($cartTotal, 2); ?></span>
                                        </div>
                                        <div class="summary-row">
                                            <span>Shipping</span>
                                            <span class="shipping-badge">To be calculated</span>
                                        </div>
                                        <div class="summary-row">
                                            <span>Tax</span>
                                            <span class="tax-badge">To be calculated</span>
                                        </div>
                                        <div class="summary-divider"></div>
                                        <div class="summary-row total-row">
                                            <span>Estimated Total</span>
                                            <span class="total-amount">₱<?= number_format($cartTotal, 2); ?></span>
                                        </div>
                                    </div>

                                    <!-- Trust Signals -->
                                    <div class="trust-signals">
                                        <div class="trust-item">
                                            <i class="fas fa-lock"></i>
                                            <span>Secure checkout</span>
                                        </div>
                                        <div class="trust-item">
                                            <i class="fas fa-undo"></i>
                                            <span>30-day returns</span>
                                        </div>
                                        <div class="trust-item">
                                            <i class="fas fa-truck"></i>
                                            <span>Free shipping over ₱500</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right: Checkout Form -->
                        <div class="col-lg-6">
                            <form action="<?= site_url('process-checkout'); ?>" method="POST" class="checkout-form">
                                
                                <!-- Delivery Address Section with better UX -->
                                <div class="checkout-card form-card">
                                    <h3 class="section-title">Delivery Address</h3>
                                    
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

                                    <!-- New Address Form with better visual layout -->
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

                                <!-- Payment Method Section with hesitation-friendly design -->
                                <div class="checkout-card form-card">
                                    <h3 class="section-title">Payment Method</h3>
                                    
                                    <div class="payment-options">
                                        <label class="payment-option">
                                            <input type="radio" name="payment_method" value="cod" required>
                                            <div class="payment-box">
                                                <div class="payment-header">
                                                    <i class="fas fa-money-bill-wave"></i>
                                                    <span>Cash on Delivery</span>
                                                </div>
                                                <p class="payment-desc">Pay when your order arrives</p>
                                            </div>
                                        </label>

                                        <label class="payment-option">
                                            <input type="radio" name="payment_method" value="gcash" required>
                                            <div class="payment-box">
                                                <div class="payment-header">
                                                    <i class="fas fa-mobile-alt"></i>
                                                    <span>GCash</span>
                                                </div>
                                                <p class="payment-desc">Fast and secure mobile payment</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <!-- Action Buttons with clear hierarchy -->
                                <div class="checkout-actions">
                                    <button type="submit" id="placeOrder" class="btn btn-primary btn-lg btn-checkout">
                                        <span>Complete Purchase</span>
                                        <i class="fas fa-arrow-right"></i>
                                    </button>

                                    <p class="alternative-text">or</p>

                                    <button type="button" id="payWithGcash" class="btn btn-secondary btn-lg btn-checkout">
                                        <span>Pay with GCash Now</span>
                                        <i class="fas fa-mobile-alt"></i>
                                    </button>

                                    <a href="<?= site_url('shop'); ?>" class="btn-back-to-shopping">
                                        ← Back to shopping
                                    </a>
                                </div>

                                <!-- Reassurance Message -->
                                <div class="reassurance-message">
                                    <p><strong>Questions?</strong> Our support team is available 24/7 to help you complete your order.</p>
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
 <script src="<?= base_url() ;?>/public/assets/js/checkout-enhanced.js"></script>

    </body>


    <!-- Mirrored from live.themewild.com/mocart/shop-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 19 Oct 2025 06:19:38 GMT -->
    </html>