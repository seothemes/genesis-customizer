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
 * @param mixed $modules
 *
 * @return bool
 */
function _is_module_enabled( $modules ) {
	if ( ! _is_pro_active() ) {
		return false;
	}

	$option = get_option( 'genesis-customizer-modules' );

	if ( is_string( $modules ) ) {
		$modules = [ $modules ];
	}

	foreach ( $modules as $module ) {

		if ( ! in_array( $module, $option ) ) {
			return false;
		}
	}

	return true;
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
	}

	return false;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function _has_sticky_header() {
	if ( ! _is_module_enabled( 'sticky-header' ) ) {
		return false;
	}

	$layout = _get_value( 'header_primary_layout' );

	if ( 'has-logo-side' === $layout ) {
		return false;
	}

	$disabled = get_post_meta( get_the_ID(), 'sticky_disabled', true );

	if ( $disabled ) {
		return false;
	}

	return _get_value( 'header_sticky_enabled', '' );
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function _has_transparent_header() {
	if ( ! _is_module_enabled( [ 'hero-section', 'transparent-header' ] ) ) {
		return false;
	}

	$layout = _get_value( 'header_primary_layout' );

	if ( 'has-logo-side' === $layout ) {
		return false;
	}

	$disabled = get_post_meta( get_the_ID(), 'transparent_disabled', true );

	if ( $disabled ) {
		return false;
	}

	return _get_value( 'header_transparent_enabled', '' );
}
