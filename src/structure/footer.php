<?php

namespace GenesisCustomizer;

add_action( 'genesis_meta', __NAMESPACE__ . '\footer_credits', 20 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function footer_credits() {
	remove_action( 'genesis_footer', 'genesis_do_footer' );

	$footer_credits = _get_value( 'footer_credits_enabled' );

	if ( $footer_credits ) {
		add_action( 'genesis_footer', __NAMESPACE__ . '\footer_credits_div', 13 );
	}
}

/**
 * Display the Footer Credits widget area.
 *
 * @since 1.1.0
 *
 * @return void
 */
function display_footer_credits() {
	genesis_widget_area( 'footer-credits', [
		'before' => '',
		'after'  => '',
	] );
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function footer_credits_div() {
	genesis_markup( [
		'open'    => '<div %s>',
		'context' => 'footer-credits',
	] );

	genesis_structural_wrap( 'footer-credits', 'open' );

	$type = _get_value( 'footer_credits_type', 'text' );

	if ( 'widget' === $type ) {
		display_footer_credits();

	} else {
		$text = _get_value( 'footer_credits_text' );

		printf( '<p>%s</p>', do_shortcode( $text ) );
	}

	$scroll_to_top = _get_value( 'footer_scroll-to-top_enabled' );

	if ( $scroll_to_top ) {
		$style = _get_value( 'footer_scroll-to-top_style' );
		$html  = _get_value( 'footer_scroll-to-top_html' );
		$text  = _get_value( 'footer_scroll-to-top_text' );
		$link  = '<a href="#top" rel="nofollow" class="scroll-to-top%s">%s</a>';
		$icon  = '<svg width="24px" height="24px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" focusable="false"><g><path fill="none" d="M0,0h24v24H0V0z"></path></g><g><path d="M7.41,8.59L12,13.17l4.59-4.58L18,10l-6,6l-6-6L7.41,8.59z"></path></g></svg>';

		if ( $style === 'button' ) {
			printf( $link, '-icon', $icon );

		} elseif ( $style === 'html' ) {
			printf( $html );

		} else {
			printf( $link, '', $text );
		}
	}

	genesis_structural_wrap( 'footer-credits', 'close' );

	genesis_markup( [
		'close'   => '</div>',
		'context' => 'footer-credits',
	] );
}

add_action( 'genesis_footer', __NAMESPACE__ . '\display_footer_widgets', 11 );
/**
 * Display footer widgets widget areas.
 *
 * @var $widget_areas Number of footer widget areas.
 */
function display_footer_widgets() {
	if ( ! is_active_sidebar( 'footer-1' ) ) {
		return;
	}

	$settings = _get_value( 'footer_widgets_columns' );

	if ( '0' === $settings ) {
		return;
	}

	genesis_markup( [
		'open'    => '<div %s>' . genesis_get_structural_wrap( 'footer-widgets', 'open' ),
		'context' => 'footer-widgets',
	] );

	$widgets = explode( '-', $settings );
	$count   = 1;
	$width   = [
		'12' => 'full-width',
		'9'  => 'three-fourths',
		'8'  => 'two-thirds',
		'6'  => 'one-half',
		'4'  => 'one-third',
		'3'  => 'one-fourth',
	];

	foreach ( $widgets as $widget ) {
		$first = $count === 1 ? ' first' : '';
		genesis_widget_area( "footer-$count", [
			'before' => sprintf( '<div class="footer-widgets-area footer-widgets-%s %s%s">', $count, $width[ $widget ], $first ),
			'after'  => '</div>',
		] );
		$count ++;
	}

	genesis_markup( [
		'close'   => genesis_get_structural_wrap( 'footer-widgets', 'close' ) . '</div>',
		'context' => 'footer-widgets',
	] );
}

add_action( 'genesis_meta', __NAMESPACE__ . '\hide_site_footer' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function hide_site_footer() {
	if ( _is_pro_active() && get_post_meta( get_the_ID(), 'footer_disabled', true ) ) {
		remove_action( 'genesis_meta', __NAMESPACE__ . '\footer_credits', 20 );
		remove_action( 'genesis_footer', __NAMESPACE__ . '\display_footer_widgets', 11 );
		remove_action( 'genesis_footer', __NAMESPACE__ . '\above_footer', 11 );
		remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
		remove_action( 'genesis_footer', 'genesis_do_footer' );
		remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );
	}
}
