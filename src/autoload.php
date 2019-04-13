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

add_action( 'after_setup_theme', __NAMESPACE__ . '\autoload_admin_files' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload_admin_files() {
	$files = [
		'utilities/*',
		'admin/*',
	];

	foreach ( $files as $file ) {
		$files = glob( __DIR__ . DIRECTORY_SEPARATOR . $file . '.php' );

		foreach ( $files as $file_name ) {
			require_once $file_name;
		}
	}
}
