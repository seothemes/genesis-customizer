<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'border'     => __( 'Border', 'genesis-customizer' ),
			'text'       => __( 'Text', 'genesis-customizer' ),
			'background' => __( 'Background', 'genesis-customizer' ),
		],
		'default'  => [
			'border'     => _get_color( 'text' ),
			'text'       => '',
			'background' => '',
		],
		'output'   => [
			[
				'choice'   => 'border',
				'element'  => 'blockquote',
				'property' => 'border-color'
			],
			[
				'choice'   => 'text',
				'element'  => 'blockquote',
				'property' => 'color'
			],
			[
				'choice'   => 'background',
				'element'  => 'blockquote',
				'property' => 'background-color'
			],
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
			'font-family' => '',
			'font-size'   => '',
			'variant'     => '',
			'line-height' => '',
		],
		'output'   => [
			[
				'element' => 'blockquote',
			],
		],
	],
];
