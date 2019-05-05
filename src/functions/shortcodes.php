<?php
/**
 * Genesis Customizer.
 *
 * This file contains shortcode functionality for Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

// Enable shortcodes in widgets.
add_filter( 'widget_text', 'do_shortcode' );

// Add search form shortcode.
add_shortcode( 'search_form', function () {
	return get_search_form( false );
} );
