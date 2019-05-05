<?php
/**
 * Genesis Customizer.
 *
 * This file adds conditional utility functions to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

/**
 * Check if were on any type of singular page.
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
 * Check if were on any type of archive page.
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
 * Check if a given Pro module is enabled.
 *
 * @since 1.0.0
 *
 * @param mixed $modules String or array of modules to check.
 *
 * @return bool
 */
function _is_module_enabled( $modules ) {
	if ( ! _is_pro_active() ) {
		return false;
	}

	$option = get_option( 'genesis-customizer-modules' );

	if ( ! is_array( $modules ) ) {
		$modules = [ $modules ];
	}

	if ( ! is_array( $option ) ) {
		$option = [ $option ];
	}

	foreach ( $modules as $module ) {
		if ( ! in_array( $module, $option, true ) ) {
			return false;
		}
	}

	return true;
}

/**
 * Check if Pro is active.
 *
 * @since 1.0.0
 *
 * @return bool
 */
function _is_pro_active() {
	return _is_plugin_active( 'genesis-customizer-pro' );
}

/**
 * Check if a given plugin is active.
 *
 * @since 1.0.0
 *
 * @param string $plugin Name of plugin to check.
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
		'kirki'                  => 'Kirki',
		'one-click-demo-import'  => '',
	];

	if ( class_exists( $plugins[ $plugin ] ) ) {
		return true;

	} elseif ( function_exists( $plugins[ $plugin ] ) ) {
		return true;

	} elseif ( defined( $plugins[ $plugin ] ) ) {
		return true;
	}

	return false;
}

/**
 * Check if sticky header is enabled.
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
 * Check if transparent header is enabled.
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
