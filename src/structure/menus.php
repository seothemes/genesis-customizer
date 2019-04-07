<?php

namespace GenesisCustomizer;

add_filter( 'body_class', __NAMESPACE__ . '\menu_body_classes', 100, 1 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $classes
 *
 * @return array
 */
function menu_body_classes( $classes ) {
	$classes[] = _get_value( 'menus_mobile_animation', 'has-mobile-menu-top' );

	return $classes;
}

add_action( 'genesis_before', __NAMESPACE__ . '\reposition_menus' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function reposition_menus() {

	// Nav primary.
	remove_action( 'genesis_after_header', 'genesis_do_nav' );

	$header_layout = _get_value( 'header_primary_layout' );

	if ( 'has-logo-right' === $header_layout ) {
		add_action( 'genesis_before_title_area', 'genesis_do_nav' );

	} elseif ( 'has-logo-above' === $header_layout ) {
		add_action( 'genesis_header', 'genesis_do_nav', 14 );

	} else {
		add_action( 'genesis_after_title_area', 'genesis_do_nav' );
	}

	// Nav secondary.
	remove_action( 'genesis_after_header', 'genesis_do_subnav' );
	add_action( 'genesis_after_header_wrap', 'genesis_do_subnav' );

	// Nav footer.
	$value = _get_value( 'menus_footer_position' );
	$position  = [
		'above-footer'  => [ 'genesis_footer', 9 ],
		'above-widgets' => [ 'genesis_footer', 10 ],
		'above-credits' => [ 'genesis_footer', 12 ],
		'below-credits' => [ 'genesis_footer', 14 ],
	];

	add_action( $position[$value][0], __NAMESPACE__ . '\add_footer_menu', $position[$value][1] );
}

add_filter( 'genesis_attr_nav-primary', __NAMESPACE__ . '\menu_alignment' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $atts
 *
 * @return array
 */
function menu_alignment( $atts ) {
	$mobile  = _get_value( 'menus_mobile_alignment' );
	$desktop = _get_value( 'menus_primary_alignment' );
	$desktop = str_replace( 'flex-', '', $desktop );
	$space   = $mobile ? ' ' : '';

	$atts['class'] .= $space . $mobile . ' flex-' . $desktop . '-desktop';

	return $atts;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_footer_menu() {
	genesis_nav_menu( [
		'theme_location' => 'footer',
		'depth'          => 1,
	] );
}
