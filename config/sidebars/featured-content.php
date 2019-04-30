<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'  => __( 'Entry Background', 'genesis-customizer' ),
			'text'        => __( 'Text', 'genesis-customizer' ),
			'links'       => __( 'Links', 'genesis-customizer' ),
			'links-hover' => __( 'Links Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background'  => '',
			'text'        => '',
			'links'       => _get_color( 'heading' ),
			'links-hover' => _get_color( 'accent' ),
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.sidebar .widget .entry',
				'property' => 'background-color',
			],
			[
				'choice'   => 'text',
				'element'  => '.sidebar .entry-content',
				'property' => 'color',
			],
			[
				'choice'   => 'links',
				'element'  => '.sidebar .entry a',
				'property' => 'color',
			],
			[
				'choice'   => 'links-hover',
				'element'  => '.sidebar .entry a:hover, .sidebar .entry a:focus',
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
		'type'     => 'slider',
		'settings' => 'space-between',
		'label'    => __( 'Space Between', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.sidebar .widget .entry',
				'property' => 'margin-bottom',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'entry-spacing',
		'label'    => __( 'Entry Spacing', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.sidebar .widget .entry',
				'property' => 'padding',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'entry-title-spacing',
		'label'    => __( 'Entry Title Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => '.sidebar .entry-title',
				'property'      => 'padding',
				'value_pattern' => '$px 0',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'image-width',
		'label'    => __( 'Image Width', 'genesis-customizer' ),
		'default'  => '100',
		'choices'  => [
			'min'  => 0,
			'max'  => 1000,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.sidebar .entry-image',
				'property' => 'max-width',
				'units'    => 'px',
			],
		],
	],
];
