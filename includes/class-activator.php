<?php
if (!defined('ABSPATH')) {
    exit; // Prevent direct file access
}

class  Activator {
    /**
     * Runs on plugin activation
     * - Creates required database tables
     * - Ensures necessary files exist
     */
    public static function activate() {
        self::create_database_table();
        self::create_files();
    }

    /**
     * Creates the database table for appointments
     */
    private static function create_database_table() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'carenashville_bookings';
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id INT AUTO_INCREMENT PRIMARY KEY,
            doctor_id INT NOT NULL,
            patient_id INT NOT NULL,
            appointment_date DATETIME NOT NULL,
            status VARCHAR(50) NOT NULL DEFAULT 'pending'
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

    /**
     * Creates required plugin files if they don’t exist
     */
    private static function create_files() {
        $files = [
            'class-cpt.php'        => "<?php\n// Handles Custom Post Type registration\n",
            'class-taxonomy.php'   => "<?php\n// Handles Taxonomy registration\n",
            'class-plugin.php'     => "<?php\n// Main Plugin Loader\n",
            'class-activator.php'  => "<?php\n// Handles plugin activation\n",
            'class-deactivator.php'=> "<?php\n// Handles plugin deactivation\n",
            'class-uninstall.php'  => "<?php\n// Handles plugin uninstallation\n",
        ];

        $dir = plugin_dir_path(__FILE__) . 'includes/';

        // Ensure 'includes' directory exists
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }

        // Loop through files and create them if missing
        foreach ($files as $filename => $content) {
            $filepath = $dir . $filename;
            if (!file_exists($filepath)) {
                file_put_contents($filepath, $content);
            }
        }
    }
}
