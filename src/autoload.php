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
	$types = [
		'public' => [
			'utilities/*',
			'functions/*',
			'structure/*',
			'compat/*',
			'customizer/*',
		],
		'admin'  => [
			'admin/*',
		],
	];

	foreach ( $types as $type => $files ) {
		foreach ( $files as $file ) {
			$files = glob( __DIR__ . DIRECTORY_SEPARATOR . $file . '.php' );

			foreach ( $files as $file_name ) {
				if ( 'admin' === $type && ! is_admin() ) {
					continue;
				}

				require_once $file_name;
			}
		}
	}
}
