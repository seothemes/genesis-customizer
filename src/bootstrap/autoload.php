<?php
/**
 * Genesis Customizer.
 *
 * This file adds the file autoloader to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_action( 'plugins_loaded', __NAMESPACE__ . '\autoload_dependencies' );
/**
 * Load Composer Autoloader file.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload_dependencies() {
	$composer = dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';

	if ( is_readable( $composer ) ) {
		require_once $composer;
	}
}

add_action( 'genesis_setup', __NAMESPACE__ . '\autoload_files', 5 );
/**
 * Loads public and admin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload_files() {
	$dirs = [
		'utilities/*',
		'functions/*',
		'structure/*',
		'compat/*',
		'customizer/*',
	];

	foreach ( $dirs as $dir ) {
		$files = glob( dirname( __DIR__ ) . DIRECTORY_SEPARATOR . $dir . '.php' );

		foreach ( $files as $file_name ) {
			require_once $file_name;
		}
	}
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\autoload_admin_files' );
/**
 * Loads admin-only files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload_admin_files() {
	if ( is_admin() ) {
		$files = glob( dirname( __DIR__ ) . DIRECTORY_SEPARATOR . 'admin/*.php' );

		foreach ( $files as $file_name ) {
			require_once $file_name;
		}
	}
}
