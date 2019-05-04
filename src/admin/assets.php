<?php

namespace GenesisCustomizer;

add_filter( 'admin_body_class', __NAMESPACE__ . '\admin_body_class' );
/**
 * Adds one or more classes to the body tag in the dashboard.
 *
 * @since 1.0.0
 *
 * @param string $classes Current body classes.
 *
 * @return string
 */
function admin_body_class( $classes ) {
	if ( ! _is_pro_active() ) {
		$classes .= ' pro-not-active';
	}

	if ( ! _is_plugin_active( 'elementor' ) ) {
		$classes .= ' elementor-not-active';
	}

	if ( ! _is_plugin_active( 'beaver-builder' ) ) {
		$classes .= ' bb-not-active';
	}

	return $classes;
}

add_action( 'admin_print_styles', __NAMESPACE__ . '\admin_styles' );
/**
 * Load admin styles.
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

add_action( 'admin_enqueue_scripts', __NAMESPACE__ . '\admin_scripts' );
/**
 * Load admin scripts.
 *
 * @since 1.0.0
 *
 * @return void
 */
function admin_scripts() {
	$page = get_current_screen();

	// Modify text of Custom Adobe Fonts plugin.
	if ( 'appearance_page_custom-typekit-fonts' !== $page->id ) {
		return;
	}

	wp_register_script(
		__NAMESPACE__ . '\admin',
		_get_url() . 'assets/js/admin.js',
		false,
		_get_version()
	);
	wp_enqueue_script( __NAMESPACE__ . '\admin' );
}

add_filter( 'pand_dismiss_notice_js_url', __NAMESPACE__ . '\dismiss_notice_js_url', 10, 2 );
/**
 * Set URL of persist admin notices package.
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
