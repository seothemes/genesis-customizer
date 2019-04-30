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
				'element' => '.single .entry-meta',
			],
		],
	],
	[
		'type'     => 'select',
		'settings' => 'text-align',
		'label'    => __( 'Text Alignment', 'genesis-customizer' ),
		'default'  => 'left',
		'choices'  => [
			'left'   => __( 'Left', 'genesis-customizer' ),
			'center' => __( 'Center', 'genesis-customizer' ),
			'right'  => __( 'Right', 'genesis-customizer' ),
		],
		'output'   => [
			[
				'element'  => '.single .entry-meta',
				'property' => 'text-align',
			],
		],
	],
];
