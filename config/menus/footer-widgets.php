<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'select',
		'settings' => 'widgets-columns',
		'label'    => __( 'Footer Widgets Menu Columns', 'genesis-customizer' ),
		'default'  => '2',
		'choices'  => [
			'1' => __( '1 Column', 'genesis-customizer' ),
			'2' => __( '2 Column', 'genesis-customizer' ),
			'3' => __( '3 Column', 'genesis-customizer' ),
			'4' => __( '4 Column', 'genesis-customizer' ),
		],
		'output'   => [
			[
				'element'  => '.footer-widgets .menu',
				'property' => 'columns',
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
		'settings' => 'spacing-top',
		'label'    => __( 'Menu Spacing Top', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.footer-widgets .menu',
				'property' => 'padding-top',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing-bottom',
		'label'    => __( 'Menu Spacing Bottom', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.footer-widgets .menu',
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-spacing-top',
		'label'    => __( 'Menu Item Spacing Top', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 40,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.footer-widgets a',
				'property' => 'padding-top',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-spacing-bottom',
		'label'    => __( 'Menu Item Spacing Bottom', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 40,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.footer-widgets a',
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
		],
	],
];
