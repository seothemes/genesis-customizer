<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'        => __( 'Background', 'genesis-customizer' ),
			'background-active' => __( 'Background Active', 'genesis-customizer' ),
			'text'              => __( 'Icon', 'genesis-customizer' ),
			'text-active'       => __( 'Text Active', 'genesis-customizer' ),
			'border'            => __( 'Border', 'genesis-customizer' ),
			'border-active'     => __( 'Border Active', 'genesis-customizer' ),
		],
		'default'  => [
			'background'        => _get_color( 'transparent' ),
			'background-active' => _get_color( 'transparent' ),
			'text'              => _get_color( 'heading' ),
			'text-active'       => _get_color( 'heading' ),
			'border'            => _get_color( 'transparent' ),
			'border-active'     => _get_color( 'transparent' ),
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => [
					'.sub-menu-toggle',
					'.sub-menu-toggle:hover',
					'.sub-menu-toggle:focus',
				],
				'property' => 'background',
			],
			[
				'choice'   => 'background-active',
				'element'  => [
					'.sub-menu-toggle.activated:hover',
					'.sub-menu-toggle.activated:focus',
					'.sub-menu-toggle.activated',
				],
				'property' => 'background',
			],
			[
				'choice'        => 'text',
				'element'       => '.sub-menu-toggle-icon:before',
				'property'      => 'border-color',
				'value_pattern' => '$ transparent transparent',
			],
			[
				'choice'   => 'text',
				'element'  => '.sub-menu-toggle-icon:before',
				'property' => 'color',
			],
			[
				'choice'        => 'text-active',
				'element'       => '.sub-menu-toggle-icon.activated:before',
				'property'      => 'border-color',
				'value_pattern' => 'transparent transparent $',
			],
			[
				'choice'   => 'text-active',
				'element'  => '.activated .sub-menu-toggle-icon:before',
				'property' => 'color',
			],
			[
				'choice'   => 'border',
				'element'  => '.sub-menu-toggle',
				'property' => 'border-color',
			],
			[
				'choice'   => 'border-active',
				'element'  => '.sub-menu-toggle.activated',
				'property' => 'border-color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4223',
		'default'  => '<hr>',
	],
	[
		'type'     => 'select',
		'settings' => 'icon',
		'label'    => __( 'Icon', 'genesis-customizer' ),
		'default'  => 'arrow',
		'choices'  => [
			'arrow' => __( 'Arrow', 'genesis-customizer' ),
			'plus'  => __( 'Plus', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-593',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'icon-size',
		'label'    => __( 'Icon Size', 'genesis-customizer' ),
		'default'  => '1',
		'choices'  => [
			'min'  => 0.5,
			'max'  => 3,
			'step' => 0.1,
		],
		'output'   => [
			[
				'element'       => '.sub-menu-toggle-icon:before',
				'property'      => 'transform',
				'value_pattern' => 'scale($)',
				'units'         => '',
			],
			[
				'element'       => '.sub-menu-toggle.activated .sub-menu-toggle-arrow:before',
				'property'      => 'transform',
				'value_pattern' => 'rotate(180deg) scale($)',
				'units'         => '',
			],
		],
	],
];
