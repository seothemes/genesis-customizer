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
		'settings' => 'divider',
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
		'type'     => 'dimensions',
		'settings' => 'title-margin',
		'default'  => [
			'margin-top'    => '0',
			'margin-bottom' => '0',
		],
		'choices'  => [
			'labels' => [
				'margin-top'    => __( 'Margin Top', 'genesis-customizer' ),
				'margin-bottom' => __( 'Margin Bottom', 'genesis-customizer' ),
			],
		],
		'output'   => [
			[
				'element'  => '.archive-title',
				'choice'   => 'margin-top',
				'property' => 'margin-top',
			],
			[
				'element'  => '.archive-title',
				'choice'   => 'margin-bottom',
				'property' => 'margin-bottom',
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
		'settings' => 'text-align',
		'label'    => __( 'Text Alignment', 'genesis-customizer' ),
		'default'  => 'left',
		'choices'  => [
			'left'   => __( 'Left', 'genesis-customizer' ),
			'center' => __( 'Center', 'genesis-customizer' ),
			'right'  => __( 'Right', 'genesis-customizer' ),
		],
		'output'   => [
			[
				'element'  => '.archive-description',
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
