<?php

namespace GenesisCustomizer;

add_action( 'genesis_before', __NAMESPACE__ . '\footer_credits' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function footer_credits() {
	remove_action( 'genesis_footer', 'genesis_do_footer' );

	$footer_credits = _get_value( 'footer_footer-credits_enabled' );

	if ( $footer_credits ) {
		add_action( 'genesis_footer', __NAMESPACE__ . '\footer_credits_div', 13 );
	}
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

	$type = _get_value( 'footer_footer-credits_type', 'text' );

	if ( 'widget' === $type ) {
		display_footer_credits();

	} else {
		$text = _get_value( 'footer_footer-credits_text' );

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
