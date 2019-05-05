<?php
/**
 * Genesis Customizer.
 *
 * This file contains widget area functionality for Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_action( 'genesis_setup', __NAMESPACE__ . '\unregister_widget_areas', 19 );
/**
 * Unregister widget areas (registered manually for custom ordering).
 *
 * @since 1.0.0
 *
 * @return void
 */
function unregister_widget_areas() {
	unregister_sidebar( 'sidebar' );
	unregister_sidebar( 'sidebar-alt' );
	unregister_sidebar( 'header-right' );
}

add_action( 'genesis_setup', __NAMESPACE__ . '\register_widget_areas', 20 );
/**
 * Register widget areas.
 *
 * Pro widgets registered here for correct ordering. Can be enabled/disabled
 * with module key.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_widget_areas() {
	$widget_areas = apply_filters( 'genesis_customizer_widget_areas', [
		'above-header'        => [
			'name'        => __( 'Above Header', 'genesis-customizer' ),
			'description' => __( 'This is the Above Header widget area.', 'genesis-customizer' ),
			'module'      => 'extra-widgets',
		],
		'header-left-widget'  => [
			'name'        => __( 'Header Left', 'genesis-customizer' ),
			'description' => __( 'This is the Header Left widget area. It typically appears next to the site title or logo. This widget area is not suitable to display every type of widget, and works best with a custom menu, a search form, or possibly a text widget.', 'genesis-customizer' ),
			'module'      => 'extra-widgets',
		],
		'header-right-widget' => [
			'name'        => __( 'Header Right', 'genesis-customizer' ),
			'description' => __( 'This is the Header Right widget area. It typically appears next to the site title or logo. This widget area is not suitable to display every type of widget, and works best with a custom menu, a search form, or possibly a text widget.', 'genesis-customizer' ),
		],
		'below-header'        => [
			'name'        => __( 'Below Header', 'genesis-customizer' ),
			'description' => __( 'This is the Below Header widget area.', 'genesis-customizer' ),
			'module'      => 'extra-widgets',
		],
		'mobile-menu'         => [
			'name'        => __( 'Mobile Menu', 'genesis-customizer' ),
			'description' => __( 'This is the Mobile Menu widget area. It is displayed inside the responsive mobile menu on smaller screens.', 'genesis-customizer' ),
			'module'      => 'extra-widgets',
		],
		'mega-menu'           => [
			'name'        => __( 'Mega Menu', 'genesis-customizer' ),
			'description' => __( 'This is the Mega Menu widget area.', 'genesis-customizer' ),
			'module'      => 'mega-menu',
		],
		'above-content'       => [
			'name'        => __( 'Above Content', 'genesis-customizer' ),
			'description' => __( 'This is the Above Content widget area.', 'genesis-customizer' ),
			'module'      => 'extra-widgets',
		],
		'after-entry'         => [
			'name'        => __( 'After Entry', 'genesis-customizer' ),
			'description' => __( 'Widgets in this widget area will display after single entries.', 'genesis-customizer' ),
		],
		'sidebar'             => [
			'name'        => __( 'Primary Sidebar', 'genesis-customizer' ),
			'description' => __( 'This is the sidebar widget area if you are using a two column site layout option.', 'genesis-customizer' ),
		],
		'sidebar-alt'         => [
			'name'        => __( 'Secondary Sidebar', 'genesis-customizer' ),
			'description' => __( 'This is the sidebar widget area if you are using a three column site layout option.', 'genesis-customizer' ),
		],
		'below-content'       => [
			'name'        => __( 'Below Content', 'genesis-customizer' ),
			'description' => __( 'This is the Below Content widget area.', 'genesis-customizer' ),
			'module'      => 'extra-widgets',
		],
		'above-footer'        => [
			'name'        => __( 'Above Footer', 'genesis-customizer' ),
			'description' => __( 'This is the Above Footer widget area.', 'genesis-customizer' ),
			'module'      => 'extra-widgets',
		],
		'below-footer'        => [
			'name'        => __( 'Below Footer', 'genesis-customizer' ),
			'description' => __( 'This is the Below Footer widget area.', 'genesis-customizer' ),
			'module'      => 'extra-widgets',
		],
	] );

	foreach ( $widget_areas as $id => $args ) {
		if ( isset( $args['module'] ) && ! _is_module_enabled( $args['module'] ) ) {
			continue;
		}

		genesis_register_sidebar( [
			'id'          => $id,
			'name'        => $args['name'],
			'description' => $args['description'],
		] );
	}
}

add_action( 'genesis_setup', __NAMESPACE__ . '\register_footer_widgets', 20 );
/**
 * Register footer widget areas depending on selected option.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_footer_widgets() {
	$setting = _get_value( 'footer_widgets_columns' );
	$columns = count( explode( '-', $setting ) );
	$count   = is_customize_preview() ? 4 : $columns;

	for ( $i = 1; $i <= $count; $i ++ ) {
		genesis_register_sidebar( [
			'id'          => 'footer-' . $i,
			'name'        => __( 'Footer ', 'genesis-customizer' ) . $i,
			'description' => __( 'This is the Footer ', 'genesis-customizer' ) . $i . __( ' widget area.', 'genesis-customizer' ),
		] );
	}
}

add_action( 'genesis_setup', __NAMESPACE__ . '\register_footer_credits', 20 );
/**
 * Display footer credits widget area.
 *
 * @since 1.0.0
 *
 * @return void
 */
function register_footer_credits() {
	$footer_credits = _get_value( 'footer_credits_type' );

	if ( 'widget' === $footer_credits || is_customize_preview() ) {
		genesis_register_sidebar( [
			'id'          => 'footer-credits',
			'name'        => __( 'Footer Credits', 'genesis-customizer' ),
			'description' => __( 'This is the Footer Credits widget area.', 'genesis-customizer' ),
		] );
	}
}

add_action( 'genesis_after_title_area', __NAMESPACE__ . '\header_right', 15 );
/**
 * Display Header Right widget area.
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
 * Display After Entry widget area.
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
