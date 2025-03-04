<?php
if (!defined('ABSPATH')) {
    exit;
}

class Carenashville_Uninstall {
    public static function uninstall() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'carenashville_bookings';
        $wpdb->query("DROP TABLE IF EXISTS $table_name");

        delete_option('carenashville_settings');
    }
}
