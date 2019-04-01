<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'slider',
		'settings' => 'border-radius',
		'label'    => __( 'Border Radius', 'genesis-customizer' ),
		'default'  => '200',
		'choices'  => [
			'min'  => 0,
			'max'  => 300,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.avatar',
				'property' => 'border-radius',
				'units'    => 'px',
			],
		],
	],
];
