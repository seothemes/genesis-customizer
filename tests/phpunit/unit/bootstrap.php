<?php
/**
 * Bootstraps the Genesis Customizer Unit Tests.
 *
 * @package GenesisCustomizer\Plugin
 * @since   1.0.0
 * @link    https://genesiscustomizer.com
 * @license GPL-3.0-or-later
 */

if ( version_compare( phpversion(), '5.6.0', '<' ) ) {
	trigger_error( 'Genesis Customizer Unit Tests require PHP 5.6 or higher.', E_USER_ERROR ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- Valid use case for our testing suite.
}

define( 'GENESIS_CUSTOMIZER_TESTS_DIR', __DIR__ );
define( 'GENESIS_CUSTOMIZER_THEME_DIR', dirname( dirname( dirname( __DIR__ ) ) ) . DIRECTORY_SEPARATOR );
define( 'GENESIS_CUSTOMIZER_TESTS_LIB_DIR', GENESIS_CUSTOMIZER_THEME_DIR . 'lib' . DIRECTORY_SEPARATOR );

// Let's define ABSPATH as it is in WordPress, i.e. relative to the filesystem's WordPress root path.
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( dirname( dirname( GENESIS_CUSTOMIZER_THEME_DIR ) ) ) . '/' ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedConstantFound -- Valid use case for our testing suite.
}

// Time to load Composer's autoloader.
$genesis_customizer_autoload_path = GENESIS_CUSTOMIZER_THEME_DIR . 'vendor/';

if ( ! file_exists( $genesis_customizer_autoload_path . 'autoload.php' ) ) {
	trigger_error( 'Whoops, we need Composer before we start running tests.  Please type: `composer install`.  When done, try running `phpunit` again.', E_USER_ERROR ); // phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_trigger_error -- Valid use case for our testing suite.
}
require_once $genesis_customizer_autoload_path . 'autoload.php';
unset( $genesis_customizer_autoload_path );

require_once GENESIS_CUSTOMIZER_TESTS_DIR . '/class-test-case.php';
