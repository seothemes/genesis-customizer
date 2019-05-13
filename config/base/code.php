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
				'choice'   => 'text',
				'element'  => '.wp-block-code, .wp-block-preformatted pre',
				'property' => 'color',
				'context'  => [ 'editor' ],
			],
			[
				'choice'   => 'background',
				'element'  => 'pre, code, kbd, samp',
				'property' => 'background-color',
			],
			[
				'choice'   => 'background',
				'element'  => '.wp-block-code, .wp-block-preformatted pre',
				'property' => 'background-color',
				'context'  => [ 'editor' ],
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'typography',
		'label'    => __( 'Typography', 'genesis-customizer' ),
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
