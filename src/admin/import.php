<?php

namespace GenesisCustomizer;

add_filter( 'merlin_after_all_import', __NAMESPACE__ . '\after_demo_import' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function after_demo_import() {

	// Assign menus to their locations.
	$locations['primary'] = get_term_by( 'name', 'Header Menu', 'nav_menu' );
	$locations['footer']  = get_term_by( 'name', 'Footer Menu', 'nav_menu' );

	foreach ( $locations as $location => $menu ) {
		if ( $menu ) {
			$menus[ $location ] = $menu->term_id;
		}
	}

	if ( isset( $menus ) && $menus ) {
		set_theme_mod( 'nav_menu_locations', $menus );
	}

	// Assign front page and posts page (blog page).
	$home = get_page_by_title( 'Home' );
	$blog = get_page_by_title( 'Blog' );

	if ( $home && $blog ) {
		update_option( 'show_on_front', 'page' );
		update_option( 'page_on_front', $home->ID );
		update_option( 'page_for_posts', $blog->ID );
	}

	// Set the WooCommerce shop page.
	$shop = get_page_by_title( 'Shop' );

	if ( $shop ) {
		update_option( 'woocommerce_shop_page_id', $shop->ID );
	}

	// Trash "Hello World" post.
	wp_delete_post( 1 );

	// Update permalink structure.
	global $wp_rewrite;
	$wp_rewrite->set_permalink_structure( '/%postname%/' );
	$wp_rewrite->flush_rules();
}
