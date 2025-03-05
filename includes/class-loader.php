<?php
namespace Carenashville\Bookings;

if (!defined('ABSPATH')) {
    exit;
}

class Loader {
    public function run() {
        // Load necessary hooks and filters
        $this->define_hooks();
    }

    private function define_hooks() {
        // Register hooks and filters here
    }
}