<?php
/**
 * Genesis Customizer
 *
 * Plugin Name:  Genesis Customizer
 * Author:       SEO Themes
 * Version:      0.4.0
 * Text Domain:  genesis-customizer
 * Plugin URI:   https://genesiscustomizer.com/
 * Description:  Core functionality plugin for the Genesis Customizer theme.
 * Author URI:   https://seothemes.com/
 * GitHub URI:   https://genesiscustomizer.com//
 * Domain Path:  /languages
 * License:      GPL-3.0-or-later
 * License URI:  http://www.opensource.org/licenses/gpl-license.php
 * Requires PHP: 5.4
 * Requires WP:  5.1
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

// Check compatibility.
require_once __DIR__ . '/src/bootstrap/compat.php';

// Load helper functions.
require_once __DIR__ . '/src/bootstrap/helpers.php';

// Load plugin files.
require_once __DIR__ . '/src/bootstrap/autoload.php';

// Do plugin setup.
require_once __DIR__ . '/src/bootstrap/setup.php';
