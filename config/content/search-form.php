<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'select',
		'settings' => 'button-style',
		'label'    => __( 'Button Style', 'genesis-customizer' ),
		'default'  => 'none',
		'choices'  => [
			'inline' => __( 'Inline', 'genesis-customizer' ),
			'block'  => __( 'Block', 'genesis-customizer' ),
			'none'   => __( 'None', 'genesis-customizer' ),
		],
		'output'   => [
			[
				'element'  => '.search-form-submit',
				'property' => 'display',
			],
			[
				'element'       => '.search-form',
				'property'      => 'display',
				'value_pattern' => 'flex',
				'exclude'       => [ 'block', 'none' ],
			],
		],
	],
	[
		'type'     => 'checkbox',
		'settings' => 'icon',
		'label'    => __( 'Use icon for submit button', 'genesis-customizer' ),
		'default'  => false,
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'text',
		'settings' => 'input-text',
		'label'    => __( 'Input Text', 'genesis-customizer-pro' ),
		'default'  => __( 'Search this website', 'genesis-customizer-pro' ),
	],
	[
		'type'     => 'text',
		'settings' => 'button-text',
		'label'    => __( 'Button Text', 'genesis-customizer-pro' ),
		'default'  => __( 'Search', 'genesis-customizer-pro' ),
		'required' => [
			[
				'setting'  => _get_setting( 'icon' ),
				'value'    => false,
				'operator' => '===',
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
		'settings' => 'height',
		'label'    => __( 'Button Vertical Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => 'input.search-form-submit',
				'property' => 'padding-top',
				'units'    => 'px',
			],
			[
				'element'  => 'input.search-form-submit',
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'width',
		'label'    => __( 'Button Horizontal Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => 'input.search-form-submit',
				'property' => 'padding-left',
				'units'    => 'px',
			],
			[
				'element'  => 'input.search-form-submit',
				'property' => 'padding-right',
				'units'    => 'px',
			],
		],
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
				'element'  => '.search-form-submit',
				'property' => 'background-size',
				'units'    => 'px',
			],
		],
	],
];
