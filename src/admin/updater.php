<?php

namespace GenesisCustomizer;

$genesis_customizer_updater = \Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/seothemes/genesis-customizer-plugin',
	_get_path() . 'genesis-customizer.php',
	_get_handle()
);

$genesis_customizer_updater->setBranch( 'master' );
