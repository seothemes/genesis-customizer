<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'generic',
		'settings' => 'post-info',
		'label'    => __( 'Post Info', 'genesis-customizer' ),
		'default'  => '[post_date] by [post_author_posts_link] [post_comments] [post_edit]',
		'choices'  => [
			'element' => 'textarea',
			'rows'    => '2',
		],
	],
	[
		'type'     => 'generic',
		'settings' => 'post-meta',
		'label'    => __( 'Post Meta', 'genesis-customizer' ),
		'default'  => '[post_categories before="Filed Under: "] [post_tags before="Tagged: "]',
		'choices'  => [
			'element' => 'textarea',
			'rows'    => '2',
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
			'text'       => __( 'Text', 'genesis-customizer' ),
			'link'       => __( 'Link', 'genesis-customizer' ),
			'link-hover' => __( 'Link Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'text'                   => '',
			'entry-title-link'       => '',
			'entry-title-link-hover' => '',
		],
		'output'   => [
			[
				'choice'   => 'text',
				'element'  => '.archive .entry-meta',
				'property' => 'color',
			],
			[
				'choice'   => 'link',
				'element'  => '.archive .entry-meta a',
				'property' => 'color',
			],
			[
				'choice'   => 'link-hover',
				'element'  => '.archive .entry-meta a:hover, .archive .entry-meta a:focus',
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
		'settings' => 'entry-meta-typography',
		'label'    => __( 'Entry Meta Typography', 'genesis-customizer' ),
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
				'element' => '.archive .entry-meta',
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
		'settings' => 'spacing-top',
		'label'    => __( 'Spacing Top', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.archive .entry-meta',
				'property' => 'margin-top',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing-bottom',
		'label'    => __( 'Spacing Bottom', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.archive .entry-meta',
				'property' => 'margin-bottom',
				'units'    => 'px',
			],
		],
	],
];
