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
			'background' => _get_color( 'background' ),
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => 'body.archive',
				'property' => 'background-color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'Genesis blog and archive settings can be changed from the', 'genesis-customizer' ),
			esc_attr( '"genesis_archives"' ),
			esc_html__( 'Content Archives Section', 'genesis-customizer' )
		),
	],
];
