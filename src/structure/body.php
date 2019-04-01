<?php

namespace GenesisCustomizer;

add_filter( 'genesis_attr_site-container', __NAMESPACE__ . '\site_container_id' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $atts
 *
 * @return mixed
 */
function site_container_id( $atts ) {
	$atts['id'] = 'top';

	return $atts;
}
