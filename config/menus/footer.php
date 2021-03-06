<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'select',
		'settings' => 'position',
		'label'    => __( 'Position', 'genesis-customizer' ),
		'default'  => 'above-credits',
		'choices'  => [
			'above-footer'  => __( 'Above Site Footer', 'genesis-customizer' ),
			'above-widgets' => __( 'Above Footer Widgets', 'genesis-customizer' ),
			'above-credits' => __( 'Above Footer Credits', 'genesis-customizer' ),
			'below-credits' => __( 'Below Footer Credits', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'custom',
		'settings' => 'tip',
		'default'  => sprintf(
			'<p><strong>%s</strong> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'Footer Menu not showing? Make sure it has been assigned from the', 'genesis-customizer' ),
			esc_attr( '"menu_locations"' ),
			esc_html__( 'Menu Locations Screen', 'genesis-customizer' )
		),
	],
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background' => __( 'Background', 'genesis-customizer' ),
			'border'     => __( 'Border', 'genesis-customizer' ),
			'link'       => __( 'Link', 'genesis-customizer' ),
			'link-hover' => __( 'Link Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background' => '',
			'border'     => '',
			'link'       => '',
			'link-hover' => '',
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.nav-footer, .footer-credits .menu',
				'property' => 'background-color',
			],
			[
				'choice'   => 'border',
				'element'  => '.nav-footer, .footer-credits .menu',
				'property' => 'border-color',
			],
			[
				'choice'   => 'link',
				'element'  => '.nav-footer a, .footer-credits .menu-item a',
				'property' => 'color',
			],
			[
				'choice'   => 'link-hover',
				'element'  => [
					'.nav-footer a:hover',
					'.nav-footer a:focus',
					'.nav-footer .current-menu-item > a',
					'.footer-credits .menu a:hover',
					'.footer-credits .menu a:focus',
					'.footer-credits .menu .current-menu-item > a',
				],
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
				'element'     => '.nav-footer a, .footer-credits .menu-item a',
				'media_query' => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'select',
		'settings' => 'alignment',
		'label'    => __( 'Alignment', 'genesis-customizer' ),
		'default'  => 'center',
		'choices'  => [
			'space-between' => __( 'Full Width', 'genesis-customizer' ),
			'flex-start'    => __( 'Left', 'genesis-customizer' ),
			'flex-end'      => __( 'Right', 'genesis-customizer' ),
			'center'        => __( 'Center', 'genesis-customizer' ),
		],
		'output'   => [
			[
				'element'  => '.nav-footer .wrap',
				'property' => 'justify-content',
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
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.nav-footer, .footer-credits .menu',
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
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.nav-footer, .footer-credits .menu',
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-vertical-spacing',
		'label'    => __( 'Menu Item Vertical Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 40,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => '.nav-footer a, .footer-credits .menu-item a',
				'property'      => 'padding',
				'value_pattern' => '$px 0',
				'media_query'   => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'menu-item-horizontal-spacing',
		'label'    => __( 'Menu Item Horizontal Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'm', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 40,
			'step' => 1,
		],
		'output'   => [
			[
				'element'       => '.nav-footer .menu-item, .footer-credits .menu-item',
				'property'      => 'padding',
				'value_pattern' => '0 $px',
				'media_query'   => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimensions',
		'settings' => 'border-width',
		'label'    => __( 'Border Width', 'genesis-customizer' ),
		'default'  => [
			'border-top-width'    => '',
			'border-bottom-width' => '',
		],
		'choices'  => [
			'labels' => [
				'border-top-width'    => __( 'Border Top Width', 'genesis-customizer' ),
				'border-bottom-width' => __( 'Border Bottom Width', 'genesis-customizer' ),
			],
		],
		'output'   => [
			[
				'choice'   => 'border-top-width',
				'property' => 'border-top-width',
				'element'  => '.nav-footer, .footer-credits .menu',
			],
			[
				'choice'   => 'border-bottom-width',
				'property' => 'border-bottom-width',
				'element'  => '.nav-footer, .footer-credits .menu',
			],
		],
	],
];
