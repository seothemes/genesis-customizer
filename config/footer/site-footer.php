<?php

namespace GenesisCustomizer;

return [
	[
		'type'      => 'multicolor',
		'settings'  => 'gradient',
		'label'     => __( 'Gradient Overlay', 'genesis-customizer' ),
		'transport' => 'refresh',
		'choices'   => [
			'left'        => __( 'Background Left', 'genesis-customizer' ),
			'right'       => __( 'Background Right', 'genesis-customizer' ),
		],
		'default'   => [
			'left'        => _get_color( 'white' ),
			'right'       => _get_color( 'white' ),
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'angle',
		'label'    => __( 'Gradient Angle', 'genesis-customizer' ),
		'default'  => '135',
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
		'type'     => 'background',
		'settings' => 'background',
		'label'    => __( 'Background Image', 'genesis-customizer' ),
		'default'  => [
			'background-image'      => '',
			'background-repeat'     => '',
			'background-position'   => '',
			'background-size'       => '',
			'background-attachment' => '',
		],
		'output'   => [
			[
				'element' => '.site-footer',
			],
		],
	],
];
