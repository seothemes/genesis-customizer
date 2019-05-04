<?php

namespace GenesisCustomizer;

add_filter( 'genesis_attr_site-container', __NAMESPACE__ . '\site_container_id' );
/**
 * Add scroll to to anchor ID to site container.
 *
 * @since 1.0.0
 *
 * @param $atts
 *
 * @return array
 */
function site_container_id( $atts ) {
	$atts['id'] = 'top';

	return $atts;
}
