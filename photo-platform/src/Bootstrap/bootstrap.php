<?php
declare(strict_types=1);

use PhotoPlatform\Infrastructure\WordPress\Plugin;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$plugin = new Plugin();
$plugin->boot();
