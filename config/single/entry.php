<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'  => __( 'Background', 'genesis-customizer' ),
			'entry-title' => __( 'Entry Title', 'genesis-customizer' ),
		],
		'default'  => [
			'background'  => _get_color( 'white' ),
			'entry-title' => '',
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => [
					'.single .entry',
					'.page-template-blocks',
					'.page-template-beaver-builder',
				],
				'property' => 'background-color',
			],
			[
				'choice'   => 'entry-title',
				'element'  => '.single .entry-title',
				'property' => 'color',
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
				'element' => '.single .entry-title',
			],
		],
	],
	[
		'type'     => 'radio-buttonset',
		'settings' => 'text-align',
		'label'    => __( 'Title Text Alignment', 'genesis-customizer' ),
		'default'  => 'left',
		'choices'  => [
			'left'   => _get_svg( 'alignleft' ),
			'center' => _get_svg( 'aligncenter' ),
			'right'  => _get_svg( 'alignright' ),
		],
		'output'   => [
			[
				'element'  => '.single .entry-title',
				'property' => 'text-align',
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
				'element'  => '.single .entry',
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
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
];
