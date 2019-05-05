<?php
/**
 * Genesis Customizer.
 *
 * This file contains content structure functions for Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_filter( 'genesis_attr_site-container', __NAMESPACE__ . '\site_container_id' );
/**
 * Add scroll to to anchor ID to site container.
 *
 * @since 1.0.0
 *
 * @param array $atts Site container attributes.
 *
 * @return array
 */
function site_container_id( $atts ) {
	$atts['id'] = 'top';

	return $atts;
}

add_filter( 'genesis_breadcrumb_args', __NAMESPACE__ . '\breadcrumb_args' );
/**
 * Modify breadcrumb labels.
 *
 * @since 1.0.0
 *
 * @param array $args Breadcrumb arguments.
 *
 * @return array
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
 * @param string $default Default 404 page title.
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
 * @param string $default Default 404 page content.
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
