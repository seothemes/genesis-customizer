<?php

namespace GenesisCustomizer;

add_filter( 'theme_page_templates', __NAMESPACE__ . '\register_templates' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $templates
 *
 * @return array
 */
function register_templates( $templates ) {
	$custom['blocks.php'] = 'Blocks';

	if ( _is_plugin_active( 'beaver-builder' ) ) {
		$custom['beaver-builder.php'] = 'Beaver Builder';
	}

	return array_merge( $custom, $templates );
}


add_filter( 'template_include', __NAMESPACE__ . '\include_templates' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $template
 *
 * @return string
 */
function include_templates( $template ) {
	$template_name = get_post_meta( get_the_ID(), '_wp_page_template', true );
	$template_path = _get_path() . 'assets/templates/' . $template_name;

	if ( ! in_array( $template_name, [ 'blocks.php', 'beaver-builder.php' ] ) ) {
		return $template;
	}

	if ( file_exists( $template_path ) ) {
		$template = $template_path;
	}

	return $template;
}


