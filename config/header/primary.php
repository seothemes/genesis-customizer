<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'radio-image',
		'settings' => 'layout',
		'label'    => __( 'Desktop Layout', 'genesis-customizer' ),
		'default'  => 'has-logo-left',
		'choices'  => apply_filters( 'genesis_customizer_header_layouts', [
			'has-logo-left'  => _get_url() . 'assets/img/logo-left.gif',
			'has-logo-above' => _get_url() . 'assets/img/logo-above.gif',
			'has-logo-right' => _get_url() . 'assets/img/logo-right.gif',
		] ),
	],
	[
		'type'            => 'custom',
		'settings'        => 'divider-0',
		'default'         => '<hr>',
		'active_callback' => function () {
			return _is_pro_active();
		},
	],
	[
		'type'            => 'custom',
		'settings'        => 'tip-1',
		'default'         => sprintf(
			'%s <strong>%s</strong>%s <br>&nbsp;<br><a href="%s" target="_blank" class="button-primary">%s</a><hr>',
			esc_html__( 'More header layout options available in', 'genesis-customizer' ),
			esc_html__( 'Genesis Customizer Pro', 'genesis-customizer' ),
			esc_html__( '!', 'genesis-customizer' ),
			esc_url( 'https://genesiscustomizer.com/pro' ),
			esc_html__( 'Go Pro →', 'genesis-customizer' )
		),
		'active_callback' => function () {
			return ! _is_pro_active();
		},
	],
	[
		'type'            => 'custom',
		'settings'        => 'divider-1',
		'default'         => '<hr>',
		'active_callback' => function () {
			return ! _is_pro_active();
		},
	],
	[
		'type'     => 'radio-image',
		'settings' => 'mobile-layout',
		'label'    => __( 'Mobile Layout', 'genesis-customizer' ),
		'default'  => 'has-logo-left-mobile',
		'choices'  => [
			'has-logo-left-mobile'  => _get_url() . 'assets/img/mobile-layout-1.gif',
			'has-logo-right-mobile' => _get_url() . 'assets/img/mobile-layout-3.gif',
			'has-logo-above-mobile' => _get_url() . 'assets/img/mobile-layout-2.gif',
			'has-logo-below-mobile' => _get_url() . 'assets/img/mobile-layout-4.gif',
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip-2',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong> %s <strong>%s</strong> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip:', 'genesis-customizer' ),
			esc_html__( 'Menu not aligning correctly? Try adjusting the', 'genesis-customizer' ),
			esc_html__( 'Alignment', 'genesis-customizer' ),
			esc_html__( 'in the', 'genesis-customizer' ),
			esc_attr( '"genesis-customizer_menus_primary"' ),
			esc_html__( 'Primary Menu Section', 'genesis-customizer' ),
			esc_html__( 'or the', 'genesis-customizer' ),
			esc_attr( '"genesis-customizer_menus_secondary"' ),
			esc_html__( 'Secondary Menu Section', 'genesis-customizer' )
		),
	],
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'    => __( 'Background', 'genesis-customizer' ),
			'border-top'    => __( 'Border Top', 'genesis-customizer' ),
			'border-bottom' => __( 'Border Bottom', 'genesis-customizer' ),
		],
		'default'  => [
			'background'    => _get_color( 'white' ),
			'border-top'    => _get_color( 'transparent' ),
			'border-bottom' => _get_color( 'transparent' ),
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.primary-header, .has-logo-side .site-header',
				'property' => 'background-color',
			],
			[
				'choice'   => 'border-top',
				'element'  => '.primary-header',
				'property' => 'border-top-color',
			],
			[
				'choice'   => 'border-bottom',
				'element'  => '.primary-header',
				'property' => 'border-bottom-color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip-3',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong>%s<a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'Transparent header colors override the Primary Header defaults. They can be customized from the ', 'genesis-customizer' ),
			esc_attr( '"genesis-customizer_header_transparent"' ),
			esc_html__( 'Transparent Header Section', 'genesis-customizer' )
		),
	],
	[
		'type'     => 'slider',
		'settings' => 'width',
		'label'    => __( 'Header Width', 'genesis-customizer' ),
		'default'  => '300',
		'choices'  => [
			'min'  => 100,
			'max'  => 600,
			'step' => 1,
		],
		'output'   => [
			[
				'element'     => '.has-logo-side .site-header',
				'property'    => 'width',
				'units'       => 'px',
				'media_query' => _get_media_query(),
			],
			[
				'element'     => '.has-logo-side .site-container',
				'property'    => 'padding-left',
				'units'       => 'px',
				'media_query' => _get_media_query(),
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'layout' ),
				'value'    => 'has-logo-side',
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'vertical-spacing',
		'label'    => __( 'Vertical Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 300,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => '.has-logo-side .primary-header',
				'property'      => 'padding',
				'value_pattern' => '$px 0',
				'media_query'   => _get_media_query(),
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'layout' ),
				'value'    => 'has-logo-side',
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'wrap-width',
		'label'    => __( 'Container Width', 'genesis-customizer' ),
		'default'  => '1152',
		'choices'  => [
			'min'  => 256,
			'max'  => 1920,
			'step' => 32,
		],
		'output'   => [
			[
				'element'  => '.site-header .wrap',
				'property' => 'max-width',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-83398',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimensions',
		'settings' => 'border-width',
		'label'    => __( 'Border', 'genesis-customizer' ),
		'default'  => [
			'border-top-width'    => '1px',
			'border-bottom-width' => '1px',
		],
		'choices'  => [
			'labels' => [
				'border-top-width'    => __( 'Border Top Width', 'genesis-customizer' ),
				'border-bottom-width' => __( 'Border Bottom Width', 'genesis-customizer' ),
			],
		],
		'output'   => [
			[
				'choice'   => 'border-top-width',
				'property' => 'border-top-width',
				'element'  => '.primary-header',
			],
			[
				'choice'   => 'border-bottom-width',
				'property' => 'border-bottom-width',
				'element'  => '.primary-header',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-398',
		'default'  => '<hr>',
	],
	[
		'type'     => 'kirki-box-shadow',
		'settings' => 'box-shadow',
		'label'    => __( 'Drop Shadow', 'genesis-customizer' ),
		'default'  => '0px 3px 6px 0px rgba(0,10,20,0.01)',
		'output'   => [
			[
				'element'  => '.primary-header',
				'property' => 'box-shadow',
			],
		],
	],
];
