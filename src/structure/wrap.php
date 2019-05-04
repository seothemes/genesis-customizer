<?php

namespace GenesisCustomizer;

add_action( 'genesis_before', __NAMESPACE__ . '\structural_wrap_hooks' );
/**
 * Add before and after structural wrap hook locations.
 *
 * This is a clever workaround that allows us to insert HTML between a container
 * and its immediate descendant .wrap element. These hooks are used to display
 * the Before Header widget area, the Secondary Nav and the Footer Widgets.
 *
 * @since  1.0.0
 *
 * @author Tim Jensen
 * @link   https://timjensen.us/add-hooks-before-genesis-structural-wraps
 *
 * @return void
 */
function structural_wrap_hooks() {
	$wraps = get_theme_support( 'genesis-structural-wraps' );
	foreach ( $wraps[0] as $context ) {
		add_filter( "genesis_structural_wrap-{$context}", function ( $output, $original ) use ( $context ) {
			$position = ( 'open' === $original ) ? 'before' : 'after';
			ob_start();
			do_action( "genesis_{$position}_{$context}_wrap" );
			if ( 'open' === $original ) {
				return ob_get_clean() . $output;
			} else {
				return $output . ob_get_clean();
			}
		}, 10, 2 );
	}
}
