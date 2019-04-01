<?php

namespace GenesisCustomizer;

/**
 * Class Merlin_WP
 *
 * @package GenesisCustomizer
 */
class Merlin_WP extends \Merlin {

	/**
	 * Get template part workaround.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	public function loading_spinner() {
		$svg = require_once $this->base_path . $this->directory . DIRECTORY_SEPARATOR . 'assets/images/spinner.php';

		echo $svg;
	}
}
