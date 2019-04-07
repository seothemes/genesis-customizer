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
			'text'       => _get_color( 'text' ),
			'background' => _get_color( 'background' ),
		],
		'output'   => [
			[
				'choice'   => 'text',
				'element'  => 'body',
				'property' => 'color',
			],
			[
				'choice'   => 'text',
				'element'  => [
					'body .editor-styles-wrapper',
				],
				'property' => 'color',
				'context'  => [ 'editor' ],
			],
			[
				'choice'   => 'background',
				'element'  => 'body',
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
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
			'variant'        => '400',
			'line-height'    => '1.6',
			'letter-spacing' => '',
		],
		'output'   => [
			[
				'element' => 'body',
			],
			[
				'element' => [
					'body .editor-styles-wrapper',
					'body .editor-styles-wrapper .editor-post-title__input',
				],
				'context' => [ 'editor' ],
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-97',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimensions',
		'settings' => 'font-size',
		'label'    => __( 'Font Size', 'genesis-customizer' ),
		'default'  => [
			'mobile'  => _get_size( 'm' ),
			'desktop' => _get_size( 'm' ),
		],
		'choices'  => [
			'labels' => [
				'mobile'  => __( 'Mobile', 'genesis-customizer' ),
				'desktop' => __( 'Desktop', 'genesis-customizer' ),
			],
		],
		'output'   => [
			[
				'choice'      => 'mobile',
				'property'    => 'font-size',
				'element'     => 'body',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'choice'      => 'desktop',
				'property'    => 'font-size',
				'element'     => 'body',
				'media_query' => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-197',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimensions',
		'settings' => 'paragraph',
		'label'    => __( 'Paragraphs', 'genesis-customizer' ),
		'default'  => [
			'margin-top'    => '0',
			'margin-bottom' => _get_size( 'm' ),
		],
		'choices'  => [
			'labels' => [
				'margin-top'    => __( 'Margin Top', 'genesis-customizer' ),
				'margin-bottom' => __( 'Margin Bottom', 'genesis-customizer' ),
			],
		],
		'output'   => [
			[
				'choice'   => 'margin-top',
				'property' => 'margin-top',
				'element'  => 'p',
			],
			[
				'choice'   => 'margin-bottom',
				'property' => 'margin-bottom',
				'element'  => [
					'p',
					'.entry-image-link',
					'.entry pre',
					'.entry form',
					'.entry table',
				],
			],
		],
	],
];
