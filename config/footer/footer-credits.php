<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'checkbox',
		'settings' => 'enabled',
		'label'    => __( 'Display Footer Credits section', 'genesis-customizer' ),
		'default'  => true,
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'multicolor',
		'settings' => 'color',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'  => __( 'Background', 'genesis-customizer' ),
			'text'        => __( 'Text', 'genesis-customizer' ),
			'links'       => __( 'Links', 'genesis-customizer' ),
			'links-hover' => __( 'Links Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background'  => '',
			'text'        => '',
			'links'       => '',
			'links-hover' => '',
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.footer-credits',
				'property' => 'background-color',
			],
			[
				'choice'   => 'text',
				'element'  => '.footer-credits',
				'property' => 'color',
			],
			[
				'choice'   => 'links',
				'element'  => '.footer-credits a',
				'property' => 'color',
			],
			[
				'choice'   => 'links-hover',
				'element'  => '.footer-credits a:hover, .footer-widgets a:focus',
				'property' => 'color',
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimensions',
		'settings' => 'typography',
		'label'    => __( 'Typography', 'genesis-customizer' ),
		'default'  => [
			'mobile'  => '',
			'desktop' => '',
		],
		'choices'  => [
			'labels' => [
				'mobile'  => __( 'Font Size Mobile', 'genesis-customizer' ),
				'desktop' => __( 'Font Size Desktop', 'genesis-customizer' ),
			]
		],
		'output'   => [
			[
				'choice'   => 'mobile',
				'element'  => '.footer-credits',
				'property' => 'font-size',
			],
			[
				'choice'      => 'desktop',
				'element'     => '.footer-credits',
				'property'    => 'font-size',
				'media_query' => _get_media_query(),
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3',
		'default'  => '<hr>',
	],
	[
		'type'     => 'select',
		'settings' => 'alignment',
		'label'    => __( 'Alignment', 'genesis-customizer' ),
		'default'  => 'space-between',
		'choices'  => [
			'space-between' => __( 'Full Width', 'genesis-customizer' ),
			'center'        => __( 'Center', 'genesis-customizer' ),
			'flex-start'    => __( 'Left', 'genesis-customizer' ),
			'flex-end'      => __( 'Right', 'genesis-customizer' ),
		],
		'output'   => [
			[
				'element'  => '.footer-credits .wrap',
				'property' => 'justify-content',
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'select',
		'settings' => 'type',
		'label'    => __( 'Type', 'genesis-customizer' ),
		'default'  => 'text',
		'choices'  => [
			'text'   => __( 'Text', 'genesis-customizer' ),
			'widget' => __( 'Widget Area', 'genesis-customizer' ),
		],
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'textarea',
		'settings' => 'text',
		'label'    => __( 'Text', 'genesis-customizer' ),
		'default'  => '[footer_copyright] &middot; <a href="https://mydomain.com">My Custom Link</a> &middot; Built with <a href="https://genesiscustomizer.com" title="Genesis Customizer">Genesis Customizer</a>',
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
			],
			[
				'setting'  => _get_setting( 'type' ),
				'value'    => 'text',
				'operator' => '===',
			],
		],
	],
	[
		'type'     => 'checkbox',
		'settings' => 'enabled',
		'label'    => __( 'Display Footer Credits section', 'genesis-customizer' ),
		'default'  => true,
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing',
		'label'    => __( 'Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 300,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.footer-credits',
				'property' => 'padding-top',
				'units'    => 'px',
			],
			[
				'element'  => '.footer-credits',
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
		],
		'required' => [
			[
				'setting'  => _get_setting( 'enabled' ),
				'value'    => true,
				'operator' => '===',
			],
		],
	],
];
