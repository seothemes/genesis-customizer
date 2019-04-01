<?php

namespace GenesisCustomizer;

add_filter( 'comment_author_says_text', __NAMESPACE__ . '\comment_author_says' );
/**
 * Description of expected behavior.
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
 * Description of expected behavior.
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
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $defaults
 *
 * @return mixed
 */
function comment_title_reply( $defaults ) {
	$defaults['title_reply'] = _get_value( 'single_comments_reply' );

	return $defaults;
}

add_filter( 'comment_form_defaults', __NAMESPACE__ . '\comment_submit_button' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $defaults
 *
 * @return mixed
 */
function comment_submit_button( $defaults ) {
	$defaults['label_submit'] = _get_value( 'single_comments_submit' );

	return $defaults;
}
