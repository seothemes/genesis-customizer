<?php
/**
 * Genesis Customizer.
 *
 * This file contains header structure functions for Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_filter( 'body_class', __NAMESPACE__ . '\header_body_classes', 100, 1 );
/**
 * Add header specific body classes.
 *
 * @since 1.0.0
 *
 * @param array $classes All body classes.
 *
 * @return array
 */
function header_body_classes( $classes ) {
	$header_layout    = _get_value( 'header_primary_layout' );
	$mobile_layout    = _get_value( 'header_primary_mobile-layout' );
	$mobile_animation = _get_value( 'menus_mobile_animation' );

	if ( ! _is_pro_active() ) {
		if ( 'has-logo-left' === $header_layout ) {
			$mobile_layout = 'has-logo-left-mobile';
		}

		if ( 'has-logo-above' === $header_layout ) {
			$mobile_layout = 'has-logo-above-mobile';
		}

		if ( 'has-logo-right' === $header_layout ) {
			$mobile_layout = 'has-logo-right-mobile';
		}
	}

	$classes[] = $header_layout;
	$classes[] = $mobile_layout;
	$classes[] = $mobile_animation;

	if ( _is_single() ) {
		$classes[] = 'single';
		$classes   = array_diff( $classes, [ 'archive' ] );
	}

	if ( _is_archive() ) {
		$classes[] = 'archive';
		$classes   = array_diff( $classes, [ 'single' ] );
	}

	return $classes;
}

add_filter( 'genesis_attr_site-title', __NAMESPACE__ . '\display_site_title' );
/**
 * Hide/show site title.
 *
 * @since 1.0.0
 *
 * @param array $atts Sit title attributes.
 *
 * @return array
 */
function display_site_title( $atts ) {
	$display = _get_value( 'title' );

	if ( ! $display ) {
		$atts['class'] = $atts['class'] . ' screen-reader-text';
	}

	return $atts;
}

add_filter( 'genesis_attr_site-description', __NAMESPACE__ . '\display_site_tagline' );
/**
 * Hide/show site description.
 *
 * @since 1.0.0
 *
 * @param array $atts Site description attributes.
 *
 * @return array
 */
function display_site_tagline( $atts ) {
	$display = _get_value( 'tagline' );

	if ( ! $display ) {
		$atts['class'] = $atts['class'] . ' screen-reader-text';
	}

	return $atts;
}

add_action( 'genesis_site_title', __NAMESPACE__ . '\custom_logo', 5 );
/**
 * Display custom logo, sticky logo and transparent logo.
 *
 * @since 1.0.0
 *
 * @return void
 */
function custom_logo() {
	$html             = has_custom_logo() ? the_custom_logo() : '';
	$sticky           = _get_value( 'header_sticky_different-logo' );
	$sticky_logo      = _get_value( 'header_sticky_logo' );
	$transparent      = _get_value( 'header_transparent_different-logo' );
	$transparent_logo = _get_value( 'header_transparent_logo' );

	if ( _is_pro_active() && $sticky && $sticky_logo ) {
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

	if ( _is_pro_active() && $transparent && $transparent_logo ) {
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
 * Opening wrap for primary header.
 *
 * @since 1.0.0
 *
 * @return void
 */
function primary_header_open() {
	genesis_markup(
		[
			'open'    => '<div %s>',
			'context' => 'primary-header',
		]
	);
}

add_action( 'genesis_after_header_wrap', __NAMESPACE__ . '\primary_header_close', 5 );
/**
 * Closing wrap for primary header.
 *
 * @since 1.0.0
 *
 * @return void
 */
function primary_header_close() {
	genesis_markup(
		[
			'close'   => '</div>',
			'context' => 'primary-header',
		]
	);
}

add_action( 'genesis_markup_title-area_open', __NAMESPACE__ . '\before_title_area' );
/**
 * Add hook location before title area.
 *
 * @since 1.0.0
 *
 * @param string $open_html Opening HTML.
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
 * Add hook location after title area.
 *
 * @since 1.0.0
 *
 * @param string $close_html Closing HTML.
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
 * Add 'site-title-link' class to site title link for better CSS targeting.
 *
 * @since 1.0.0
 *
 * @param string $title  Site title text.
 * @param string $inside Site title inner markup.
 * @param string $wrap   Site title wrapper.
 *
 * @return string
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

add_action( 'genesis_meta', __NAMESPACE__ . '\hide_site_header' );
/**
 * Hide site header if page setting is checked.
 *
 * @since 1.0.0
 *
 * @return void
 */
function hide_site_header() {
	if ( get_post_meta( get_the_ID(), 'header_disabled', true ) ) {
		remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
		remove_action( 'genesis_header', 'genesis_do_header' );
		remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
	}
}
