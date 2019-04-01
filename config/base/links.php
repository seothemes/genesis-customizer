<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'text'       => __( 'Text', 'genesis-customizer' ),
			'text-hover' => __( 'Text Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'text'       => _get_color( 'accent' ),
			'background' => '',
		],
		'output'   => [
			[
				'choice'   => 'text',
				'element'  => 'a',
				'property' => 'color'
			],
			[
				'choice'   => 'text-hover',
				'element'  => 'a:hover, a:focus',
				'property' => 'color'
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
			'text-decoration' => 'none',
		],
		'output'   => [
			[
				'element' => 'a',
			]
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'typography-hover',
		'label'    => __( 'Typography Hover', 'genesis-customizer' ),
		'default'  => [
			'text-decoration' => 'underline',
		],
		'output'   => [
			[
				'element' => 'a:hover,a:focus',
			]
		],
	],
];
