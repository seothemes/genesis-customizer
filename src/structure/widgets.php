<?php

namespace GenesisCustomizer;

add_action( 'genesis_after_title_area', __NAMESPACE__ . '\header_right', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function header_right() {
	$enabled = _get_value( 'header_right_enable' );

	if ( 'hide' === $enabled ) {
		return;
	}

	genesis_widget_area( 'header-right-widget', [
		'before' => '<div class="header-right widget-area ' . $enabled . '">',
		'after'  => '</div>',
	] );
}

add_action( 'genesis_after_entry', __NAMESPACE__ . '\after_entry', 9 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function after_entry() {
	if ( ! is_single() ) {
		return;
	}

	genesis_widget_area( 'after-entry', [
		'before' => '<div class="after-entry widget-area">',
		'after'  => '</div>',
	] );
}
