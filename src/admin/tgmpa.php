<?php

namespace GenesisCustomizer;

add_action( 'tgmpa_register', __NAMESPACE__ . '\setup_tgmpa' );
/**
 * Define recommended plugins.
 *
 * @since 3.0.0
 *
 * @return void
 */
function setup_tgmpa() {
	$theme = 'default';

	\tgmpa( add_tgmpa_plugins( $theme ), add_tgmpa_config() );
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @todo Add support for multiple plugin configs.
 *
 * @return array
 */
function add_tgmpa_plugins( $theme = 'default' ) {
	$plugins['default'] = [
		[
			'name'     => 'Simple Social Icons',
			'slug'     => 'simple-social-icons',
			'required' => false,
		],
	];

	return apply_filters( 'genesis_customizer_tgmpa_plugins', $plugins[ $theme ] );
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array
 */
function add_tgmpa_config() {
	return apply_filters( 'genesis_customizer_tgmpa_config', [
		'id'           => _get_handle(),
		'default_path' => '',
		'menu'         => 'genesis-customizer-plugins',
		'parent_slug'  => 'genesis',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	] );
}
