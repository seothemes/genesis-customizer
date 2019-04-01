<?php

namespace GenesisCustomizer;

add_filter( 'genesis_breadcrumb_args', __NAMESPACE__ . '\breadcrumb_args' );
/**
 * Description of expected behavior.
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
