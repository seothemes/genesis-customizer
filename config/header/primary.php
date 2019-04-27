<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'radio-image',
		'settings' => 'layout',
		'label'    => __( 'Desktop Layout', 'genesis-customizer' ),
		'priority' => 1,
		'default'  => 'has-logo-left',
		'choices'  => [
			'has-logo-left'  => _get_url() . 'assets/img/logo-left.gif',
			'has-logo-above' => _get_url() . 'assets/img/logo-above.gif',
			'has-logo-right' => _get_url() . 'assets/img/logo-right.gif',
		],
	],
	[
		'type'            => 'custom',
		'settings'        => 'tip-1',
		'priority'        => 2,
		'default'         => sprintf(
			'%s <strong>%s</strong>%s <br>&nbsp;<br><a href="%s" target="_blank" class="button-primary">%s</a>',
			esc_html__( 'Additional desktop and mobile header layouts available in', 'genesis-customizer' ),
			esc_html__( 'Genesis Customizer Pro', 'genesis-customizer' ),
			esc_html__( '!', 'genesis-customizer' ),
			_get_upgrade_url(),
			esc_html__( 'Go Pro →', 'genesis-customizer' )
		),
		'active_callback' => function () {
			return ! _is_pro_active();
		},
	],
	[
		'type'     => 'custom',
		'settings' => 'tip-2',
		'priority' => 4,
		'default'  => sprintf(
			'<hr><p><strong>%s</strong> %s <strong>%s</strong> %s <a href="javascript:wp.customize.control( %s ).focus();">%s</a> %s <a href="javascript:wp.customize.control( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip:', 'genesis-customizer' ),
			esc_html__( 'Menu not aligning correctly? Try adjusting the', 'genesis-customizer' ),
			esc_html__( 'Alignment', 'genesis-customizer' ),
			esc_html__( 'in the', 'genesis-customizer' ),
			esc_attr( '"genesis-customizer[menus_primary_alignment]"' ),
			esc_html__( 'Primary Menu Section', 'genesis-customizer' ),
			esc_html__( 'or the', 'genesis-customizer' ),
			esc_attr( '"genesis-customizer[menus_secondary_alignment]"' ),
			esc_html__( 'Secondary Menu Section', 'genesis-customizer' )
		),
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-83398',
		'default'  => '<hr>',
		'priority' => 5,
	],
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'priority' => 5,
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'    => __( 'Background', 'genesis-customizer' ),
			'border-top'    => __( 'Border Top', 'genesis-customizer' ),
			'border-bottom' => __( 'Border Bottom', 'genesis-customizer' ),
		],
		'default'  => [
			'background'    => _get_color( 'white' ),
			'border-top'    => _get_color( 'transparent' ),
			'border-bottom' => _get_color( 'transparent' ),
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.primary-header, .has-logo-side .site-header',
				'property' => 'background-color',
			],
			[
				'choice'   => 'border-top',
				'element'  => '.primary-header',
				'property' => 'border-top-color',
			],
			[
				'choice'   => 'border-bottom',
				'element'  => '.primary-header',
				'property' => 'border-bottom-color',
			],
		],
	],
	[
		'type'     => 'slider',
		'settings' => 'wrap-width',
		'label'    => __( 'Container Width', 'genesis-customizer' ),
		'default'  => '1152',
		'priority' => 4,
		'choices'  => [
			'min'  => 256,
			'max'  => 1920,
			'step' => 32,
		],
		'output'   => [
			[
				'element'  => '.site-header .wrap',
				'property' => 'max-width',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-398',
		'default'  => '<hr>',
		'active_callback' => function () {
			return ! _is_pro_active();
		},
	],
	[
		'type'     => 'dimensions',
		'settings' => 'border-width',
		'label'    => __( 'Border', 'genesis-customizer' ),
		'default'  => [
			'border-top-width'    => '1px',
			'border-bottom-width' => '1px',
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
				'element'  => '.primary-header',
			],
			[
				'choice'   => 'border-bottom-width',
				'property' => 'border-bottom-width',
				'element'  => '.primary-header',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-675',
		'default'  => '<hr>',
	],
	[
		'type'     => 'kirki-box-shadow',
		'settings' => 'box-shadow',
		'label'    => __( 'Drop Shadow', 'genesis-customizer' ),
		'default'  => '0px 3px 6px 0px rgba(0,10,20,0.01)',
		'output'   => [
			[
				'element'  => '.primary-header',
				'property' => 'box-shadow',
			],
		],
	],
];
