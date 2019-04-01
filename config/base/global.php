<?php

namespace GenesisCustomizer;

$transition_elements = array_merge(
	_get_elements( 'button', false, true ),
	_get_elements( 'input', false, true ),
	[
		'a',
		'.above-header',
		'.site-header',
		'.title-area',
		'.primary-header',
		'.nav-primary',
		'.nav-secondary',
		'.menu-toggle-icon:before',
		'.menu-toggle-icon:after',
		'.menu-overlay',
		'.header-search.full-screen',
		'.scroll-to-top-icon',
	]
);

return [
	[
		'type'        => 'slider',
		'settings'    => 'gutter',
		'label'       => __( 'Gutters', 'genesis-customizer' ),
		'description' => __( 'Controls the spacing between common page elements such as entries, breadcrumbs, widgets, comments etc.', 'genesis-customizer' ),
		'default'     => _get_size( 'xl', '' ),
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'      => [
			[
				'element'         => [
					'.sidebar-content .content',
					'.content-sidebar .content',
					'.center-content .content',
				],
				'property'        => 'width',
				'value_pattern'   => 'calc(100% - sidebarPrimarypx - $px)',
				'pattern_replace' => [
					'sidebarPrimary' => 'genesis-customizer_sidebars_primary_width',
				],
				'media_query'     => _get_media_query(),
			],
			[
				'element'         => [
					'.content-sidebar-sidebar .content',
					'.sidebar-sidebar-content .content',
					'.sidebar-content-sidebar .content',
				],
				'property'        => 'width',
				'value_pattern'   => 'calc(100% - ( sidebarPrimarypx + sidebarSecondarypx ) - ( $px * 2 ))',
				'pattern_replace' => [
					'sidebarPrimary'   => 'genesis-customizer_sidebars_primary_width',
					'sidebarSecondary' => 'genesis-customizer_sidebars_secondary_width',
				],
				'media_query'     => _get_media_query(),
			],
			[
				'element'     => [
					'.content',
				],
				'property'    => 'margin-bottom',
				'units'       => 'px',
				'media_query' => _get_media_query( 'max' ),
			],
			[
				'element'  => [
					'.single .author-box',
					'.masonry .pagination',
					'.entry-comments',
					'.entry-comments + .comment-respond',
				],
				'property' => 'margin-top',
				'units'    => 'px',
			],
			[
				'element'  => [
					'.archive-description',
					'.author-box',
					'.archive .entry',
					'.after-entry',
					'.sidebar-primary .widget',
				],
				'property' => 'margin-bottom',
				'units'    => 'px',
			],
			[
				'element'  => [
					'.content.masonry',
				],
				'property' => 'column-gap',
				'units'    => 'px',
			],
			[
				'element'       => [
					'.one-half',
					'.one-third',
					'.one-fourth',
					'.one-sixth',
					'.two-thirds',
					'.two-fourths',
					'.two-sixths',
					'.three-fourths',
					'.three-sixths',
					'.four-sixths',
					'.five-sixths',
					'.archive.has-2-columns .entry',
					'.archive.has-3-columns .entry',
					'.archive.has-4-columns .entry',
					'.gallery-item',
				],
				'property'      => 'margin',
				'value_pattern' => '0 0 $px $px',
				'media_query'   => _get_media_query(),
			],
			[
				'element'       => [
					'.first',
					'.archive.has-2-columns .entry:nth-of-type(2n + 1)',
					'.archive.has-3-columns .entry:nth-of-type(3n + 1)',
					'.archive.has-4-columns .entry:nth-of-type(4n + 1)',
					'.gallery-columns-1 .gallery-item',
					'.gallery-columns-2 .gallery-item:nth-of-type(2n + 1)',
					'.gallery-columns-3 .gallery-item:nth-of-type(3n + 1)',
					'.gallery-columns-4 .gallery-item:nth-of-type(4n + 1)',
					'.gallery-columns-6 .gallery-item:nth-of-type(6n + 1)',
				],
				'property'      => 'margin-left',
				'value_pattern' => '0px',
				'media_query'   => _get_media_query(),
			],
			[
				'element'       => [
					'.one-half',
					'.two-fourths',
					'.three-sixths',
					'.archive.has-2-columns .entry',
					'.gallery-columns-2 .gallery-item',
				],
				'property'      => 'width',
				'value_pattern' => 'calc((100% - ($px * 1)) / 2)',
				'media_query'   => _get_media_query(),
			],
			[
				'element'       => [
					'.one-third',
					'.two-sixths',
					'.archive.has-3-columns .entry',
					'.gallery-columns-3 .gallery-item',
				],
				'property'      => 'width',
				'value_pattern' => 'calc((100% - ($px * 2)) / 3)',
				'media_query'   => _get_media_query(),
			],
			[
				'element'       => [
					'.one-fourth',
					'.archive.has-4-columns .entry',
					'.gallery-columns-4 .gallery-item',
				],
				'property'      => 'width',
				'value_pattern' => 'calc((100% - ($px * 3)) / 4)',
				'media_query'   => _get_media_query(),
			],
			[
				'element'       => [
					'.one-sixth',
					'.gallery-columns-6 .gallery-item',
				],
				'property'      => 'width',
				'value_pattern' => 'calc((100% - ($px * 5)) / 6)',
				'media_query'   => _get_media_query(),
			],
			[
				'element'       => [
					'.two-thirds',
					'.four-sixths',
				],
				'property'      => 'width',
				'value_pattern' => 'calc(((100% - ($px * 2)) / 3) * 2 + $)',
				'media_query'   => _get_media_query(),
			],
			[
				'element'       => [
					'.three-fourths',
				],
				'property'      => 'width',
				'value_pattern' => 'calc(((100% - ($px * 3)) / 4) * 3 + $ * 2)',
				'media_query'   => _get_media_query(),
			],
			[
				'element'       => [
					'.five-sixths',
				],
				'property'      => 'width',
				'value_pattern' => 'calc(((100% - ($px * 5)) / 6) * 5 + $ * 4)',
				'media_query'   => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-393074',
		'default'  => '<hr>',
	],
	[
		'type'        => 'slider',
		'settings'    => 'wrap-width',
		'label'       => __( 'Wrap Max Width', 'genesis-customizer' ),
		'description' => __( 'Controls the maximum percentage of the screen that element wrappers can span.', 'genesis-customizer' ),
		'default'     => '90',
		'choices'     => [
			'min'  => 50,
			'max'  => 100,
			'step' => 1,
		],
		'output'      => [
			[
				'element'  => [
					'.wrap',
					'.content-sidebar-wrap',
				],
				'property' => 'width',
				'units'    => '%',
			],
			[
				'element'       => '.has-mobile-menu-top .nav-primary',
				'property'      => 'margin-left',
				'value_pattern' => 'calc((-100vw - -$vw) / 2)',
				'media_query'   => _get_media_query( 'max' ),
			],
			[
				'element'       => '.has-mobile-menu-top .nav-primary',
				'property'      => 'margin-right',
				'value_pattern' => 'calc((-100vw - -$vw) / 2)',
				'media_query'   => _get_media_query( 'max' ),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-3074',
		'default'  => '<hr>',
	],
	[
		'type'        => 'slider',
		'settings'    => 'border-radius',
		'label'       => __( 'Border Radius', 'genesis-customizer' ),
		'description' => __( 'Controls the border radius for common page elements such as entries, breadcrumbs, widgets, comments etc.', 'genesis-customizer' ),
		'default'     => '2',
		'choices'     => [
			'min'  => 0,
			'max'  => 20,
			'step' => 1,
		],
		'output'      => [
			[
				'element'  => [
					'.archive-description',
					'.entry',
					'.breadcrumb',
					'.author-box',
					'.after-entry',
					'.entry-comments',
					'.comment-respond',
					'.pagination',
					'.widget',
				],
				'property' => 'border-radius',
				'units'    => 'px',
			],
			[
				'element'       => '.featured-image-first .no-spacing img',
				'property'      => 'border-radius',
				'value_pattern' => '$px $px 0 0',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-4',
		'default'  => '<hr>',
	],
	[
		'type'        => 'kirki-box-shadow',
		'settings'    => 'box-shadow',
		'label'       => __( 'Drop Shadow', 'genesis-customizer' ),
		'description' => __( 'Controls the drop shadow for common page elements such as entries, breadcrumbs, widgets, comments etc.', 'genesis-customizer' ),
		'default'     => '0px 3px 6px 0px rgba(0,10,20,0.01)',
		'output'      => [
			[
				'element'  => [
					'.archive-description',
					'.entry',
					'.breadcrumb',
					'.author-box',
					'.after-entry',
					'.entry-comments',
					'.comment-respond',
					'.pagination',
				],
				'property' => 'box-shadow',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-34874',
		'default'  => '<hr>',
	],
	[
		'type'        => 'slider',
		'settings'    => 'transition-duration',
		'label'       => __( 'Transitions', 'genesis-customizer' ),
		'description' => '<br>' . __( 'Duration', 'genesis-customizer' ),
		'default'     => '0.2',
		'choices'     => [
			'min'  => 0,
			'max'  => 5,
			'step' => 0.01,
		],
		'output'      => [
			[
				'element'       => array_merge(
					_get_elements( 'button', false, true ),
					_get_elements( 'input', false, true ),
					[
						'a',
						'.title-area',
						'.primary-header',
						'.nav-primary',
						'.scroll-to-top-icon',
					]
				),
				'property'      => 'transition-property',
				'value_pattern' => 'all',
			],
			[
				'element'  => $transition_elements,
				'property' => 'transition-duration',
				'units'    => 's',
			],
		],
	],
	[
		'type'        => 'slider',
		'settings'    => 'transition-delay',
		'description' => __( 'Delay', 'genesis-customizer' ),
		'default'     => '0',
		'choices'     => [
			'min'  => 0,
			'max'  => 5,
			'step' => 0.01,
		],
		'output'      => [
			[
				'element'  => $transition_elements,
				'property' => 'transition-delay',
				'units'    => 's',
			],
		],
	],
	[
		'type'        => 'select',
		'settings'    => 'transition-function',
		'description' => __( 'Function', 'genesis-customizer' ),
		'default'     => 'ease',
		'choices'     => [
			'ease'        => __( 'Ease', 'genesis-customizer' ),
			'ease-in'     => __( 'Ease in', 'genesis-customizer' ),
			'ease-in-out' => __( 'Ease in out', 'genesis-customizer' ),
			'ease-out'    => __( 'Ease out', 'genesis-customizer' ),
			'linear'      => __( 'Linear', 'genesis-customizer' ),
			'step-end'    => __( 'Step end', 'genesis-customizer' ),
			'step-middle' => __( 'Step middle', 'genesis-customizer' ),
			'step-start'  => __( 'Step start', 'genesis-customizer' ),
		],
		'output'      => [
			[
				'element'  => $transition_elements,
				'property' => 'transition-timing-function',
			],
		],
	],
];
