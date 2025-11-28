<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

if (!function_exists('sendMail')) {
    /**
     * Send email using PHPMailer
     * 
     * @param string $to Recipient email
     * @param string $name Recipient name
     * @param string $subject Email subject
     * @param string $view Path to the view template for email body
     * @param array $data Data to pass to the view
     * @return array ['status' => bool, 'message' => string]
     */
    function sendMail($to, $name, $subject, $view, $data = [])
    {
        try {
            $mail = new PHPMailer(true);

            //Server settings
     $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'vincent.edu.mail@gmail.com';
            $mail->Password = 'fatb fxus yswm kkgk';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('vincent.edu.mail@gmail.com','mocart');
            $mail->addAddress($to, $name);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;

            // Load view template for email body
            $body = '';
            if (file_exists(__DIR__ . '/../views' . $view . '.php')) {
                ob_start();
                extract($data);
                include __DIR__ . '/../views' . $view . '.php';
                $body = ob_get_clean();
            } else {
                $body = "Hello {$name}, this is a test email.";
            }

            $mail->Body = $body;

            $mail->send();

            return ['status' => true, 'message' => 'Email sent successfully'];
        } catch (Exception $e) {
            return ['status' => false, 'message' => $mail->ErrorInfo];
        }
    }
}
