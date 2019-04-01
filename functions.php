<?php
/**
 * Check if the plugin has been installed as a theme.
 *
 * This file won't be used by the plugin unless it is installed as a theme. It
 * then serves as the standard functions.php packaged with themes. It will
 * display an alert to users who mistakenly install the it as a theme
 * and give them the option to move it automatically if possible.
 *
 * @package   GenesisCustomizer
 * @copyright Copyright 2012 GenesisCustomizer
 * @license   GPL-3.0-or-later
 * @link      https://genesiscustomizer.com/
 * @since     1.0.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'after_setup_theme', 'genesis_customizer_not_a_theme_textdomain' );
/**
 * Load the translation files as a theme.
 *
 * @since 1.2.0
 */
function genesis_customizer_not_a_theme_textdomain() {
	load_theme_textdomain( 'genesis-customizer', get_stylesheet_directory() . '/assets/lang' );
}

add_action( 'admin_init', 'genesis_customizer_not_a_theme' );
/**
 * Move the framework to the plugins directory.
 *
 * @since 1.2.0
 */
function genesis_customizer_not_a_theme() {
	global $wp_filesystem;

	$theme_dir   = trailingslashit( get_stylesheet_directory() );
	$child_dir   = dirname( $theme_dir ) . '/genesis-child-theme/';
	$child_files = $theme_dir . 'assets/templates/child-theme/';

	if ( ! isset( $_REQUEST['_wpnonce'] ) || ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'genesis-customizer-theme-to-plugin' ) ) {
		return false;
	}

	$move_url = wp_nonce_url( 'themes.php', 'genesis-customizer-theme-to-plugin' );

	if ( false === ( $credentials = request_filesystem_credentials( $move_url ) ) ) {
		return true;
	}

	if ( ! WP_Filesystem( $credentials ) ) {
		// Credentials weren't good, ask again.
		request_filesystem_credentials( $move_url );

		return true;
	}

	$plugin_dir = $wp_filesystem->wp_plugins_dir() . 'genesis-customizer/';

	// Check if the framework plugin directory already exists.
	if ( is_dir( $plugin_dir ) ) {
		$redirect = add_query_arg( 'gcmovemsg', 'plugin-exists', admin_url( 'themes.php' ) );
		wp_safe_redirect( esc_url_raw( $redirect ) );
		exit;
	}

	// Move the plugin.
	if ( $wp_filesystem->move( $theme_dir, $plugin_dir ) ) {
		activate_plugin( basename( __DIR__ ) . '/genesis-customizer.php' );
		wp_safe_redirect( esc_url_raw( admin_url( 'plugins.php' ) ) );
		exit;

	} // Redirect to notice saying it didn't work. Move it manually.
	else {
		$redirect = add_query_arg( 'gcmovemsg', 'move-failed', admin_url( 'themes.php' ) );
		wp_safe_redirect( esc_url_raw( $redirect ) );
		exit;
	}
}

add_action( 'admin_notices', 'genesis_customizer_not_a_theme_notice' );
/**
 * Display a notice in the dashboard to alert the user that the framework is not a theme.
 *
 * @since 1.2.0
 */
function genesis_customizer_not_a_theme_notice() {
	$notice     = '';
	$message_id = ( isset( $_REQUEST['gcmovemsg'] ) ) ? $_REQUEST['gcmovemsg'] : '';
	$move_url   = wp_nonce_url( 'themes.php', 'genesis-customizer-theme-to-plugin' );

	switch ( $message_id ) {
		case 'plugin-exists' :
			if ( ! is_multisite() && current_user_can( 'delete_themes' ) ) {
				$stylesheet  = get_template();
				$delete_link = sprintf(
					__( 'You should <a href="%s">delete the theme</a> and activate as a plugin instead.', 'genesis-customizer' ),
					wp_nonce_url( 'themes.php?action=delete&amp;stylesheet=' . urlencode( $stylesheet ), 'delete-theme_' . $stylesheet )
				);
			}

			$notice = __( 'Genesis Customizer appears to already exist as a plugin.', 'genesis-customizer' );
			$notice .= empty( $delete_link ) ? '' : ' ' . $delete_link;
			break;

		case 'move-failed' :
			$notice = __( 'Genesis Customizer could not be moved to your plugins folder automatically. You should move it manually.', 'genesis-customizer' );
			break;

		default :
			$notice = __( '<strong>Genesis Customizer is not a theme.</strong> It should be installed as a plugin.', 'genesis-customizer' );
			$notice .= current_user_can( 'install_plugins' ) ? sprintf( ' <a href="%s">%s</a>', esc_url( $move_url ), __( 'Would you like to move it now?', 'genesis-customizer' ) ) : '';
	}

	if ( ! empty( $notice ) ) :
		?>
        <div class="error">
            <p><?php echo $notice; ?></p>
        </div>
	<?php
	endif;
}
