<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'custom',
		'settings' => 'tip',
		'default'  => sprintf(
			'<p><strong>%s</strong> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'These settings apply to desktop screen sizes only. To customize the sub menu toggle buttons for mobile devices, navigate to the ', 'genesis-customizer' ),
			esc_attr( '"genesis-customizer_menus_sub-menu-toggle"' ),
			esc_html__( 'Sub Menu Toggle Section', 'genesis-customizer' )
		),
	],
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background' => __( 'Sub Menu Background', 'genesis-customizer' ),
			'link'       => __( 'Sub Menu Link', 'genesis-customizer' ),
			'link-hover' => __( 'Sub Menu Link Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background' => _get_color( 'white' ),
			'link'       => _get_color( 'text' ),
			'link-hover' => _get_color( 'accent' ),
		],
		'output'   => [
			[
				'choice'      => 'background',
				'element'     => '.sub-menu',
				'property'    => 'background-color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'link',
				'element'     => [
					'.sub-menu',
					'.sub-menu .menu-item a',
				],
				'property'    => 'color',
				'media_query' => _get_media_query(),
			],
			[
				'choice'      => 'link-hover',
				'element'     => [
					'.sub-menu .menu-item a:hover',
					'.sub-menu .menu-item a:focus',
					'.sub-menu .current-menu-item > a',
				],
				'property'    => 'color',
				'media_query' => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
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
				'element'     => '.sub-menu a',
				'media_query' => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'width',
		'label'    => __( 'Width', 'genesis-customizer' ),
		'default'  => '200',
		'choices'  => [
			'min'  => 100,
			'max'  => 300,
			'step' => 1,
		],
		'output'   => [
			[
				'element'     => '.sub-menu',
				'property'    => 'min-width',
				'units'       => 'px',
				'media_query' => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-spacing',
		'label'    => __( 'Menu Item Spacing', 'genesis-customizer' ),
		'default'  => '6',
		'choices'  => [
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => '.sub-menu .menu-item a',
				'property'      => 'padding',
				'value_pattern' => '$px',
				'media_query'   => _get_media_query(),
			],
			[
				'element'       => '.sub-menu .menu-item',
				'property'      => 'padding',
				'value_pattern' => '0px',
				'media_query'   => _get_media_query(),
			],
		],
	],
];
