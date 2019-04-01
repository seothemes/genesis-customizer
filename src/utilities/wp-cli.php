<?php

namespace GenesisCustomizer;

function is_cli_running() {
	return defined( 'WP_CLI' ) && WP_CLI;
}

if ( is_cli_running() ) {
	\WP_CLI::add_command( _get_handle(), __NAMESPACE__ . '\WP_CLI_Commands' );
}
