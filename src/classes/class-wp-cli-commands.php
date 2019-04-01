<?php

namespace GenesisCustomizer;

/**
 * Just a few sample commands to learn how WP-CLI works
 */
class WP_CLI_Commands extends \WP_CLI_Command {

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @param $args
	 *
	 * @return void
	 */
	function version() {
		$line = __( 'Running ', 'genesis-customizer' );
		$line .= _get_name();
		$line .= __( ' version ', 'genesis-customizer' );
		$line .= _get_version();
		$line .= __( '.', 'genesis-customizer' );

		\WP_CLI::line( $line );
	}

	/**
	 * Description of expected behavior.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function reset() {
		delete_option( 'theme_mods_' . _get_handle() );

		$line = _get_name();
		$line .= __( ' theme mods reset.', 'genesis-customizer' );

		\WP_CLI::line( $line );
	}
}
