<?php

namespace GenesisCustomizer;

// Enable shortcodes in widgets.
add_filter( 'widget_text', 'do_shortcode' );

// Add search form shortcode.
add_shortcode( 'search_form', function () {
	return get_search_form( false );
} );
