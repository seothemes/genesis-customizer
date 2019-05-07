<?php
/**
 * Genesis Customizer.
 *
 * This file adds functions that run before setup for Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_action( 'plugins_loaded', __NAMESPACE__ . '\setup_one_click_demo_import', 15 );
/**
 * Sets up One Click Demo Import dependency.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_one_click_demo_import() {

	// Bail if plugin is already installed.
	if ( class_exists( 'OCDI_Plugin' ) ) {
		return;
	}

	// Define constants.
	define( 'PT_OCDI_PATH', plugin_dir_path( dirname( __DIR__ ) ) . 'vendor/proteusthemes/one-click-demo-import/' );
	define( 'PT_OCDI_URL', plugin_dir_url( dirname( __DIR__ ) ) . 'vendor/proteusthemes/one-click-demo-import/' );
	define( 'PT_OCDI_VERSION', '1.0.0' );

	// Initialize class.
	\OCDI\OneClickDemoImport::get_instance();
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\setup_kirki' );
/**
 * Sets up Kirki dependency.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_kirki() {

	// Disable kirki telemetry.
	add_filter( 'kirki_telemetry', '__return_false' );
}

add_action( 'init', __NAMESPACE__ . '\add_textdomain' );
/**
 * Add plugin textdomain.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_textdomain() {
	load_plugin_textdomain(
		_get_handle(),
		false,
		basename( _get_path() ) . '/assets/lang'
	);
}
