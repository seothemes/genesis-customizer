<?php

namespace GenesisCustomizer;

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function _is_debug_mode() {
	return defined( 'WP_DEBUG' ) && WP_DEBUG;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $value
 *
 * @return void
 */
function _debug( $value ) {
	echo '<pre style="margin: 200px 100px 0;">';
	print_r( $value );
	echo '</pre>';
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $value
 *
 * @return void
 */
function _d( $value ) {
	_debug( $value );
}
