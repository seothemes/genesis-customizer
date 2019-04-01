<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'text'       => __( 'Text', 'genesis-customizer' ),
			'background' => __( 'Background', 'genesis-customizer' ),
		],
		'default'  => [
			'text'       => _get_color( 'white' ),
			'background' => _get_color( 'heading' ),
		],
		'output'   => [
			[
				'choice'   => 'text',
				'element'  => 'pre, code, kbd, samp',
				'property' => 'color',
			],
			[
				'choice'   => 'background',
				'element'  => 'pre, code, kbd, samp',
				'property' => 'background-color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'typography',
		'label'    => __( 'Code', 'genesis-customizer' ),
		'default'  => [
			'font-family' => '',
			'font-size'   => _get_size( 's' ),
			'variant'     => '',
			'line-height' => '',
		],
		'output'   => [
			[
				'element' => 'pre, code',
			],
		],
	],
];
