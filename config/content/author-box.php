<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background' => __( 'Background', 'genesis-customizer' ),
			'title'      => __( 'Title', 'genesis-customizer' ),
			'content'    => __( 'Content', 'genesis-customizer' ),
		],
		'default'  => [
			'background' => _get_color( 'white' ),
			'title'      => '',
			'content'    => '',
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.author-box',
				'property' => 'background-color',
			],
			[
				'choice'   => 'title',
				'element'  => '.author-box-title',
				'property' => 'color',
			],
			[
				'choice'   => 'content',
				'element'  => [
					'.author-box-content',
					'.author-box-content p',
				],
				'property' => 'color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'text',
		'settings' => 'title',
		'label'    => __( 'Title', 'genesis-customizer' ),
		'default'  => '',
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing',
		'label'    => __( 'Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.author-box',
				'property' => 'padding',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'title-spacing',
		'label'    => __( 'Title Bottom Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xxs', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.author-box-title',
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
		],
	],
];
