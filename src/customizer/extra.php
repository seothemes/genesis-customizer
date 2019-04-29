<?php

namespace GenesisCustomizer;

add_action( 'customize_register', __NAMESPACE__ . '\custom_sections' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $wp_customize \WP_Customize_Manager
 *
 * @return void
 */
function custom_sections( $wp_customize ) {
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
				'button_url' => 'https://genesiscustomizer.com/',
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

add_action( 'genesis_setup', __NAMESPACE__ . '\go_pro', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function go_pro() {
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

//add_action( 'genesis_setup', __NAMESPACE__ . '\go_pro_fields', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function go_pro_fields() {
	if ( _is_pro_active() ) {
		return;
	}

	$handle   = _get_handle() . '_';
	$sections = [
		'archive_blog-layout',
		'code_css',
		'code_js',
		'footer_scroll-to-top',
		'header_search',
		'header_sticky',
		'header_transparent',
		'hero_settings',
		'menus_mega',
		'header_above',
		'footer_above',
	];
	$message  = sprintf(
		'<p>%s <strong>%s</strong>%s </p><a href="%s" target="_blank" class="button-primary">%s</a>',
		esc_html__( 'This feature is available in', 'genesis-customizer' ),
		esc_html__( 'Genesis Customizer Pro', 'genesis-customizer' ),
		esc_html__( '. Upgrade now for instant access!', 'genesis-customizer' ),
		esc_url( 'https://genesiscustomizer.com/pro' ),
		esc_html__( 'Go Pro →', 'genesis-customizer' )
	);

	foreach ( $sections as $section ) {
		\Kirki::add_field( $handle, [
			'section'  => $handle . $section,
			'settings' => $handle . $section . '-pro',
			'type'     => 'custom',
			'default'  => $message,
		] );
	}
}

add_action( 'genesis_setup', __NAMESPACE__ . '\add_misc_fields', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function add_misc_fields() {
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
			_get_upgrade_url(),
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
