<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'            => __( 'Background', 'genesis-customizer' ),
			'link-background'       => __( 'Link Background', 'genesis-customizer' ),
			'link-background-hover' => __( 'Link Background Hover', 'genesis-customizer' ),
			'link-text'             => __( 'Link Text', 'genesis-customizer' ),
			'link-text-hover'       => __( 'Link Text Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background'            => _get_color( 'white' ),
			'link-background'       => '',
			'link-background-hover' => '',
			'link-text'             => '',
			'link-text-hover'       => '',
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.pagination',
				'property' => 'background-color',
			],
			[
				'choice'   => 'link-background',
				'element'  => '.pagination a',
				'property' => 'background-color',
			],
			[
				'choice'   => 'link-background-hover',
				'element'  => '.pagination a:hover, .pagination a:focus',
				'property' => 'background-color',
			],
			[
				'choice'   => 'link-text',
				'element'  => '.pagination a',
				'property' => 'color',
			],
			[
				'choice'   => 'link-text-hover',
				'element'  => '.pagination a:hover, .pagination a:focus',
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
		'type'     => 'slider',
		'settings' => 'spacing',
		'label'    => __( 'Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.pagination',
				'property' => 'padding',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'link-spacing',
		'label'    => __( 'Link Spacing', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.pagination a',
				'property' => 'padding',
				'units'    => 'px',
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
		'default'  => 'full',
		'choices'  => [
			'left'   => __( 'Align Left', 'genesis-customizer' ),
			'center' => __( 'Align Center', 'genesis-customizer' ),
			'right'  => __( 'Align Right', 'genesis-customizer' ),
			'full'   => __( 'Align Full', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'     => 'text',
		'settings' => 'previous',
		'label'    => __( 'Previous Link Text', 'genesis-customizer' ),
		'default'  => __( '← Previous', 'genesis-customizer' ),
	],
	[
		'type'     => 'text',
		'settings' => 'next',
		'label'    => __( 'Next Link Text', 'genesis-customizer' ),
		'default'  => __( 'Next →', 'genesis-customizer' ),
	],
];
