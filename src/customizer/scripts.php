<?php

namespace GenesisCustomizer;

add_action( 'customize_controls_print_scripts', __NAMESPACE__ . '\kirki_scripts', 999 );
/**
 * Adds custom inline scripts to Customizer screen.
 *
 * @since 1.0.0
 *
 * @return void
 */
function kirki_scripts() {
	echo '
		<script>
		wp.customize.control( "genesis-customizer_header_above-header_layout", function( control ) {
		    control.deferred.embedded.done( function() {
		        control.container.find( "img" ).addClass( "wp-ui-highlight" );
		    });
		});
		wp.customize.control( "genesis-customizer_footer_above-footer_layout", function( control ) {
		    control.deferred.embedded.done( function() {
		        control.container.find( "img" ).addClass( "wp-ui-highlight" );
		    });
		});
        wp.customize.control( "genesis-customizer_header_primary_layout", function( control ) {
		    control.deferred.embedded.done( function() {
		        control.container.find( "img" ).addClass( "wp-ui-highlight" );
		    });
		});
        wp.customize.control( "genesis-customizer_header_primary_mobile-layout", function( control ) {
		    control.deferred.embedded.done( function() {
		        control.container.find( "img" ).addClass( "wp-ui-highlight" );
		    });
		});
        wp.customize.control( "genesis-customizer_footer_footer-widgets_columns", function( control ) {
		    control.deferred.embedded.done( function() {
		        control.container.find( "img" ).addClass( "wp-ui-highlight" );
		    });
		});
        </script>
    ';
}
