<?php

namespace GenesisCustomizer;

add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\block_editor_styles' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function block_editor_styles() {
	wp_register_style(
		_get_handle() . '-editor-styles',
		_get_url() . 'assets/css/editor-styles.css',
		[],
		_get_version()
	);

	wp_enqueue_style( _get_handle() . '-editor-styles' );
}
