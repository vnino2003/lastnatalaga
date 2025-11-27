<li class="dropdown-cart">
    <a href="<?= site_url('cart');?>" class="shop-cart list-item">
        <div class="list-item-icon">
            <i class="far fa-shopping-bag"></i>
            <span><?= isset($cartItems) ? count($cartItems) : 0; ?></span>
        </div>
        <div class="list-item-info">
            <?php
                $total = 0;
                foreach ($cartItems ?? [] as $item) {
                    $total += $item['price'] * $item['quantity'];
                }
            ?>
            <h6>₱<?= number_format($total, 2); ?></h6>
            <h5>My Cart</h5>
        </div>
    </a>

    <div class="dropdown-cart-menu">
        <div class="dropdown-cart-header">
            <span><?= isset($cartItems) ? count($cartItems) : 0; ?></span>
            <a href="<?= site_url('cart'); ?>">View Cart</a>
        </div>

        <ul class="dropdown-cart-list">
            <?php if (!empty($cartItems)): ?>
                <?php foreach ($cartItems ?? [] as $item): ?>
                    <li>
                        <div class="dropdown-cart-item">
                            <div class="cart-img">
                                <a href="#">
                                    <img src="<?= base_url() . ($item['product_image'] ?? $item['image']); ?>" alt="">
                                </a>
                            </div>
                            <div class="cart-info">
    <h4><?= htmlspecialchars($item['product_name'] ?? $item['name']); ?></h4>
                                <p class="cart-qty">
                                    <?= $item['quantity']; ?>x -
                                    <span class="cart-amount">₱<?= number_format($item['price'], 2); ?></span>
                                </p>
                            </div>
                            <a href="<?= site_url('/remove-item/' . ($item['cart_id'] ?? $item['product_id'])); ?>" class="cart-remove">
                                <i class="far fa-times-circle"></i>
                            </a>
                        </div>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <li><p class="text-center p-2">No items in cart</p></li>
            <?php endif; ?>
        </ul>

        <div class="dropdown-cart-bottom">
            <div class="dropdown-cart-total">
                <span>Total</span>
                <span class="total-amount">₱<?= number_format($total, 2); ?></span>
            </div>
            <a href="<?= site_url('checkout'); ?>" class="theme-btn">Checkout</a>
        </div>
    </div>
</li>
