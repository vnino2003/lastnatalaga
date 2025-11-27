<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * 🔹 Set a one-time message (success, danger, warning, etc.)
 */
if (!function_exists('setMessage')) {
    function setMessage($key, $message)
    {
        $LAVA = lava_instance();
        $LAVA->session->set_flashdata([
            'alert'   => $key,
            'message' => $message
        ]);
    }
}

/**
 * 🔹 Display the message as a popup notification
 */
if (!function_exists('getMessage')) {
    function getMessage()
    {
        $LAVA = lava_instance();
        $alert   = $LAVA->session->flashdata('alert');
        $message = $LAVA->session->flashdata('message');

        if ($alert && $message) {
            echo '
            <div class="custom-toast ' . htmlspecialchars($alert) . '" id="toastMessage">
                <div class="toast-content">
                    <i class="bi ' . ($alert === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill') . ' icon"></i>
                    <span>' . htmlspecialchars($message) . '</span>
                    <button type="button" class="btn-close" id="closeToast"></button>
                </div>
                <div class="toast-progress"></div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const toast = document.getElementById("toastMessage");
                    const closeBtn = document.getElementById("closeToast");
                    setTimeout(() => { toast.classList.add("show"); }, 100);
                    setTimeout(() => { toast.classList.remove("show"); }, 4000);
                    closeBtn.addEventListener("click", () => toast.remove());
                });
            </script>
            ';
        }
    }
}

/**
 * 🔹 Set form validation errors
 */
if (!function_exists('setErrors')) {
    function setErrors($errors)
    {
        if (empty($errors)) return;

        $LAVA = lava_instance();
        $LAVA->session->set_flashdata('errors', $errors);
    }
}

/**
 * 🔹 Display form validation errors as popup toasts
 */
if (!function_exists('getErrors')) {
    function getErrors()
    {
        $LAVA = lava_instance();
        $errors = $LAVA->session->flashdata('errors');

        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo '
                <div class="custom-toast danger" id="toastError">
                    <div class="toast-content">
                        <i class="bi bi-exclamation-triangle-fill icon"></i>
                        <span>' . htmlspecialchars($error) . '</span>
                        <button type="button" class="btn-close" id="closeErrorToast"></button>
                    </div>
                    <div class="toast-progress error-progress"></div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        const toast = document.getElementById("toastError");
                        const closeBtn = document.getElementById("closeErrorToast");
                        setTimeout(() => { toast.classList.add("show"); }, 100);
                        setTimeout(() => { toast.classList.remove("show"); }, 4000);
                        closeBtn.addEventListener("click", () => toast.remove());
                    });
                </script>
                ';
            }
        }
    }
}
?>
