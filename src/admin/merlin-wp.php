<?php

namespace GenesisCustomizer;

add_action( 'after_setup_theme', __NAMESPACE__ . '\setup_merlin' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return void
 */
function setup_merlin() {
	new Merlin_WP( merlin_config(), merlin_strings() );
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array
 */
function merlin_config() {
	return apply_filters( 'genesis_customizer_merlin_config', [
		'base_path'            => _get_path() . 'vendor/richtabor/',
		'base_url'             => _get_url() . 'vendor/richtabor/',
		'directory'            => 'merlin-wp',
		'merlin_url'           => 'genesis-customizer-setup',
		'parent_slug'          => 'genesis',
		'capability'           => 'manage_options',
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes',
		'dev_mode'             => true,
		'license_step'         => false,
		'license_required'     => false,
		'license_help_url'     => '',
		'edd_remote_api_url'   => '',
		'edd_item_name'        => '',
		'edd_theme_slug'       => '',
		'ready_big_button_url' => get_home_url(),
	] );
}

/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array
 */
function merlin_strings() {
	return apply_filters( 'genesis_customizer_merlin_strings', [
		'admin-menu'          => esc_html__( 'Theme Setup', 'genesis-customizer' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'       => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'genesis-customizer' ),
		'return-to-dashboard' => esc_html__( 'Return to the dashboard', 'genesis-customizer' ),
		'ignore'              => esc_html__( 'Disable this wizard', 'genesis-customizer' ),

		'btn-skip'                 => esc_html__( 'Skip', 'genesis-customizer' ),
		'btn-next'                 => esc_html__( 'Next', 'genesis-customizer' ),
		'btn-start'                => esc_html__( 'Start', 'genesis-customizer' ),
		'btn-no'                   => esc_html__( 'Cancel', 'genesis-customizer' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'genesis-customizer' ),
		'btn-child-install'        => esc_html__( 'Install', 'genesis-customizer' ),
		'btn-content-install'      => esc_html__( 'Install', 'genesis-customizer' ),
		'btn-import'               => esc_html__( 'Import', 'genesis-customizer' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'genesis-customizer' ),
		'btn-license-skip'         => esc_html__( 'Later', 'genesis-customizer' ),

		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'genesis-customizer' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'genesis-customizer' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'genesis-customizer' ),
		'license-label'            => esc_html__( 'License key', 'genesis-customizer' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'genesis-customizer' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'genesis-customizer' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'genesis-customizer' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'genesis-customizer' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'genesis-customizer' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'genesis-customizer' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'genesis-customizer' ),

		'child-header'         => esc_html__( 'Install Child Theme', 'genesis-customizer' ),
		'child-header-success' => esc_html__( 'Child theme active!', 'genesis-customizer' ),
		'child'                => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'genesis-customizer' ),
		'child-success%s'      => esc_html__( 'Your child theme has been installed successfully  and is now activated, if it wasn\'t already.', 'genesis-customizer' ),
		'child-action-link'    => esc_html__( 'Learn about child themes', 'genesis-customizer' ),
		'child-json-success%s' => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'genesis-customizer' ),
		'child-json-already%s' => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'genesis-customizer' ),

		'plugins-header'         => esc_html__( 'Install Plugins', 'genesis-customizer' ),
		'plugins-header-success' => esc_html__( 'You\'re up to speed!', 'genesis-customizer' ),
		'plugins'                => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'genesis-customizer' ),
		'plugins-success%s'      => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'genesis-customizer' ),
		'plugins-action-link'    => esc_html__( 'Advanced', 'genesis-customizer' ),

		'import-header'      => esc_html__( 'Import Content', 'genesis-customizer' ),
		'import'             => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme.', 'genesis-customizer' ),
		'import-action-link' => esc_html__( 'Advanced', 'genesis-customizer' ),

		'ready-header'      => esc_html__( 'All done. Have fun!', 'genesis-customizer' ),

		/* translators: Theme Author */
		'ready%s'           => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'genesis-customizer' ),
		'ready-action-link' => esc_html__( 'Extras', 'genesis-customizer' ),
		'ready-big-button'  => esc_html__( 'View your website', 'genesis-customizer' ),
		'ready-link-1'      => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', admin_url(), esc_html__( 'Admin Dashboard', 'genesis-customizer' ) ),
		'ready-link-2'      => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://genesiscustomizer.com/support/', esc_html__( 'Get Theme Support', 'genesis-customizer' ) ),
		'ready-link-3'      => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'genesis-customizer' ) ),
	] );
}

add_filter( 'genesis_merlin_steps', __NAMESPACE__ . '\merlin_steps' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @param $steps
 *
 * @return mixed
 */
function merlin_steps( $steps ) {
	unset( $steps['child'] );

	return $steps;
}

add_filter( 'merlin_import_files', __NAMESPACE__ . '\merlin_local_import_files' );
/**
 * Description of expected behavior.
 *
 * @since 1.0.0
 *
 * @return array
 */
function merlin_local_import_files() {
	$demos[] = [
		'import_file_name'             => 'Default',
		'local_import_file'            => _get_path() . 'assets/demo/default/content.xml',
		'local_import_widget_file'     => _get_path() . 'assets/demo/default/widgets.wie',
		'local_import_customizer_file' => _get_path() . 'assets/demo/default/customizer.dat',
		'import_preview_image_url'     => 'https://genesiscustomizer.test/wp-content/uploads/2019/03/mockup-1024x597.png',
		'import_notice'                => __( 'A special note for this import.', 'genesis-customizer' ),
		'preview_url'                  => 'https://genesiscustomizer.com',
	];
	$demos[] = [
		'import_file_name'             => 'Genesis Sample',
		'local_import_file'            => _get_path() . 'assets/demo/genesis-sample/content.xml',
		'local_import_widget_file'     => _get_path() . 'assets/demo/genesis-sample/widgets.wie',
		'local_import_customizer_file' => _get_path() . 'assets/demo/genesis-sample/customizer.dat',
		'import_preview_image_url'     => 'https://genesiscustomizer.test/wp-content/uploads/2019/03/mockup-1024x597.png',
		'import_notice'                => __( 'A special note for this import.', 'genesis-customizer' ),
		'preview_url'                  => 'https://genesiscustomizer.com/pro',
	];

	return $demos;
}
