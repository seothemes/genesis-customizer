<?php
/**
 * Genesis Customizer.
 *
 * This file adds Simple Social Icons compatibility to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_filter( 'simple_social_default_styles', __NAMESPACE__ . '\simple_social_icons_defaults' );
/**
 * Set the Simple Social Icon defaults.
 *
 * @since  1.0.0
 *
 * @param  array $defaults Default Simple Social Icons settings.
 *
 * @return array Custom settings.
 */
function simple_social_icons_defaults( $defaults ) {
	$args = [
		'alignment'              => 'alignleft',
		'background_color'       => '',
		'background_color_hover' => '',
		'border_radius'          => 0,
		'border_color'           => '',
		'border_color_hover'     => '',
		'border_width'           => 0,
		'icon_color'             => _get_color( 'text' ),
		'icon_color_hover'       => _get_color( 'accent' ),
		'size'                   => 36,
		'new_window'             => 1,
		'facebook'               => '#',
		'instagram'              => '#',
		'twitter'                => '#',
	];
	$args = wp_parse_args( $args, $defaults );

	return $args;
}
