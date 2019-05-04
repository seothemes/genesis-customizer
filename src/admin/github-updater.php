<?php

namespace GenesisCustomizer;

// Initialize plugin updater.
$genesis_customizer_updater = \Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/seothemes/genesis-customizer',
	_get_path() . 'genesis-customizer.php',
	_get_handle()
);

// Set default branch to master.
$genesis_customizer_updater->setBranch( 'master' );
