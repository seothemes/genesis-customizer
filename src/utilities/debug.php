<?php
/**
 * Genesis Customizer.
 *
 * This file adds debugging utility functions to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

/**
 * Checks if debug mode is enabled.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function _is_debug_mode() {
	return defined( 'WP_DEBUG' ) && WP_DEBUG;
}

/**
 * Outputs nicely formatted debugging info.
 *
 * @since 1.0.0
 *
 * @param mixed $value Value to debug.
 *
 * @return void
 */
function _debug( $value ) {
	echo '<pre style="margin:20px;padding:20px;">';
	print_r( $value );
	echo '</pre>';
}

/**
 * Shorthand alias for _debug utility function.
 *
 * @since 1.0.0
 *
 * @param mixed $value Value to debug.
 *
 * @return void
 */
function _d( $value ) {
	_debug( $value );
}
