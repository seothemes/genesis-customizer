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


add_filter( 'pand_dismiss_notice_js_url', __NAMESPACE__ . '\dismiss_notice_js_url', 10, 2 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $js_url
 * @param $composer_path
 *
 * @return string
 */
function dismiss_notice_js_url( $js_url, $composer_path ) {
	return get_stylesheet_directory_uri() . $composer_path;
}
