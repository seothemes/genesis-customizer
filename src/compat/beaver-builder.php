<?php
/**
 * Genesis Customizer.
 *
 * This file adds Beaver Builder compatibility to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_filter( 'fl_builder_ui_bar_buttons', __NAMESPACE__ . '\beaver_builder_site_header', 10, 1 );
/**
 * Adds a hide/show site header button to Beaver Builder.
 *
 * @since 1.0.0
 *
 * @param array $buttons List of Beaver Builder header buttons.
 *
 * @return array
 */
function beaver_builder_site_header( $buttons ) {
	$buttons['toggle-header'] = [
		'label' => __( 'Toggle Header', 'genesis-customizer' ),
	];

	return $buttons;
}
