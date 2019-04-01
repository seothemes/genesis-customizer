<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'        => __( 'Sidebar Background', 'genesis-customizer' ),
			'text'              => __( 'Text', 'genesis-customizer' ),
			'links'             => __( 'Links', 'genesis-customizer' ),
			'links-hover'       => __( 'Links Hover', 'genesis-customizer' ),
			'widget-background' => __( 'Widget Background', 'genesis-customizer' ),
			'widget-title'      => __( 'Widget Title', 'genesis-customizer' ),
		],
		'default'  => [
			'background'        => '',
			'text'              => '',
			'links'             => '',
			'links-hover'       => '',
			'widget-background' => _get_color( 'white' ),
			'widget-title'      => '',
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.sidebar-primary',
				'property' => 'background-color',
			],
			[
				'choice'   => 'text',
				'element'  => '.sidebar-primary',
				'property' => 'color',
			],
			[
				'choice'   => 'links',
				'element'  => '.sidebar-primary a',
				'property' => 'color',
			],
			[
				'choice'   => 'links-hover',
				'element'  => '.sidebar-primary a:hover, .sidebar-primary a:focus',
				'property' => 'color',
			],
			[
				'choice'   => 'widget-background',
				'element'  => '.sidebar-primary .widget',
				'property' => 'background-color',
			],
			[
				'choice'   => 'widget-title',
				'element'  => [
					'.sidebar-primary .widget-title',
					'.sidebar-primary .widgettitle',
				],
				'property' => 'color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'typography',
		'label'    => __( 'Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'    => '',
			'font-size'      => _get_size( 's' ),
			'variant'        => '',
			'line-height'    => '',
			'letter-spacing' => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element' => '.sidebar-primary',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'widget-title-typography',
		'label'    => __( 'Widget Title Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'    => '',
			'font-size'      => _get_size( 'l' ),
			'variant'        => '',
			'line-height'    => '',
			'letter-spacing' => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element' => '.sidebar-primary .widget-title',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'width',
		'label'    => __( 'Sidebar Width', 'genesis-customizer' ),
		'default'  => '264',
		'choices'  => [
			'min'  => 200,
			'max'  => 600,
			'step' => 1,
		],
		'output'   => [
			[
				'element'     => '.sidebar-primary',
				'property'    => 'width',
				'units'       => 'px',
				'media_query' => _get_media_query(),
			],
			[
				'element'         => [
					'.sidebar-content .content',
					'.content-sidebar .content',
					'.center-content .content',
				],
				'property'        => 'width',
				'value_pattern'   => 'calc(100% - $px - globalSpacingpx)',
				'pattern_replace' => [
					'globalSpacing' => 'genesis-customizer_base_global_gutter',
				],
				'media_query'     => _get_media_query(),
			],
			[
				'element'         => [
					'.content-sidebar-sidebar .content',
					'.sidebar-sidebar-content .content',
					'.sidebar-content-sidebar .content',
				],
				'property'        => 'width',
				'value_pattern'   => 'calc(100% - ( $px + sidebarSecondarypx ) - ( globalSpacingpx * 2 ))',
				'pattern_replace' => [
					'sidebarSecondary' => 'genesis-customizer_sidebars_secondary_width',
					'globalSpacing'    => 'genesis-customizer_base_global_gutter',
				],
				'media_query'     => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'widget-spacing',
		'label'    => __( 'Widget Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.sidebar-primary .widget',
				'property' => 'padding',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'     => 'kirki-box-shadow',
		'settings' => 'widget-box-shadow',
		'label'    => __( 'Widget Shadow', 'genesis-customizer' ),
		'default'  => '0px 3px 6px 0px rgba(0,10,20,0.01)',
		'output'   => [
			[
				'element'  => '.sidebar-primary .widget',
				'property' => 'box-shadow',
			],
		],
	],
];
