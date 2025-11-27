<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Payment</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #007AFF 0%, #0051BA 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 420px;
        }

        .payment-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            padding: 32px 24px;
            animation: slideUp 0.4s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            text-align: center;
            margin-bottom: 28px;
        }

        .gcash-logo {
            font-size: 14px;
            font-weight: 600;
            color: #007AFF;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        h2 {
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .subtitle {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }

        .order-info {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            border: 1px solid #e9ecef;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 14px;
            font-size: 14px;
        }

        .info-row:last-child {
            margin-bottom: 0;
            padding-top: 14px;
            border-top: 1px solid #dee2e6;
        }

        .info-label {
            color: #666;
            font-weight: 500;
        }

        .info-value {
            color: #1a1a1a;
            font-weight: 600;
        }

        .amount-display {
            background: white;
            border: 2px solid #007AFF;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
            text-align: center;
        }

        .amount-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .amount-value {
            font-size: 36px;
            font-weight: 700;
            color: #007AFF;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .amount-currency {
            font-size: 24px;
            margin-right: 4px;
        }

        .notice {
            background: #e3f2fd;
            border-left: 4px solid #007AFF;
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            font-size: 12px;
            color: #0051BA;
            line-height: 1.5;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .payment-button {
            background: linear-gradient(135deg, #007AFF 0%, #0051BA 100%);
            border: none;
            border-radius: 12px;
            padding: 16px;
            font-size: 16px;
            font-weight: 700;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 122, 255, 0.3);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .payment-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 122, 255, 0.4);
        }

        .payment-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(0, 122, 255, 0.3);
        }

        .security-info {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #999;
            gap: 6px;
        }

        .security-icon {
            width: 16px;
            height: 16px;
            background: #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            color: #666;
        }

        input[type="hidden"] {
            display: none;
        }

        @media (max-width: 480px) {
            .payment-card {
                padding: 24px 16px;
            }

            h2 {
                font-size: 20px;
            }

            .amount-value {
                font-size: 32px;
            }

            .amount-currency {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="payment-card">
            <div class="header">
                <div class="gcash-logo">💳 GCASH</div>
                <h2>Confirm Payment</h2>
                <p class="subtitle">Review your order details before completing payment</p>
            </div>

            <div class="order-info">
              <div class="info-row">
    <span class="info-label">Order Status</span>
    <span class="info-value">Pending Creation</span>
</div>
<div class="info-row">
    <span class="info-label">Payment Method</span>
    <span class="info-value">GCash Sandbox</span>
</div>
<div class="info-row">
    <span class="info-label">Amount to Pay</span>
    <span class="info-value">₱<?= number_format($cartTotal, 2); ?></span>
</div>

            </div>

            <div class="amount-display">
                <div class="amount-label">Total Amount</div>
              <div class="amount-value">
    <span class="amount-currency">₱</span><?= number_format($cartTotal, 2); ?>
</div>

            </div>

            <div class="notice">
                ✓ This is a sandbox payment environment for testing purposes only
            </div>

<button class="payment-button" 
        onclick="window.location.href='<?= site_url('gcash/process'); ?>'">
    Complete Payment
</button>


        </div>
    </div>
</body>
</html>