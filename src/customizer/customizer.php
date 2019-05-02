<?php

namespace GenesisCustomizer;

add_filter( 'kirki_control_types', __NAMESPACE__ . '\register_controls' );
/**
 * Registers the control with Kirki.
 *
 * @since 1.0
 *
 * @param array $controls An array of controls registered with the Kirki Toolkit.
 *
 * @return array
 */
function register_controls( $controls ) {
	$controls['kirki-box-shadow'] = __NAMESPACE__ . '\Box_Shadow_Control';
	$controls['core_select']      = __NAMESPACE__ . '\Select_Control';

	return $controls;
}

add_action( 'customize_register', __NAMESPACE__ . '\register_control_types' );
/**
 * Registers the control type and make it eligible for
 * JS templating in the Customizer.
 *
 * @since 1.0
 *
 * @param object $wp_customize The Customizer object.
 *
 * @return void
 */
function register_control_types( $wp_customize ) {
	$wp_customize->register_control_type( __NAMESPACE__ . '\Box_Shadow_Control' );

	require_once _get_path() . 'src/classes/class-select-control.php';
}

add_action( 'customize_register', __NAMESPACE__ . '\modify_defaults', 100 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $wp_customize \WP_Customize_Manager
 *
 * @return void
 */
function modify_defaults( $wp_customize ) {
	$wp_customize->remove_control( 'background_color' );
	$wp_customize->remove_control( 'header_textcolor' );
	$wp_customize->remove_control( 'header_text' );

	$wp_customize->get_section( 'header_image' )->panel    = _get_handle() . '_hero';
	$wp_customize->get_section( 'header_image' )->title    = __( 'Default Background', 'genesis-customizer' );
	$wp_customize->get_section( 'header_image' )->priority = 15;

	if ( ! _is_pro_active() ) {
		$wp_customize->remove_section( 'header_image' );
	}
}

add_action( 'customize_controls_print_styles', __NAMESPACE__ . '\customizer_styles', 99 );
/**
 * Adds custom styles to Customizer screen.
 *
 * @since  1.0.0
 *
 * @return void
 */
function customizer_styles() {
	wp_register_style(
		_get_handle() . '-customizer',
		_get_url() . 'assets/css/customizer.css',
		[ 'dashicons' ],
		_get_asset_version( 'css/customizer.css' ),
		'all'
	);

	wp_enqueue_style( _get_handle() . '-customizer' );
}

add_action( 'customize_controls_print_scripts', __NAMESPACE__ . '\customizer_scripts', 999 );
/**
 * Adds custom inline scripts to Customizer screen.
 *
 * @since 1.0.0
 *
 * @return void
 */
function customizer_scripts() {
	wp_register_script(
		_get_handle() . '-customizer',
		_get_url() . 'assets/js/customizer.js',
		null,
		_get_asset_version( 'js/customizer.js' ),
		'all'
	);

	wp_enqueue_script( _get_handle() . '-customizer' );
}

add_action( 'init', __NAMESPACE__ . '\add_default_values_to_db' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_default_values_to_db() {
	$handle  = _get_handle();
	$options = _get_option();

	// Only run once.
	if ( isset( $options['loaded'] ) && true === $options['loaded'] ) {
		return;
	}

	$options['loaded'] = true;

	$settings = \Kirki::$fields;

	foreach ( $settings as $setting => $args ) {
		$name = str_replace( [ $handle, '[', ']', ], '', $setting );

		if ( ! isset( $options[ $name ] ) ) {
			$options[ $name ] = _get_default( $name );
		}
	}

	update_option( $handle, $options );
}

add_filter( 'genesis_customizer_field', __NAMESPACE__ . '\add_font_choices', 10, 2 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $field
 *
 * @return mixed
 */
function add_font_choices( $field ) {
	if ( $field['type'] === 'typography' ) {
		$field['choices'] = [
			'fonts' => apply_filters( 'genesis_customizer_font_choices', [] ),
		];
	}

	return $field;
}

add_filter( 'genesis_customizer_font_choices', __NAMESPACE__ . '\add_font_group', 20 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $custom
 *
 * @return mixed
 */
function add_font_group( $custom ) {
	$custom['families']['system'] = [
		'text'     => esc_attr__( 'System', 'genesis-customizer' ),
		'children' => [
			[
				'id'   => 'Helvetica, Arial, sans-serif',
				'text' => 'Helvetica',
			],
			[
				'id'   => 'Verdana, sans-serif',
				'text' => 'Verdana',
			],
			[
				'id'   => 'Arial, Helvetica, sans-serif',
				'text' => 'Arial',
			],
			[
				'id'   => 'Times, Georgia, serif',
				'text' => 'Times',
			],
			[
				'id'   => 'Georgia, Times, serif',
				'text' => 'Georgia',
			],
			[
				'id'   => 'Courier, monospace',
				'text' => 'Courier',
			],
		],
	];

	$custom['variants'] = [
		'Helvetica, Arial, sans-serif' => [ '200', '300', '400', '600', '700' ],
		'Verdana, sans-serif'          => [ '200', '300', '400', '600', '700' ],
		'Arial, Helvetica, sans-serif' => [ '200', '300', '400', '600', '700' ],
		'Times, Georgia, serif'        => [ '200', '300', '400', '600', '700' ],
		'Georgia, Times, serif'        => [ '200', '300', '400', '600', '700' ],
		'Courier, monospace'           => [ '200', '300', '400', '600', '700' ],
	];

	return $custom;
}
