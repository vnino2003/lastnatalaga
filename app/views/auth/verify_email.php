<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email - MoCart</title>
    <style>
        /* RESET & BASICS */
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

        img {
            border: 0;
        }

        /* CONTAINER */
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #F3F4F6;
            padding-bottom: 60px;
        }

        .main-content {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 540px;
            border-radius: 12px; /* Softer rounded corners */
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05); /* Very subtle, expensive-looking shadow */
        }

        /* LOGO AREA */
        .logo-container {
            text-align: center;
            padding: 32px 0 20px 0;
        }

        .logo-img {
            height: 36px; /* Sleeker size */
            width: auto;
        }

        /* ICON AREA */
        .hero-icon {
            background-color: #EFF6FF; /* Light Blue circle */
            color: #2563EB; /* Brand Blue */
            width: 64px;
            height: 64px;
            border-radius: 50%;
            margin: 0 auto 24px auto;
            text-align: center;
            line-height: 64px;
            font-size: 28px;
        }

        /* CONTENT */
        .text-content {
            padding: 0 40px 40px 40px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            font-weight: 800;
            margin: 0 0 16px 0;
            color: #111827;
            letter-spacing: -0.5px;
        }

        p {
            font-size: 16px;
            line-height: 1.6;
            color: #4B5563; /* Soft grey text is more modern than black */
            margin: 0 0 24px 0;
        }

        /* BUTTON */
        .btn-container {
            margin: 32px 0;
        }

        .btn {
            background-color: #2563EB; /* Modern Vibrant Blue */
            color: #ffffff !important;
            text-decoration: none;
            font-weight: 600;
            font-size: 16px;
            padding: 16px 48px;
            border-radius: 50px; /* Pill shape - very trendy */
            display: inline-block;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
            transition: all 0.2s;
        }

        .btn:hover {
            background-color: #1D4ED8;
            box-shadow: 0 6px 16px rgba(37, 99, 235, 0.3);
        }

        /* SECONDARY / FALLBACK */
        .fallback-text {
            font-size: 13px;
            color: #9CA3AF;
            margin-bottom: 10px;
        }

        .link-raw {
            color: #2563EB;
            font-size: 13px;
            word-break: break-all;
            text-decoration: none;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            padding-top: 32px;
        }

        .footer-text {
            font-size: 12px;
            color: #9CA3AF;
            margin-bottom: 8px;
        }

        .footer a {
            color: #6B7280;
            text-decoration: underline;
        }

        /* RESPONSIVE */
        @media screen and (max-width: 600px) {
            .main-content {
                width: 100% !important;
                border-radius: 0 !important;
            }
            .text-content {
                padding: 0 24px 40px 24px !important;
            }
            .btn {
                display: block;
                width: auto;
            }
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <div style="height: 40px;"></div>

        <div class="main-content">
            
            <div class="logo-container">
                 <img src="<?= BASE_URL ;?>/public/assets/img/logo/logo.png" alt="MoCart" class="logo-img">
            </div>

            <div class="text-content">
                <div class="hero-icon">
                    ✉️
                </div>

                <h1>Verify your email</h1>

                <p>
                    Hi <strong><?= htmlspecialchars($first_name) ?></strong>,<br>
                    You're almost ready to start shopping! Please verify your email address to activate your MoCart account.
                </p>

                <div class="btn-container">
                    <a href="<?= $verificationLink ?>" class="btn">Verify Email Address</a>
                </div>

                <p style="font-size: 13px; color: #6B7280; margin-top: 0;">
                    This link will expire in 24 hours. If you didn't sign up for MoCart, you can safely ignore this email.
                </p>

                <hr style="border: none; border-top: 1px solid #F3F4F6; margin: 30px 0;">

                <div style="text-align: left;">
                    <p class="fallback-text">Button not working? Paste this link into your browser:</p>
                    <a href="<?= $verificationLink ?>" class="link-raw"><?= $verificationLink ?></a>
                </div>
            </div>
        </div>

        <div class="footer">
            <p class="footer-text">© 2025 MoCart Inc. All rights reserved.</p>
            <p class="footer-text">
                <a href="#">Help Center</a> • <a href="#">Privacy Policy</a>
            </p>
        </div>
    </div>

</body>
</html>