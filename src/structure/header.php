<?php

namespace GenesisCustomizer;

add_filter( 'body_class', __NAMESPACE__ . '\header_body_classes', 100, 1 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $classes
 *
 * @return array
 */
function header_body_classes( $classes ) {
	$header_layout  = _get_value( 'header_primary_layout' );
	$sticky_enabled = _get_value( 'header_sticky_enabled' );

	$classes[] = $header_layout;
	$classes[] = $sticky_enabled ? $sticky_enabled : 'no-sticky-header';
	$classes[] = _get_value( 'header_primary_mobile-layout' );
	$classes[] = _get_value( 'menus_mobile_animation' );

	return $classes;
}

add_filter( 'genesis_attr_site-title', __NAMESPACE__ . '\display_title_tagline' );
add_filter( 'genesis_attr_site-description', __NAMESPACE__ . '\display_title_tagline' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function display_title_tagline( $atts ) {
	$display = _get_value( 'title-tagline' );

	if ( ! $display ) {
		$atts['class'] = $atts['class'] . ' screen-reader-text';
	}

	return $atts;
}

add_action( 'genesis_site_title', __NAMESPACE__ . '\custom_logo', 5 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function custom_logo() {
	$html = has_custom_logo() ? the_custom_logo() : '';

	$sticky           = _get_value( 'header_sticky_different-logo' );
	$sticky_logo      = _get_value( 'header_sticky_logo' );
	$transparent      = _get_value( 'header_transparent_different-logo' );
	$transparent_logo = _get_value( 'header_transparent_logo' );

	if ( $sticky && $sticky_logo ) {
		$attr = [
			'class' => 'sticky-logo',
		];

		$alt = get_post_meta( $sticky_logo, '_wp_attachment_image_alt', true );

		if ( empty( $alt ) ) {
			$attr['alt'] = get_bloginfo( 'name', 'display' );
		}

		$html .= sprintf(
			'<a href="%1$s" class="sticky-logo-link" rel="home" itemprop="url">%2$s</a>',
			esc_url( home_url( '/' ) ),
			wp_get_attachment_image( $sticky_logo, 'full', false, $attr )
		);
	}

	if ( $transparent && $transparent_logo ) {
		$attr = [
			'class' => 'transparent-logo',
		];

		$alt = get_post_meta( $transparent_logo, '_wp_attachment_image_alt', true );

		if ( empty( $alt ) ) {
			$attr['alt'] = get_bloginfo( 'name', 'display' );
		}

		$html .= sprintf(
			'<a href="%1$s" class="transparent-logo-link" rel="home" itemprop="url">%2$s</a>',
			esc_url( home_url( '/' ) ),
			wp_get_attachment_image( $transparent_logo, 'full', false, $attr )
		);
	}

	echo apply_filters( 'genesis_customizer_logo', $html );
}

add_action( 'genesis_before_header_wrap', __NAMESPACE__ . '\primary_header_open', 100 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function primary_header_open() {
	genesis_markup( [
		'open'    => '<div %s>',
		'context' => 'primary-header',
	] );
}

add_action( 'genesis_after_header_wrap', __NAMESPACE__ . '\primary_header_close', 0 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function primary_header_close() {
	genesis_markup( [
		'close'   => '</div>',
		'context' => 'primary-header',
	] );
}

add_action( 'genesis_markup_title-area_open', __NAMESPACE__ . '\before_title_area' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $open_html
 *
 * @return string
 */
function before_title_area( $open_html ) {
	if ( $open_html ) {
		ob_start();
		do_action( 'genesis_before_title_area' );
		$open_html = ob_get_clean() . $open_html;
	}

	return $open_html;
}

add_action( 'genesis_markup_title-area_close', __NAMESPACE__ . '\after_title_area' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $close_html
 *
 * @return string
 */
function after_title_area( $close_html ) {
	if ( $close_html ) {
		ob_start();
		do_action( 'genesis_after_title_area' );
		$close_html = $close_html . ob_get_clean();
	}

	return $close_html;
}

add_filter( 'genesis_seo_title', __NAMESPACE__ . '\site_title_link', 10, 3 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $title
 * @param $inside
 * @param $wrap
 *
 * @return mixed
 */
function site_title_link( $title, $inside, $wrap ) {
	$link = sprintf(
		'<a href="%s" class="%s">%s</a>',
		trailingslashit( home_url() ),
		apply_filters( 'genesis_customizer_site_title_link', 'site-title-link' ),
		get_bloginfo( 'name' )
	);

	return str_replace( $inside, $link, $title );
}
