<?php

namespace GenesisCustomizer;

return [
	[
		'type'      => 'radio',
		'settings'  => 'header-left',
		'label'     => __( 'Enable Header Left', 'genesis-customizer' ),
		'default'   => 'hide-mobile',
		'transport' => 'refresh',
		'choices'   => [
			'show'         => __( 'Desktop and Mobile', 'genesis-customizer' ),
			'hide-mobile'  => __( 'Desktop', 'genesis-customizer' ),
			'hide-desktop' => __( 'Mobile', 'genesis-customizer' ),
			'hide'         => __( 'None', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip-1',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'Edit the  ', 'genesis-customizer' ),
			esc_attr( '"sidebar-widgets-header-left-widget"' ),
			esc_html__( 'Header Left Widgets', 'genesis-customizer' )
		),
	],
	[
		'type'      => 'radio',
		'settings'  => 'header-right',
		'label'     => __( 'Enable Header Right', 'genesis-customizer' ),
		'default'   => 'hide-mobile',
		'transport' => 'refresh',
		'choices'   => [
			'show'         => __( 'Desktop and Mobile', 'genesis-customizer' ),
			'hide-mobile'  => __( 'Desktop', 'genesis-customizer' ),
			'hide-desktop' => __( 'Mobile', 'genesis-customizer' ),
			'hide'         => __( 'None', 'genesis-customizer' ),
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip-2',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong> %s <a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'Edit the  ', 'genesis-customizer' ),
			esc_attr( '"sidebar-widgets-header-right-widget"' ),
			esc_html__( 'Header Right Widgets', 'genesis-customizer' )
		),
	],
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'widget-title'   => __( 'Widget Title', 'genesis-customizer' ),
			'widget-content' => __( 'Widget Content', 'genesis-customizer' ),
		],
		'default'  => [
			'widget-title'   => '',
			'widget-content' => '',
		],
		'output'   => [
			[
				'choice'   => 'widget-title',
				'element'  => '.primary-header .widget-title',
				'property' => 'color',
			],
			[
				'choice'   => 'widget-content',
				'element'  => '.primary-header .widget',
				'property' => 'color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-939831',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'vertical-spacing',
		'label'    => __( 'Vertical Spacing', 'genesis-customizer' ),
		'default'  => '0',
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.header-left, .header-right',
				'property' => 'padding-top',
				'units'    => 'px',
			],
			[
				'element'  => '.header-left, .header-right',
				'property' => 'padding-bottom',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'horizontal-spacing',
		'label'    => __( 'Horizontal Spacing', 'genesis-customizer' ),
		'default'  => '20',
		'choices'  => [
			'min'  => 0,
			'max'  => 200,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.header-left, .header-right',
				'property' => 'padding-left',
				'units'    => 'px',
			],
			[
				'element'  => '.header-left, .header-right',
				'property' => 'padding-right',
				'units'    => 'px',
			],
		],
	],
];
