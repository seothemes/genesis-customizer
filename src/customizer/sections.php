<?php

namespace GenesisCustomizer;

add_action( 'genesis_setup', __NAMESPACE__ . '\add_sections' );
/**
 * Adds Kirki sections.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_sections() {
	$handle = _get_handle();
	$panels = apply_filters( 'genesis_customizer_sections', _get_default_sections() );

	foreach ( $panels as $panel => $sections ) {
		$priority = 10;

		foreach ( $sections as $section => $title ) {
			\Kirki::add_section( $handle . "_{$panel}_${section}", [
				'title'    => $title,
				'panel'    => $handle . "_{$panel}",
				'priority' => $priority,
			] );

			$priority = $priority + 10;
		}
	}
}

