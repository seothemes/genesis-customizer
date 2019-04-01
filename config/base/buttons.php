<?php

namespace GenesisCustomizer;

return [
	[
		'type'      => 'multicolor',
		'settings'  => 'colors',
		'label'     => __( 'Colors', 'genesis-customizer' ),
		'choices'   => [
			'text'         => __( 'Text', 'genesis-customizer' ),
			'text-hover'   => __( 'Text Hover', 'genesis-customizer' ),
			'border'       => __( 'Border', 'genesis-customizer' ),
			'border-hover' => __( 'Border Hover', 'genesis-customizer' ),
		],
		'default'   => [
			'text'         => _get_color( 'white' ),
			'text-hover'   => _get_color( 'white' ),
			'border'       => '',
			'border-hover' => '',
		],
		'output'    => [
			[
				'choice'   => 'text',
				'element'  => _get_elements( 'button' ),
				'property' => 'color',
			],
			[
				'choice'   => 'text-hover',
				'element'  => _get_elements( 'button', 'hover' ),
				'property' => 'color',
			],
			[
				'choice'   => 'border',
				'element'  => _get_elements( 'button' ),
				'property' => 'border-color',
			],
			[
				'choice'   => 'border-hover',
				'element'  => _get_elements( 'button', 'hover' ),
				'property' => 'border-color',
			],
		],
	],
	[
		'type'      => 'multicolor',
		'settings'  => 'gradient',
		'label'     => __( 'Background Gradient', 'genesis-customizer' ),
		'transport' => 'refresh',
		'choices'   => [
			'left'         => __( 'Left', 'genesis-customizer' ),
			'right'        => __( 'Right', 'genesis-customizer' ),
			'left-hover'   => __( 'Left Hover', 'genesis-customizer' ),
			'right-hover'  => __( 'Right Hover', 'genesis-customizer' ),
		],
		'default'   => [
			'left'         => _get_color( 'text' ),
			'right'        => _get_color( 'text' ),
			'left-hover'   => _get_color( 'heading' ),
			'right-hover'  => _get_color( 'heading' ),
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'angle',
		'label'    => __( 'Gradient Angle', 'genesis-customizer' ),
		'default'  => 135,
		'choices'  => [
			'min'  => 0,
			'max'  => 360,
			'step' => 1,
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'typography',
		'label'    => __( 'Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'    => '',
			'font-size'      => _get_size( 's' ),
			'variant'        => '600',
			'line-height'    => '1',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		],
		'output'   => [
			[
				'element' => '.button, button, input[type="submit"]',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-8',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'typography-desktop',
		'label'    => __( 'Typography Desktop', 'genesis-customizer' ),
		'default'  => [
			'font-size'      => _get_size( 's' ),
			'letter-spacing' => '0',
		],
		'output'   => [
			[
				'element'     => '.button, button, input[type="submit"]',
				'media_query' => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'height',
		'label'    => __( 'Vertical Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'padding-top',
				'units'    => 'px',
			],
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'width',
		'label'    => __( 'Horizontal Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'padding-left',
				'units'    => 'px',
			],
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'padding-right',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'border-radius',
		'label'    => __( 'Border Radius', 'genesis-customizer' ),
		'default'  => '4',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'border-radius',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'border-width',
		'label'    => __( 'Border Width', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 10,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'border-width',
				'units'    => 'px',
			],
			[
				'element'       => _get_elements( 'button' ),
				'property'      => 'border-style',
				'value_pattern' => 'solid',
				'exclude'       => [ '0' ],
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
		'settings' => 'shadow',
		'label'    => __( 'Shadow', 'genesis-customizer' ),
		'default'  => '0 0 0 0 rgba(0,0,0,0)',
		'output'   => [
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'box-shadow',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-6',
		'default'  => '<hr>',
	],
	[
		'type'     => 'kirki-box-shadow',
		'settings' => 'shadow-hover',
		'label'    => __( 'Shadow Hover', 'genesis-customizer' ),
		'default'  => '0 0 0 0 rgba(0,0,0,0)',
		'output'   => [
			[
				'element'  => _get_elements( 'button', 'hover' ),
				'property' => 'box-shadow',
			],
		],
	],
];


