<?php
namespace Carenashville\Bookings;
if (!defined('ABSPATH')) {
    exit;
}

class  Deactivator {
    public static function deactivate() {
        delete_option('carenashville_settings');
    }
}
