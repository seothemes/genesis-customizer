<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'site-title'       => __( 'Site Title', 'genesis-customizer' ),
			'site-title-hover' => __( 'Site Title Hover', 'genesis-customizer' ),
			'site-description' => __( 'Site Description', 'genesis-customizer' ),
		],
		'default'  => [
			'site-title'       => _get_color( 'heading' ),
			'site-title-hover' => _get_color( 'accent' ),
			'site-description' => _get_color( 'text' ),
		],
		'output'   => [
			[
				'choice'   => 'site-title',
				'element'  => '.title-area .site-title a',
				'property' => 'color',
			],
			[
				'choice'   => 'site-title-hover',
				'element'  => '.site-title a:hover, .site-title a:focus',
				'property' => 'color',
			],
			[
				'choice'   => 'site-description',
				'element'  => '.site-description',
				'property' => 'color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip-1',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'Looking for the Custom Logo settings? Change them in the ', 'genesis-customizer' ),
			esc_attr( '"title_tagline"' ),
			esc_html__( 'Site Identity Section', 'genesis-customizer' )
		),
	],
	[
		'type'     => 'typography',
		'settings' => 'typography',
		'label'    => __( 'Site Title Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'     => '',
			'font-size'       => '17px',
			'variant'         => '700',
			'line-height'     => '1.4',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
		],
		'output'   => [
			[
				'element' => '.site-title',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'site-description-typography',
		'label'    => __( 'Site Description Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'     => '',
			'font-size'       => _get_size( 'xs' ),
			'variant'         => '600',
			'line-height'     => '',
			'letter-spacing'  => '',
			'text-transform'  => '',
			'text-decoration' => '',
		],
		'output'   => [
			[
				'element' => '.site-description',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'site-title-spacing',
		'label'    => __( 'Site Title Bottom Spacing', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => [
					'.site-title-link',
					'.menu-primary .site-title-link',
				],
				'property'      => 'padding',
				'value_pattern' => '0 0 $px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'vertical-spacing',
		'label'    => __( 'Vertical Spacing', 'genesis-customizer' ),
		'default'  => '20',
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.title-area',
				'property' => 'margin-top',
				'units'    => 'px',
			],
			[
				'element'  => '.title-area',
				'property' => 'margin-bottom',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'horizontal-spacing',
		'label'    => __( 'Horizontal Spacing', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.title-area',
				'property' => 'margin-left',
				'units'    => 'px',
			],
			[
				'element'  => '.title-area',
				'property' => 'margin-right',
				'units'    => 'px',
			],
		],
	],
];
