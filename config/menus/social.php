<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'select',
		'settings' => 'color-style',
		'label'    => __( 'Color Style', 'genesis-customizer' ),
		'default'  => 'custom',
		'choices'  => [
			'brand-icon'       => __( 'Brand Icon', 'genesis-customizer' ),
			'brand-background' => __( 'Brand Background', 'genesis-customizer' ),
			'custom'           => __( 'Custom', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'required' => [
			[
				'setting'  => _get_setting( 'color-style' ),
				'operator' => '===',
				'value'    => 'custom',
			],
		],
		'choices'  => [
			'icon'             => __( 'Icon', 'genesis-customizer' ),
			'icon-hover'       => __( 'Icon Hover', 'genesis-customizer' ),
			'background'       => __( 'Background', 'genesis-customizer' ),
			'background-hover' => __( 'Background Hover', 'genesis-customizer' ),
			'border'           => __( 'Border', 'genesis-customizer' ),
			'border-hover'     => __( 'Border Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'icon'             => '',
			'icon-hover'       => '',
			'background'       => '',
			'background-hover' => '',
			'border'           => '',
			'border-hover'     => '',
		],
		'output'   => [
			[
				'choice'   => 'icon',
				'element'  => '#menu-social a',
				'property' => 'color',
			],
			[
				'choice'   => 'icon-hover',
				'element'  => '#menu-social a:hover, #menu-social a:focus',
				'property' => 'color',
			],
			[
				'choice'   => 'background',
				'element'  => '#menu-social a',
				'property' => 'background-color',
			],
			[
				'choice'   => 'background-hover',
				'element'  => '#menu-social a:hover, #menu-social a:focus',
				'property' => 'background-color',
			],
			[
				'choice'   => 'border',
				'element'  => '#menu-social a',
				'property' => 'border-color',
			],
			[
				'choice'   => 'border-hover',
				'element'  => '#menu-social a:hover, #menu-social a:focus',
				'property' => 'border-color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
		'required' => [
			[
				'setting'  => _get_setting( 'color-style' ),
				'operator' => '===',
				'value'    => 'custom',
			],
		],
	],
	[
		'type'     => 'select',
		'settings' => 'hover-effect',
		'label'    => __( 'Hover Effect', 'genesis-customizer' ),
		'default'  => 'lighten',
		'choices'  => [
			'scale'   => __( 'Scale', 'genesis-customizer' ),
			'lighten' => __( 'Lighten', 'genesis-customizer' ),
			'none'    => __( 'None', 'genesis-customizer' ),
		],
		'output'   => [
			[
				'choice'        => 'scale',
				'element'       => '#menu-social a:hover, #menu-social a:focus',
				'property'      => 'transform',
				'value_pattern' => 'scale(1.1)',
				'exclude'       => [ 'lighten', 'none' ],
			],
			[
				'choice'        => 'lighten',
				'element'       => '#menu-social a:hover, #menu-social a:focus',
				'property'      => 'box-shadow',
				'value_pattern' => 'inset 0 0 100px 100px rgba(255,255,255,0.25)',
				'exclude'       => [ 'scale', 'none' ],
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
		'settings' => 'icon-size',
		'label'    => __( 'Icon Size', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '#menu-social a',
				'property' => 'font-size',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'padding',
		'label'    => __( 'Padding', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '#menu-social a',
				'property' => 'padding',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing',
		'label'    => __( 'Horizontal Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xxs', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '#menu-social li',
				'property' => 'padding-left',
				'units'    => 'px',
			],
			[
				'element'  => '#menu-social li',
				'property' => 'padding-right',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'border-radius',
		'label'    => __( 'Border Radius', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '#menu-social a',
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
				'element'  => '#menu-social a',
				'property' => 'border-width',
				'units'    => 'px',
			],
			[
				'element'       => '#menu-social a',
				'property'      => 'border-style',
				'value_pattern' => 'solid',
				'exclude'       => [ '0' ],
			],
		],
	],
];
