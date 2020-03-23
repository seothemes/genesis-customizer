<?php
/**
 * Genesis Customizer.
 *
 * This file adds styles for Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_main_styles' );
/**
 * Load main stylesheets.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_main_styles() {
	$handle     = _get_handle();
	$breakpoint = _get_option( 'breakpoint', _get_breakpoint() );
	$mobile     = intval( $breakpoint );

	wp_register_style(
		$handle . '-all',
		_get_url() . 'assets/css/all.css',
		[],
		_get_asset_version( 'css/all.css' ),
		'all'
	);

	wp_register_style(
		$handle . '-mobile',
		_get_url() . 'assets/css/mobile.css',
		[],
		_get_asset_version( 'css/mobile.css' ),
		'(max-width:' . $mobile . 'px)'
	);

	wp_register_style(
		$handle . '-desktop',
		_get_url() . 'assets/css/desktop.css',
		[],
		_get_asset_version( 'css/desktop.css' ),
		'(min-width:' . $breakpoint . 'px)'
	);

	wp_register_style(
		$handle . '-fontawesome',
		'//use.fontawesome.com/releases/v5.2.0/css/all.css',
		[]
	);

	wp_enqueue_style( $handle . '-all' );
	wp_enqueue_style( $handle . '-mobile' );
	wp_enqueue_style( $handle . '-desktop' );

	if ( 'enable' === _get_option( 'font-awesome' ) ) {
		wp_enqueue_style( $handle . '-fontawesome' );
	}
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_vendor_styles' );
/**
 * Load vendor stylesheets conditionally.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_vendor_styles() {
	$handle  = _get_handle();
	$plugins = apply_filters( 'genesis_customizer_stylesheets', [
		'beaver-builder',
		'elementor',
	] );

	foreach ( $plugins as $plugin ) {
		if ( _is_plugin_active( $plugin ) ) {
			$style = $handle . '-' . $plugin;

			wp_register_style(
				$style,
				_get_url() . 'assets/css/' . $plugin . '.css',
				[],
				_get_asset_version( 'css/' . $plugin . '.css' )
			);

			wp_enqueue_style( $style );
		}
	}
}
