<?php

namespace GenesisCustomizer;

add_filter( 'body_class', __NAMESPACE__ . '\landing_body_class' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $classes
 *
 * @return array
 */
function landing_body_class( $classes ) {
	$classes[] = 'landing-page';

	return $classes;
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\dequeue_skip_links' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function dequeue_skip_links() {
	wp_dequeue_script( 'skip-links' );
}

add_action( 'genesis_before', __NAMESPACE__ . '\remove_footer_credits', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function remove_footer_credits() {
	remove_action( 'genesis_footer', __NAMESPACE__ . '\footer_credits_div', 13 );
}

// Removes Skip Links.
remove_action( 'genesis_before_header', 'genesis_skip_links', 5 );

// Forces full width content layout.
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

// Removes site header elements.
remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );

// Removes navigation.
remove_theme_support( 'genesis-menus' );

// Removes breadcrumbs.
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

// Removes footer widgets.
remove_action( 'genesis_footer', __NAMESPACE__ . '\display_footer_widgets', 12 );
remove_action( 'genesis_footer', __NAMESPACE__ . '\above_footer', 11 );

// Removes site footer elements.
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

// Remove hero section.
\remove_theme_support( 'hero-section' );

// Runs the Genesis loop.
\genesis();
