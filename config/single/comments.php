<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background' => __( 'Background', 'genesis-customizer' ),
		],
		'default'  => [
			'background' => _get_color( 'white' ),
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.entry-comments, .comment-respond',
				'property' => 'background-color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
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
				'element'  => [
					'.entry-comments',
					'.comment-respond',
				],
				'property' => 'padding',
				'units'    => 'px',
			],
			[
				'element'       => '.children',
				'property'      => 'padding',
				'value_pattern' => '0 0 $px $px',
			],
			[
				'element'  => '.children .comment',
				'property' => 'padding-top',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'text',
		'settings' => 'says',
		'label'    => __( 'Says Label', 'genesis-customizer' ),
		'default'  => __( 'says', 'genesis-customizer' ),
	],
	[
		'type'     => 'text',
		'settings' => 'title',
		'label'    => __( 'Title', 'genesis-customizer' ),
		'default'  => __( 'Comments', 'genesis-customizer' ),
	],
	[
		'type'     => 'text',
		'settings' => 'reply',
		'label'    => __( 'Reply', 'genesis-customizer' ),
		'default'  => __( 'Leave a Reply', 'genesis-customizer' ),
	],
	[
		'type'     => 'text',
		'settings' => 'submit',
		'label'    => __( 'Submit Button', 'genesis-customizer' ),
		'default'  => __( 'Post Comment', 'genesis-customizer' ),
	],
	/*
	[
		'type'     => 'text',
		'settings' => 'zero',
		'label'    => __( 'Leave a Comment', 'genesis-customizer' ),
		'default'  => __( 'Leave a Comment', 'genesis-customizer' ),
	],
	[
		'type'     => 'text',
		'settings' => 'one',
		'label'    => __( '1 Comment', 'genesis-customizer' ),
		'default'  => __( '1 Comment', 'genesis-customizer' ),
	],
	[
		'type'     => 'text',
		'settings' => 'more',
		'label'    => __( '%s Comments', 'genesis-customizer' ),
		'default'  => __( '%s Comments', 'genesis-customizer' ),
	],
	*/
];
