<?php
namespace Carenashville\Bookings;


if (!defined('ABSPATH')) {
    exit;
}

class Loader {
    public function run() {
        // Load Dependencies
        $this->load_dependencies();
    }

    private function load_dependencies() {
        new Activator();
        new Deactivator();
        new Uninstall();
    }
}
