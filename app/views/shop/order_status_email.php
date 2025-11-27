<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Order Status Update</title>
    <style>
        /* CSS for better email compatibility and MoCart theme */
        body {
            margin: 0;
            padding: 0;
            background-color: #F3F4F6; /* Modern Light Grey */
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            -webkit-font-smoothing: antialiased;
            color: #1F2937;
        }
        table {
            border-spacing: 0;
            width: 100%;
        }
        td {
            padding: 0;
        }
        p {
            font-size: 16px;
            line-height: 1.6;
            color: #4B5563; /* Soft grey text */
            margin: 0 0 16px 0;
        }
        h2 {
            font-size: 24px;
            font-weight: 800;
            margin: 0 0 16px 0;
            color: #111827;
            letter-spacing: -0.5px;
        }
        /* MAIN CONTAINER */
        .main-content {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 540px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }
        /* BUTTON STYLE (matching MoCart's pill button) */
        .btn {
            background-color: #2563EB; /* Modern Vibrant Blue */
            color: #ffffff !important;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            padding: 16px 48px;
            border-radius: 50px; /* Pill shape */
            display: inline-block;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
        }
    </style>
</head>
<body>

    <table width="100%" cellpadding="0" cellspacing="0" style="table-layout: fixed; background-color: #F3F4F6; padding-bottom: 60px;">
        <tr>
            <td align="center" style="padding: 40px 0;">
                
                <table class="main-content" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="padding: 32px 40px 10px 40px; text-align:center;">
                            <h2>Order Status Update</h2>
                            <hr style="border: none; border-top: 1px solid #F3F4F6; margin: 10px 0;">
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 0 40px;">
                            <p>
                                Hi <strong><?= htmlspecialchars($username) ?></strong>,
                                <br><br>
                                We’re notifying you that your order's status has been updated:
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 15px 40px 25px 40px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="text-align:center; background-color:#EFF6FF; border-radius: 8px; padding: 20px;">
                                <tr>
                                    <td style="padding-bottom: 10px;">
                                        <h3 style="color:#2563EB; margin:0; font-size:18px; font-weight: 700;">
                                            Order #<?= $order_id ?>
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="
                                            display: inline-block;
                                            background-color: #ECFDF5; /* Very Light Green Background */
                                            color: #059669; /* Stronger Green Text (Success/Shipped) */
                                            font-size: 14px;
                                            font-weight: 700;
                                            padding: 6px 14px;
                                            border-radius: 50px;
                                            text-transform: uppercase;
                                            letter-spacing: 0.5px;
                                        ">
                                            <?= ucfirst($status) ?>
                                        </span>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 0 40px;">
                            <p>
                                <?= $message ?>
                                <br><br>
                                We will continue to update you as your order progresses.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 30px 40px; text-align:center;">
                            <a href="<?= site_url('order/'.$order_id) ?>" class="btn">
                                View Order Details
                            </a>
                        </td>
                    </tr>

                </table>
                
                <div style="text-align: center; padding-top: 32px;">
                    <p style="font-size: 12px; color: #9CA3AF; margin-bottom: 8px;">
                        This is an automated message, please do not reply.
                    </p>
                    <p style="font-size: 12px; color: #9CA3AF;">
                        © 2025 MOCART Inc.
                    </p>
                </div>

            </td>
        </tr>
    </table>

</body>
</html>