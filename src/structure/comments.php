<?php
/**
 * Genesis Customizer.
 *
 * This file contains comments structure functions for Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_filter( 'comment_author_says_text', __NAMESPACE__ . '\comment_author_says' );
/**
 * Filter the comment author says text.
 *
 * @since 1.0.0
 *
 * @return string
 */
function comment_author_says() {
	return _get_value( 'single_comments_says' );
}

add_filter( 'genesis_title_comments', __NAMESPACE__ . '\comments_title' );
/**
 * Filter the comments title.
 *
 * @since 1.0.0
 *
 * @return string
 */
function comments_title() {
	return '<h3>' . _get_value( 'single_comments_title' ) . '</h3>';
}

add_filter( 'comment_form_defaults', __NAMESPACE__ . '\comment_title_reply' );
/**
 * Filter the comment reply title.
 *
 * @since 1.0.0
 *
 * @param array $defaults Comment title default args.
 *
 * @return array
 */
function comment_title_reply( $defaults ) {
	$defaults['title_reply'] = _get_value( 'single_comments_reply' );

	return $defaults;
}

add_filter( 'comment_form_defaults', __NAMESPACE__ . '\comment_submit_button' );
/**
 * Filter the submit button text.
 *
 * @since 1.0.0
 *
 * @param array $defaults Comment form default args.
 *
 * @return array
 */
function comment_submit_button( $defaults ) {
	$defaults['label_submit'] = _get_value( 'single_comments_submit' );

	return $defaults;
}
