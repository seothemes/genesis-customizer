<?php

namespace GenesisCustomizer;

return [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'text'       => __( 'Text', 'genesis-customizer' ),
			'background' => __( 'Background', 'genesis-customizer' ),
		],
		'default'  => [
			'text'       => _get_color( 'text' ),
			'background' => _get_color( 'background' ),
		],
		'output'   => [
			[
				'choice'   => 'text',
				'element'  => 'body',
				'property' => 'color',
			],
			[
				'choice'   => 'background',
				'element'  => 'body',
				'property' => 'background-color',
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
		'settings' => 'typography',
		'label'    => __( 'Typography', 'genesis-customizer' ),
		'default'  => [
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
			'variant'        => '400',
			'line-height'    => '1.6',
			'letter-spacing' => '',
		],
		'output'   => [
			[
				'element' => 'body',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-97',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimension',
		'settings' => 'font-size',
		'label'    => __( 'Font size', 'genesis-customizer' ),
		'default'  => _get_size( 'm' ),
		'output'   => [
			[
				'element'  => 'body',
				'property' => 'font-size',
			],
		],
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
		'type'     => 'custom',
		'settings' => 'divider-197',
		'default'  => '<hr>',
		'active_callback' => function () {
			return _is_pro_active();
		},
	],
	[
		'type'     => 'dimensions',
		'settings' => 'paragraph',
		'label'    => __( 'Paragraphs', 'genesis-customizer' ),
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
				'choice'   => 'margin-top',
				'property' => 'margin-top',
				'element'  => 'p',
			],
			[
				'choice'   => 'margin-bottom',
				'property' => 'margin-bottom',
				'element'  => [
					'p',
					'.entry-image-link',
					'.entry pre',
					'.entry form',
					'.entry table',
				],
			],
		],
	],
];
