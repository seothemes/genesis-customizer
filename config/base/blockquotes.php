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
			'quote'      => __( 'Quotation Mark', 'genesis-customizer' ),
			'cite'       => __( 'Citation', 'genesis-customizer' ),
		],
		'default'  => [
			'border'     => _get_color( 'text' ),
			'text'       => '',
			'background' => _get_color( 'white' ),
			'quote'      => _get_color( 'transparent' ),
			'cite'       => '',
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
			[
				'choice'   => 'quote',
				'element'  => 'blockquote:before',
				'property' => 'color',
			],
			[
				'choice'   => 'cite',
				'element'  => 'cite',
				'property' => 'color',
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
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing',
		'label'    => __( 'Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => 'blockquote',
				'property' => 'padding',
				'units'    => 'px',
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
		'settings' => 'quote-typography',
		'label'    => __( 'Quotation Mark Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family' => '',
			'font-size'   => '2em',
			'variant'     => '',
			'line-height' => '1',
		],
		'output'   => [
			[
				'element' => 'blockquote:before',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'radio-buttonset',
		'settings' => 'text-align',
		'label'    => __( 'Text Alignment', 'genesis-customizer' ),
		'default'  => 'left',
		'choices'  => [
			'left'   => _get_svg( 'alignleft' ),
			'center' => _get_svg( 'aligncenter' ),
			'right'  => _get_svg( 'alignright' ),
		],
		'output'   => [
			[
				'element'  => 'blockquote',
				'property' => 'text-align',
			],
			[
				'choice'        => 'center',
				'element'       => 'blockquote:before',
				'property'      => 'display',
				'value_pattern' => 'block',
				'exclude'       => [ 'left', 'right' ],
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
		'settings' => 'cite-typography',
		'label'    => __( 'Citation Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'    => '',
			'font-size'      => '',
			'variant'        => 'regular',
			'line-height'    => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element' => 'cite',
			],
		],
	],
];
