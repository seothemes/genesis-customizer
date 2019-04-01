<?php

namespace GenesisCustomizer;

return [
	[
		'type'        => 'slider',
		'settings'    => 'content-sidebar-wrap-width',
		'label'       => __( 'Content Area Width', 'genesis-customizer' ),
		'description' => __( 'Controls the maximum width of the main content area. The main content area consists of the content and sidebars.', 'genesis-customizer' ),
		'default'     => '1024',
		'choices'     => [
			'min'  => 512,
			'max'  => 1920,
			'step' => 16,
		],
		'output'      => [
			[
				'element'  => '.content-sidebar-wrap',
				'property' => 'max-width',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3682',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing-mobile',
		'label'    => __( 'Vertical Spacing Mobile', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'     => [
					'.content',
				],
				'property'    => 'margin-top',
				'units'       => 'px',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'element'     => [
					'.sidebar:last-of-type',
				],
				'property'    => 'margin-bottom',
				'units'       => 'px',
				'media_query' => _get_media_query( 'max' ),
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing-desktop',
		'label'    => __( 'Vertical Spacing Desktop', 'genesis-customizer' ),
		'default'  => _get_size( 'xxl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => [
					'.content',
					'.sidebar',
				],
				'property'      => 'margin',
				'value_pattern' => '$px 0',
				'media_query'   => _get_media_query(),
			],
		],
	],
];
