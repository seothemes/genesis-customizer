<?php

namespace GenesisCustomizer;

$fields = [
	[
		'type'     => 'multicolor',
		'settings' => 'colors',
		'label'    => __( 'Colors', 'genesis-customizer' ),
		'choices'  => [
			'background'  => __( 'Background', 'genesis-customizer' ),
			'text'        => __( 'Text', 'genesis-customizer' ),
			'links'       => __( 'Links', 'genesis-customizer' ),
			'links-hover' => __( 'Links Hover', 'genesis-customizer' ),
		],
		'default'  => [
			'background'  => _get_color( 'white' ),
			'text'        => '',
			'links'       => '',
			'links-hover' => '',
		],
		'output'   => [
			[
				'choice'   => 'background',
				'element'  => '.breadcrumb',
				'property' => 'background-color',
			],
			[
				'choice'   => 'text',
				'element'  => '.breadcrumb',
				'property' => 'color',
			],
			[
				'choice'   => 'links',
				'element'  => '.breadcrumb a',
				'property' => 'color',
			],
			[
				'choice'   => 'links-hover',
				'element'  => '.breadcrumb a:hover, .breadcrumb a:focus',
				'property' => 'color',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-0',
		'default'  => '<hr>',
	],
	[
		'type'     => 'dimensions',
		'settings' => 'typography',
		'label'    => __( 'Typography', 'genesis-customizer' ),
		'default'  => [
			'mobile'  => _get_size( 's' ),
			'desktop' => '',
		],
		'choices'  => [
			'labels' => [
				'mobile'  => __( 'Font Size Mobile', 'genesis-customizer' ),
				'desktop' => __( 'Font Size Desktop', 'genesis-customizer' ),
			],
		],
		'output'   => [
			[
				'choice'   => 'mobile',
				'element'  => '.breadcrumb',
				'property' => 'font-size',
			],
			[
				'choice'      => 'desktop',
				'element'     => '.breadcrumb',
				'property'    => 'font-size',
				'media_query' => _get_media_query(),
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-1',
		'default'  => '<hr>',
	],
	[
		'type'     => 'slider',
		'settings' => 'spacing',
		'label'    => __( 'Spacing', 'genesis-customizer' ),
		'default'  => _get_size( 'xl', '' ),
		'choices'  => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
		'output'   => [
			[
				'element'  => '.breadcrumb',
				'property' => 'padding',
				'units'    => 'px',
			],
		],
	],
	[
		'type'     => 'custom',
		'settings' => 'divider-2',
		'default'  => '<hr>',
	],
];

$labels = [
	'home'      => __( 'Home', 'genesis-customizer' ),
	'prefix'    => __( 'You are here: ', 'genesis-customizer' ),
	'author'    => __( 'Archives for ', 'genesis-customizer' ),
	'category'  => __( 'Archives for ', 'genesis-customizer' ),
	'tag'       => __( 'Archives for ', 'genesis-customizer' ),
	'date'      => __( 'Archives for ', 'genesis-customizer' ),
	'search'    => __( 'Search for ', 'genesis-customizer' ),
	'tax'       => __( 'Archives for ', 'genesis-customizer' ),
	'post_type' => __( 'Archives for ', 'genesis-customizer' ),
	'404'       => __( 'Not found: ', 'genesis-customizer' ),
];

foreach ( $labels as $label => $default ) {
	$title   = ucwords( str_replace( '_', ' ', $label ) );
	$tooltip = sprintf(
		__( 'Changes the %s label. Default value is "%s".', 'genesis-customizer' ),
		$title,
		$default
	);

	$fields[] = [
		'type'     => 'text',
		'settings' => 'label-' . $label,
		'label'    => $title . __( ' Label', 'genesis-customizer' ),
		'default'  => $default,
		'tooltip'  => $tooltip,
	];
}

return $fields;
