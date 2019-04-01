<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'radio-image',
		'settings' => 'columns',
		'label'    => __( 'Columns', 'genesis-customizer' ),
		'default'  => '4-4-4',
		'choices'  => [
			'0'       => _get_url() . 'assets/img/footer-widgets-0.gif',
			'12'      => _get_url() . 'assets/img/footer-widgets-12.gif',
			'6-6'     => _get_url() . 'assets/img/footer-widgets-6-6.gif',
			'8-4'     => _get_url() . 'assets/img/footer-widgets-8-4.gif',
			'4-8'     => _get_url() . 'assets/img/footer-widgets-4-8.gif',
			'4-4-4'   => _get_url() . 'assets/img/footer-widgets-4-4-4.gif',
			'6-3-3'   => _get_url() . 'assets/img/footer-widgets-6-3-3.gif',
			'3-3-6'   => _get_url() . 'assets/img/footer-widgets-3-3-6.gif',
			'3-3-3-3' => _get_url() . 'assets/img/footer-widgets-3-3-3-3.gif',
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background' => __( 'Background', 'genesis-customizer' ),
			'text'       => __( 'Text', 'genesis-customizer' ),
			'headings'   => __( 'Headings', 'genesis-customizer' ),
			'links'      => __( 'Links', 'genesis-customizer' ),
			'link-hover' => __( 'Links Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background' => '',
			'text'       => '',
			'headings'   => '',
			'links'      => '',
			'link-hover' => '',
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.footer-widgets',
				'property' => 'background-color',
			],
			[
				'choice'   => 'text',
				'element'  => '.footer-widgets',
				'property' => 'color',
			],
			[
				'choice'   => 'headings',
				'element'  => [
					'.footer-widgets h1',
					'.footer-widgets h2',
					'.footer-widgets h3',
					'.footer-widgets h4',
					'.footer-widgets h5',
					'.footer-widgets h6',
				],
				'property' => 'color',
			],
			[
				'choice'   => 'links',
				'element'  => '.footer-widgets a',
				'property' => 'color',
			],
			[
				'choice'   => 'links-hover',
				'element'  => '.footer-widgets a:hover, .footer-widgets a:focus',
				'property' => 'color',
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
			'font-family'    => '',
			'font-size'      => '',
			'variant'        => '',
			'line-height'    => '',
			'letter-spacing' => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element' => '.footer-widgets',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'title-typography',
		'label'    => __( 'Title Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'    => '',
			'font-size'      => _get_size( 'l' ),
			'variant'        => '',
			'line-height'    => '',
			'letter-spacing' => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element' => '.footer-widgets .widget-title',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'wrap-width',
		'label'    => __( 'Container Width', 'genesis-customizer' ),
		'default'  => '1152',
		'choices'  => [
			'min'  => 256,
			'max'  => 1920,
			'step' => 32,
		],
		'output'   => [
			[
				'element'  => '.footer-widgets .wrap',
				'property' => 'max-width',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing-top',
		'label'    => __( 'Spacing Top', 'genesis-customizer' ),
		'default'  => '60',
		'choices'  => [
			'min'  => 0,
			'max'  => 300,
			'step' => 10,
		],
		'output'   => [
			[
				'element'  => '.footer-widgets',
				'property' => 'padding-top',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing-bottom',
		'label'    => __( 'Spacing Bottom', 'genesis-customizer' ),
		'default'  => '40',
		'choices'  => [
			'min'  => 0,
			'max'  => 300,
			'step' => 10,
		],
		'output'   => [
			[
				'element'  => '.footer-widgets',
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
		],
	],
];
