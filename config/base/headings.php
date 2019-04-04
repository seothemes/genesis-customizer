<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'text' => __( 'Text', 'genesis-customizer' ),
		],
		'default'  => [
			'text' => _get_color( 'heading' ),
		],
		'output'   => [
			[
				'choice'   => 'text',
				'element'  => _get_elements( 'heading' ),
				'property' => 'color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'typography',
		'settings' => 'typography',
		'label'    => __( 'Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'    => '',
			'font-size'      => '',
			'variant'        => '600',
			'line-height'    => '1.3',
			'letter-spacing' => '',
			'text-transform' => '',
		],
		'output'   => [
			[
				'element' => _get_elements( 'heading' ),
			],
		],
	],
	[
		'type'     => 'dimensions',
		'settings' => 'headings-margin',
		'default'  => [
			'margin-top'    => '0',
			'margin-bottom' => _get_size( 'm' ),
		],
		'choices'  => [
			'labels' => [
				'margin-top'    => __( 'Margin Top', 'genesis-customizer' ),
				'margin-bottom' => __( 'Margin Bottom', 'genesis-customizer' ),
			],
		],
		'output'   => [
			[
				'element'  => _get_elements( 'heading' ),
				'choice'   => 'margin-top',
				'property' => 'margin-top',
			],
			[
				'element'  => _get_elements( 'heading' ),
				'choice'   => 'margin-bottom',
				'property' => 'margin-bottom',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'tip-1',
		'default'  => sprintf(
			'<hr><p><strong>%s</strong>%s<a href="javascript:wp.customize.section( %s ).focus();">%s</a></p><hr>',
			esc_html__( 'Tip: ', 'genesis-customizer' ),
			esc_html__( 'Entry title typography settings can be customized from the ', 'genesis-customizer' ),
			esc_attr( '"genesis-customizer_single_entry"' ),
			esc_html__( 'Entry Section', 'genesis-customizer' )
		),
	],
	[
		'type'            => 'custom',
		'settings'        => 'tip-16723422',
		'default'         => sprintf(
			'<p>%s <strong>%s</strong>%s </p><a href="%s" target="_blank" class="button-primary">%s</a><br>&nbsp;<hr>',
			esc_html__( 'Responsive font size settings (separate desktop and mobile sizes) available in', 'genesis-customizer' ),
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
		'type'     => 'dimension',
		'settings' => 'h1',
		'label'    => __( 'H1 Font Size', 'genesis-customizer' ),
		'default'  => '36px',
		'output'   => [
			[
				'element'  => 'h1',
				'property' => 'font-size',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimension',
		'settings' => 'h2',
		'label'    => __( 'H2 Font Size', 'genesis-customizer' ),
		'default'  => '28px',
		'output'   => [
			[
				'element'  => 'h2',
				'property' => 'font-size',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimension',
		'settings' => 'h3',
		'label'    => __( 'H3 Font Size', 'genesis-customizer' ),
		'default'  => '24px',
		'output'   => [
			[
				'element'  => 'h3',
				'property' => 'font-size',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-5',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimension',
		'settings' => 'h4',
		'label'    => __( 'H4 Font Size', 'genesis-customizer' ),
		'default'  => '22px',
		'output'   => [
			[
				'element'  => 'h4',
				'property' => 'font-size',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-6',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimension',
		'settings' => 'h5',
		'label'    => __( 'H5 Font Size', 'genesis-customizer' ),
		'default'  => '20px',
		'output'   => [
			[
				'element'  => 'h5,legend',
				'property' => 'font-size',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-7',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimension',
		'settings' => 'h6',
		'label'    => __( 'H6 Font Size', 'genesis-customizer' ),
		'default'  => '18px',
		'output'   => [
			[
				'element'  => 'h6',
				'property' => 'font-size',
			],
		],
	],
];
