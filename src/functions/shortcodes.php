<?php

namespace GenesisCustomizer;

// Add search form shortcode.
add_shortcode( 'search_form', function () {
	return get_search_form( false );
} );
