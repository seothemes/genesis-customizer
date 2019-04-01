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
				'element'  => '.single .entry',
				'property' => 'background-color',
			],
			[
				'choice'   => 'entry-title',
				'element'  => '.entry-title',
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
				'element' => '.entry-title',
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
				'element' => '.single .entry-meta',
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
];
