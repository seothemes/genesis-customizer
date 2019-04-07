<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'select',
		'settings' => 'type',
		'label'    => __( 'Default type', 'genesis-customizer' ),
		'default'  => 'disc',
		'choices'  => [
			'disc'   => __( 'Disc', 'genesis-customizer' ),
			'circle' => __( 'Circle', 'genesis-customizer' ),
			'square' => __( 'Square', 'genesis-customizer' ),
			'none'   => __( 'None', 'genesis-customizer' ),
		],
		'output'   => [
			[
				'element'  => '.entry-content li',
				'property' => 'list-style-type',
			],
		],
	],
	[
		'type'     => 'select',
		'settings' => 'position',
		'label'    => __( 'Default position', 'genesis-customizer' ),
		'default'  => 'inside',
		'choices'  => [
			'inside'  => __( 'Inside', 'genesis-customizer' ),
			'outside' => __( 'Outside', 'genesis-customizer' ),
		],
		'output'   => [
			[
				'element'  => '.entry-content li',
				'property' => 'list-style-position',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-18739',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing-bottom',
		'label'    => __( 'Spacing Bottom', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.entry-content li',
				'property' => 'margin-bottom',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-9848942',
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
			'line-height'    => '',
			'letter-spacing' => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element' => '.entry-content li',
			],
		],
	],
];
