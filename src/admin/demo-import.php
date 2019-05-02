<?php

namespace GenesisCustomizer;

// Disable branding.
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

add_filter( 'network_admin_plugin_action_links_genesis-customizer/genesis-customizer.php', __NAMESPACE__ . '\change_plugin_dependency_text', 100 );
add_filter( 'network_admin_plugin_action_links_one-click-demo-import/one-click-demo-import.php', __NAMESPACE__ . '\change_plugin_dependency_text', 100 );
add_filter( 'network_admin_plugin_action_links_kirki/kirki.php', __NAMESPACE__ . '\change_plugin_dependency_text', 100 );
add_filter( 'plugin_action_links_genesis-customizer/genesis-customizer.php', __NAMESPACE__ . '\change_plugin_dependency_text', 100 );
add_filter( 'plugin_action_links_one-click-demo-import/one-click-demo-import.php', __NAMESPACE__ . '\change_plugin_dependency_text', 100 );
add_filter( 'plugin_action_links_kirki/kirki.php', __NAMESPACE__ . '\change_plugin_dependency_text', 100 );
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
 * Description of expected behavior.
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
		'menu_slug'   => 'genesis-customizer-setup',
	];

	return $custom;
}

add_filter( 'pt-ocdi/import_files', __NAMESPACE__ . '\demo_import_files' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array
 */
function demo_import_files() {
	$custom = [
		[
			'slug' => 'default',
			'cats' => [ 'Free' ],
		],
		[
			'slug' => 'business-pro',
			'cats' => [ 'Pro', 'Elementor' ],
		],
		[
			'slug' => 'contrast',
			'cats' => [ 'Pro', 'Elementor' ],
		],
		[
			'slug' => 'fitness',
			'cats' => [ 'Pro', 'Elementor' ],
		],
		[
			'slug' => 'foodie-pro',
			'cats' => [ 'Free' ],
		],
		[
			'slug' => 'genesis-sample',
			'cats' => [ 'Free' ],
		],
		[
			'slug' => 'ghost',
			'cats' => [ 'Pro' ],
		],
		[
			'slug' => 'landscaper',
			'cats' => [ 'Pro' ],
		],
		[
			'slug' => 'portfolio',
			'cats' => [ 'Pro' ],
		],
	];
	$assets = _get_path() . 'assets/demo';

	foreach ( $custom as $id => $args ) {
		$slug = $args['slug'];
		$name = ucwords( str_replace( '-', ' ', $slug ) );

		$demos[] = [
			'import_file_name'             => $name,
			'categories'                   => $args['cats'],
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
 * @since  0.1.0
 *
 * @uses   business_slug_exists Helper function.
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
 * Description of expected behavior.
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
