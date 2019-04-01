<?php

namespace GenesisCustomizer;

/**
 * Link Section.
 */
class Hidden_Section extends \WP_Customize_Section {

	/**
	 * The section type.
	 *
	 * @since  3.0.36
	 * @access public
	 * @var string
	 */
	public $type = 'genesis-customizer-hidden';

	/**
	 * Outputs the Underscore.js template.
	 *
	 * @since  3.0.36
	 * @access public
	 * @return void
	 */
	protected function render_template() {}
}
