<?php
/**
 * Genesis Customizer.
 *
 * This file adds the Github Updater to Genesis Customizer.
 *
 * @package   GenesisCustomizer
 * @author    SEO Themes
 * @copyright 2019 SEO Themes
 * @license   GPL-3.0-or-later
 */

namespace GenesisCustomizer;

// Initialize plugin updater.
$genesis_customizer_updater = \Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/seothemes/genesis-customizer',
	_get_path() . 'genesis-customizer.php',
	_get_handle()
);

// Set default branch to master.
$genesis_customizer_updater->setBranch( 'master' );
