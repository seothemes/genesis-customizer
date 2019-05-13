<?php
/**
 * Genesis Customizer.
 *
 * This file adds custom header functionality to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

// Register default header image.
register_default_headers( [
	'default' => [
		'url'           => _get_url() . 'assets/img/hero-section.jpg',
		'thumbnail_url' => _get_url() . 'assets/img/hero-section.jpg',
		'description'   => __( 'Default image', 'genesis-customizer' ),
	],
] );

/**
 * Custom header image callback.
 *
 * Loads custom header or featured image depending on what is set on a per page basis,
 * if a featured image is set for the page, it will override the default header image.
 * Also gets the images for custom post types by looking for pages with the same slug.
 *
 * @since  1.0.0
 *
 * @return string
 */
function custom_header() {
	$id      = '';
	$url     = '';
	$default = get_header_image();
	$feature = _get_value( 'hero_settings_featured-image', true );

	// TODO: Add rules for every conditional in template-loader.php.
	if ( _is_plugin_active( 'woocommerce' ) && \is_shop() ) {
		$id = \wc_get_page_id( 'shop' );

	} elseif ( is_front_page() ) {
		$id = get_option( 'page_on_front' );

	} elseif ( is_home() ) {
		$id = get_option( 'page_for_posts' );

	} elseif ( is_post_type_archive() ) {
		$url = _get_value( get_query_var( 'post_type' ) . '-image', $default );

	} elseif ( is_category() ) {
		$url = _get_value( 'term-' . get_the_category()[0]->cat_ID, $default );

	} elseif ( is_tag() ) {
		$url = _get_value( 'term-' . get_the_category()[0]->cat_ID, $default );

	} elseif ( is_tax() ) {
		$url = _get_value( 'term-' . get_the_category()[0]->cat_ID, $default );

	} elseif ( is_search() ) {
		$id = get_page_by_path( 'search' );

	} elseif ( is_404() ) {
		$id = get_page_by_path( 'error-404' );

	} elseif ( is_singular() ) {
		$id = get_the_id();
	}

	if ( ! $feature ) {
		$url = $default;

	} elseif ( is_object( $id && $feature ) ) {
		$url = wp_get_attachment_image_url( $id->ID, 'hero-section' );

	} elseif ( $id && $feature ) {
		$url = get_the_post_thumbnail_url( $id, 'hero-section' );
	}

	if ( ! $url ) {
		$url = $default;
	}

	$selector = get_theme_support( 'custom-header', 'header-selector' );

	return printf( '<style type="text/css">' . esc_attr( $selector ) . '{background-image:url(%s)}</style>' . "\n", esc_url( $url ) );
}
