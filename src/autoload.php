<?php

namespace GenesisCustomizer;

spl_autoload_register( __NAMESPACE__ . '\autoload_classes' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $class_name
 *
 * @return null|string
 */
function autoload_classes( $class_name ) {
	if ( 0 !== strpos( $class_name, __NAMESPACE__ ) ) {
		return null;
	}

	$search  = [ __NAMESPACE__, '\\', '_' ];
	$replace = [ '', '', '-', ];
	$file    = strtolower( str_replace( $search, $replace, $class_name ) );
	$class   = _get_path() . 'src/classes/class-' . $file . '.php';

	if ( file_exists( $class ) ) {
		require $class;
	}

	return $class;
}

add_action( 'genesis_setup', __NAMESPACE__ . '\autoload_files', 5 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function autoload_files() {
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
