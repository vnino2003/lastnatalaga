<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

if (!function_exists('is_active')) {
    /**
     * Check if the current uri matches the given segment
     */
    function is_active($segment)
    {
        $current_uri = uri_string(); // example: "about", "contact", "shop-grid/3"

        // Exact match
        if ($current_uri === $segment) {
            return 'active';
        }

        // Match starts with segment (for dynamic pages like shop-grid/1)
        if (strpos($current_uri, $segment) === 0) {
            return 'active';
        }

        return '';
    }
}

if (!function_exists('active_exact')) {
    /**
     * Require exact match only
     */
    function active_exact($segment)
    {
        return (uri_string() === $segment) ? 'active' : '';
    }
}
