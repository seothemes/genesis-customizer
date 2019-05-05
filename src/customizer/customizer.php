<?php
/**
 * Genesis Customizer.
 *
 * This file adds general Customizer functionality to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_filter( 'kirki_control_types', __NAMESPACE__ . '\register_controls' );
/**
 * Registers new Customizer controls with Kirki.
 *
 * @since 1.0.0
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
 * Registers the control type and makes it eligible for JS templating.
 *
 * @since 1.0.0
 *
 * @param \WP_Customize_Manager $wp_customize The Customizer object.
 *
 * @return void
 */
function register_control_types( $wp_customize ) {
	$wp_customize->register_control_type( __NAMESPACE__ . '\Box_Shadow_Control' );

	require_once _get_path() . 'src/classes/class-select-control.php';
}

add_action( 'customize_register', __NAMESPACE__ . '\modify_customizer_defaults', 100 );
/**
 * Modify default Customizer controls and sections.
 *
 * @since 1.0.0
 *
 * @param \WP_Customize_Manager $wp_customize WordPress Customizer object.
 *
 * @return void
 */
function modify_customizer_defaults( $wp_customize ) {
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
 * Adds default settings to database upon activation.
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
		$name = str_replace( [ $handle, '[', ']' ], '', $setting );

		if ( ! isset( $options[ $name ] ) ) {
			$options[ $name ] = _get_default( $name );
		}
	}

	update_option( $handle, $options );
}

add_filter( 'genesis_customizer_field', __NAMESPACE__ . '\add_font_choices', 10, 2 );
/**
 * Allows custom fonts to be added to typography controls.
 *
 * @since 1.0.0
 *
 * @param array $field Field settings.
 *
 * @return mixed
 */
function add_font_choices( $field ) {
	if ( 'typography' === $field['type'] ) {
		$field['choices'] = [
			'fonts' => apply_filters( 'genesis_customizer_font_choices', [] ),
		];
	}

	return $field;
}

add_filter( 'genesis_customizer_font_choices', __NAMESPACE__ . '\add_font_group', 20 );
/**
 * Adds system fonts to typography controls.
 *
 * @since 1.0.0
 *
 * @param array $custom Array of custom fonts.
 *
 * @return mixed
 */
function add_font_group( $custom ) {
	$fonts = [
		'Helvetica, Arial, sans-serif',
		'Verdana, sans-serif',
		'Arial, Helvetica, sans-serif',
		'Times, Georgia, serif',
		'Georgia, Times, serif',
		'Courier, monospace',
	];

	$custom['families']['system']['text'] = esc_attr__( 'System', 'genesis-customizer' );

	foreach ( $fonts as $font ) {
		$text = explode( ', ', $font );

		$custom['families']['system']['children'][] = [
			'id'   => $font,
			'text' => $text[0],
		];

		$custom['variants'][ $font ] = [ '200', '300', '400', '600', '700' ];
	}

	return $custom;
}


add_action( 'customize_register', __NAMESPACE__ . '\register_custom_sections' );
/**
 * Register custom sections with the Customizer.
 *
 * @since 1.0.0
 *
 * @param \WP_Customize_Manager $wp_customize The Customizer object.
 *
 * @return void
 */
function register_custom_sections( $wp_customize ) {
	$handle = _get_handle();

	$wp_customize->register_section_type( __NAMESPACE__ . '\Link_Section' );
	$wp_customize->register_section_type( __NAMESPACE__ . '\Hidden_Section' );

	$wp_customize->add_section(
		new Link_Section(
			$wp_customize,
			$handle . '_pro',
			[
				'title'      => __( 'Upgrade to Genesis Customizer Pro', 'genesis-customizer' ),
				'priority'   => 0,
				'type'       => 'genesis-customizer-link',
				'button_url' => _get_upgrade_link(),
			]
		)
	);

	$wp_customize->add_section(
		new Hidden_Section(
			$wp_customize,
			$handle,
			[
				'panel'    => $handle,
				'title'    => $handle,
				'priority' => 0,
				'type'     => 'genesis-customizer-hidden',
			]
		)
	);
}

add_action( 'genesis_setup', __NAMESPACE__ . '\go_pro_section', 15 );
/**
 * Add Pro upgrade link to Customizer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function go_pro_section() {
	$handle = _get_handle();
	$title  = _get_name();

	\Kirki::add_panel( $handle, [
		'title'    => $title,
		'priority' => 1,
	] );

	\Kirki::add_field( $handle, [
		'section'  => $handle,
		'settings' => $handle,
		'type'     => 'hidden',
	] );

	if ( ! _is_pro_active() ) {
		\Kirki::add_field( $handle . '_pro', [
			'section'  => $handle . '_pro',
			'settings' => $handle . '_pro',
			'type'     => 'hidden',
		] );
	}
}
