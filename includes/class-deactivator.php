<?php
if (!defined('ABSPATH')) {
    exit;
}

class Carenashville_Deactivator {
    public static function deactivate() {
        delete_option('carenashville_settings');
    }
}
