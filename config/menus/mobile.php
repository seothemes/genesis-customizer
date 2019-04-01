<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'  => __( 'Background', 'genesis-customizer' ),
			'overlay'     => __( 'Overlay', 'genesis-customizer' ),
			'links'       => __( 'Links', 'genesis-customizer' ),
			'links-hover' => __( 'Links Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background'  => _get_color( 'white' ),
			'overlay'     => _get_color( 'overlay' ),
			'links'       => _get_color( 'text' ),
			'links-hover' => _get_color( 'text' ),
		],
		'output'   => [
			[
				'choice'      => 'background',
				'element'     => '.nav-primary',
				'property'    => 'background-color',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'choice'   => 'overlay',
				'element'  => '.menu-overlay',
				'property' => 'background-color',
			],
			[
				'choice'      => 'links',
				'element'     => '.menu-primary a',
				'property'    => 'color',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'choice'      => 'links-hover',
				'element'     => [
					'.menu-primary a:hover',
					'.menu-primary a:focus',
				],
				'property'    => 'color',
				'media_query' => _get_media_query( 'max' ),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-232',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-spacing',
		'label'    => __( 'Menu Item Vertical Spacing', 'genesis-customizer' ),
		'default'  => '10',
		'choices'  => [
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => '.menu-primary a',
				'property'      => 'padding',
				'value_pattern' => '$px 0',
				'media_query'   => _get_media_query( 'max' ),
			],
			[
				'element'       => '.nav-primary',
				'property'      => 'padding',
				'value_pattern' => '$px 0',
				'media_query'   => _get_media_query( 'max' ),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'            => 'radio-buttonset',
		'settings'        => 'position',
		'label'           => esc_html__( 'Positioning', 'genesis-customizer' ),
		'default'         => 'absolute',
		'choices'         => [
			'absolute' => esc_html__( 'Absolute', 'genesis-customizer' ),
			'relative' => esc_html__( 'Relative', 'genesis-customizer' ),
		],
		'output'          => [
			[
				'element'     => '.nav-primary',
				'property'    => 'position',
				'media_query' => _get_media_query( 'max' ),
			],
		],
		'active_callback' => [
			[
				'setting'  => _get_setting( 'animation' ),
				'value'    => 'has-mobile-menu-left',
				'operator' => '!==',
			],
			[
				'setting'  => _get_setting( 'animation' ),
				'value'    => 'has-mobile-menu-right',
				'operator' => '!==',
			],
			[
				'setting'  => _get_setting( 'animation' ),
				'value'    => 'has-mobile-menu-center',
				'operator' => '!==',
			],
		],
	],
	[
		'type'            => 'custom',
		'settings'        => 'tip-1',
		'default'         => sprintf(
			'<hr><p>%s <strong>%s</strong>%s </p><a href="%s" target="_blank" class="button-primary">%s</a>',
			esc_html__( 'More mobile menu options available in', 'genesis-customizer' ),
			esc_html__( 'Genesis Customizer Pro', 'genesis-customizer' ),
			esc_html__( '!', 'genesis-customizer' ),
			esc_url( 'https://genesiscustomizer.com/pro' ),
			esc_html__( 'Go Pro →', 'genesis-customizer' )
		),
		'active_callback' => function () {
			return ! _is_pro_active();
		},
	],
];
