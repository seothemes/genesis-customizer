<?php

namespace GenesisCustomizer;

add_action( 'genesis_setup', __NAMESPACE__ . '\autoload', 5 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload() {
	if ( ! defined( 'KIRKI_VERSION' ) || ! function_exists( 'genesis' ) ) {
		return;
	}

	$files = [
		'utilities/*',
		'functions/*',
		'structure/*',
		'compat/*',
		'customizer/*',
	];

	foreach ( $files as $file ) {
		$files = glob( __DIR__ . DIRECTORY_SEPARATOR . $file . '.php' );

		foreach ( $files as $file_name ) {
			require_once $file_name;
		}
	}
}

add_action( 'genesis_setup', __NAMESPACE__ . '\autoload_admin_files', 6 );
/**
 * Description of expected behavior.
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
