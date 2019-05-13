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
				'element'  => [
					'blockquote',
					'.wp-block-quote:not(.is-large):not(.is-style-large)',
				],
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
		'settings' => 'divider',
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
				'element' => '.editor-styles-wrapper .wp-block-pullquote blockquote .editor-rich-text p',
				'context' => [ 'editor' ],
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimensions',
		'settings' => 'border-width',
		'label'    => __( 'Border', 'genesis-customizer' ),
		'default'  => [
			'border-top-width'    => '',
			'border-right-width'  => '',
			'border-bottom-width' => '',
			'border-left-width'   => '1px',
		],
		'choices'  => [
			'labels' => [
				'border-top-width'    => __( 'Border Top Width', 'genesis-customizer' ),
				'border-right-width'  => __( 'Border Right Width', 'genesis-customizer' ),
				'border-bottom-width' => __( 'Border Bottom Width', 'genesis-customizer' ),
				'border-left-width'   => __( 'Border Left Width', 'genesis-customizer' ),
			],
		],
		'output'   => [
			[
				'choice'   => 'border-top-width',
				'property' => 'border-top-width',
				'element'  => [
					'blockquote',
					'.wp-block-quote:not(.is-large):not(.is-style-large), blockquote',
				],
			],
			[
				'choice'   => 'border-right-width',
				'property' => 'border-right-width',
				'element'  => [
					'blockquote',
					'.wp-block-quote:not(.is-large):not(.is-style-large), blockquote',
				],
			],
			[
				'choice'   => 'border-bottom-width',
				'property' => 'border-bottom-width',
				'element'  => [
					'blockquote',
					'.wp-block-quote:not(.is-large):not(.is-style-large), blockquote',
				],
			],
			[
				'choice'   => 'border-left-width',
				'property' => 'border-left-width',
				'element'  => [
					'blockquote',
					'.wp-block-quote:not(.is-large):not(.is-style-large), blockquote',
				],
			],
		],
	],
];
