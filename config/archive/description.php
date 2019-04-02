<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'  => __( 'Background', 'genesis-customizer' ),
			'title'       => __( 'Title', 'genesis-customizer' ),
			'description' => __( 'Description', 'genesis-customizer' ),
		],
		'default'  => [
			'background'  => _get_color( 'white' ),
			'title'       => '',
			'description' => '',
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.archive-description',
				'property' => 'background-color',
			],
			[
				'choice'   => 'title',
				'element'  => '.archive-title',
				'property' => 'color',
			],
			[
				'choice'   => 'description',
				'element'  => '.archive-description',
				'property' => 'color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'title-typography',
		'label'    => __( 'Title Typography', 'genesis-customizer' ),
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
				'element' => '.archive-title',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3387',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing',
		'label'    => __( 'Archive Description Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.archive-description',
				'property' => 'padding',
				'units'    => 'px',
			],
		],
	],
];
