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
			'background' => _get_color( 'white' ),
		],
		'output'   => [
			[
				'choice'   => 'border',
				'element'  => 'blockquote',
				'property' => 'border-color',
			],
			[
				'choice'   => 'text',
				'element'  => 'blockquote',
				'property' => 'color',
			],
			[
				'choice'   => 'background',
				'element'  => 'blockquote',
				'property' => 'background-color',
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
			'font-size'   => _get_size( 'l' ),
			'variant'     => '',
			'line-height' => '',
		],
		'output'   => [
			[
				'element' => [
					'blockquote',
					'.wp-block-pullquote.is-style-solid-color blockquote p',
				],
			],
			[
				'element'       => '.editor-styles-wrapper .wp-block-pullquote blockquote .editor-rich-text p',
				'context'       => [ 'editor' ],
			],
		],
	],
];
