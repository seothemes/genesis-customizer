<?php

namespace GenesisCustomizer;

register_default_headers( [
	'sunset' => [
		'url'           => _get_url() . 'assets/img/hero-section.jpg',
		'thumbnail_url' => _get_url() . 'assets/img/hero-section.jpg',
		'description'   => __( 'Default image', 'genesis-customizer' ),
	],
] );

add_filter( 'theme_mod_header_image', __NAMESPACE__ . '\custom_header', 25 );
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
	$custom  = _get_value( 'header_hero-section_background' );
	$default = get_theme_support( 'custom-header' )[0]['default_image'];
	$default = isset( $custom['background-image'] ) ? $custom['background-image'] : $default;

	/// TODO: Add rules for every conditional in template-loader.php.
	if ( class_exists( 'WooCommerce' ) && is_shop() ) {
		$id = wc_get_page_id( 'shop' );

	} elseif ( is_front_page() ) {
		$id = get_option( 'page_on_front' );

	} elseif ( is_home() ) {
		$id = get_option( 'page_for_posts' );

	} elseif ( is_post_type_archive() ) {
		$url = get_theme_mod( get_query_var( 'post_type' ) . '-image', $default );

	} elseif ( is_category() ) {
		$url = get_theme_mod( 'term-' . get_the_category()[0]->cat_ID, $default );

	} elseif ( is_tag() ) {
		$url = get_theme_mod( 'term-' . get_the_category()[0]->cat_ID, $default );

	} elseif ( is_tax() ) {
		$url = get_theme_mod( 'term-' . get_the_category()[0]->cat_ID, $default );

	} elseif ( is_search() ) {
		$url = get_theme_mod( 'search-image', $default );

	} elseif ( is_404() ) {
		$url = get_theme_mod( '404-image', $default );

	} elseif ( is_singular() ) {
		$id = get_the_id();
	}

	if ( is_object( $id ) ) {
		$url = wp_get_attachment_image_url( $id->ID, 'hero-section' );

	} elseif ( $id ) {
		$url = get_the_post_thumbnail_url( $id, 'hero-section' );

	} elseif ( ! $url ) {
		$url = $default;
	}

	$settings = get_post_meta( $id, '_hero_section', true );

	if ( ! $url || 'site_default' === $settings ) {
		$url = $default;

	} elseif ( 'none' === $settings ) {
		$url = false;
	}

	if ( $url ) {
		$selector = get_theme_support( 'custom-header', 'header-selector' );
		$value    = 'no_image' === $settings ? 'none' : 'url(%s)';

		return $url;

//		return printf( '<style type="text/css">' . esc_attr( $selector ) . '{background-image:' . $value . '}</style>' . "\n", esc_url( $url ) );
	} else {
		return '';
	}
}
