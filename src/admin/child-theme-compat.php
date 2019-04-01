<?php

namespace GenesisCustomizer;

/**
 * Adds admin notice if requirements are not met.
 *
 * Themes can build in support for Genesis Customizer by either adding a
 * `genesis-customizer` tag to the stylesheet header comment and/or by
 * adding theme support for the `genesis-customizer` feature, e.g:
 *
 * `add_theme_support( 'genesis-customizer' );`
 *
 * @since 1.0.0
 *
 * @return bool
 */
function child_theme_is_compatible() {
	$handle  = _get_handle();
	$tags    = wp_get_theme()->get( 'Tags' ) ?: [];
	$support = get_theme_support( $handle );

	if ( in_array( $handle, $tags ) || $support ) {
		return true;
	}

	return false;
}

add_action( 'admin_notices', __NAMESPACE__ . '\child_theme_notice' );
/**
 * Displays the admin notice warning message.
 *
 * @since 1.0.0
 *
 * @return void
 */
function child_theme_notice() {
	if ( ! child_theme_is_compatible() ) {
		printf(
			'<div class="notice notice-warning"><p><strong>%s</strong> %s <a href="%s" target="_blank">%s</a> %s </p></div>',
			_get_name(),
			__( ' is not supported by the active child theme and may not work as expected. Please install a compatible child theme or refer to the', 'genesis-customizer' ),
			esc_attr__( 'https://genesiscustomizer.com/blog' ),
			__( 'adding theme support guide', 'genesis-customizer' ),
			__( 'for instructions on how to declare Genesis Customizer support in your theme.', 'genesis-customizer' )
		);
	}
}
