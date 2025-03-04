<?php
if (!defined('ABSPATH')) {
    exit;
}

class Carenashville_Activator {
    public static function activate() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'carenashville_bookings';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id INT AUTO_INCREMENT PRIMARY KEY,
            doctor_id INT NOT NULL,
            patient_name VARCHAR(255) NOT NULL,
            appointment_date DATETIME NOT NULL,
            status VARCHAR(50) NOT NULL DEFAULT 'pending'
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }
}
