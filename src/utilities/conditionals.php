<?php

namespace GenesisCustomizer;

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function _is_single() {
	return ( is_front_page() ||
	         is_single() ||
	         is_page() ||
	         is_404() ||
	         is_attachment() ||
	         is_singular() ) &&
	       ! genesis_is_blog_template();
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function _is_archive() {
	return is_home() ||
	       is_post_type_archive() ||
	       is_category() ||
	       is_tag() ||
	       is_tax() ||
	       is_author() ||
	       is_date() ||
	       is_year() ||
	       is_month() ||
	       is_day() ||
	       is_time() ||
	       is_archive() ||
	       is_search() ||
	       genesis_is_blog_template();
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function _is_pro_active() {
	return _is_plugin_active( 'genesis-customizer-pro' );
}


/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $plugin
 *
 * @return bool
 */
function _is_plugin_active( $plugin ) {
	$plugins = [
		'genesis-customizer-pro' => __NAMESPACE__ . '\pro',
		'easy-digital-downloads' => 'Easy_Digital_Downloads',
		'beaver-builder'         => 'FLBuilderLoader',
		'woocommerce'            => 'WooCommerce',
		'elementor'              => 'Elementor\Plugin',
		'simple-social-icons'    => 'Simple_Social_Icons_Widget',
	];

	if ( class_exists( $plugins[ $plugin ] ) ) {
		return true;

	} else if ( function_exists( $plugins[ $plugin ] ) ) {
		return true;

	} else if ( defined( $plugins[ $plugin ] ) ) {
		return true;

	} else {
		return false;
	}
}
