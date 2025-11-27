

<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Helper: message_helper.php
 * 
 * Automatically generated via CLI.
 */

if (!function_exists('getMessage')) {
    function getMessage()
    {
        $LAVA =& lava_instance();
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
                    setTimeout(() => { toast.classList.add("show"); }, 100); // pop-up animation
                    setTimeout(() => { toast.classList.remove("show"); }, 4000); // auto hide
                    closeBtn.addEventListener("click", () => toast.remove());
                });
            </script>
            ';
        }
    }
}


