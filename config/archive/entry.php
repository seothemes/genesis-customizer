<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'             => __( 'Background', 'genesis-customizer' ),
			'entry-title-link'       => __( 'Entry Title Link', 'genesis-customizer' ),
			'entry-title-link-hover' => __( 'Entry Title Link Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background'             => _get_color( 'white' ),
			'entry-title-link'       => _get_color( 'heading' ),
			'entry-title-link-hover' => _get_color( 'accent' ),
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.entry',
				'property' => 'background-color'
			],
			[
				'choice'   => 'entry-title-link',
				'element'  => '.entry-title-link',
				'property' => 'color'
			],
			[
				'choice'   => 'entry-title-link-hover',
				'element'  => '.entry-title-link:hover, .entry-title-link:focus',
				'property' => 'color'
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
		'settings' => 'entry-title-typography',
		'label'    => __( 'Entry Title Typography', 'genesis-customizer' ),
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
				'element' => '.entry-title-link',
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
		'settings' => 'entry-meta-typography',
		'label'    => __( 'Entry Meta Typography', 'genesis-customizer' ),
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
				'element' => '.archive .entry-meta',
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
		'settings' => 'spacing',
		'label'    => __( 'Entry Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.entry',
				'property' => 'padding',
				'units'    => 'px',
			],
			[
				'element'  => '.featured-image-first .no-spacing',
				'property' => 'margin-top',
				'units'    => 'px',
				'prefix'   => '-',
			],
			[
				'element'  => '.entry-image-link.no-spacing',
				'property' => 'margin-left',
				'units'    => 'px',
				'prefix'   => '-',
			],
			[
				'element'  => '.entry-image-link.no-spacing',
				'property' => 'margin-right',
				'units'    => 'px',
				'prefix'   => '-',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'border-radius',
		'label'    => __( 'Entry Border Radius', 'genesis-customizer' ),
		'default'  => '2',
		'choices'  => [
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => [
					'.archive-description',
					'.entry',
					'.breadcrumb',
					'.author-box',
					'.after-entry',
					'.entry-comments',
					'.comment-respond',
				],
				'property' => 'border-radius',
				'units'    => 'px',
			],
			[
				'element'       => '.featured-image-first .no-spacing img',
				'property'      => 'border-radius',
				'value_pattern' => '$px $px 0 0',
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
		'settings' => 'box-shadow',
		'label'    => __( 'Entry Shadow', 'genesis-customizer' ),
		'default'  => '0px 3px 6px 0px rgba(0,10,20,0.01)',
		'output'   => [
			[
				'element'  => [
					'.archive-description',
					'.entry',
					'.breadcrumb',
					'.author-box',
					'.after-entry',
					'.entry-comments',
					'.comment-respond',
				],
				'property' => 'box-shadow'
			],
		],
	],
];
