<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'       => __( 'Background', 'genesis-customizer' ),
			'background-hover' => __( 'Background Hover', 'genesis-customizer' ),
			'text'             => __( 'Text', 'genesis-customizer' ),
			'text-hover'       => __( 'Text Hover', 'genesis-customizer' ),
			'border'           => __( 'Border', 'genesis-customizer' ),
			'border-hover'     => __( 'Border Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background'       => _get_color( 'text' ),
			'background-hover' => _get_color( 'heading' ),
			'text'             => _get_color( 'white' ),
			'text-hover'       => _get_color( 'white' ),
			'border'           => '',
			'border-hover'     => '',
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => _get_elements( 'button' ),
				'property' => 'background-color',
			],
			[
				'choice'   => 'background',
				'element'  => '.button.white,button.white',
				'property' => 'color',
			],
			[
				'choice'   => 'background',
				'element'  => '.editor-styles-wrapper .wp-block-button__link',
				'property' => 'background-color',
				'context'  => [ 'editor' ],
			],
			[
				'choice'   => 'background-hover',
				'element'  => _get_elements( 'button', 'hover' ),
				'property' => 'background-color',
			],
			[
				'choice'   => 'background-hover',
				'element'  => '.button.white:hover,.button.white:focus,button.white:hover,button.white:focus',
				'property' => 'color',
			],
			[
				'choice'   => 'background-hover',
				'element'  => '.editor-styles-wrapper .wp-block-button__link:hover',
				'property' => 'background-color',
				'context'  => [ 'editor' ],
			],
			[
				'choice'   => 'text',
				'element'  => _get_elements( 'button' ),
				'property' => 'color',
			],
			[
				'choice'   => 'text',
				'element'  => '.editor-styles-wrapper .wp-block-button__link',
				'property' => 'color',
				'context'  => [ 'editor' ],
			],
			[
				'choice'   => 'text-hover',
				'element'  => _get_elements( 'button', 'hover' ),
				'property' => 'color',
			],
			[
				'choice'   => 'border',
				'element'  => _get_elements( 'button' ),
				'property' => 'border-color',
			],
			[
				'choice'   => 'border-hover',
				'element'  => _get_elements( 'button', 'hover' ),
				'property' => 'border-color',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'angle',
		'label'    => __( 'Gradient Angle', 'genesis-customizer' ),
		'default'  => 135,
		'choices'  => [
			'min'  => 0,
			'max'  => 360,
			'step' => 1,
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
			'font-family'    => '',
			'font-size'      => _get_size( 's' ),
			'variant'        => '600',
			'line-height'    => '1',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		],
		'output'   => [
			[
				'element' => _get_elements( 'button' ),
			],
			[
				'element' => '.editor-styles-wrapper .wp-block-button__link',
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
		'type'     => 'typography',
		'settings' => 'typography-desktop',
		'label'    => __( 'Typography Desktop', 'genesis-customizer' ),
		'default'  => [
			'font-size'      => _get_size( 's' ),
			'letter-spacing' => '0',
		],
		'output'   => [
			[
				'element'     => '.button, button, input[type="submit"]',
				'media_query' => _get_media_query(),
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
		'settings' => 'height',
		'label'    => __( 'Vertical Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'padding-top',
				'units'    => 'px',
			],
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'width',
		'label'    => __( 'Horizontal Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'padding-left',
				'units'    => 'px',
			],
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'padding-right',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'border-radius',
		'label'    => __( 'Border Radius', 'genesis-customizer' ),
		'default'  => '4',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'border-radius',
				'units'    => 'px',
			],
			[
				'element'  => '.editor-styles-wrapper .wp-block-button__link',
				'property' => 'border-radius',
				'units'    => 'px',
				'context'  => [ 'editor' ],
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'border-width',
		'label'    => __( 'Border Width', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 10,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'border-width',
				'units'    => 'px',
			],
			[
				'element'       => _get_elements( 'button' ),
				'property'      => 'border-style',
				'value_pattern' => 'solid',
				'exclude'       => [ '0' ],
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'kirki-box-shadow',
		'settings' => 'shadow',
		'label'    => __( 'Shadow', 'genesis-customizer' ),
		'default'  => '0 0 0 0 rgba(0,0,0,0)',
		'output'   => [
			[
				'element'  => _get_elements( 'button' ),
				'property' => 'box-shadow',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'kirki-box-shadow',
		'settings' => 'shadow-hover',
		'label'    => __( 'Shadow Hover', 'genesis-customizer' ),
		'default'  => '0 0 0 0 rgba(0,0,0,0)',
		'output'   => [
			[
				'element'  => _get_elements( 'button', 'hover' ),
				'property' => 'box-shadow',
			],
		],
	],
];


