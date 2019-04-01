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
				'setting'  => _get_setting( 'enabled' ),
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
];
