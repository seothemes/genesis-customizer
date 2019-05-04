<?php

namespace GenesisCustomizer;

add_action( 'genesis_setup', __NAMESPACE__ . '\autoload_files', 5 );
/**
 * Loads public and admin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload_files() {
	if ( ! defined( 'KIRKI_VERSION' ) || ! function_exists( 'genesis' ) ) {
		return;
	}

	$dirs = [
		'utilities/*',
		'functions/*',
		'structure/*',
		'compat/*',
		'customizer/*',
	];

	foreach ( $dirs as $dir ) {
		$files   = glob( __DIR__ . DIRECTORY_SEPARATOR . $dir . '.php' );

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
	if ( is_admin() && defined( 'KIRKI_VERSION' ) && function_exists( 'genesis' ) ) {
		$files = glob( __DIR__ . DIRECTORY_SEPARATOR . 'admin/*.php' );

		foreach ( $files as $file_name ) {
			require_once $file_name;
		}
	}
}
