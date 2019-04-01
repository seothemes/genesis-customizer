<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicheck',
		'settings' => 'enabled',
		'label'    => __( 'Display on', 'genesis-customizer' ),
		'default'  => [ 'post' ],
		'choices'  => \Kirki_Helper::get_post_types(),
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'select',
		'settings' => 'position',
		'label'    => __( 'Position', 'genesis-customizer' ),
		'default'  => 'genesis_entry_header',
		'choices'  => [
			'genesis_before_entry'  => __( 'Before Entry', 'genesis-customizer' ),
			'genesis_entry_header'  => __( 'Entry Header', 'genesis-customizer' ),
			'genesis_entry_content' => __( 'Entry Content', 'genesis-customizer' ),
			'genesis_entry_footer'  => __( 'Entry Footer', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'select',
		'settings' => 'size',
		'label'    => __( 'Size', 'genesis-customizer' ),
		'default'  => 'large',
		'choices'  => _get_image_sizes(),
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing-top',
		'label'    => __( 'Spacing Top', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.featured-image',
				'property' => 'padding-top',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing-bottom',
		'label'    => __( 'Spacing Bottom', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.featured-image',
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
		],
	],
];
