<?php
/**
 * Genesis Customizer.
 *
 * This file adds extra Customizer fields to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_action( 'genesis_setup', __NAMESPACE__ . '\add_extra_fields', 15 );
/**
 * Add extra fields not specified in config to Customizer.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_extra_fields() {
	$handle = _get_handle();

	\Kirki::add_field( $handle, [
		'type'     => 'custom',
		'section'  => 'title_tagline',
		'settings' => 'logo_divider-1',
		'priority' => 8,
		'default'  => '<hr>',
	] );

	\Kirki::add_field( $handle, [
		'type'            => 'slider',
		'section'         => 'title_tagline',
		'settings'        => 'logo_width',
		'label'           => __( 'Logo Width', 'genesis-customizer' ),
		'transport'       => 'auto',
		'priority'        => 8,
		'default'         => '200',
		'choices'         => [
			'min'  => 0,
			'max'  => 600,
			'step' => 1,
		],
		'output'          => [
			[
				'element'  => '.custom-logo',
				'property' => 'width',
				'units'    => 'px',
			],
		],
		'active_callback' => function () {
			return ! _is_pro_active();
		},
	] );

	if ( _is_pro_active() ) {

		\Kirki::add_field( $handle, [
			'type'      => 'slider',
			'section'   => 'title_tagline',
			'settings'  => 'logo_width_mobile',
			'label'     => __( 'Logo Width Mobile', 'genesis-customizer' ),
			'transport' => 'auto',
			'priority'  => 8,
			'default'   => '200',
			'choices'   => [
				'min'  => 0,
				'max'  => 600,
				'step' => 1,
			],
			'output'    => [
				[
					'element'     => '.custom-logo',
					'property'    => 'width',
					'units'       => 'px',
					'media_query' => _get_media_query( 'max' ),
				],
			],
		] );

		\Kirki::add_field( $handle, [
			'type'      => 'slider',
			'section'   => 'title_tagline',
			'settings'  => 'logo_width_desktop',
			'label'     => __( 'Logo Width Desktop', 'genesis-customizer' ),
			'transport' => 'auto',
			'priority'  => 8,
			'default'   => '200',
			'choices'   => [
				'min'  => 0,
				'max'  => 600,
				'step' => 1,
			],
			'output'    => [
				[
					'element'     => '.custom-logo',
					'property'    => 'width',
					'units'       => 'px',
					'media_query' => _get_media_query(),
				],
			],
		] );
	}

	\Kirki::add_field( $handle, [
		'type'      => 'slider',
		'section'   => 'title_tagline',
		'settings'  => 'logo_spacing',
		'label'     => __( 'Logo Spacing', 'genesis-customizer' ),
		'transport' => 'auto',
		'priority'  => 8,
		'default'   => '16',
		'choices'   => [
			'min'  => - 20,
			'max'  => 100,
			'step' => 1,
		],
		'output'    => [
			[
				'element'       => '.custom-logo',
				'property'      => 'margin',
				'value_pattern' => '$px 0',
			],
		],
	] );

	\Kirki::add_field( $handle, [
		'type'            => 'custom',
		'section'         => 'title_tagline',
		'settings'        => 'logo_divider-232972',
		'priority'        => 8,
		'default'         => '<hr>',
		'active_callback' => function () {
			return _is_pro_active();
		},
	] );

	\Kirki::add_field( $handle, [
		'type'            => 'custom',
		'settings'        => 'tip',
		'section'         => 'title_tagline',
		'priority'        => 8,
		'default'         => sprintf(
			'<hr><p>%s <strong>%s</strong>%s </p><a href="%s" target="_blank" class="button-primary">%s</a>',
			esc_html__( 'Responsive logo settings (desktop and mobile width) available in', 'genesis-customizer' ),
			esc_html__( 'Genesis Customizer Pro', 'genesis-customizer' ),
			esc_html__( '!', 'genesis-customizer' ),
			_get_upgrade_link(),
			esc_html__( 'Go Pro →', 'genesis-customizer' )
		),
		'active_callback' => function () {
			return ! _is_pro_active();
		},
	] );

	\Kirki::add_field( $handle, [
		'type'            => 'custom',
		'section'         => 'title_tagline',
		'settings'        => 'logo_divider-23252',
		'priority'        => 8,
		'default'         => '<hr>',
		'active_callback' => function () {
			return ! _is_pro_active();
		},
	] );

	\Kirki::add_field( $handle, [
		'type'     => 'checkbox',
		'section'  => 'title_tagline',
		'settings' => 'title',
		'label'    => __( 'Display site title?', 'genesis-customizer' ),
		'priority' => 20,
		'default'  => true,
	] );

	\Kirki::add_field( $handle, [
		'type'     => 'checkbox',
		'section'  => 'title_tagline',
		'settings' => 'tagline',
		'label'    => __( 'Display tagline?', 'genesis-customizer' ),
		'priority' => 20,
		'default'  => true,
	] );

	\Kirki::add_field( $handle, [
		'type'     => 'custom',
		'section'  => 'title_tagline',
		'settings' => 'logo_divider-2986',
		'priority' => 21,
		'default'  => '<hr>',
	] );

	if ( _is_pro_active() ) {
		\Kirki::add_field( $handle, [
			'type'     => 'custom',
			'section'  => 'title_tagline',
			'settings' => 'tip',
			'priority' => 7,
			'default'  => sprintf(
				'<p><strong>%s</strong> %s <a href="javascript:wp.customize.control( %s ).focus();">%s</a></p><hr>',
				esc_html__( 'Tip: ', 'genesis-customizer' ),
				esc_html__( 'Using a transparent header? Set an alternative logo from the  ', 'genesis-customizer' ),
				esc_attr( '"genesis-customizer_header_transparent_different-logo"' ),
				esc_html__( 'Transparent Header Logo Setting', 'genesis-customizer' )
			),
		] );
	}
}
