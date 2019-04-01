<?php

namespace GenesisCustomizer;

add_action( 'genesis_before', __NAMESPACE__ . '\js_no_js', 0 );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function js_no_js() {
	?>
    <script>
        //<![CDATA[
        (function () {
            var c = document.body.classList;
            c.remove('no-js');
            c.add('js');
        })();
        //]]>
    </script>
	<?php
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_scripts' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function enqueue_scripts() {
	$handle = _get_handle();

	wp_register_script(
		$handle,
		_get_url() . 'assets/js/min/genesis-customizer.js',
		[ 'jquery' ],
		_get_asset_version( 'js/min/genesis-customizer.js' ),
		true
	);
	wp_enqueue_script( $handle );


	$button = _get_value( 'menus_menu-toggle_text' );
	$button = $button ? sprintf( '<span class="menu-toggle-text">%s</span>', $button ) : sprintf( '<span class="screen-reader-text">%s</span>', __( 'Toggle Menu', 'genesis-customizer' ) );

	if ( _get_value( 'menus_menu-toggle_icon' ) ) {
		$button = '<span class="menu-toggle-icon"></span>' . $button;
	}

	wp_localize_script(
		$handle,
		'genesis_responsive_menu',
		[
			'mainMenu'         => $button,
			'subMenu'          => __( 'Toggle Submenu', 'genesis-customizer' ),
			'menuClasses'      => [
				'combine' => [
					'.nav-primary',
					'.nav-secondary',
				],
				'others'  => [],
			],
			'menuIconClass'    => '',
			'subMenuIconClass' => '',
			'subMenuIcon'      => _get_value( 'menus_sub-menu-toggle_icon' ),
			'breakpoint'       => _get_value( 'general_breakpoints_global', _get_breakpoint() ),
		]
	);
}
