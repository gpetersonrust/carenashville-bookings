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

// Security check: Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
// Use Statements for Cleaner Code
use Carenashville\Bookings\Loader;
use Carenashville\Bookings\Activator;
use Carenashville\Bookings\Deactivator;
use Carenashville\Bookings\Uninstall;

// Define Plugin Constants
define('CARENSHV_BOOKINGS_VERSION', '1.0.1');
define('CARENSHV_BOOKINGS_PATH', plugin_dir_path(__FILE__));
define('CARENSHV_BOOKINGS_URL', plugin_dir_url(__FILE__));

// Load Composer Autoloader
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

require_once CARENSHV_BOOKINGS_PATH . 'includes/class-activator.php';
require_once CARENSHV_BOOKINGS_PATH . 'includes/class-deactivator.php';
require_once CARENSHV_BOOKINGS_PATH . 'includes/class-uninstall.php';
require_once CARENSHV_BOOKINGS_PATH . 'includes/class-loader.php';


// Register Activation, Deactivation, and Uninstall Hooks
// Register Activation, Deactivation, and Uninstall Hooks
register_activation_hook(__FILE__, [Activator::class, 'activate']);
register_deactivation_hook(__FILE__, [Deactivator::class, 'deactivate']);
register_uninstall_hook(__FILE__, [Uninstall::class, 'uninstall']);


// Initialize Plugin
function run_carenashville_bookings() {
    $plugin = new Loader();
    $plugin->run();
}
run_carenashville_bookings();