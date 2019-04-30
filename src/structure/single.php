<?php

namespace GenesisCustomizer;

add_action( 'genesis_before', __NAMESPACE__ . '\single_setup', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function single_setup() {
	if ( ! _is_single() ) {
		return;
	}

	add_filter( 'genesis_author_box_title', __NAMESPACE__ . '\author_box_title', 10, 2 );
	add_filter( 'genesis_post_info', __NAMESPACE__ . '\single_post_info' );
	add_filter( 'genesis_post_meta', __NAMESPACE__ . '\single_post_meta' );

	$post_types = _get_value( 'single_featured-image_enabled' );

	if ( ! is_array( $post_types ) ) {
		return;
	}

	foreach ( $post_types as $post_type ) {
		if ( is_singular( $post_type ) ) {
			$hook = _get_value( 'single_featured-image_position' );

			add_action( $hook, __NAMESPACE__ . '\display_featured_image' );
		}
	}
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function display_featured_image() {
	$img = genesis_get_image( [
		'format'  => 'html',
		'size'    => _get_value( 'single_featured-image_size' ),
		'context' => 'single',
		'attr'    => genesis_parse_attr( 'entry-image', [] ),
	] );

	if ( ! empty( $img ) ) {
		genesis_markup( [
			'open'    => '<figure %s>',
			'close'   => '</figure>',
			'content' => wp_make_content_images_responsive( $img ),
			'context' => 'featured-image',
		] );
	}
}

add_filter( 'genesis_attr_featured-image', __NAMESPACE__ . '\featured_image_alignment' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $attr
 *
 * @return mixed
 */
function featured_image_alignment( $attr ) {
	$setting = _get_value( 'single_featured-image_alignment' );

	if ( '' === $setting) {
		return $attr;
	}

	$attr['class'] = $attr['class'] . ' wp-block-image align' . $setting;

	return $attr;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $title
 * @param $context
 *
 * @return mixed
 */
function author_box_title( $title, $context ) {
	$author_box_title = _get_value( 'content_author-box_title' );

	if ( '' !== $author_box_title ) {
		$title = $author_box_title;
	}

	return $title;
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return string
 */
function single_post_info() {
	$text = _get_value( 'single_post-meta_post-info' );

	return do_shortcode( $text );
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return string
 */
function single_post_meta() {
	$text = _get_value( 'single_post-meta_post-meta' );

	return do_shortcode( $text );
}

add_action( 'genesis_meta', __NAMESPACE__ . '\hide_page_title' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function hide_page_title() {
	if ( get_post_meta( get_the_ID(), 'title_disabled', true ) ) {
		remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
	}
}
