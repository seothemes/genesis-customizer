<?php
/**
 * Genesis Customizer.
 *
 * This file adds Customizer sections to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

/**
 * Returns array of default Customizer panels and sections.
 *
 * @since 1.0.0
 *
 * @return array
 */
function _get_default_sections() {
	return [
		'base'     => [
			'global'      => __( 'Global', 'genesis-customizer' ),
			'body'        => __( 'Body', 'genesis-customizer' ),
			'headings'    => __( 'Headings', 'genesis-customizer' ),
			'links'       => __( 'Links', 'genesis-customizer' ),
			'buttons'     => __( 'Buttons', 'genesis-customizer' ),
			'inputs'      => __( 'Inputs', 'genesis-customizer' ),
			'blockquotes' => __( 'Blockquotes', 'genesis-customizer' ),
			'code'        => __( 'Code', 'genesis-customizer' ),
			'lists'       => __( 'Lists', 'genesis-customizer' ),
			'tables'      => __( 'Tables', 'genesis-customizer' ),
		],
		'header'   => [
			'primary'    => __( 'Primary Header', 'genesis-customizer' ),
			'title-area' => __( 'Title Area', 'genesis-customizer' ),
			'right'      => __( 'Header Right', 'genesis-customizer' ),
		],
		'menus'    => [
			'primary'         => __( 'Primary Menu', 'genesis-customizer' ),
			'secondary'       => __( 'Secondary Menu', 'genesis-customizer' ),
			'mobile'          => __( 'Mobile Menu', 'genesis-customizer' ),
			'menu-toggle'     => __( 'Menu Toggle', 'genesis-customizer' ),
			'sub-menu'        => __( 'Sub Menu', 'genesis-customizer' ),
			'sub-menu-toggle' => __( 'Sub Menu Toggle', 'genesis-customizer' ),
			'footer'          => __( 'Footer Menu', 'genesis-customizer' ),
			'footer-widgets'  => __( 'Footer Widgets Menu', 'genesis-customizer' ),
			'social'          => __( 'Social Menu', 'genesis-customizer' ),
		],
		'hero'     => [
			'settings' => __( 'Settings', 'genesis-customizer' ),
		],
		'content'  => [
			'main'           => __( 'Main Content', 'genesis-customizer' ),
			'breadcrumbs'    => __( 'Breadcrumbs', 'genesis-customizer' ),
			'author-box'     => __( 'Author Box', 'genesis-customizer' ),
			'featured-image' => __( 'Featured Image', 'genesis-customizer' ),
			'avatar'         => __( 'Avatar', 'genesis-customizer' ),
			'sidebar'        => __( 'Sidebar', 'genesis-customizer' ),
			'search-form'    => __( 'Search Form', 'genesis-customizer' ),
		],
		'sidebars' => [
			'primary'          => __( 'Primary Sidebar', 'genesis-customizer' ),
			'secondary'        => __( 'Secondary Sidebar', 'genesis-customizer' ),
			'featured-content' => __( 'Featured Content', 'genesis-customizer' ),
		],
		'single'   => [
			'entry'          => __( 'Entry', 'genesis-customizer' ),
			'after-entry'    => __( 'After Entry', 'genesis-customizer' ),
			'featured-image' => __( 'Featured Image', 'genesis-customizer' ),
			'post-meta'      => __( 'Post Meta', 'genesis-customizer' ),
			'comments'       => __( 'Comments', 'genesis-customizer' ),
		],
		'archive'  => [
			'settings'    => __( 'Settings', 'genesis-customizer' ),
			'entries'     => __( 'Entries', 'genesis-customizer' ),
			'description' => __( 'Archive Description', 'genesis-customizer' ),
			'post-info'   => __( 'Post Info', 'genesis-customizer' ),
			'read-more'   => __( 'Read More', 'genesis-customizer' ),
			'pagination'  => __( 'Pagination', 'genesis-customizer' ),
		],
		'footer'   => [
			'site-footer' => __( 'Site Footer', 'genesis-customizer' ),
			'widgets'     => __( 'Footer Widgets', 'genesis-customizer' ),
			'credits'     => __( 'Footer Credits', 'genesis-customizer' ),
		],
	];
}

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
