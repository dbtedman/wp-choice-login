<?php

declare(strict_types=1);

$table_prefix = 'wp_';

define("DB_NAME", $_ENV['DB_NAME']);
define("DB_USER", $_ENV['DB_USER']);
define("DB_PASSWORD", $_ENV['DB_PASSWORD']);
define("DB_HOST", $_ENV['DB_HOST']);
define("DB_CHARSET", $_ENV['DB_CHARSET']);
define("DB_COLLATE", $_ENV['DB_COLLATE']);
define("WP_SITEURL", $_ENV['WP_SITEURL']);

const AUTOMATIC_UPDATER_DISABLED = true;
const DISABLE_WP_CRON = true;
const WP_DEBUG = true;
const WP_DEBUG_DISPLAY = false;
const WP_DEBUG_LOG = false;

if (!defined('ABSPATH')) {
    define("ABSPATH", __DIR__ . '/');
}

require_once ABSPATH . 'wp-settings.php';
