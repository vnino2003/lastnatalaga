<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
</head>
<body>
    <h2>Hi <?= htmlspecialchars($username) ?>,</h2>
    <p>Thank you for your order! Here are your order details:</p>

    <p><strong>Order ID:</strong> <?= $order_id ?></p>
    <p><strong>Payment Method:</strong> <?= strtoupper($payment_method) ?></p>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartItems as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['name'] ?? 'Product') ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= number_format($item['price'], 2) ?></td>
                    <td><?= number_format($item['price'] * $item['quantity'], 2) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><strong>Total:</strong> <?= number_format($cartTotal, 2) ?></p>

    <p>We will notify you once your order is shipped.</p>
</body>
</html>
