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
 * @param $wp_customize
 *
 * @return void
 */
function modify_defaults( $wp_customize ) {
//	$wp_customize->get_control( 'custom_logo' )->section = _get_handle() . '_header_logo';

//	$wp_customize->get_section( 'title_tagline' )->panel = _get_handle() . '_general-settings';
//	$wp_customize->get_section( 'static_front_page' )->panel = _get_handle() . '_general-settings';

//	$wp_customize->remove_section( 'colors' );
//	$wp_customize->remove_section( 'header_image' );

	$wp_customize->remove_control( 'background_color' );
	$wp_customize->remove_control( 'header_textcolor' );
	$wp_customize->remove_control( 'header_text' );

	$wp_customize->get_section( 'header_image' )->panel = _get_handle() . '_hero';
	$wp_customize->get_section( 'header_image' )->title = __('Default Background', 'genesis-customizer');
	$wp_customize->get_section( 'header_image' )->priority = 15;

}
