<?php
/**
 * Plugin Name: Carenashville Bookings
 * Plugin URI: https://carenashville.com
 * Description: A WordPress booking system for managing doctor appointments.
 * Version: 1.0.1
 * Author: Your Name
 * Author URI: https://yourwebsite.com
 * License: GPL v2 or later
 * Text Domain: carenashville-bookings
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit; // Prevent direct file access
}

// Define Plugin Constants
define('CARENSHV_BOOKINGS_VERSION', '1.0.1');
define('CARENSHV_BOOKINGS_PATH', plugin_dir_path(__FILE__));
define('CARENSHV_BOOKINGS_URL', plugin_dir_url(__FILE__));

// Autoload Classes
spl_autoload_register(function ($class) {
    $prefix = 'Carenashville\\Bookings\\';
    $base_dir = __DIR__ . '/includes/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . 'class-' . strtolower(str_replace('_', '-', $relative_class)) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Initialize Plugin
function run_carenashville_bookings() {
    $plugin = new Carenashville\Bookings\Loader();
    $plugin->run();
}
run_carenashville_bookings();

// Register Activation, Deactivation, and Uninstall Hooks
register_activation_hook(__FILE__, ['Carenashville\Bookings\Activator', 'activate']);
register_deactivation_hook(__FILE__, ['Carenashville\Bookings\Deactivator', 'deactivate']);
register_uninstall_hook(__FILE__, ['Carenashville\Bookings\Uninstall', 'uninstall']);
