<?php
/**
 * Genesis Customizer.
 *
 * This file contains archive structure functions for Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_action( 'genesis_meta', __NAMESPACE__ . '\archive_setup' );
/**
 * Add hooks on archives.
 *
 * @since 1.0.0
 *
 * @return void
 */
function archive_setup() {
	if ( ! _is_archive() ) {
		return;
	}

	add_filter( 'body_class', __NAMESPACE__ . '\archive_body_classes', 100, 1 );
	add_filter( 'get_the_content_more_link', __NAMESPACE__ . '\read_more_text' );
	add_filter( 'genesis_post_info', __NAMESPACE__ . '\archive_post_info' );
	add_filter( 'genesis_post_meta', __NAMESPACE__ . '\archive_post_meta' );
	add_filter( 'genesis_attr_archive-pagination', __NAMESPACE__ . '\pagination_alignment' );
	add_filter( 'genesis_attr_entry-pagination', __NAMESPACE__ . '\pagination_alignment' );
	add_filter( 'genesis_attr_adjacent-entry-pagination', __NAMESPACE__ . '\pagination_alignment' );
	add_filter( 'genesis_attr_comments-pagination', __NAMESPACE__ . '\pagination_alignment' );
	add_filter( 'genesis_prev_link_text', __NAMESPACE__ . '\previous_link_text' );
	add_filter( 'genesis_next_link_text', __NAMESPACE__ . '\next_link_text' );
}

/**
 * Add archive body class.
 *
 * @since 1.0.0
 *
 * @param array $classes All body classes.
 *
 * @return array
 */
function archive_body_classes( $classes ) {
	$classes[] = 'archive';
	$classes   = array_diff( $classes, [ 'page' ] );
	$classes[] = _get_value( 'archive_blog-layout_columns' );

	return $classes;
}

/**
 * Filter the read more text.
 *
 * @since 1.0.0
 *
 * @return string
 */
function read_more_text() {
	$display = _get_value( 'archive_read-more_display' );

	if ( 'none' === $display ) {
		return '';
	}

	$style    = _get_value( 'archive_read-more_style' );
	$text     = _get_value( 'archive_read-more_text' );
	$ellipses = _get_value( 'archive_read-more_ellipses' ) ? '&hellip;&nbsp;' : '';
	$wrapper  = 'block' === $display ? '<div class="read-more-wrap">%s</div>' : '%s';
	$classes  = 'button' === $style ? 'button small' : '';
	$link     = sprintf(
		'<a href="%s" class="more-link %s">%s</a>',
		get_the_permalink(),
		$classes,
		genesis_a11y_more_link( $text )
	);

	return sprintf( $ellipses . $wrapper, $link );
}

/**
 * Add custom post info.
 *
 * @since 1.0.0
 *
 * @return string
 */
function archive_post_info() {
	$text = _get_value( 'archive_post-meta_post-info' );

	return do_shortcode( $text );
}

/**
 * Add custom post meta.
 *
 * @since 1.0.0
 *
 * @return string
 */
function archive_post_meta() {
	$text = _get_value( 'archive_post-meta_post-meta' );

	return do_shortcode( $text );
}

/**
 * Set the pagination alignment.
 *
 * @since 1.0.0
 *
 * @param array $atts Pagination attributes.
 *
 * @return array
 */
function pagination_alignment( $atts ) {
	$align = _get_value( 'archive_pagination_alignment' );

	$atts['class'] .= ' align-' . $align;

	return $atts;
}

/**
 * Modify pagination previous link text.
 *
 * @since 1.0.0
 *
 * @return mixed
 */
function previous_link_text() {
	return _get_value( 'archive_pagination_previous' );
}

/**
 * Modify pagination next link text.
 *
 * @since 1.0.0
 *
 * @return mixed
 */
function next_link_text() {
	return _get_value( 'archive_pagination_next' );
}
