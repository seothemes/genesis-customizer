<?php

namespace GenesisCustomizer;

// Load plugin update checker.
require_once _get_path() . 'src/includes/plugin-update-checker/plugin-update-checker.php';

$genesis_customizer_updater = \Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/seothemes/genesis-customizer',
	_get_path() . 'genesis-customizer.php',
	_get_handle()
);

$genesis_customizer_updater->setBranch( 'master' );
