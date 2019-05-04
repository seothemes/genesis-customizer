<?php

namespace GenesisCustomizer;

$handle = _get_handle();

add_filter( "plugin_action_links_$handle/$handle.php", __NAMESPACE__ . '\settings_link' );
/**
 * Adds settings link on plugins page.
 *
 * @since 1.0.0
 *
 * @param $links
 *
 * @return array
 */
function settings_link( $links ) {
	if ( ! _is_pro_active() ) {
		$links[] = sprintf(
			'<a href="%s" target="_blank">%s</a>',
			_get_upgrade_link(),
			__( 'Go Pro', 'genesis-customizer' )
		);
	}

	return $links;
}

add_action( 'genesis_admin_menu', __NAMESPACE__ . '\admin_settings' );
/**
 * Initialize admin settings class.
 *
 * @since 1.0.0
 *
 * @return void
 */
function admin_settings() {
	new Admin_Settings();
}
