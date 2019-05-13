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

$parent_theme = wp_get_theme()->parent();

if ( ! $parent_theme || 'Genesis' !== $parent_theme->get( 'Name' ) ) {

	add_action( 'plugins_loaded', __NAMESPACE__ . '\init_deactivation' );
	/**
	 * Initialize deactivation functions.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function init_deactivation() {
		if ( current_user_can( 'activate_plugins' ) ) {
			add_action( 'admin_init', __NAMESPACE__ . '\deactivate' );
			add_action( 'admin_notices', __NAMESPACE__ . '\deactivation_notice' );
		}
	}

	/**
	 * Deactivate the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function deactivate() {
		$file = 'genesis-customizer/genesis-customizer.php';

		deactivate_plugins( plugin_basename( $file ) );
	}

	/**
	 * Show deactivation admin notice.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function deactivation_notice() {
		printf(
			'<div class="notice notice-error"><p><b>%s</b> %s</p></div>',
			esc_html__( 'Genesis Customizer', 'genesis-customizer' ),
			esc_html__( 'requires the Genesis Framework to run and has been deactivated.', 'genesis-customizer' )
		);

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		if ( isset( $_GET['activate'] ) ) {
			unset( $_GET['activate'] );
		}
	}

	return false;
}

// Return true if checks passed.
return true;
