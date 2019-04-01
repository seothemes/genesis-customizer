<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'placeholder'  => __( 'Placeholder Text', 'genesis-customizer' ),
			'background'   => __( 'Background', 'genesis-customizer' ),
			'text'         => __( 'Text', 'genesis-customizer' ),
			'text-hover'   => __( 'Text Hover', 'genesis-customizer' ),
			'border'       => __( 'Border', 'genesis-customizer' ),
			'border-hover' => __( 'Border Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'placeholder'  => _get_color( 'text' ),
			'background'   => '',
			'text'         => _get_color( 'heading' ),
			'text-hover'   => _get_color( 'heading' ),
			'border'       => _get_color( 'border' ),
			'border-hover' => _get_color( 'accent' ),
		],
		'output'   => [
			[
				'choice'   => 'placeholder',
				'element'  => '::placeholder',
				'property' => 'color',
			],
			[
				'choice'   => 'background',
				'element'  => _get_elements( 'input' ),
				'property' => 'background-color',
			],
			[
				'choice'   => 'text',
				'element'  => _get_elements( 'input' ),
				'property' => 'color',
			],
			[
				'choice'   => 'text-hover',
				'element'  => _get_elements( 'input', 'hover' ),
				'property' => 'color',
			],
			[
				'choice'   => 'border',
				'element'  => _get_elements( 'input' ),
				'property' => 'border-color',
			],
			[
				'choice'   => 'border-hover',
				'element'  => _get_elements( 'input', 'hover' ),
				'property' => 'border-color',
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
			'font-size'      => '',
			'variant'        => '',
			'line-height'    => '1',
			'letter-spacing' => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element' => _get_elements( 'input' ),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
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
				'element'  => _get_elements( 'input' ),
				'property' => 'padding-top',
				'units'    => 'px',
			],
			[
				'element'  => _get_elements( 'input' ),
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'width',
		'label'    => __( 'Horizontal Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => _get_elements( 'input' ),
				'property' => 'padding-left',
				'units'    => 'px',
			],
			[
				'element'  => _get_elements( 'input' ),
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
			'max'  => 40,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => _get_elements( 'input' ),
				'property' => 'border-radius',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'border-width',
		'label'    => __( 'Border Width', 'genesis-customizer' ),
		'default'  => '1',
		'choices'  => [
			'min'  => 0,
			'max'  => 10,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => _get_elements( 'input' ),
				'property' => 'border-width',
				'units'    => 'px',
			],
			[
				'element'       => _get_elements( 'input' ),
				'property'      => 'border-style',
				'value_pattern' => 'solid',
				'exclude'       => [ '0' ],
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3',
		'default'  => '<hr>',
	],
	[
		'type'     => 'kirki-box-shadow',
		'settings' => 'box-shadow',
		'label'    => __( 'Shadow', 'genesis-customizer' ),
		'default'  => '0 0 0 0 rgba(0,0,0,0)',
		'output'   => [
			[
				'element'  => _get_elements( 'input' ),
				'property' => 'box-shadow',
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
		'settings' => 'box-shadow-hover',
		'label'    => __( 'Shadow Hover', 'genesis-customizer' ),
		'default'  => '0 0 0 0 rgba(0,0,0,0)',
		'output'   => [
			[
				'element'  => _get_elements( 'input', 'hover' ),
				'property' => 'box-shadow',
			],
		],
	],
];
