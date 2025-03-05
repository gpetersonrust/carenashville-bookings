<?php
namespace Carenashville\Bookings;
if (!defined('ABSPATH')) {
    exit;
}

class Carenashville_Security {
    public static function sanitize_text($input) {
        return sanitize_text_field($input);
    }

    public static function sanitize_email($input) {
        return sanitize_email($input);
    }

    public static function verify_nonce($nonce, $action) {
        if (!isset($_POST[$nonce]) || !wp_verify_nonce($_POST[$nonce], $action)) {
            wp_die(__('Security check failed', 'carenashville-bookings'));
        }
    }
}
