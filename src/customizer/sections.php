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
	$panels = apply_filters( 'genesis_customizer_sections', [
		'general'     => [
			'license'     => __( 'License', 'genesis-customizer' ),
			'assets'      => __( 'Assets', 'genesis-customizer' ),
			'breakpoints' => __( 'Breakpoints', 'genesis-customizer' ),
			'typekit'     => __( 'Typekit', 'genesis-customizer' ),
		],
		'base'        => [
			'global'      => __( 'Global', 'genesis-customizer' ),
			'body'        => __( 'Body', 'genesis-customizer' ),
			'headings'    => __( 'Headings', 'genesis-customizer' ),
			'links'       => __( 'Links', 'genesis-customizer' ),
			'buttons'     => __( 'Buttons', 'genesis-customizer' ),
			'forms'       => __( 'Forms / Inputs', 'genesis-customizer' ),
			'blockquotes' => __( 'Blockquotes', 'genesis-customizer' ),
			'code'        => __( 'Code', 'genesis-customizer' ),
			'lists'       => __( 'Lists', 'genesis-customizer' ),
			'tables'      => __( 'Tables', 'genesis-customizer' ),
		],
		'header'      => [
			'above-header' => __( 'Above Header', 'genesis-customizer' ),
			'primary'      => __( 'Primary Header', 'genesis-customizer' ),
			'title-area'   => __( 'Title Area', 'genesis-customizer' ),
			'transparent'  => __( 'Transparent Header', 'genesis-customizer' ),
			'widget-areas' => __( 'Widget Areas', 'genesis-customizer' ),
			'sticky'       => __( 'Sticky Header', 'genesis-customizer' ),
			'search'       => __( 'Search', 'genesis-customizer' ),
		],
		'menus'       => [
			'primary'         => __( 'Primary Menu', 'genesis-customizer' ),
			'secondary'       => __( 'Secondary Menu', 'genesis-customizer' ),
			'mobile'          => __( 'Mobile Menu', 'genesis-customizer' ),
			'menu-toggle'     => __( 'Menu Toggle', 'genesis-customizer' ),
			'sub-menu'        => __( 'Sub Menu', 'genesis-customizer' ),
			'sub-menu-toggle' => __( 'Sub Menu Toggle', 'genesis-customizer' ),
			'mega'            => __( 'Mega Menu', 'genesis-customizer' ),
		],
		'hero'        => [
			'settings' => __( 'Settings', 'genesis-customizer' ),
		],
		'content'     => [
			'main'           => __( 'Main Content', 'genesis-customizer' ),
			'breadcrumbs'    => __( 'Breadcrumbs', 'genesis-customizer' ),
			'author-box'     => __( 'Author Box', 'genesis-customizer' ),
			'featured-image' => __( 'Featured Image', 'genesis-customizer' ),
			'avatar'         => __( 'Avatar', 'genesis-customizer' ),
			'sidebar'        => __( 'Sidebar', 'genesis-customizer' ),
		],
		'sidebars'    => [
			'primary'   => __( 'Primary Sidebar', 'genesis-customizer' ),
			'secondary' => __( 'Secondary Sidebar', 'genesis-customizer' ),
		],
		'single'      => [
			'entry'          => __( 'Entry', 'genesis-customizer' ),
			'after-entry'    => __( 'After Entry', 'genesis-customizer' ),
			'featured-image' => __( 'Featured Image', 'genesis-customizer' ),
			'post-meta'      => __( 'Post Meta', 'genesis-customizer' ),
			'comments'       => __( 'Comments', 'genesis-customizer' ),
		],
		'archive'     => [
			'entry'       => __( 'Entry', 'genesis-customizer' ),
			'description' => __( 'Archive Description', 'genesis-customizer' ),
			'post-meta'   => __( 'Post Meta', 'genesis-customizer' ),
			'read-more'   => __( 'Read More', 'genesis-customizer' ),
			'pagination'  => __( 'Pagination', 'genesis-customizer' ),
			'blog-layout' => __( 'Blog Layout', 'genesis-customizer' ),
		],
		'footer'      => [
			'above-footer'   => __( 'Above Footer', 'genesis-customizer' ),
			'site-footer'    => __( 'Site Footer', 'genesis-customizer' ),
			'footer-widgets' => __( 'Footer Widgets', 'genesis-customizer' ),
			'footer-credits' => __( 'Footer Credits', 'genesis-customizer' ),
			'scroll-to-top'  => __( 'Scroll to Top', 'genesis-customizer' ),
		],
		'code'        => [
			'css' => __( 'Custom CSS', 'genesis-customizer' ),
			'js'  => __( 'Custom JS', 'genesis-customizer' ),
		],
		'woocommerce' => [
			'test' => __( 'Test Setting', 'genesis-customizer' ),
		],
		'edd'         => [],
	] );

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

