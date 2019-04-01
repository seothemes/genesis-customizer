<?php

namespace GenesisCustomizer;

add_action( 'genesis_setup', __NAMESPACE__ . '\kirki_setup' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function kirki_setup() {
	add_filter( 'kirki_telemetry', '__return_false' );
//	add_filter( 'kirki/dynamic_css/method', '__return_true' );
	add_filter( 'kirki_output_inline_styles', '__return_false' );
//	add_filter( 'kirki_gutenberg_' . _get_handle() . '_dynamic_css', function () {
	//return file_get_contents( WP_CONTENT_DIR . '/uploads/kirki-css/styles.css' );
//	} );
}

add_action( 'genesis_setup', __NAMESPACE__ . '\add_kirki_config' );
/**
 * Adds the theme's Kirki config.
 *
 * @since  1.2.0
 *
 * @link   https://aristath.github.io/kirki/docs/getting-started/config.html
 *
 * @return void
 */
function add_kirki_config() {
	$handle = _get_handle();
	\Kirki::add_config( $handle, [
		'capability'        => 'edit_theme_options',
		'gutenberg_support' => true,
		'disable_output'    => false,
		'remove_loader'     => true,
	] );
}

add_filter( 'kirki_config', __NAMESPACE__ . '\disable_kirki_loader' );
/**
 * Remove Kirki loader icon.
 *
 * @param array $config the configuration array
 *
 * @return array
 */
function disable_kirki_loader( $config ) {
	return wp_parse_args( [
		'disable_loader' => true,
	], $config );
}
