<?php
/**
 * Genesis Customizer.
 *
 * This file adds Customizer panels to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

/**
 * Returns array of default Customizer panels.
 *
 * @since 1.0.0
 *
 * @return array
 */
function _get_default_panels() {
	return [
		'base'     => __( 'Base Styles', 'genesis-customizer' ),
		'header'   => __( 'Header', 'genesis-customizer' ),
		'menus'    => __( 'Menus', 'genesis-customizer' ),
		'hero'     => __( 'Hero Section', 'genesis-customizer' ),
		'content'  => __( 'Content Area', 'genesis-customizer' ),
		'sidebars' => __( 'Sidebars', 'genesis-customizer' ),
		'single'   => __( 'Single Post / Page', 'genesis-customizer' ),
		'archive'  => __( 'Blog / Archive', 'genesis-customizer' ),
		'footer'   => __( 'Footer', 'genesis-customizer' ),
	];
}

add_action( 'genesis_setup', __NAMESPACE__ . '\add_panels', 20 );
/**
 * Adds Kirki panels.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_panels() {
	$priority = 10;
	$handle   = _get_handle();
	$panels   = apply_filters( 'genesis_customizer_panels', _get_default_panels() );

	foreach ( $panels as $panel => $title ) {
		\Kirki::add_panel( $handle . "_{$panel}", [
			'title'    => $title,
			'priority' => $priority + 10,
			'panel'    => $handle,
		] );
	}
}
