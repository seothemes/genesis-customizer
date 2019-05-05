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
