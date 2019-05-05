<?php
/**
 * Genesis Customizer.
 *
 * This file contains script functions for Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

add_action( 'genesis_before', __NAMESPACE__ . '\js_no_js', 0 );
/**
 * Echo out the script that changes 'no-js' class to 'js'.
 *
 * Adds a script on the genesis_before hook which immediately changes the
 * class to js if JavaScript is enabled. This is how WP does things on
 * the back end, to allow different styles for the same elements
 * depending if JavaScript is active or not.
 *
 * Outputting the script immediately also reduces a flash of incorrectly
 * styled content, as the page does not load with no-js styles, then
 * switch to js once everything has finished loading.
 *
 * @since  1.0.0
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
 * Enqueue main scripts.
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
			'breakpoint'       => _get_option( 'breakpoint', _get_breakpoint() ),
			'gutter'           => _get_value( 'base_global_gutter' ),
			'sticky'           => _has_sticky_header(),
			'transparent'      => _has_transparent_header(),
		]
	);
}
