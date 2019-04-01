<?php

namespace GenesisCustomizer;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_layouts', 15 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_layouts() {
	genesis_register_layout( 'center-content', [
		'label' => __( 'Center Content', 'genesis-customizer' ),
		'img'   => _get_url() . 'assets/img/center-content.gif',
	] );
}
