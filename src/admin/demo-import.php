<?php

namespace GenesisCustomizer;

// Disable branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

// Remove intro text.
add_filter( 'pt-ocdi/plugin_intro_text', '__return_empty_string' );

add_filter( 'network_admin_plugin_action_links_genesis-customizer/genesis-customizer.php', __NAMESPACE__ . '\change_plugin_dependency_text', 100 );
add_filter( 'plugin_action_links_genesis-customizer/genesis-customizer.php', __NAMESPACE__ . '\change_plugin_dependency_text', 100 );
/**
 * Change plugin dependency text.
 *
 * @since 1.0.0
 *
 * @param $actions
 *
 * @return array
 */
function change_plugin_dependency_text( $actions ) {
	$actions['required-plugin'] = sprintf(
		'<span class="network_active">%s</span>',
		__( 'Theme Dependency', 'genesis-customizer' )
	);

	return $actions;
}

add_filter( 'pt-ocdi/plugin_page_setup', __NAMESPACE__ . '\demo_import_plugin_page' );
/**
 * Modify the one click demo import plugin page settings.
 *
 * @since 1.0.0
 *
 * @param $defaults
 *
 * @return array
 */
function demo_import_plugin_page( $defaults ) {
	$custom = [
		'parent_slug' => 'genesis',
		'page_title'  => esc_html__( 'Demo Import', 'genesis-customizer' ),
		'menu_title'  => esc_html__( 'Demo Import', 'genesis-customizer' ),
		'capability'  => 'import',
		'menu_slug'   => 'genesis-customizer-demo-import',
	];

	return $custom;
}

add_filter( 'pt-ocdi/import_files', __NAMESPACE__ . '\demo_import_files' );
/**
 * Add theme demo config to one click demo import.
 *
 * @since 1.0.0
 *
 * @return array
 */
function demo_import_files() {
	$assets = _get_path() . 'assets/demo';
	$custom = [
		'default'        => [ 'Free' ],
		'foodie-pro'     => [ 'Free' ],
		'genesis-sample' => [ 'Free' ],
		'ghost'          => [ 'Pro' ],
		'landscaper'     => [ 'Pro' ],
		'portfolio'      => [ 'Pro' ],
		'business-pro'   => [ 'Pro', 'Elementor' ],
		'contrast'       => [ 'Pro', 'Elementor' ],
		'fitness'        => [ 'Pro', 'Elementor' ],
	];

	foreach ( $custom as $slug => $categories ) {
		$name = ucwords( str_replace( '-', ' ', $slug ) );

		$demos[] = [
			'import_file_name'             => $name,
			'categories'                   => $categories,
			'local_import_file'            => "$assets/$slug/content.xml",
			'local_import_widget_file'     => "$assets/$slug/widgets.wie",
			'local_import_customizer_file' => "$assets/$slug/customizer.dat",
			'import_preview_image_url'     => "https://genesiscustomizer.com/wp-content/uploads/$slug-768x576.png",
			'import_notice'                => __( '', 'genesis-customizer' ),
			'preview_url'                  => "https://demo.genesiscustomizer.com/$slug/",
		];
	}

	return apply_filters( 'genesis_customizer_theme_demos', $demos );
}

add_filter( 'pt-ocdi/after_all_import_execution', __NAMESPACE__ . '\after_demo_import', 100 );
/**
 * Set default pages after demo import.
 *
 * Automatically creates and sets the Static Front Page and the Page for Posts
 * upon theme activation, only if these pages don't already exist and only
 * if the site does not already display a static page on the homepage.
 *
 * @since  1.0.0
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

add_filter( 'all_plugins', __NAMESPACE__ . '\hide_dependencies' );
/**
 * Hide dependencies from plugins list in admin.
 *
 * @since 1.0.0
 *
 * @param $plugins
 *
 * @return mixed
 */
function hide_dependencies( $plugins ) {
	if ( ! _get_option( 'dependencies', true ) ) {
		return $plugins;
	}

	$dependencies = [
		'genesis-customizer',
		'kirki',
		'one-click-demo-import',
	];

	foreach ( $dependencies as $dependency ) {
		$plugin = "$dependency/$dependency.php";

		if ( is_plugin_active( $plugin ) ) {
			unset( $plugins[ $plugin ] );
		}
	}

	return $plugins;
}

add_filter( 'gettext', __NAMESPACE__ . '\modify_ocdi_strings', 20, 3 );
/**
 * Modify hardcoded strings in One Click Demo Import.
 *
 * @since 1.0.0
 *
 * @param $translated_text
 * @param $untranslated_text
 * @param $domain
 *
 * @return string
 */
function modify_ocdi_strings( $translated_text, $untranslated_text, $domain ) {
	$custom_field_text = '%1$s%3$sThat\'s it, all done!%4$s%2$sThe demo import has finished. Please check your page and make sure that everything has imported correctly. If it did, you can deactivate the %3$sOne Click Demo Import%4$s plugin, because it has done its job.%5$s';

	if ( is_admin() && $untranslated_text === $custom_field_text ) {
		return __( '%1$s%3$sThat\'s it, all done!%4$s%2$sThe demo import has finished. Please check your page and make sure that everything has imported correctly. ', 'genesis-customizer' ) . sprintf( '<a href="%s" target="_blank">%s</a>', home_url(), __( 'View Site', 'genesis-customizer' ) );
	}

	return $translated_text;
}
