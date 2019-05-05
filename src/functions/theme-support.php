<?php
/**
 * Genesis Customizer.
 *
 * This file adds theme support to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_action( 'genesis_setup', __NAMESPACE__ . '\add_theme_supports', 15 );
/**
 * Adds theme support.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_theme_supports() {
	add_theme_support( 'align-wide' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'dark-editor-style' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'genesis-accessibility' );
	add_theme_support( 'genesis-responsive-viewport' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'custom-logo', [
		'height'      => 100,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => '',
	] );
	add_theme_support( 'genesis-accessibility', [
		'404-page',
		'drop-down-menu',
		'headings',
		'rems',
		'search-form',
		'skip-links',
	] );
	add_theme_support( 'genesis-menus', [
		'primary'   => __( 'Primary Menu', 'genesis-customizer' ),
		'secondary' => __( 'Secondary Menu', 'genesis-customizer' ),
		'footer'    => __( 'Footer Menu', 'genesis-customizer' ),
	] );
	add_theme_support( 'genesis-structural-wraps', [
		'header',
		'menu-secondary',
		'menu-footer',
		'hero-section',
		'footer-widgets',
		'footer-credits',
	] );
	add_theme_support( 'html5', [
		'caption',
		'comment-form',
		'comment-list',
		'gallery',
		'search-form',
	] );
}
