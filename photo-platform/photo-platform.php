<?php

declare(strict_types=1);

/**
 * Plugin Name: Photo Platform
 * Description: Photo editorial platform
 * Version: 0.1.0
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';
use PhotoPlatform\Infrastructure\WordPress\Plugin;

$plugin = new Plugin();

$plugin->boot();