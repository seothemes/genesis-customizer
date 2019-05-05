<?php
/**
 * Genesis Customizer.
 *
 * This file adds the text domain to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_action( 'init', __NAMESPACE__ . '\add_textdomain' );
/**
 * Add plugin textdomain.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_textdomain() {
	load_plugin_textdomain(
		_get_handle(),
		false,
		basename( _get_path() ) . '/assets/lang'
	);
}

