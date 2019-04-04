<?php

namespace GenesisCustomizer;

$handle = _get_handle();

add_filter( "plugin_action_links_$handle/$handle.php", __NAMESPACE__ . '\add_pro_settings_link' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $links
 *
 * @return array
 */
function add_pro_settings_link( $links ) {
	if ( ! _is_pro_active() ) {
		$links[] = sprintf(
			'<a href="%s" target="_blank">%s</a>',
			_get_upgrade_url(),
			__( 'Go Pro', 'genesis-customizer' )
		);
	}

	return $links;
}
