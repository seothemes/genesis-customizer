<?php

namespace GenesisCustomizer;

add_action( 'genesis_setup', __NAMESPACE__ . '\add_panels', 20 );
/**
 * Adds Kirki panels.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_panels() {
	$priority = 10;
	$handle   = _get_handle();
	$panels   = apply_filters( 'genesis_customizer_panels', [
		'general'     => __( 'General Settings', 'genesis-customizer' ),
		'base'        => __( 'Base Styles', 'genesis-customizer' ),
		'header'      => __( 'Header', 'genesis-customizer' ),
		'menus'       => __( 'Menus', 'genesis-customizer' ),
		'hero'        => __( 'Hero Section', 'genesis-customizer' ),
		'content'     => __( 'Content Area', 'genesis-customizer' ),
		'sidebars'    => __( 'Sidebars', 'genesis-customizer' ),
		'single'      => __( 'Single Post / Page', 'genesis-customizer' ),
		'archive'     => __( 'Blog / Archive', 'genesis-customizer' ),
		'footer'      => __( 'Footer', 'genesis-customizer' ),
		'code'        => __( 'Custom Code', 'genesis-customizer' ),
		'woocommerce' => __( 'WooCommerce', 'genesis-customizer-pro' ),
		'edd'         => __( 'Easy Digital Downloads', 'genesis-customizer-pro' ),
	] );

	foreach ( $panels as $panel => $title ) {
		\Kirki::add_panel( $handle . "_{$panel}", [
			'title'    => $title,
			'priority' => $priority + 10,
			'panel'    => $handle,
		] );
	}
}
