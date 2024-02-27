<?php
/**-----------------------------------------------------------------------------
 *
 * Author URI:      https://danieltedman.com
 * Author:          Daniel Tedman
 * Description:     Providing login choices for your WordPress site.
 * Plugin Name:     WordPress Choice Login
 * Plugin URI:      https://github.com/dbtedman/wp-choice-login
 * Text Domain:     wp-choice-login
 * Version:         0.0.0
 *
 *----------------------------------------------------------------------------*/

declare(strict_types=1);

use DBTedman\WPChoiceLogin\Adapter\WordPress\WordPressImpl;
use DBTedman\WPChoiceLogin\WPChoiceLogin;

// Load external PHP modules from composer, this includes the source code for
// this plugin and 3rd party libraries.
include_once(__DIR__ . '/vendor/autoload.php');

$wp = new WordPressImpl();
$plugin = new WPChoiceLogin($wp);
$plugin->bind();
