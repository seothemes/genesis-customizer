<?php

namespace GenesisCustomizer;

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\admin_styles' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function admin_styles() {
	wp_register_style(
		__NAMESPACE__ . '\admin',
		_get_url() . 'assets/css/admin-styles.css',
		false,
		_get_version()
	);
	wp_enqueue_style( __NAMESPACE__ . '\admin' );
}
