<?php
/**
 * Genesis Customizer.
 *
 * This file adds Kirki functionality to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

// Disable kirki telemetry.
add_filter( 'kirki_telemetry', '__return_false' );

add_action( 'genesis_setup', __NAMESPACE__ . '\kirki_filters' );
/**
 * Add miscellaneous Kirki filters after setup.
 *
 * @since 1.0.0
 *
 * @return void
 */
function kirki_filters() {
	add_filter( 'kirki/dynamic_css/method', '__return_true' );
	add_filter( 'kirki_gutenberg_' . _get_handle() . '_dynamic_css', function () {
		return home_url( '?action=kirki-styles' );
	} );

	if ( ! is_customize_preview() ) {
		add_filter( 'kirki_output_inline_styles', '__return_false' );
	}
}

add_action( 'genesis_setup', __NAMESPACE__ . '\add_kirki_config' );
/**
 * Add Kirki config.
 *
 * @since  1.0.0
 *
 * @link   https://aristath.github.io/kirki/docs/getting-started/config.html
 *
 * @return void
 */
function add_kirki_config() {
	$handle = _get_handle();

	\Kirki::add_config( $handle, [
		'capability'        => 'edit_theme_options',
		'option_type'       => 'option',
		'option_name'       => $handle,
		'gutenberg_support' => true,
		'disable_output'    => false,
	] );
}

add_filter( 'kirki_config', __NAMESPACE__ . '\disable_kirki_loader' );
/**
 * Remove Kirki loader icon.
 *
 * @param array $config The configuration array.
 *
 * @return array
 */
function disable_kirki_loader( $config ) {
	return wp_parse_args( [
		'disable_loader' => true,
	], $config );
}

add_filter( 'kirki/config', __NAMESPACE__ . '\kirki_url' );
/**
 * Manually set the Kirki URL.
 *
 * @since 1.0.0
 *
 * @param array $config The configuration array.
 *
 * @return array
 */
function kirki_url( $config ) {
	$config['url_path'] = _get_url() . 'vendor/aristath/kirki';

	return $config;
}
