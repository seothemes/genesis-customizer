<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'link'       => __( 'Link', 'genesis-customizer' ),
			'link-hover' => __( 'Link Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'link'       => _get_color( 'text' ),
			'link-hover' => _get_color( 'accent' ),
		],
		'output'   => [
			[
				'choice'   => 'link',
				'element'  => '.menu-primary a',
				'property' => 'color',
			],
			[
				'choice'   => 'link-hover',
				'element'  => [
					'.menu-primary a:hover',
					'.menu-primary a:focus',
					'.menu-primary .current-menu-item > a',
				],
				'property' => 'color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip-1',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a> %s</p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'These settings are for the default desktop colors only and will be overridden by ', 'genesis-customizer' ),
			esc_attr( '"genesis-customizer_menus_mobile"' ),
			esc_html__( 'Mobile Menu', 'genesis-customizer' ),
			esc_html__( 'and', 'genesis-customizer' ),
			esc_attr( '"genesis-customizer_header_transparent"' ),
			esc_html__( 'Transparent Header', 'genesis-customizer' ),
			esc_html__( 'settings.', 'genesis-customizer' )
		),
	],
	[
		'type'     => 'typography',
		'settings' => 'typography',
		'label'    => __( 'Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'    => '',
			'font-size'      => '',
			'variant'        => '',
			'line-height'    => '',
			'letter-spacing' => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element'     => '.menu-primary a',
				'media_query' => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'      => 'select',
		'settings'  => 'alignment',
		'label'     => __( 'Align Menu', 'genesis-customizer' ),
		'default'   => 'center',
		'transport' => 'refresh',
		'choices'   => [
			'flex-start' => __( 'Left', 'genesis-customizer' ),
			'center'     => __( 'Center', 'genesis-customizer' ),
			'flex-end'   => __( 'Right', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-vertical-spacing',
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
				'media_query'   => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-horizontal-spacing',
		'label'    => __( 'Menu Item Horizontal Spacing', 'genesis-customizer' ),
		'default'  => '10',
		'choices'  => [
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => '.menu-primary .menu-item',
				'property'      => 'padding',
				'value_pattern' => '0 $px',
				'media_query'   => _get_media_query(),
			],
		],
	],
];
