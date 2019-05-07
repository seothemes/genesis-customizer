<?php
/**
 * Genesis Customizer.
 *
 * This file checks for plugin compatibility before loading Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_action( 'plugins_loaded', __NAMESPACE__ . '\compat' );
/**
 * Check compatibility.
 *
 * @since 1.0.0
 *
 * @return void
 */
function compat() {
	if ( ! is_compatible() ) {
		if ( ! function_exists( 'deactivate_plugins' ) ) {
			require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		}

		deactivate_plugins( plugin_dir_path( dirname( __DIR__ ) ) . 'genesis-customizer.php' );
	}
}

add_action( 'admin_notices', __NAMESPACE__ . '\deactivation_notice' );
/**
 * Display deactivation notice.
 *
 * @since 1.0.0
 *
 * @return string
 */
function deactivation_notice() {
	if ( ! is_compatible() ) {
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}

		return printf(
			'<div class="notice notice-error"><p><b>%s</b> %s</p></div>',
			esc_html( _get_name() ),
			esc_html__( 'requires the Genesis Framework parent theme to run and has been deactivated.', 'genesis-customizer' )
		);

	} else {
		return '';
	}
}

/**
 * Check if plugin is compatible.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function is_compatible() {
	$parent_theme = wp_get_theme()->parent();

	return $parent_theme && 'Genesis' === $parent_theme->get( 'Name' );
}
