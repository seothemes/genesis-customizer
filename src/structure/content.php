<?php

namespace GenesisCustomizer;

add_filter( 'genesis_breadcrumb_args', __NAMESPACE__ . '\breadcrumb_args' );
/**
 * Modify breadcrumb labels.
 *
 * @since 1.0.0
 *
 * @param $args
 *
 * @return mixed
 */
function breadcrumb_args( $args ) {
	$args['home']                = _get_value( 'content_breadcrumbs_label-home' );
	$args['labels']['prefix']    = _get_value( 'content_breadcrumbs_label-prefix' );
	$args['labels']['author']    = _get_value( 'content_breadcrumbs_label-author' );
	$args['labels']['category']  = _get_value( 'content_breadcrumbs_label-category' );
	$args['labels']['tag']       = _get_value( 'content_breadcrumbs_label-tag' );
	$args['labels']['date']      = _get_value( 'content_breadcrumbs_label-date' );
	$args['labels']['search']    = _get_value( 'content_breadcrumbs_label-search' );
	$args['labels']['tax']       = _get_value( 'content_breadcrumbs_label-tax' );
	$args['labels']['post_type'] = _get_value( 'content_breadcrumbs_label-post_type' );
	$args['labels']['404']       = _get_value( 'content_breadcrumbs_label-404' );

	return $args;
}

add_filter( 'genesis_404_entry_title', __NAMESPACE__ . '\error_404_entry_title', 10, 1 );
/**
 * Set the custom 404 title.
 *
 * @since 1.0.0
 *
 * @param $default
 *
 * @return string
 */
function error_404_entry_title( $default ) {
	$custom = get_page_by_path( 'error-404', OBJECT );

	if ( isset( $custom ) ) {
		return $custom->post_title;
	}

	return $default;
}


add_filter( 'genesis_404_entry_content', __NAMESPACE__ . '\error_404_entry_content', 10, 1 );
/**
 * Set custom 404 page content.
 *
 * @since 1.0.0
 *
 * @param $default
 *
 * @return string
 */
function error_404_entry_content( $default ) {
	$custom = get_page_by_path( 'error-404', OBJECT );

	if ( isset( $custom ) ) {
		return $custom->post_content;
	}

	return $default;
}
