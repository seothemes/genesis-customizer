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
			'border'     => __( 'Border', 'genesis-customizer' ),
		],
		'default'  => [
			'link'       => _get_color( 'text' ),
			'link-hover' => _get_color( 'accent' ),
			'border'     => '',
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
			[
				'choice'   => 'border',
				'element'  => '.nav-primary',
				'property' => 'border-color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a> %s</p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'These settings are for the default desktop colors only and will be overridden by the ', 'genesis-customizer' ),
			esc_attr( '"genesis-customizer_menus_mobile"' ),
			esc_html__( 'Mobile Menu', 'genesis-customizer' ),
			esc_html__( 'settings on smaller screens.', 'genesis-customizer' )
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
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'select',
		'settings' => 'alignment',
		'label'    => __( 'Align Menu', 'genesis-customizer' ),
		'default'  => 'flex-end',
		'choices'  => [
			'flex-start' => __( 'Left', 'genesis-customizer' ),
			'center'     => __( 'Center', 'genesis-customizer' ),
			'flex-end'   => __( 'Right', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-vertical-spacing',
		'label'    => __( 'Menu Item Vertical Spacing', 'genesis-customizer' ),
		'default'  => '10',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
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
			'max'  => 100,
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
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimensions',
		'settings' => 'border-width',
		'label'    => __( 'Border Width', 'genesis-customizer' ),
		'default'  => [
			'border-top-width'    => '',
			'border-bottom-width' => '',
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
				'element'  => '.nav-primary',
			],
			[
				'choice'   => 'border-bottom-width',
				'property' => 'border-bottom-width',
				'element'  => '.nav-primary',
			],
		],
	],
];
