<?php

namespace GenesisCustomizer;

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

