<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'select',
		'settings' => 'display',
		'label'    => __( 'Display', 'genesis-customizer' ),
		'default'  => 'inline',
		'choices'  => [
			'inline' => __( 'Inline', 'genesis-customizer' ),
			'block'  => __( 'Block', 'genesis-customizer' ),
			'none'   => __( 'None', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'select',
		'settings' => 'style',
		'label'    => __( 'Style', 'genesis-customizer' ),
		'default'  => 'link',
		'choices'  => [
			'link'   => __( 'Link', 'genesis-customizer' ),
			'button' => __( 'Button', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'text',
		'settings' => 'text',
		'label'    => __( 'Text', 'genesis-customizer' ),
		'default'  => __( 'Read more', 'genesis-customizer' ),
		'required' => [
			[
				'setting'  => _get_setting( 'display' ),
				'value'    => 'hide',
				'operator' => '!==',
			],
		],
	],
	[
		'type'     => 'checkbox',
		'settings' => 'ellipses',
		'label'    => __( 'Show ellipses', 'genesis-customizer' ),
		'default'  => true,
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
			'font-size'      => '',
			'variant'        => '',
			'line-height'    => '',
			'letter-spacing' => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element' => '.more-link',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'link'       => __( 'Link', 'genesis-customizer' ),
			'link-hover' => __( 'Link Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'link'       => '',
			'link-hover' => '',
		],
		'output'   => [
			[
				'choice'   => 'link',
				'element'  => '.more-link',
				'property' => 'color',
			],
			[
				'choice'   => 'link-hover',
				'element'  => '.more-link:hover,.more-link:focus',
				'property' => 'color',
			],
		],
	],
];
