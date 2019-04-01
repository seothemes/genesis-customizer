<?php

namespace GenesisCustomizer;

add_action( 'genesis_setup', __NAMESPACE__ . '\add_theme_supports', 15 );
/**
 * Description of expected behavior.
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
	add_theme_support( 'custom-header', [
		'header-selector'  => 'section.hero-section',
		'default_image'    => _get_url() . 'assets/img/hero-section.jpg',
		'header-text'      => false,
		'width'            => 1280,
		'height'           => 720,
		'flex-height'      => true,
		'flex-width'       => true,
		'uploads'          => true,
		'video'            => false,
		'wp-head-callback' => __NAMESPACE__ . '\custom_header',
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
	] );
	add_theme_support( 'genesis-structural-wraps', [
		'header',
		'menu-secondary',
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
