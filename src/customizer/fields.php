<?php

namespace GenesisCustomizer;

add_action( 'genesis_setup', __NAMESPACE__ . '\add_fields' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array|mixed
 */
function add_fields() {
	$fields  = [];
	$path    = _get_path();
	$handle  = _get_handle();
	$configs = apply_filters( 'genesis_customizer_config', [ $path . 'config' ] );

	foreach ( $configs as $config ) {
		foreach ( glob( $config . '/*', GLOB_ONLYDIR ) as $panel ) {
			foreach ( glob( $panel . '/*.php' ) as $section_path ) {
				$panel   = basename( dirname( $section_path ) );
				$section = basename( $section_path, '.php' );
				$prefix  = $handle . '_' . $panel . '_' . $section;
				$fields  = require_once $section_path;

				if ( ! is_array( $fields ) ) {
					continue;
				}

				foreach ( $fields as $field ) {
					\Kirki::add_field( $handle, apply_filters( 'genesis_customizer_field', $field, $prefix ) );
				}
			}
		}
	}

	return $fields;
}

add_filter( 'genesis_customizer_field', __NAMESPACE__ . '\format_field', 10, 2 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $field
 * @param $prefix
 *
 * @return array
 */
function format_field( $field, $prefix ) {
	$field['section']  = $prefix;
	$field['settings'] = $prefix . '_' . $field['settings'];

	// Allow for element arrays.
	if ( isset( $field['output'] ) && $field['output'] ) {
		foreach ( $field['output'] as $output ) {
			if ( isset( $output['element'] ) && is_array( $output['element'] ) ) {
				$output['element'] = implode( ',', $output['element'] );
			}
		}

		// Set transport for fields with output
		if ( ! isset( $field['transport'] ) ) {
			$field['transport'] = 'auto';
		}
	}

	return $field;
}
